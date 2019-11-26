<template>
    <div class="comments-container__inner w-100 mb-2">
        <div class="d-flex comments-section w-100">
            <div>
                <img src="/images/avatar.png" class="small-avatar-circle small-avatar-circle-width">
            </div>
            <div class="ml-2 w-100">
                <div class="d-flex justify-content-between">
                    <div class="color-blue">
                        <span class="pl-2">{{comment.fullname}}</span>
                    </div>
                    <div class="comment-section__top pr-2">
                        <div class="comment-section__dropdown ml-auto" v-if="isn === comment.userISN">

                            <div class="comment-section__icon">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>

                            <div class="comment-section__dropcontent">
                                <div class="p-2" @click="editComment">
                                    <span>
                                        <small>Отредактировать</small>
                                    </span>
                                </div>
                                <div class="p-2"
                                     @click="deleteComment">
                                    <span>
                                        <small>Удалить</small>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex p-2 comments-section__body">
                    <div class="w-100">
                        <transition name="transition-opacity">
                            <div v-if="!editMode">{{comment.commentText}}</div>
                        </transition>
                        <transition name="transition-textarea-width">
                            <div v-if="editMode" class="d-flex wrapper">
                                <textarea v-model="comment.commentText"
                                                  class="w-100 pl-2 pr-4 comments-section__textarea"
                                                  maxlength="255"
                                                  ref="textarea-edit-comment"></textarea>
                                <emoji-component :type="EDIT_COMMENT_TEXTAREA"></emoji-component>
                            </div>
                        </transition>
                        <div class="d-flex">
                            <div v-if="editMode && comment.commentText.length > 205">
                                <span>
                                    <small>Осталось символов: {{255 - comment.commentText.length > 0 ? 255 - comment.commentText.length : 0}}</small>
                                </span>
                            </div>
                            <transition name="transition-opacity">
                                <div class="ml-auto d-flex" v-if="editMode">
                                    <transition name="transition-opacity">
                                        <div @click="saveEdited"
                                                v-if="comment.commentText !== this.oldText && comment.commentText.length > 0 && editMode"
                                                class="comments-bottom__inner pr-2 pl-2">
                                            <small class="comments-bottom__inner_hover">Сохранить</small>
                                        </div>
                                    </transition>
                                    <div @click="exitEdit"
                                            v-if="editMode"
                                            class="comments-bottom__inner pr-2 pl-2">
                                        <small class="comments-bottom__inner_hover">Отмена</small>
                                    </div>
                                </div>
                            </transition>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex pl-5 pb-1 comments-bottom">
<!--            <div class="ml-2 comments-bottom__inner">-->
<!--                <span>-->
<!--                    <i class="far fa-thumbs-up color-red"></i>-->
<!--                </span>-->
<!--                <small>0</small>-->
<!--                <small class="comments-bottom__inner_hover">Нравиться</small>-->
<!--            </div>-->
            <div class="ml-2 comments-bottom__inner"
                 v-if="isn !== comment.userISN"
                 @click="replyComment">
                <span>
                    <i class="fas fa-reply color-red"></i>
                </span>
                <small class="comments-bottom__inner_hover">Ответить</small>
            </div>
            <div class="ml-auto pr-2">
                <small>{{comment.date}}</small>
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        name: "news-comment",

        data() {
            return {
                editMode: false,
                oldText: this.comment.commentText,
                EDIT_COMMENT_TEXTAREA: 'EDIT_COMMENT'
            }
        },

        props: {
            comment: Object,
            index: Number,
            isn: Number,
        },

        methods: {
            deleteComment: function () {
                var vm = this;
                this.axios.post('/deleteComment', {commentId: this.comment.commentId}).then(response => {
                    if(response.data.success){
                        vm.$parent.post.comments.splice(vm.index, 1);
                    }
                });
            },

            replyComment: function () {
                if(this.replyFullName !== '') {
                    var id = this.$parent.post.postId;
                    this.replyFullName = '';
                    this.replyFullName = this.comment.fullname;
                    this.$parent.commentText = this.replyFullName + ', ';
                    document.getElementById(id).focus();
                }
                else {
                    var id = this.$parent.post.postId;
                    this.replyFullName = this.comment.fullname;
                    this.$parent.commentText = this.replyFullName + ', ';
                    document.getElementById(id).focus();
                }
            },

            editComment: function () {
                this.editMode = !this.editMode;
                setTimeout(() => {
                    this.$refs['textarea-edit-comment'].focus();
                }, 1000);
            },

            exitEdit: function () {
                this.editMode = !this.editMode;
                this.comment.commentText = this.oldText;
            },

            saveEdited: function () {
                this.editMode = !this.editMode;
                this.axios.post('/editComment', {commentText: this.comment.commentText, commentId: this.comment.commentId}).then(response => {
                    this.fetchSaveEdited(response.data);
                }).catch(error => {
                    alert(error);
                });
            },
            fetchSaveEdited: function (response) {
                // this.comment.edited = response.edited;
                console.log('ok')
            },
        }



    }
</script>

<style scoped>
    .comments-section__body {
        background-color: #EFEFEF;
        border-radius: 10px;
    }

    .comments-bottom__inner {
        cursor: pointer;
    }

    .comments-bottom__inner_hover {
        transition: 0.4s ease;
    }

    .comments-bottom__inner:hover .comments-bottom__inner_hover {
        color: cornflowerblue;
    }

    .comments-bottom__inner span {
        font-size: 0.7em;
    }

    .comment-section__icon {
        cursor: pointer;
    }

    .comment-section__dropcontent {
        display: none;
        position: absolute;
        background-color: #e9ebee;
        right: 45px;
        box-shadow: 0px 8px 40px 0px rgba(0,0,0,0.2);
        z-index: 300;
    }

    .comment-section__dropdown:hover .comment-section__dropcontent {
        display: block;
        transition: 0.4s ease;
        cursor: pointer;
    }

    .comment-section__dropcontent div:hover {
        background-color: cornflowerblue;
        color: #FFF;
    }

    .comment-section__dropdown:hover .comment-section__icon i {
        color: cornflowerblue;
    }


    .send-comment-btn i {
        font-size: 1.2em;
        transition: 0.4s ease;
    }

    .send-comment-btn:hover:enabled i {
        color: cornflowerblue;
        cursor: pointer;
    }

    .comments-section__textarea {
        resize: none;
        border-radius: 10px;
        height: inherit;
        outline: none;
    }

    .comments-section__textarea:focus {
        border: 1px solid cornflowerblue;
    }







</style>
