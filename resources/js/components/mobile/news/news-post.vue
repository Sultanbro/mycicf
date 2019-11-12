<template>
    <div>
        <div class="mb-2 bg-white post-section">
            <div class="d-flex pl-3 pr-3">
                <div class="pt-2 pb-2 pr-2">
                    <img src="/images/avatar.png"
                         class="avatar-small">
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
                <div class="ml-auto pt-1 post-settings">
                    <div @click="openPostSetting" v-click-outside="closePostSettings">
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
                <div class="post-text-section__text" :class="showFull ? 'show-full' : ''">{{post.postText}}</div>
                <div class="color-blue" v-if="post.postText.length > 200 && !showFull">
                    <small @click="showFullText(post.postId)">Показать полностью...</small>
                </div>
            </div>

<!--             <div class="" >-->
<!--                <img src="https://images.unsplash.com/photo-1499084732479-de2c02d45fcc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" alt="" style="height: 20%; width: 100%;">-->
<!--            </div>-->

            <div class="horizontal-line mt-2"></div>

            <div class="pl-3 pr-3 pt-2 pb-2 d-flex">
                <div class="mr-2" @click="likePost">
                    <i class="fa-thumbs-up text-danger" v-bind:class="post.isLiked === 1 ? 'fas ' : 'far'"></i>
                    <span v-bind:class="post.isLiked === 1 ? 'color-black' : ''">{{post.likes}}</span>
                </div>
                <div>
                    <i class="far fa-comment text-danger"></i>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ClickOutside from 'vue-click-outside';

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
                this.isSettingsOpened = true;
            },

            closePostSettings: function () {
                this.isSettingsOpened = false;
            },

            showFullText: function () {
                this.showFull = true;
            },

        },

        directives: {
            ClickOutside
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
        top: 20px;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
        z-index: 500;
        background: #FFF;
        height: fit-content;
        display: none;
    }

    .show {
        display: block;
    }

    .post-text-section__text {
        max-height: 195px;
        overflow: hidden;
    }

    .show-full {
        max-height: none;
        overflow: unset;
    }


</style>
