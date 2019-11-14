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
                <span class="mb-2 post-text" v-if="!editMode"><pre>{{post.postText}}</pre></span>
            </transition>
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
        <div class="pl-4 pr-4 bg-white news-contains-bottom">
            <div>
                <div class="flex-row">
                        <button
                            type="button"
                            class="buttons pt-2 pl-3 pr-3 pb-2 block"
                            @click="likePost">
                            <i class="fa-thumbs-up color-red" v-bind:class="post.isLiked === 0 ? 'far' : 'fas'"></i>
                            {{post.likes}}
                            <span v-bind:class="post.isLiked === 1 ? 'color-black' : 'color-black'">Нравится</span>
                        </button>
                    <button type='button'
                            class="buttons pt-2 pl-3 pr-3 pb-2 block">
                        <i class="far fa-comment color-red"></i>
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
        },

        updated() {
            this.imageUrl = "/storage/images/employee/" + this.post.userISN + ".png";
        },

        methods: {
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
            }

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
    }

    pre{
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    }

    iframe {
        margin-left: auto !important;
        margin-right: auto !important;
        display: block !important;
    }
</style>
