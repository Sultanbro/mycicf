<template>
    <div class="mb-2 bg-white rounded">
        <!-- Header of the news post section -->
        <div class="d-flex pl-4 pr-4 pt-3 pb-3">
            <div>
                <div class="small-avatar-circle-width">
                    <img src="/images/avatar.png" class="small-avatar-circle small-avatar-circle-width" v-if="fakeImage">
                    <img :src="imageUrl" @error="fakeImage = true" class="small-avatar-circle small-avatar-circle-width" v-else>
                </div>
            </div>
            <div class="flex-column ml-2">
                <span class="color-blue bold">
                    <a v-if="post.userISN === isn">{{post.fullname}}</a>
                    <a v-else :href="`/colleagues/${post.userISN}/dossier`" class="color-blue">{{post.fullname}}</a>
                </span>
                <span class="color-darkgray mt-minus-8px">
                    <small>{{post.date}}</small>
                    <transition name="transition-opacity">
                        <small v-if="post.edited">отредактировано</small>
                    </transition>
                </span>
            </div>

            <div class="ml-auto">
                <button type="button"
                        @click="setPinned"
                        class="custom-button mr-1"
                        :disabled="editMode"
                        v-if="moderators.includes(isn)"
                        :class="{pinned: post.pinned === 1}">
                    <i class="fas fa-thumbtack"></i>
                </button>
                <button type="button"
                        @click="editPost"
                        class="custom-button mr-1"
                        :disabled="editMode"
                        :class="{editButton: editMode}"
                        v-if="isn === parseInt(post.userISN) || moderators.includes(isn)">
                    <i class="fas fa-pen"></i>
                </button>
                <button type="button"
                        class="custom-button"
                        @click="deletePost"
                        v-if="isn === parseInt(post.userISN) || moderators.includes(isn)">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
       <!-- Header of the news post section -->

        <div class="pl-2 pr-2">
            <div class="news-block-image-contain">
                <img :src="image" class="post-image" v-for="(image, index) in post.image.slice(0, 1)" @error="post.image.splice(index, 1)">
                <div class="d-flex justify-content-center" v-html="post.youtube" @error="showVideo = false" v-if="showVideo"></div>
                <div class="d-flex justify-content-center" v-if="post.image.length > 1">
                    <button type="button" class="color-blue show-all-btn small"
                       @click="openImageViewer"
                       data-toggle="modal"
                       data-target=".bd-example-modal-lg">Показать ещё {{post.image.length - 1}} изображений</button>
                    <image-viewer :array="post.image"></image-viewer>
                </div>
            </div>
        </div>

        <div class="pl-4 pr-4 pb-2">
            <transition name="transition-opacity">
                <div class="post-text"
                     v-if="!editMode">
                    <pre v-if="!isAllTextOpened"
                        v-html="post.postText !== null ? post.postText.substr(0, 300) : ''"
                        v-linkified></pre>
                    <pre v-if="isAllTextOpened"
                        v-html="post.postText"
                        v-linkified></pre>
                    <div v-if="post.postText !== null && post.postText.length > 300 && !isAllTextOpened && !editMode">
                        <small class="color-blue show-all-btn"
                               @click="showAllText">Показать больше...</small>
                    </div>
                </div>
            </transition>
            <div class="wrapper w-100" v-if="editMode">
                <transition name="transition-textarea-height">
                    <textarea v-model="post.postText"
                              v-if="editMode"
                              maxlength="2000"
                              :class="{'textarea-height': editMode}"
                              class="custom-input w-100 pr-5"></textarea>
                </transition>
                <div v-if="post.postText.length > 1950">
                    <span>
                        <small>Отслаось символов: {{2000 - post.postText.length > 0 ? 2000 - post.postText.length : 0}}</small>
                    </span>
                </div>
                <emoji-component v-if="editMode" :type="EDIT_POST_TEXTAREA"></emoji-component>
            </div>
        </div>
        <div class="pl-2 pr-2">
            <div class="news-block-image-contain">
                <div v-for="(document, index) in post.documents"
                     class="d-flex justify-content-between bg-white pl-3 pr-3">
                    <div class="d-flex align-items-center">
                        <i :class="document.type" class="fas fs-1_2"></i>
                        <div class="p-2"><a :href="document.link" target="_blank">{{document.name}}</a></div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mb-0 mt-0">

        <div class="news-contains-bottom">
            <div>
                <div class="flex-row pl-4 pr-4 align-items-center justify-content-between">
                    <div class="flex-row">
                        <div class="buttons pt-2 pl-3 pr-3 pb-2"
                             @click="likePost">
                        <span>
                            <i class="fa-thumbs-up color-red"
                               :class="post.isLiked === 0 ? 'far' : 'fas'"></i>
                        </span>
                            <span>{{post.likes}}</span>
                            <span>Нравится</span>
                        </div>
                        <div class="pt-2 pl-3 pr-3 pb-2">
                            <i class="far fa-comment color-red"></i>
                            <span>{{post.comments.length}}</span>
                            <span>Комментарий</span>
                        </div>
                    </div>

                    <div class="d-flex">
                        <transition name="transition-opacity">
                            <div class="ml-auto" v-if="editMode">
                                <transition name="transition-opacity">
                                    <button @click="saveEdited"
                                            v-if="post.postText != this.oldText && post.postText.length > 0 && editMode"
                                            type='button'
                                            class="common-btn pt-1 pb-1 pr-2 pl-2 mr-1">Сохранить</button>
                                </transition>
                                <button @click="exitEdit"
                                        v-if="editMode"
                                        type="button"
                                        class="common-btn pt-1 pb-1 pl-3 pr-3">Отмена</button>
                            </div>
                        </transition>
                    </div>
                </div>

                <hr class="mb-0 mt-0">

                <div class="flex-row pl-4 pr-4 pt-3 pb-3 ">
                    <div class="comments-container w-100">

                        <div v-if="!allCommentsShown"
                             v-for="(comment, index) in post.comments.slice(0, 3)">
                            <news-comment :comment="comment"
                                          :index="index"
                                          :isn="isn"></news-comment>
                        </div>

                        <div v-if="allCommentsShown" v-for="(comment, index) in post.comments">
                            <news-comment :comment="comment"
                                          :index="index"
                                          :isn="isn"></news-comment>
                        </div>

                        <div v-if="!allCommentsShown && post.comments.length > 3"
                             class="pb-2 pl-5">
                            <span>
                                <small @click="showMoreComments"
                                       class="color-blue show-all-btn">Показать ещё</small>
                            </span>
                        </div>

                        <div>
                            <div class="d-flex">
                                <div class="d-flex align-items-center">
                                    <img src="/images/avatar.png" class="small-avatar-circle small-avatar-circle-width" v-if="MainFakeImage">
                                    <img :src="MainImageUrl" @error="MainFakeImage = true" class="small-avatar-circle small-avatar-circle-width" v-else>
                                </div>
                                <div class="d-flex w-100 wrapper">
                                    <textarea-autosize v-model="commentText"
                                                       placeholder="Напишите комментарии..."
                                                       :max-height="100"
                                                       :maxlength="255"
                                                       :id="post.postId"
                                                       name="textarea-add-comment"
                                                       class="pl-2 pt-2 pb-2 pr-5 ml-2 w-100 comment-textarea"></textarea-autosize>
                                    <emoji-component :type="NEW_COMMENT_TEXTAREA"></emoji-component>
                                    <div v-if="commentText.length > 205"
                                         class="d-flex align-items-center justify-content-center textarea-text-counter">
                                        <span>
                                            <small class="bold"
                                                   :class="255 - commentText.length > 0 ? 'text-success' : 'text-danger'">
                                                {{255 - commentText.length > 0 ? 255 - commentText.length : 0}}
                                            </small>
                                        </span>
                                    </div>
                                </div>
                                <button class="p-2 d-flex align-items-center send-comment-btn"
                                        :disabled="commentText === ''"
                                        @click="addComment" >
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import linkify from 'vue-linkify'

    Vue.directive('linkified', linkify);

    export default {
        name: "news-post",

        data() {
            return {
                isPinned: false,
                bottomOfWindow: 0,
                editMode: false,
                oldText: this.post.postText,
                fakeImage: false,
                imageUrl: null,
                commentText: '',
                isAllTextOpened: false,
                allCommentsShown: false,
                comments: [],
                showVideo: true,
                MainImageUrl: null,
                MainFakeImage: false,
                NEW_COMMENT_TEXTAREA: 'NEW_COMMENT',
                EDIT_POST_TEXTAREA: 'EDIT_POST',
                imageViewerOpened: false,
            }
        },

        props: {
            isn: Number,
            post: Object,
            index: Number,
            moderators : Array,
        },

        mounted() {
            this.imageUrl = "/storage/images/employee/" + this.post.userISN + ".png";
            this.MainImageUrl = "/storage/images/employee/" + this.isn + ".png";
        },

        updated() {
            this.imageUrl = "/storage/images/employee/" + this.post.userISN + ".png";
            this.MainImageUrl = "/storage/images/employee/" + this.isn + ".png";
        },

        methods: {
            openImageViewer() {
                this.imageViewerOpened = true;
            },

            closeImageViewer() {
                this.imageViewerOpened = false;
            },

            deletePost() {
                this.axios.post('/deletePost', {postId: this.post.postId}).then(response => {
                    return;
                }).catch(error => {
                    alert('Ошибка на стороне сервера');
                });
            },

            setPinned() {
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

            likePost() {
                if(this.post.isLiked === 1 || this.post.isLiked === '1') {
                    this.post.isLiked = 0;
                    this.post.likes--;
                }
                else {
                    this.post.isLiked = 1;
                    this.post.likes++;
                }
                this.axios.post('/likePost', {postId: this.post.postId, isn: this.isn}).then(response => {
                    this.fetchLiked(response.data);
                }).catch(error => {
                    alert('Ошибка на стороне сервера');
                });
            },

            fetchLiked(response) {
                if(response.success === true) {
                    this.post.isLiked = 1;
                }
                else {
                    this.post.isLiked = 0;
                }
            },

            editPost() {
                setTimeout(() => {
                    this.$refs['textarea-edit-post'].focus();
                }, 1000);
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

            saveEdited() {
                this.editMode = !this.editMode;
                this.axios.post('/editPost', {postText: this.post.postText, postId: this.post.postId}).then(response => {
                    this.fetchSaved(response.data);
                }).catch(error => {
                    alert('Ошибка на стороне сервера');
                });
            },

            fetchSaved(response) {
                this.post.edited = response.edited;
            },

            exitEdit() {
              this.editMode = !this.editMode;
              this.post.postText = this.oldText;
            },

            addComment() {
                this.axios.post('/addComment', {isn: this.isn, commentText: this.commentText, postId: this.post.postId}).then(response => {
                    this.setComments(response.data);
                });
                this.commentText = '';
            },

            showAllText() {
                this.isAllTextOpened = true;
            },

            setComments(response) {
                var vm = this;
                vm.post.comments.push(response);
            },

            showMoreComments() {
                this.allCommentsShown = true;
            },

            deleteComment(index) {
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
        cursor: pointer;
    }

    .buttons > span {
        transition: 0.4s ease;
    }

    .buttons:hover > span:last-child {
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
        transition: height 0.4s ease;
    }

    .textarea-height {
        height: 150px;
    }

    .custom-input:focus {
        border: 1px solid cornflowerblue;
    }


    .transition-textarea-height-enter {
        height: 0;
        transition: all 0.8s ease;
    }

    .transition-textarea-height-to {
        height: 150px;
        transition: all 0.8s ease;
    }

    .transition-textarea-height-leave {
        height: 150px;
        transition: all 0.5s ease;
    }

    .transition-textarea-height-leave-to {
        height: 0;
        transition: all 0.5s ease;
    }

    .post-text {
        width: 100%;
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
    }

    pre{
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
        padding: 0;
        margin: 0;
    }

    iframe {
        margin-left: auto !important;
        margin-right: auto !important;
        display: block !important;
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

    .textarea-text-counter {
        position: absolute;
        bottom: 5px;
        right: 10px;
        height: 20px;
        width: 25px;
        border: 2px solid #D9D9D9;
        border-radius: 5px;
    }
</style>
