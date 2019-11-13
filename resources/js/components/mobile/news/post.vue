<template>
    <div class="news-post" onscroll="bottomOfWindow">
        <div class="pt-2 pb-2">
            <div class="d-flex bg-white">
                <div class="pl-3 pt-2 pb-2">
                    <img src="/images/avatar.png" class="avatar-small">
                </div>
                <div class="d-flex w-100">
                    <input type="text"
                           @click="createPost"
                           class="w-100 pl-3 pr-3 new-post__input"
                           placeholder="Что у вас нового?">
                </div>
            </div>
        </div>

        <div class="bg-white create-post-section w-100" v-if="isOpened">
            <div>
                <div class="pl-4 pr-4 pt-3 pb-3 d-flex">
                    <div class="arrow-class" @click="closeCreatePost">
                        <i class="fas fa-long-arrow-alt-left"></i>
                    </div>
                    <span class="d-block">Создание публикации</span>
                </div>
            </div>

            <div>
                <div class="pl-4 pr-4 pt-2 pb-2">
                    <img src="/images/avatar.png" alt="" class="avatar-small mr-3">
                    <span>{{fullname}}</span>
                </div>
            </div>

            <div class="d-flex">
                <TextareaAutosize class="post-textarea w-100 p-3"
                                  v-model="postText"
                                  placeholder="Что у Вас нового?"
                                  :min-height="120"
                                  :max-height="200"
                ></TextareaAutosize>
            </div>

            <div>
                <div class="p-2 border">
                    <i class="fas fa-image"></i>
                    <span class="ml-2">Фото/Видео</span>
                </div>
                <div class="p-2 border">
                    <i class="fas fa-volume-up"></i>
                    <span class="ml-2">Аудио</span>
                </div>
                <div class="p-2 border">
                    <i class="fas fa-file-upload"></i>
                    <span class="ml-3">Файл</span>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4 mb-4">
                <button class="new-post-btn"
                        @click="addPost">Опубликовать</button>
            </div>
        </div>

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

        <div class="d-flex justify-content-center">
            <button class="show-more-btn p-2" v-if="!allPostShown" @click="getPosts">Show more</button>
        </div>

    </div>




</template>

<script>
    export default {
        name: "post",

        data() {
          return {
              isOpened: false,
              files: [],
              images : [],
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
              allPostShown : false,
              fakeImage : false,
              imageUrl : null,
              postIds : [],

          }
        },

        props: {
            isn: Number,
            fullname: String,
        },

        mounted: function() {
            this.imageUrl = "/storage/images/employee/" + this.isn + ".png";
            Echo.private(`post`)
                .listen('NewPost', (e) => {
                    this.handleIncoming(e);
                });
            this.getPosts();
        },

        methods: {
            createPost: function () {
                this.isOpened = true;
            },
            closeCreatePost: function () {
                this.isOpened = false;
            },

            getFormData() {
                const formData = new FormData;

                this.files.forEach(file => {
                    formData.append('postFiles[]', file, file.name);
                });

                formData.append('postText', this.postText);
                formData.append('isn', this.isn);

                return formData;
            },


                addPost: function () {
                    this.preloader(true);
                    this.axios.post('/addPost', this.getFormData()).then(response => {
                        this.fetchAddPost(response.data);
                    }).catch(error => {
                        alert('Ошибка на стороне сервера');
                    });
                    this.postText = '';
                    this.closeCreatePost();
                },
                fetchAddPost: function (response) {
                    // this.posts.unshift({
                    //     isn: response.userISN,
                    //     postText: response.postText,
                    //     likes: 0,
                    //     pinned: response.pinned,
                    //     fullname: response.fullname,
                    //     date: response.date,
                    //     postId: response.id,
                    //     edited: response.edited,
                    //     isLiked: response.isLiked
                    // });
                    this.postIds.push(response.id);
                    this.preloader(false);
                },


                getPosts () {
                    this.preloader(true);
                    this.axios.post('/getPosts', {lastIndex: this.lastIndex}).then(response => {
                        this.setPosts(response.data)
                    });
                },


                setPosts (response) {
                    var vm = this;
                    var i = 0;
                    if(response.length < 5) {
                        this.allPostShown = true;
                    }
                    response.forEach(function (data) {
                        if(vm.lastIndex === null || vm.lastIndex > data.postId){
                            vm.lastIndex = data.postId;
                        }

                        if(data.pinned === 1){
                            vm.pinnedPost = data;
                            vm.pinnedPostIndex = i;
                        }

                        if(!vm.postIds.includes(data.postId)){
                            vm.postIds.push(data.postId);
                            vm.posts.push(data);
                        }
                        i++;
                    });
                    this.preloader(false);
                },


                deleteFromPost (index) {
                    this.posts.splice(index, 1);
                },


                unsetAllPinned (index) {
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
                    if (this.bottomOfWindow && !this.allPostShown) {
                        this.preloader(true);
                        this.axios.post('/getPosts', {lastIndex: this.lastIndex}).then(response => {
                            this.setPosts(response.data)
                        });
                    }
                },


                handleIncoming (e) {
                    var vm = this;
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
                },

                preloader(show){
                    if(show)
                    {
                        document.getElementById('preloader').style.display = 'flex';
                    }
                    else
                    {
                        document.getElementById('preloader').style.display = 'none';
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
    .avatar-small {
        border-radius: 100%;
        height: 35px;
    }

    .new-post__input {
        border: none;
        outline: none;
    }

    .post-author span {
        font-size: 1em;
    }

    .post-date span {
        font-size: 0.8em;
    }


    .fa-long-arrow-alt-left {
        font-size: 1.5em;
        color:cornflowerblue;
    }

    .arrow-class {
        margin-right: 30px;
    }


    .post-textarea {
        resize: none;
        height: 9rem;
        border-top: 1px solid grey;
        border-bottom: 1px solid grey;
    }


    .new-post-btn {
        background-color: cornflowerblue;
        border: none;
        color: white;
        height: 40px;
        width: 85%;
    }

    .news-post {
        position: relative;
        background-color: transparent;
    }

    .create-post-section {
        position: fixed;
        top: 0;
        height: 100vh;
        z-index: 20;
    }


    .show-more-btn {
        outline: none;
        border: none;
        border-radius: 5px;
        background-color: #FFF;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
    }

</style>
