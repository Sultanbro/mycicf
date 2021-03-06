<template>
    <div class="news-post" onscroll="bottomOfWindow">
        <div class="pt-2 pb-2">
            <div class="d-flex bg-white">
                <div class="pl-3 pt-2 pb-2">
                    <img src="/images/avatar.png" class="avatar-small header-avatar-size" v-if="fakeImage">
                    <img :src="imageUrl" class="avatar-small header-avatar-size" @error="fakeImage = true" v-else>
                </div>
                <div class="d-flex w-100 align-items-center color-darkgray" @click="createPost">
                    <div class="w-100 pl-3 pr-3 new-post__input">Что у вас нового?</div>
                </div>
            </div>
        </div>

        <div class="bg-white create-post-section w-100" v-if="isOpened">
            <div>
                <div class="d-flex">
                    <div class="arrow-class p-3" @click="closeCreatePost">
                        <i class="fas fa-long-arrow-alt-left"></i>
                    </div>
                    <div class="d-flex align-items-center">
                        <span>Создание публикации</span>
                    </div>
                </div>
            </div>

            <div>
                <div class="pl-4 pr-4 pt-2 pb-2">
                    <img src="/images/avatar.png" class="avatar-small mr-3 header-avatar-size" v-if="fakeImage">
                    <img :src="imageUrl" class="avatar-small mr-3 header-avatar-size" @error="fakeImage = true" v-else>
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
            <div class="flex-row flex-wrap">
                <div v-for="(image, index) in images" class="col-4 pr-2 pl-2 pt-2">
                    <button type="button" @click="deleteImage(index)" class="delete-image-button mobile-cancel-image"><i class="fas fa-times"></i></button>
                    <img :src="image" class="width100"/>
                </div>
            </div>

            <div class="flex-row flex-wrap">
                <div v-for="(document, index) in documents"
                     class="col-12 pr-2 pl-2 pt-2">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <div v-if="document.type === 'application/msword' || document.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'">
                                <i class="fas fa-file-word text-primary fs-1_2"></i>
                            </div>
                            <div v-if="document.type === 'application/pdf'">
                                <i class="fas fa-file-pdf text-danger fs-1_2"></i>
                            </div>
                            <div v-if="document.type === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || document.type === 'application/vnd.ms-excel'">
                                <i class="fas fa-file-excel text-success fs-1_2"></i>
                            </div>
                            <div v-if="document.type === 'application/vnd.ms-powerpoint' || document.type === 'application/vnd.openxmlformats-officedocument.presentationml.presentation'">
                                <i class="fas fa-file-powerpoint text-warning fs-1_2"></i>
                            </div>
                            <div v-if="document.type === 'application/vnd.rar' || document.type === 'application/zip'">
                                <i class="fas fa-file-archive text-info fs-1_2"></i>
                            </div>
                            <div class="pl-2 pr-2">{{document.name}}</div>
                        </div>
                        <button class="border-0 bg-transparent button-delete" @click="deleteFile(index)">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="create-post-section__add-file">
                <div class="pt-2 pb-2 pl-3 pr-3 create-post-section__add-file__inner" @click="triggerUpload()">
                    <i class="fas fa-image"></i>
                    <span class="ml-2">Фото</span>
                </div>
                <div class="pt-2 pb-2 pl-3 pr-3 create-post-section__add-file__inner">
                    <i class="fas fa-play-circle"></i>
                    <span class="ml-2">Видео</span>
                </div>
                <div class="pt-2 pb-2 pl-3 pr-3 create-post-section__add-file__inner">
                    <i class="fas fa-volume-up"></i>
                    <span class="ml-2">Аудио</span>
                </div>
                <div class="pt-2 pb-2 pl-3 pr-3 create-post-section__add-file__inner" @click="triggerUploadFile()">
                    <i class="fas fa-file-upload"></i>
                    <span class="ml-3">Файл</span>
                </div>
            </div>

            <div v-show="false">
                <input type="file" id="photo-upload" ref="imageBtn" @change="fileUpload" accept="image/*">
            </div>
            <div v-show="false">
                <input type="file" id="image-upload" ref="documentBtn" @change="docUpload" multiple>
            </div>

            <div class="d-flex justify-content-center mt-3 mb-3">
                <button class="new-post-btn"
                        @click="addPost">Опубликовать</button>
            </div>
        </div>

        <div v-if="pinnedPost !== null">
            <news-post
                :post="pinnedPost"
                :isn="isn"
                :index="pinnedPostIndex"
                :moderators="moderators"
                v-on:deletePost="deleteFromPost(pinnedPostIndex)"
            ></news-post>
        </div>
        <div v-for="(post, index) in posts" v-if="post.pinned === 0">
            <news-post
                :post="post"
                :isn="isn"
                :index="index"
                :moderators="moderators"
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
              imgExtensions: [
                  "image/jpeg",
                  "image/jpg",
                  "image/png",
                  "image/svg+xml"
              ],
              docExtensions: [
                  "application/msword",
                  "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                  "application/pdf",
                  "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                  "application/vnd.ms-excel",
                  "application/vnd.ms-powerpoint",
                  "application/vnd.openxmlformats-officedocument.presentationml.presentation",
                  "application/vnd.rar",
                  "application/zip",
              ],
              isOpened: false,
              files: [],
              images : [],
              documents: [],
              lastIndex : null,
              postText: "",
              posts: [],
              pinnedPost: null,
              pinnedPostIndex: null,
              bottomOfWindow: 0,
              scrolled: false,
              NEW_POST : "new",
              EDITED_POST : "edit",
              LIKED_POST : "like",
              PINNED_POST : "pinned",
              DELETED_POST : "deleted",
              COMMENDTED_POST : "commented",
              NEW_POST_TEXTAREA: "NEW_POST",
              allPostShown : false,
              fakeImage : false,
              imageUrl : null,
              postIds : [],
              disabled: true,
              imgMaxSize: 2 * 1024 * 1024,
              docMaxSize: 10 * 1024 * 1024,
              imgMaxNumber: 1,
              docMaxNumber: 5,
              moderators: [],
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
            this.getModerators();
        },
        updated() {
            this.imageUrl = "/storage/images/employee/" + this.isn + ".png";
        },
        methods: {
            getModerators: function () {
                this.axios.get('/getModerators', {})
                    .then(response => {
                        this.moderators = response.data.moderators
                    })
                    .catch()
            },
            fileUpload: function(e) {
                if(this.files.length < 1) {
                    const files = e.target.files;
                    const vm = this;
                    Array.from(files).forEach(file => {
                        if (file.size > this.imgMaxSize) {
                            alert("Фотография превысил ограничение по размеру : " + file.name);
                        }
                        else if(!this.checkExtension(file.type, this.imgExtensions)) {
                            alert("Доступные типы документов: svg, jpg, png");
                        }
                        else {
                            vm.files.push(file);
                            const image = new Image();
                            var reader = new FileReader();
                            reader.onload = (e) => this.images.push(e.target.result);
                            reader.readAsDataURL(file);
                        }
                    });
                }
            },
            docUpload: function(e) {
                const documents = e.target.files;
                const vm = this;

                if(documents.length <= this.docMaxNumber) {
                    Array.from(documents).forEach(document => {
                        if(document.size > this.docMaxSize) {
                            alert("Документ превысил ограничение по размеру : " + document.name);
                        }
                        else if(!this.checkExtension(document.type, this.docExtensions)) {
                            alert("Вы загрузили неверный тип документа.\n" +
                                "Доступные типы документов: doc, docx, ppt, pptx, xls, xlsx, pdf, rar");
                        }
                        else {
                            vm.documents.push(document);
                        }
                    })
                }
                else {
                    alert("Максимальное кол-во файлов: 5")
                }
            },
            deleteFile(index) {
                const vm = this;
                vm.documents.splice(index, 1);
            },

            checkExtension(type, array) {
                if(array.includes(type)) return true
                else return false;
            },
            deleteImage: function(index) {
                const vm = this;
                vm.images.splice(index, 1);
                vm.files.splice(index, 1);
            },

            triggerUpload() {
                this.$refs.imageBtn.click();
            },
            triggerUploadFile() {
                this.$refs.documentBtn.click();
            },
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
                this.documents.forEach(document => {
                    formData.append('postDocuments[]', document, document.name);
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
                this.files = [];
                this.images = [];
                this.documents = [];

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

            preloader(show) {
                if(show) {
                    document.getElementById('preloader').style.display = 'flex';
                }
                else {
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

    .new-post-btn[disabled] {
        background-color: #818181;
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


    .post-textarea {
        border: none;
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
        outline: none;
    }
    .post-textarea:focus {
        border: none;
        border-top: 1px solid cornflowerblue;
        border-bottom: 1px solid cornflowerblue;
    }

    .create-post-section__add-file__inner {
        border-bottom: 1px solid #818181;
    }




</style>
