<template>
    <div class="mb-2">
        <div class="bg-white news-contains-top">
            <div class="flex-row pl-4 pr-4 pt-3 pb-3">
                <div>
                    <div class="small-avatar-circle-width">
                        <img src="/images/avatar.png" class="small-avatar-circle small-avatar-circle-width" v-if="fakeImage">
                        <img :src="imageUrl" @error="fakeImage = true" class="small-avatar-circle small-avatar-circle-width" v-else>
                    </div>
                </div>
                <div class="flex-column ml-2">
                    <span class="color-blue">
                        <strong>{{post.fullname}}</strong>
                    </span>
                    <span class="color-darkgray mt-minus-8px">
                        <small>{{post.date}}</small>
                        <transition name="edited">
                            <small v-if="post.edited">отредактировано</small>
                        </transition>
                    </span>
                </div>
                <div class="ml-auto">
                    <button type="button"
                            @click="setPinned"
                            class="custom-button mr-1"
                            :disabled="editMode"
                            v-bind:class="{pinned: post.pinned === 1}">
                        <i class="fas fa-thumbtack"></i>
                    </button>
                    <button type="button"
                            @click="editPost"
                            class="custom-button mr-1"
                            :disabled="editMode"
                            v-bind:class="{editButton: editMode}"
                            v-if="this.isn === this.post.userISN">
                        <i class="fas fa-pen"></i>
                    </button>
                    <button type="button"
                            class="custom-button"
                            @click="deletePost"
                            v-if="this.isn === this.post.userISN">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="pl-2 pr-2 bg-white">
            <div class="news-block-image-contain">
                <img :src="image" class="post-image" v-for="(image, index) in post.image" @error="post.image.splice(index, 1)">
                <div class="jc-center" v-html="post.youtube" @error="showVideo = false" v-if="showVideo"></div>
            </div>
        </div>
        <div class="pl-4 pr-4 flex-column bg-white">
            <transition name="text">
                <div class="post-text"
                     :class="isAllTextOpened ? 'show-full-text' : ''"
                     v-if="!editMode">
                    <pre>{{post.postText}}</pre>
                </div>
            </transition>
            <div v-if="post.postText !== null && post.postText.length > 350 && !isAllTextOpened && !editMode"
                 class="pb-2"
            >
                <small class="color-blue show-all-btn"
                       @click="showAllText">Показать больше...</small>
            </div>
            <transition name="edit">
                <textarea type="text"
                          v-if="editMode"
                          v-model="post.postText"
                          v-bind:class="{editText: editMode}"
                          :disabled="!editMode"
                          class="custom-input mb-2 bg-white w-100"></textarea>
            </transition>
        </div>
        <hr class="mb-0 mt-0">
        <div class=" bg-white news-contains-bottom">
            <div>
                <div class="flex-row pl-4 pr-4">
                        <button
                            type="button"
                            class="buttons pt-2 pl-3 pr-3 pb-2 block"
                            @click="likePost">
                            <i class="fa-thumbs-up color-red"
                               :class="post.isLiked === 0 ? 'far' : 'fas'"></i>
                            {{post.likes}}
                            <span :class="post.isLiked === 1 ? 'color-black' : ''">Нравится</span>
                        </button>
                    <button type='button'
                            class="buttons pt-2 pl-3 pr-3 pb-2 block">
                        <i class="far fa-comment color-red"></i>
                        {{post.comments.length}}
                        <span class="color-black">Комментарий</span>
                    </button>
                    <div class="ml-auto">
                        <transition name="fade">
                            <div class="ml-auto" v-if="editMode">
                                <transition name="fade">
                                    <button @click="saveEdited"
                                            v-if="post.postText != this.oldText && post.postText.length > 0 && editMode"
                                            type='button'
                                            class="save-button pr-2 pl-2 mt-2 mb-2 mr-1">Сохранить</button>
                                </transition>
                                <button @click="exitEdit"
                                        v-if="editMode"
                                        type="button"
                                        class="save-button pr-2 pl-2 mt-2 mb-2">Отмена</button>
                            </div>
                        </transition>
                    </div>
                </div>

                <hr class="mb-0 mt-0">
                <div class="flex-row pl-4 pr-4 pt-3 pb-3 ">

                    <div class="comments-container w-100">

                        <div v-for="(comment, index) in post.comments">
                            <div class="comments-container__inner w-100">
                                <div class="d-flex comments-section w-100">
                                    <div>
                                        <img src="/images/avatar.png" class="small-avatar-circle small-avatar-circle-width" v-if="fakeImage">
                                        <img :src="imageUrl" @error="fakeImage = true" class="small-avatar-circle small-avatar-circle-width" v-else>
                                    </div>
                                    <div class="ml-2 comments-section__body w-100">
                                        <div class="pt-2 pb-2 pl-3 pr-3 d-flex">
                                            <div class="mr-3 w-100">
                                                <span class="color-blue">{{comment.fullname}},</span>
                                                <div>{{comment.commentText}}</div>
                                            </div>
                                            <div class="d-flex comment-section__top">
                                                <div class="comment-section__dropdown ml-auto">

                                                    <div class="comment-section__icon">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </div>

                                                    <div class="comment-section__dropcontent">
                                                        <!--                                <div class="p-2">-->
                                                        <!--                                    <span>-->
                                                        <!--                                        <small>Отредактировать</small>-->
                                                        <!--                                    </span>-->
                                                        <!--                                </div>-->
                                                        <div class="p-2"
                                                             @click="deleteComment(index)">
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
                                <div class="d-flex pl-5 pt-1 pb-1 comments-bottom">
                                    <!-- Не удалять потом дополним функционал -->
                                    <!--                                <div class="pl-3 mr-3 color-blue comments-bottom_inner"><small>Нравиться</small></div>-->
                                    <!--                                <div class="mr-3 color-blue comments-bottom_inner"><small>Ответить</small></div>-->
                                    <div class="color-blue ml-auto pr-2"><small>{{comment.date}}</small></div>
                                </div>
                            </div>



                        </div>
                        <div v-if="!allCommentsShown && post.comments.length > 3" class="pb-2 pl-5">
                            <span>
                                <small @click="showMoreComments" class="color-blue show-all-btn">Показать ещё</small>
                            </span>
                        </div>



