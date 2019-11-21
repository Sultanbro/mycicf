<template>
    <div class="mb-2 bg-white rounded">

        <!-- Header of the news post section -->
        <div class="">
            <div class="d-flex pl-4 pr-4 pt-3 pb-3">
                <div>
                    <div class="small-avatar-circle-width">
                        <img src="/images/avatar.png" class="small-avatar-circle small-avatar-circle-width" v-if="fakeImage">
                        <img :src="imageUrl" @error="fakeImage = true" class="small-avatar-circle small-avatar-circle-width" v-else>
                    </div>
                </div>
                <div class="flex-column ml-2">
                    <span class="color-blue bold">
                        {{post.fullname}}
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
        </div> <!-- Header of the news post section -->

        <div class="pl-2 pr-2">
            <div class="news-block-image-contain">
                <img :src="image" class="post-image" v-for="(image, index) in post.image" @error="post.image.splice(index, 1)">
                <div class="jc-center" v-html="post.youtube" @error="showVideo = false" v-if="showVideo"></div>
            </div>
        </div>
        <div class="pl-4 pr-4 pb-2">
            <transition name="text">
                <div class="post-text"
                     v-if="!editMode">
                    <pre v-if="!isAllTextOpened">{{post.postText.substr(0, 300)}}</pre>
                    <pre v-if="isAllTextOpened">{{post.postText}}</pre>
                    <div v-if="post.postText !== null && post.postText.length > 350 && !isAllTextOpened && !editMode">
                        <small class="color-blue show-all-btn"
                               @click="showAllText">Показать больше...</small>
                    </div>
                </div>
            </transition>

            <transition name="edit">
                <textarea type="text"
                          v-if="editMode"
                          v-model="post.postText"
                          :class="{editText: editMode}"
                          :disabled="!editMode"
                          class="custom-input mb-2 w-100"></textarea>
            </transition>
        </div>
        <hr class="mb-0 mt-0">
        <div class="news-contains-bottom">
            <div>
                <div class="flex-row pl-4 pr-4 align-items-center">
                        <div class="buttons pt-2 pl-3 pr-3 pb-2"
                            @click="likePost">
                            <span>
                                <i class="fa-thumbs-up color-red"
                                   :class="post.isLiked === 0 ? 'far' : 'fas'"></i>
                            </span>
                            <span>{{post.likes}}</span>
                            <span>Нравится</span>
                        </div>
                    <div class=" pt-2 pl-3 pr-3 pb-2">
                        <i class="far fa-comment color-red"></i>
                        <span>{{post.comments.length}}</span>
                        <span>Комментарий</span>
                    </div>
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
                                        class="save-button pl-3 pr-3">Отмена</button>
                            </div>
                        </transition>
                    </div>
                </div>

                <hr class="mb-0 mt-0">

                <div class="flex-row pl-4 pr-4 pt-3 pb-3 ">
                    <div class="comments-container w-100">

                        <div v-if="!allCommentsShown" v-for="(comment, index) in post.comments.slice(0, 3)">
                            <news-comment :comment="comment"
                                          :index="index" :isn="isn"></news-comment>
                        </div>

                        <div v-if="allCommentsShown" v-for="(comment, index) in post.comments">
                            <news-comment :comment="comment" :index="index" :isn="isn"></news-comment>
                        </div>

                        <div v-if="!allCommentsShown && post.comments.length > 3" class="pb-2 pl-5">
                            <span>
                                <small @click="showMoreComments" class="color-blue show-all-btn">Показать ещё</small>
                            </span>
                        </div>

                        <div class="d-flex">
                            <div class="d-flex align-items-center">
<!--                                <img src="/images/avatar.png" class="small-avatar-circle small-avatar-circle-width">-->
                                <img src="/images/avatar.png" class="small-avatar-circle small-avatar-circle-width" v-if="fakeImage">
                                <img :src="imageUrl" @error="fakeImage = true" class="small-avatar-circle small-avatar-circle-width" v-else>
                            </div>
                            <div class="d-flex w-100 wrapper">
                                <TextareaAutosize v-model="commentText"
                                                  placeholder="Напишите комментарии..."
                                                  :max-height="100"
                                                  id="comment-desktop-textarea"
                                                  class="pl-2 pt-2 pb-2 pr-5 ml-2 w-100 comment-textarea"></TextareaAutosize>
                                <emoji-picker @emoji="append" :search="search">
                                    <div class="emoji-invoker"
                                         slot="emoji-invoker"
                                         slot-scope="{ events: { click: clickEvent } }"
                                         @click.stop="clickEvent">
                                        <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                                        </svg>
                                    </div>
                                    <div slot="emoji-picker" slot-scope="{ emojis, insert, display }">
                                        <div class="emoji-picker" :style="{ top: 35 + 'px', right: 0}">
                                            <div class="emoji-picker__search">
                                                <input type="text" v-model="search" v-focus>
                                            </div>
                                            <div>
                                                <div v-for="(emojiGroup, category) in emojis" :key="category">
                                                    <h5>{{ category }}</h5>
                                                    <div class="emojis">
                                                        <span v-for="(emoji, emojiName) in emojiGroup"
                                                              :key="emojiName"
                                                              @click="insert(emoji)"
                                                              :title="emojiName">{{ emoji }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </emoji-picker>
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
                input: '',
                search: '',
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

        updated () {
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

            append(emoji) {
                this.commentText += emoji
            },
        },
        directives: {
            focus: {
                inserted(el) {
                    el.focus()
                },
            },
        },

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
        border: none;
        transition: height 0.4s ease;

    }

    .save-button {
        height: 2.1em;
        color: #000;
        background-color: #efefef;
        border: none;
        border-radius: 10px;
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


    /*Emoji*/
    .wrapper {
        position: relative;
        display: inline-block;
    }

    .regular-input {
        padding: 0.5rem 1rem;
        border-radius: 3px;
        border: 1px solid #ccc;
        width: 20rem;
        height: 12rem;
        outline: none;
    }

    .regular-input:focus {
        box-shadow: 0 0 0 3px rgba(66,153,225,.5);
    }

    .emoji-invoker {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        width: 1.5rem;
        height: 1.5rem;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.2s;
    }
    .emoji-invoker:hover {
        transform: scale(1.1);
    }
    .emoji-invoker > svg {
        fill: #b1c6d0;
    }

    .emoji-picker {
        position: absolute;
        z-index: 1;
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        border: 1px solid #ccc;
        width: 20rem;
        height: 20rem;
        overflow: scroll;
        padding: 1rem;
        box-sizing: border-box;
        border-radius: 0.5rem;
        background: #fff;
        box-shadow: 1px 1px 8px #c7dbe6;
    }
    .emoji-picker__search {
        display: flex;
    }
    .emoji-picker__search > input {
        flex: 1;
        border-radius: 15px;
        border: 1px solid #ccc;
        padding: 0.5rem 1rem;
        outline: none;
    }
    .emoji-picker h5 {
        margin-bottom: 0;
        color: #b1b1b1;
        text-transform: uppercase;
        font-size: 0.8rem;
        cursor: default;
    }
    .emoji-picker .emojis {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .emoji-picker .emojis:after {
        content: "";
        flex: auto;
    }
    .emoji-picker .emojis span {
        padding: 0.2rem;
        cursor: pointer;
        border-radius: 5px;
    }
    .emoji-picker .emojis span:hover {
        background: #ececec;
        cursor: pointer;
    }

</style>
