<template>
        <div class="mb-2 bg-white post-section">
            <div class="d-flex pl-3 pr-3">
                <div class="pt-2 pb-2 pr-2">
                    <img src="/images/avatar.png"
                         class="avatar-small header-avatar-size"
                        v-if="fakeImage">
                    <img :src="imageUrl"
                         class="avatar-small header-avatar-size"
                    @error="fakeImage = true"
                    v-else>
                </div>
                <div class="post-section__author">
                    <div class="post-author">
                        <span>{{post.fullname}}</span>
                    </div>
                    <div class="post-date">
                        <span>
                            <small>{{post.date}}</small>
                        </span>
                    </div>
                </div>
                <div v-click-outside="closePostSettings"
                    class="ml-auto post-settings">
                    <div @click="openPostSetting"
                         class="p-2">
                        <i class="fas fa-ellipsis-h"></i>
                    </div>

                    <div class="post-settings__inner"
                         :class="isSettingsOpened ? 'show' : ''">
                        <div class="p-2">
                            <span>
                                <small>Удалить</small>
                            </span>
                        </div>
                        <div class="p-2">
                            <span>
                                <small>Отредактировать</small>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pl-3 pr-3 mb-2 post-text-section">
                <div class="post-text-section__text"
                     v-if="!showFull">{{post.postText.substr(0, 200)}}</div>
                <div class="post-text-section__text"
                     v-if="showFull">{{post.postText}}</div>
                <div class="color-blue"
                     v-if="post.postText !== null && post.postText.length > 200 && !showFull">
                    <small @click="showFullText">Показать полностью...</small>
                </div>
            </div>

             <div class="" >
                <img class="width100 pl-3 pr-3 pt-2 pb-2" :src="image" v-for="(image, index) in post.image" @error="post.image.splice(index, 1)">
            </div>

            <div class="jc-center" v-html="post.youtube" @error="showVideo = false" v-if="showVideo"></div>

            <div class="horizontal-line mt-2"></div>

            <div class="pl-3 pr-3 pt-2 pb-2 d-flex">
                <button class="mr-2 comment-section-btn" @click="likePost">
                    <i class="fa-thumbs-up text-danger"
                       :class="post.isLiked === 1 ? 'fas ' : 'far'"></i>
                    <span :class="post.isLiked === 1 ? 'color-black' : ''">{{post.likes}}</span>
                </button>
                <button @click="openCommentsSection"
                        class="comment-section-btn">
                    <i class="fa-comment text-danger"
                       :class="isCommentsOpened ? 'fas ' : 'far'"></i>
                    <span >{{post.comments.length}}</span>
                </button>
            </div>

            <div  v-if="isCommentsOpened" class="comment-section w-100">
                <div v-for="(comment, index) in post.comments">
                    <news-comment :comment="comment" :index="index" :isn="isn"></news-comment>
                </div>

                <div class="pl-3 mb-2" v-if="post.comments.length > 0">
                    <span>
                        <small class="color-blue"
                               @click="closeCommentsSection">Скрыть всё</small>
                    </span>
                </div>

                <div class="d-flex create-comment-section bg-white w-100">
                        <button class="p-2 comment-section-btn">
                        <i class="fas fa-paperclip"></i>
                    </button>
                    <div class="d-flex w-100 pt-2 pb-2">
                        <TextareaAutosize class="w-100 comment-textarea"
                                          :max-height="100"
                                          id="comment-mobile-textarea"
                                          v-model="commentText"></TextareaAutosize>
                    </div>
                    <button class="p-2 comment-section-btn"
                            :disabled="commentText === ''"
                            @click="addComment">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
</template>

<script>
    import vClickOutside from 'v-click-outside'

    export default {
        name: "news-post",

        data() {
            return {
                isPinned: false,
                bottomOfWindow: 0,
                editMode: false,
                oldText: this.post.postText,
                fakeImage : false,
                imageUrl : null,
                showFull: false,
                isSettingsOpened: false,
                showVideo: true,
                isCommentsOpened: false,
                commentText: '',
                MainImageUrl: null,
                MainFakeImage: false,
            }
        },

        props: {
            isn: Number,
            post: Object,
            index: Number,
        },

        mounted () {
            this.imageUrl = "/storage/images/employee/" + this.post.userISN + ".png";
            this.MainImageUrl = "/storage/images/employee/" + this.isn + ".png";
            // this.comments = [...this.post.comments];
        },

        updated () {
            this.imageUrl = "/storage/images/employee/" + this.post.userISN + ".png";
            this.MainImageUrl = "/storage/images/employee/" + this.isn + ".png";
            // this.comments = this.allCommentsShown ? this.post.comments.slice() : this.post.comments.slice(0, 3)
        },

        methods: {
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

            openPostSetting: function () {
                this.isSettingsOpened = !this.isSettingsOpened;
            },

            closePostSettings: function () {
                this.isSettingsOpened = false;
            },

            showFullText: function () {
                this.showFull = true;
            },

            openCommentsSection: function () {
                this.isCommentsOpened = !this.isCommentsOpened;
            },

            closeCommentsSection: function () {
                this.isCommentsOpened = false;
            },

            addComment: function () {
                this.axios.post('/addComment', {isn: this.isn, commentText: this.commentText, postId: this.post.postId}).then(response => {
                    this.setComments(response.data);
                });
                this.commentText = '';
            },

            setComments: function (response) {
                var vm = this;
                vm.post.comments.push(response);
            },



        },

        directives: {
            clickOutside: vClickOutside.directive
        },

    }

</script>

<style scoped>
    .avatar-small {
        border-radius: 100%;
        height: 35px;
    }

    .post-author {
        margin-top: 5px;
    }

    .post-author span {
        font-size: 1em;
    }

    .post-date {
        margin-top: -7px;
    }

    .post-date span {
        font-size: 0.8em;
    }

    .horizontal-line {
        border: 0.5px solid #A2A2A2;
    }

    .post-settings {
        position: relative;
    }

    .post-settings__inner {
        position: absolute;
        right: 0;
        top: 25px;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
        z-index: 500;
        background: #FFF;
        height: fit-content;
        display: none;
    }

    .show {
        display: block;
    }


    .post-section {
        position: relative;
    }

    .comment-section {
        position: relative;
        border-top: 1px solid #A2A2A2;
        width: 100%;
        z-index: 200;
        overflow: auto;
        background: #FFF;
    }

    .create-comment-section {
        position: static;
        bottom: 0;
        box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
    }

    .comment-section-btn {
        background-color: #FFF;
        border: none;
        outline: none;
    }

    .comment-textarea {
        outline: none;
        border-radius: 5px;
    }

    .comment-textarea:focus {
        border: 1px solid cornflowerblue;
    }



</style>