<!--                        <div v-for="(comment, index) in comments">-->
<!--                            <news-comment :comment="comment"-->
<!--                                          :index="index"></news-comment>-->
<!--                        </div>-->
<!--                        <div v-if="!allCommentsShown && post.comments.length > 3" class="pb-2 pl-5">-->
<!--                            <span>-->
<!--                                <small @click="showMoreComments" class="color-blue show-all-btn">Показать ещё</small>-->
<!--                            </span>-->
<!--                        </div>-->

                        <div class="d-flex">
                            <div class="d-flex align-items-center">
<!--                                <img src="/images/avatar.png" class="small-avatar-circle small-avatar-circle-width">-->
                                <img src="/images/avatar.png" class="small-avatar-circle small-avatar-circle-width" v-if="fakeImage">
                                <img :src="imageUrl" @error="fakeImage = true" class="small-avatar-circle small-avatar-circle-width" v-else>
                            </div>
                            <div class="d-flex w-100">
                                <TextareaAutosize v-model="commentText"
                                                  placeholder="Напишите комментарии..."
                                                  :max-height="100"
                                                  class="p-2 ml-2 w-100 comment-textarea"></TextareaAutosize>
                            </div>
                            <button class="p-2 d-flex align-items-center send-comment-btn"
                                    :disabled="commentText === ''"
                                    @click="addComment" ><i class="fas fa-paper-plane"></i>
                            </button>

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "news-post",

        data(){
            return {
                isPinned: false,
                bottomOfWindow: 0,
                editMode: false,
                oldText: this.post.postText,
                fakeImage : false,
                imageUrl : null,
                commentText: '',
                isAllTextOpened: false,
                allCommentsShown: false,
                comments: [],
                showVideo: true,
            }
        },

        props: {
            isn: Number,
            post: Object,
            index: Number,
        },

        mounted () {
            this.imageUrl = "/storage/images/employee/" + this.post.userISN + ".png";
            // this.comments = this.post.comments.slice(0, 3)
            // this.comments = [...this.post.comments];
        },
        updated () {
            this.imageUrl = "/storage/images/employee/" + this.post.userISN + ".png";
            // this.comments = this.allCommentsShown ? this.post.comments : this.post.comments.slice(3)
        },

        methods: {
            showComment: function() {
                // for(let i = 0; i < 3; i++) {
                //     // this.comments[i] = this.post.comments[i];
                //     // this.comments.push(this.post.comments[i]);
                // }
            },

            deletePost: function () {
                this.axios.post('/deletePost', {postId: this.post.postId}).then(response => {
                    this.fetch(response.data)
                }).catch(error => {
                    alert('Ошибка на стороне сервера');
                });
            },

            setPinned: function () {
                if(this.post.pinned === 0) {
                    this.axios.post('/setPinned', {postId: this.post.postId}).then(response => {
                        this.$parent.unsetAllPinned(this.index);
                    }).catch(error => {
                        alert('Ошибка на стороне сервера');
                    });
                }
                else {
                    this.axios.post('/unsetPinned', {postId: this.post.postId}).then(response => {
                        this.$parent.unsetAllPinned(-1)
                    });
                }
            },

            likePost: function () {
                this.axios.post('/likePost', {postId: this.post.postId, isn: this.isn}).then(response => {
                    this.fetchLiked(response.data);
                }).catch(error => {
                    alert('Ошибка на стороне сервера');
                });
            },

            fetchLiked: function (response) {
                if(response.success === true) {
                    this.post.isLiked = 1;
                }
                else {
                    this.post.isLiked = 0;
                }
            },

            editPost: function () {
                if(this.post.postText === "") {
                    this.post.postText = this.oldText;
                }
                if(this.post.postText !== this.oldText) {
                    this.axios.post('/editPost', {postText: this.post.postText, postId: this.post.postId}).then(response => {
                    }).catch(error => {
                        alert('Ошибка на стороне сервера');
                    });
                }
                this.oldText = this.post.postText;
                this.editMode = !this.editMode;
            },

            saveEdited: function () {
                this.editMode = !this.editMode;
                this.axios.post('/editPost', {postText: this.post.postText, postId: this.post.postId}).then(response => {
                    this.fetchSaved(response.data);
                }).catch(error => {
                    alert('Ошибка на стороне сервера');
                });
            },

            fetchSaved: function (response) {
                this.post.edited = response.edited;
            },

            exitEdit: function () {
              this.editMode = !this.editMode;
              this.post.postText = this.oldText;
            },

            addComment: function () {
                this.axios.post('/addComment', {isn: this.isn, commentText: this.commentText, postId: this.post.postId}).then(response => {
                    this.setComments(response.data);
                });
                this.commentText = '';
            },

            showAllText: function () {
                this.isAllTextOpened = true;
            },

            setComments: function (response) {
                var vm = this;
                vm.post.comments.push(response);
            },

            showMoreComments: function () {
                // this.comments = this.post.comments;
                // this.post.comments.slice(3);
                // for(let i = 3; i < post.comments.length; i++) {
                //     this.comments[i] = post.comments[i];
                // }

                this.allCommentsShown = true;
            },

            deleteComment: function (index) {
                var vm = this;
                this.axios.post('/deleteComment', {commentId: this.post.comments[index].commentId}).then(response => {
                    if(response.data.success) {
                        vm.post.comments.splice(index, 1);
                    }
                });
            },


        }
    }
