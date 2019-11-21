<template>
    <div class="comments-container__inner w-100">
        <div class="d-flex comments-section w-100">
            <div>
                <img src="/images/avatar.png" class="small-avatar-circle small-avatar-circle-width">
            </div>
            <div class="ml-2 comments-section__body w-100">
                <div class="pt-2 pb-2 pl-3 pr-3 d-flex">
                    <div class="mr-3 w-100">
                        <span class="color-blue">{{comment.fullname}}</span>
                        <transition name="text-comment-transition">
                            <div v-if="!editMode">{{comment.commentText}}</div>
                        </transition>
                        <transition name="textarea-comment-transition">
                            <div v-if="editMode" class="d-flex">
                                <textarea v-model="comment.commentText"
                                          class="w-100 comments-section__textarea"></textarea>
                            </div>
                        </transition>

                    </div>
                    <div class="d-flex comment-section__top">
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
            </div>
        </div>
        <div class="d-flex pl-5 pb-1 comments-bottom">
            <!-- Не удалять потом дополним функционал -->
<!--            <div class="pl-3 color-blue comments-bottom_inner" v-if="isn !== comment.userISN">-->
<!--                <small>Нравиться</small>-->
<!--            </div>-->
            <div class="pl-3 color-blue comments-bottom_inner" v-if="isn !== comment.userISN">
                <small @click="replyComment">Ответить</small>
            </div>
            <div class="color-blue ml-auto pr-2">
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
                    this.replyFullName = '';
                    this.replyFullName = this.comment.fullname;
                    this.$parent.commentText = this.replyFullName + ', ';
                    document.getElementById("comment-desktop-textarea").focus();
                }
                else {
                    this.replyFullName = this.comment.fullname;
                    this.$parent.commentText = this.replyFullName + ', ';
                    document.getElementById("comment-desktop-textarea").focus();
                }
            },
            editComment: function () {
                this.editMode = !this.editMode;
            }
        }



    }
</script>

<style scoped>
    .comments-section__body {
        background-color: #EFEFEF;
        border-radius: 10px;
    }

    .comments-bottom_inner {
        cursor: pointer;
        transition: 0.4s ease;
    }

    .comments-bottom_inner:hover {
        color: cornflowerblue;
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

    .comment-textarea {
        border-radius: 10px;
        outline: none;
        /*height: 40px !important;*/
    }

    .comment-textarea:focus {
        border: 1px solid cornflowerblue;
    }

    .send-comment-btn {

        border: none;
        outline: none;
        background: #FFF;
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
        border-radius: 5px;
        outline: none;
    }

    .comments-section__textarea:focus {
        border: 1px solid cornflowerblue;
    }




    .text-comment-transition-enter-active,
    .text-comment-transition-leave-active {
        transition: opacity 0.2s ease;
    }

    .text-comment-transition-enter,
    .text-comment-transition-leave-to {
        opacity: 0;
    }


    .textarea-comment-transition-enter {
        width: 0;
        transition: all 1.2s ease;
    }

    .textarea-comment-transition-enter-to {
        width: 100%;
        transition: all 1.2s ease;
    }

    .textarea-comment-transition-leave {
        width: 100%;
        transition: all 0.8s ease;
    }

    .textarea-comment-transition-leave-to {
        width: 0;
        transition: all 0.8s ease;
    }


</style>
