<template >
    <div>
        <form onscroll="bottomOfWindow">
            <div class="pt-4">
                <div class="create-publication news-contains-top pl-4 pr-4 ml-2 mr-2">
                    <div class="pt-2 pb-2"><strong>Создайте публикацию</strong></div>
                </div>
                <div class="flex-row bg-white pl-4 pr-4 pt-2 pb-0 ml-2 mr-2 pb-2">
                    <div class="new-publication-avatar">
                        <img src="images/avatar.png" class="image small-avatar-circle">
                    </div>
                    <textarea v-model="postText" cols="1" class="textarea height100 news-block-avatar border0 width100 pt-2 pl-3" placeholder="Что у вас нового?">{{this.postText}}</textarea>
                </div>
                <hr class="mb-0 mt-0 border-hr ml-2 mr-2">
                <div class="flex-row bg-white ml-2 mr-2 news-contains-bottom mb-2">
                    <div class="new-publication-icons-bg mt-2 mb-2 ml-4 mr-2 pt-1 pr-2 pb-1 pl-2">
                        <i class="far fa-image forestgreen"></i>
                        <label for="photo-upload" class="custom-file-upload">Фото/Видео</label>
                        <input type="file" id="photo-upload" accept="image/*, video/*" multiple>
                    </div>
                    <div class="new-publication-icons-bg mt-2 mb-2 ml-4 mr-2 pt-1 pr-2 pb-1 pl-2">
                        <i class="fas fa-volume-up cornflowerblue"></i>
                        <label for="audio-upload" class="custom-file-upload">Аудио</label>
                        <input type="file" id="audio-upload" accept="audio/*"multiple>
                    </div>
                    <div class="new-publication-icons-bg mt-2 mb-2 ml-4 mr-2 pt-1 pr-2 pb-1 pl-2">
                        <i class="fas fa-file-upload cornflowerblue"></i>
                        <label for="file-upload" class="custom-file-upload">Файл</label>
                        <input type="file" id="file-upload" multiple>
                    </div>
                    <div class="ml-auto mr-4 mt-1 pt-1">
                        <transition name="fade">
                            <button type="button" v-if="postText.length > 0" class="btn btn-outline-primary send-button" @click="addPost">Опубликовать</button>
                        </transition>
                    </div>
                </div>
            </div>
        </form>
        <div v-if="pinnedPost !== null">
            <news-post
                :post="pinnedPost"
                :isn="isn"
                :index="pinnedPostIndex"
                v-on:deletePost="deleteFromPost(pinnedPostIndex)"
            ></news-post>
        </div>
        <div v-for="(post, index) in posts" v-if="post.pinned === 0">
            <news-post
                :post="post"
                :isn="isn"
                :index="index"
                v-on:deletePost="deleteFromPost(index)"
            ></news-post>
        </div>
        <div class="text-center">
            <button type="button" class="load-button" @click="getPosts()">More</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "post",
        data() {
            return {
                lastIndex : null,
                postText: '',
                posts: [],
                pinnedPost: null,
                pinnedPostIndex: null,
                bottomOfWindow: 0,
                scrolled: false,
                NEW_POST : 'new',
                EDITED_POST : 'edit',
                LIKED_POST : 'like',
                PINNED_POST : 'pinned',
                DELETED_POST : 'deleted',
                COMMENDTED_POST : 'commented',
            }
        },

        props: {
            isn: Number,
        },

        mounted: function(){
            Echo.private(`post`)
            .listen('NewPost', (e) => {
                this.handleIncoming(e);
            });
            this.getPosts();
        },

        methods: {
            addPost: function () {
                this.axios.post('addPost', {postText: this.postText, isn: this.isn}).then(response => {
                    this.fetchAddPost(response.data);
                });
                this.postText = '';
            },

            fetchAddPost: function (response) {
                // if (response.success) {
                    this.posts.unshift({
                        isn: response.userISN,
                        postText: response.postText,
                        likes: 0,
                        pinned: response.pinned,
                        fullname: response.fullname,
                        date: response.date,
                        postId: response.id,
                    });
                // }
            },

            getPosts: function () {
                this.axios.post('/getPosts', {lastIndex: this.lastIndex}).then(response => {
                    this.setPosts(response.data)
                });
            },

            setPosts: function (response) {
                var vm = this;
                var i = 0;
                response.forEach(function (data) {
                    if(vm.lastIndex === null){
                        vm.lastIndex = data.postId;
                    }

                    if(vm.lastIndex > data.postId){
                        vm.lastIndex = data.postId
                    }

                    if(data.pinned === 1){
                        vm.pinnedPost = data;
                        vm.pinnedPostIndex = i;
                    }
                    vm.posts.push(data);
                    i++;
                });
            },

            deleteFromPost: function (index) {
                this.posts.splice(index, 1);
            },

            unsetAllPinned: function (index) {
                var vm = this;
                this.pinnedPost = null;
                this.posts.forEach(function (post) {
                    post.pinned = 0;
                });
                if(index !== -1)  {
                    vm.posts[index].pinned = 1;
                    vm.pinnedPost = vm.posts[index];
                    vm.pinnedPostIndex = index;
                }
            },

            handleScroll () {
                this.bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;
                if (this.bottomOfWindow) {
                    this.axios.post('/getPosts', {lastIndex: this.lastIndex}).then(response => {
                        this.setPosts(response.data)
                    });
                }
            },

            handleIncoming (e) {
                var vm = this;
                console.log(e);
                if(e.type === vm.NEW_POST)
                {
                    if(e.post.userISN !== vm.isn) {
                        vm.posts.unshift(e.post)
                    }
                }
                else if(e.type === vm.EDITED_POST)
                {
                    vm.posts.forEach(function (post) {
                        if(post.postId === e.post.id){
                            post.postText = e.post.text;
                        }
                    });
                }
                else if(e.type === vm.PINNED_POST)
                {
                    vm.unsetAllPinned(-1);
                    if(e.post.id !== 0){
                        vm.posts.forEach(function (post) {
                            if(post.postId === e.post.id){
                                post.pinned = 1;
                                vm.pinnedPost = post;
                            }
                        });
                    }
                }
                else if(e.type === vm.LIKED_POST)
                {
                    vm.posts.forEach(function (post) {
                        if(post.postId === e.post.id){
                            post.likes = e.post.likes;
                        }
                    });
                }
                else if(e.type === vm.DELETED_POST)
                {
                    vm.posts.forEach(function (post) {
                        if(post.postId === e.post.id){
                            var index = vm.posts.indexOf(post);
                            vm.posts.splice(index, 1);
                        }
                    });
                }
            }
        },

        beforeMount () {
            window.addEventListener('scroll', this.handleScroll);
        },

        beforeDestroy () {
            window.removeEventListener('scroll', this.handleScroll);
        }
    }
</script>

<style scoped>
    input[type='file'] {
        display:none;
    }

    .custom-file-upload {
        display: inline-block;
        cursor:pointer;
        color: inherit;
        margin: 0;
        transition: 0.4s ease;
    }

    .custom-file-upload:hover {
        color: cornflowerblue;
        transition: 0.4s ease;
    }

    .send-button {
        height: 2.1em;
        color: #000;
        background-color: #efefef;
        border: none;
        border-radius: 5px;
        transition: 0.4s ease;
        outline: none !important;
    }

    .send-button:hover {
        transition: 0.4s ease;
        background-color: cornflowerblue;
        color: #FFF;
    }

    .fade-enter-active,
    .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter,
    .fade-leave-to {
        opacity: 0
    }

    .load-button {
        height: 2.1em;
        color: #000;
        background-color: #FFF;
        border: none;
        border-radius: 5px;
        transition: 0.4s ease;
        outline: none !important;
    }

    .load-button:hover {
        transition: 0.4s ease;
        background-color: #66ff00;
    }
</style>
