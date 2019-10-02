<template >
    <div class="ml-2 mr-2 mb-2">
        <div class="bg-white news-contains-top">
            <div class="flex-row pl-4 pr-4 pt-3 pb-3">
                <div>
                    <div class="small-avatar-circle-width">
                        <img src="images/avatar.png" class="image small-avatar-circle">
                    </div>
                </div>
                <div class="flex-column ml-2">
                    <span class="color-blue">
                        <strong>{{post.fullname}}</strong>
                    </span>
                    <span class="color-darkgray mt-minus-8px">
                        <small>{{post.date}}</small>
                    </span>
                </div>
                <div class="ml-auto">
                    <button type="button"
                            @click="setPinned"
                            class="custom-button mr-1"
                            v-bind:class="{pinned: post.pinned === 1}">
                        <i class="fas fa-thumbtack"></i>
                    </button>
                    <button type="button"
                            @click="editPost"
                            class="custom-button mr-1"
                            v-bind:class="{editButton: editMode}">
                        <i class="fas fa-pen"></i>
                    </button>
                    <button type="button"
                            class="custom-button"
                            @click="deletePost">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        <post-edit-modal
            :post="post"
            v-if="true"
            :edit-post="editPost">
        </post-edit-modal>
        <div class="pl-2 pr-2 bg-white">
            <div class="news-block-image-contain">
<!--                <img src="images/avatar.jpg" class="image">-->
            </div>
        </div>
        <div class="flex-column bg-white pb-2">
            <div class="pl-4 pr-4 text-ellipsis input-edit">
                <input type="text"
                       v-model="post.postText"
                       v-bind:class="{editText: editMode}"
                       :disabled="!editMode"
                       data-toggle="modal"
                       data-target="#exampleModal"
                       class="custom-input bg-white w-100" />
            </div>
        </div>
        <hr class="mb-0 mt-0">
        <div class="pl-4 pr-4 bg-white news-contains-bottom">
            <div>
                <div class="flex-row">
                    <button
                        type="button"
                        class="buttons pt-2 pl-3 pr-3 pb-2 block"
                        @click="likePost">
                        <i class="far fa-thumbs-up color-red"></i>
                        {{post.likes}}
                        <span class="color-black"
                              v-bind:class="{liked: post.isLiked === 1}">Нравится</span>
                    </button>
                    <button type='button'
                            class="buttons pt-2 pl-3 pr-3 pb-2 block">
                        <i class="far fa-comment color-red"></i>
                        <span class="color-black">Комментарий</span>
                    </button>
<!--                    <transition name="fade">-->
<!--                        <button @click="saveEdited"-->
<!--                                v-if="post.postText != this.oldText && post.postText.length > 0 && !this.edited"-->
<!--                                type='button'-->
<!--                                class="save-button mt-2 mb-2 ml-auto block">Сохранить</button>-->
<!--                    </transition>-->
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
                edited: false,
                oldText: this.post.postText,
            }
        },

        props: {
            isn: Number,
            post: Object,
            index: Number,
        },

        methods: {
            deletePost: function () {
                this.axios.post('/deletePost', {postId: this.post.postId}).then(response => {
                    this.fetch(response.data)
                })
            },

            fetch: function (response) {
                this.$parent.deleteFromPost(this.index);
            },

            setPinned: function () {
                if(this.post.pinned === 0) {
                    this.axios.post('/setPinned', {postId: this.post.postId}).then(response => {
                        this.$parent.unsetAllPinned(this.index);
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
                });
            },

            fetchLiked: function (response) {
                if(response.success === true) {
                    this.post.isLiked = 1;
                    this.post.likes++;
                }
                else {
                    this.post.isLiked = 0;
                    this.post.likes--;
                }
            },

            editPost: function () {
                if(this.editMode) {
                    this.editMode = !this.editMode;
                    this.edited = !this.edited;
                    if(this.post.postText === '') {
                        this.post.postText = this.oldText;
                    }
                    if(this.post.postText !== this.oldText) {
                        this.axios.post('/editPost', {postText: this.post.postText, postId: this.post.postId}).then(response => {
                        })
                    }
                }
                else {
                    this.editMode = true;
                }
            },

            saveEdited: function () {
                this.editMode = !this.editMode;
                this.axios.post('/editPost', {postText: this.post.postText, postId: this.post.postId}).then(response => {
                    this.fetchDisabled(response.data);
                })
            },

            fetchDisabled: function (response) {
                this.edited = !this.edited;
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

    .pinned > .fas {
        color: cornflowerblue;
        transform: rotate(45deg);
        transition: transform 0.4s ease-in-out;
    }

    .buttons {
        border: none;
        background-color: transparent;
        outline: none;
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
    }


    .editButton >  .fa-pen {
        color: darkorange;
    }

    .custom-input {
        display: block;
        border: none;
        max-height: 100px;
        resize: none;
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

    .input-edit {
        width: 100%;
        height: 100px;

    }

    .fade-enter-active,
    .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter,
    .fade-leave-to {
        opacity: 0
    }

</style>