</script>

<style scoped>
    .custom-button {
        border: none !important;
        outline: none !important;
        background-color: transparent;
        /*transition: 0.4s ease;*/
    }

    .custom-button > .fas {
        color: #818181;
        transition: 0.4s ease;
    }

    .custom-button:hover > .fa-thumbtack {
        transition: 0.4s ease;
        color: cornflowerblue;
    }

    .custom-button:hover > .fa-times {
        transition: 0.4s ease;
        color: red;
    }

    .custom-button:hover > .fa-pen {
        transition: 0.4s ease;
        color: darkorange;
    }

    .pinned .fas {
        color: cornflowerblue;
        transform: rotate(45deg);
        transition: transform 0.4s ease-in-out;
    }

    .buttons {
        border: none;
        background-color: transparent;
        outline: none;
        transition: all 0.4s ease;
    }

    .buttons > span {
        transition: 0.4s ease;
    }

    .buttons:hover > span {
        color: cornflowerblue;
        transition: 0.4s ease;
    }

    .liked {
        color: red;
        display: none;
        transition: all 0.4s ease-in-out;
    }


    .editButton >  .fa-pen {
        color: darkorange;
    }

    .custom-input {
        resize: none;
        outline: none;
        border: none;
        transition: height 0.4s ease;

    }

    .save-button {
        height: 2.1em;
        color: #000;
        background-color: #efefef;
        border: none;
        border-radius: 5px;
        transition: 0.4s ease;
        outline: none !important;
    }

    .save-button:hover {
        transition: 0.4s ease;
        background-color: cornflowerblue;
        color: #FFF;
    }

    .editText {
        height: 150px;
        border: 1px solid cornflowerblue;
    }

    .editText:focus {
        box-shadow: 0 0 2px cornflowerblue;
        outline: none;
    }


    .fade-enter-active,
    .fade-leave-active {
        transition: opacity .5s;
    }

    .fade-enter,
    .fade-leave-to {
        opacity: 0;
    }

    .text-enter-active,
    .text-leave-active {
        transition: opacity 0.3s ease;
    }

    .text-enter,
    .text-leave-to {
        opacity: 0;
    }

    .edit-enter {
        height: 0;
        transition: all 1s ease;
    }

    .edit-enter-to {
        height: 150px;
        transition: all 1s ease;
    }

    .edit-leave {
        height: 150px;
        transition: all 0.5s ease;
    }

    .edit-leave-to {
        height: 0;
        transition: all 0.5s ease;
    }

    .post-text {
        width: 100%;
        max-height: 148px;
        overflow: hidden;
        word-wrap: break-word;
        line-break: auto;
    }

    .post-text pre {
        font-size: 1em;
        line-break: auto;
        white-space: pre-wrap;
        white-space: -moz-pre-wrap;
        white-space: pre-wrap;
        white-space: -o-pre-wrap;
        word-wrap: break-word;
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        overflow: hidden;
    }

    pre{
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    }

    iframe {
        margin-left: auto !important;
        margin-right: auto !important;
        display: block !important;
    }

    .comments-section__body {
        background-color: #EFEFEF;
        border-radius: 10px;
    }

    .comments-bottom_inner {
        cursor: pointer;
        transition: 0.4s ease;
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

    .show-all-btn {
        cursor: pointer;
        transition: 0.4s ease;
    }

    .show-all-btn:hover {
        color: cornflowerblue;
    }

    .show-full-text {
        max-height: none;
        overflow: unset;
    }

    .show-all-comments {
        max-height: none;
    }



    /*.comment-section__top {*/
    /*    height: 15px;*/
    /*}*/
</style>
