<template >
    <div class="mt-4 ml-2 mr-2">
        <div onscroll="bottomOfWindow" class="mb-2 bg-white rounded">

            <div class="d-flex justify-content-between bg-top pl-4 pt-2 pb-2 pr-4">
                <div>
                    <span class="bold">Создайте публикацию</span>
                </div>
                <transition name="transition-opacity">
                    <div class="bg-white border-radius-8 pl-2 pr-2" v-if="postText.length > 1950">
                        <span>Осталось символов:</span>
                        <span :class="2000 - postText.length > 0 ? 'text-success' : 'text-danger'">{{2000 - postText.length > 0 ? 2000 - postText.length : 0}}</span>
                    </div>
                </transition>
            </div>

            <div class="d-flex">
                <div class="d-flex ml-4 w-100">
                    <div class="pt-2 pb-2">
                        <img src="/images/avatar.png" class="image-circle-add-post" v-if="fakeImage">
                        <img :src="imageUrl" @error="fakeImage = true" class="image-circle-add-post" v-else>                    </div>
                    <div class="w-100 h-100 wrapper">
                        <textarea-autosize v-model="postText"
                                          class="w-100 pl-4 pt-2 pr-5 pb-2 border-0 post-textarea"
                                          placeholder="Что у вас нового?"
                                          :maxlength="2000"
                                          :min-height="70"
                                          :max-height="350">{{this.postText}}</textarea-autosize>
                        <emoji-component :type="NEW_POST_TEXTAREA"></emoji-component>
                    </div>
                </div>
            </div>

            <div class="d-flex w-100 horizontal-line"></div>

            <div class="mt-2" v-if="files.length !== 0 || documents.length !== 0">
                <div class="d-flex">
                    <div class="d-flex ml-2 mr-2 flex-wrap">
                        <div v-for="(image, index) in images"
                             class="col-md-3 col-lg-3 bg-white mb-2"
                             :key="index">
                            <div class="image-container">
                                <button type="button"
                                        class="delete-image-button"
                                        @click="deleteImage(index)">
                                    <i class="fas fa-times"></i>
                                </button>
                                <div class="layer"></div>
                                <img :src="image" class="mw-100">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="d-flex flex-column ml-3 mr-3 w-100">
                        <div v-for="(document, index) in documents"
                             class="d-flex justify-content-between bg-white pl-3 pr-3">
                            <div class="d-flex align-items-center">
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
                                <div class="p-2">{{document.name}}</div>
                            </div>
                            <button class="border-0 bg-transparent button-delete" @click="deleteFile(index)">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="flex-row">
                <div class="flex-row ml-4 mr-4 pb-2 pt-2 w-100">
                    <div class="icons-bg mr-2 pt-1 pb-1 pr-2 pl-2">
                        <i class="fas fa-image color-black file-icons"></i>
                        <label for="photo-upload" class="custom-file-upload">Фото</label>
                        <input type="file" id="photo-upload" @change="imageUpload" accept="image/*" multiple>
                    </div>
                    <!--<div class="icons-bg mr-2 pt-1 pb-1 pr-2 pl-2">-->
                        <!--<i class="fas fa-play-circle color-black file-icons"></i>-->
                        <!--<label for="video-upload" class="custom-file-upload">Видео</label>-->
                        <!--<input type="file" id="video-upload" accept="video/*" multiple>-->
                    <!--</div>-->
                    <!--<div class="icons-bg mr-2 pt-1 pb-1 pr-2 pl-2">-->
                        <!--<i class="fas fa-volume-up color-black file-icons"></i>-->
                        <!--<label for="audio-upload" class="custom-file-upload">Аудио</label>-->
                        <!--<input type="file" id="audio-upload" accept="audio/*"multiple>-->
                    <!--</div>-->
                    <div class="icons-bg pt-1 pr-2 pl-2 pb-1">
                        <i class="fas fa-file-upload color-black file-icons"></i>
                        <label for="file-upload" class="custom-file-upload">Файл</label>
                        <input type="file" id="file-upload" @change="fileUpload" multiple>
                    </div>
                    <transition name="transition-opacity">
                        <div class="icons-bg ml-auto" v-if="postText.length > 0 || files.length > 0 || documents.length > 0">
                            <button
                                    @click="addPost"
                                    class="pt-1 pb-1 pr-2 pl-2 common-btn">Опубликовать</button>
                        </div>
                    </transition>
                </div>
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
        <div class="text-center">
            <button type="button" class="load-button pl-2 pr-2" @click="getPosts" v-if="!allPostShown">Больше</button>
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
                imgMaxSize: 2 * 1024 * 1024,
                docMaxSize: 10 * 1024 * 1024,
                imgMaxNumber: 1,
                docMaxNumber: 5,
            }
        },

        props: {
            isn: Number,
        },

        mounted: function() {
            this.imageUrl = "/storage/images/employee/" + this.isn + ".png";
            Echo.private(`post`)
            .listen("NewPost", (e) => {
                this.handleIncoming(e);
            });
            this.getPosts();
        },

        methods: {
            fileUpload(e) {
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

            imageUpload(e) {
                if(e.target.files.length <= this.docMaxNumber) {
                    const files = e.target.files;
                    const vm = this;
                    Array.from(files).forEach(file => {
                        if (file.size > this.imgMaxSize) {
                            alert("Error file size: " + file.name);
                        }
                        else if(!this.checkExtension(file.type, this.imgExtensions)) {
                            alert("You can upload only images with extensions: svg, jpg, png");
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
                else {
                    alert("Maximum number of images: 1")
                }
            },

            deleteImage(index) {
                const vm = this;
                vm.images.splice(index, 1);
                vm.files.splice(index, 1);
            },

            addPost() {
                this.preloader(true);
                this.axios.post("/addPost", this.getFormData()).then(response => {
                    this.fetchAddPost(response.data);
                }).catch(error => {
                    alert("Ошибка на стороне сервера");
                });
                this.postText = "";
            },

            getFormData() {
                const formData = new FormData;

                this.documents.forEach(document => {
                    formData.append('postDocuments[]', document, document.name);
                });

                this.files.forEach(file => {
                    formData.append("postFiles[]", file, file.name);
                });

                formData.append("postText", this.postText);
                formData.append("isn", this.isn);

                return formData;
            },

            fetchAddPost(response) {
                this.files = [];
                this.images = [];
                this.documents = [];
                //     this.posts.unshift({
                //         isn: response.userISN,
                //         postText: response.postText,
                //         likes: 0,
                //         pinned: response.pinned,
                //         fullname: response.fullname,
                //         date: response.date,
                //         postId: response.id,
                //         edited: response.edited,
                //         isLiked: response.isLiked
                //     });
                // this.postIds.push(response.id);
                this.preloader(false);
                // }
            },

            getPosts() {
                this.preloader(true);
                this.axios.post("/getPosts", {lastIndex: this.lastIndex}).then(response => {
                    this.setPosts(response.data)
                });
            },

            setPosts(response) {
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

            deleteFromPost(index) {
                this.posts.splice(index, 1);
            },

            unsetAllPinned(index) {
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

            handleScroll() {
                this.bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;
                if (this.bottomOfWindow && !this.allPostShown) {
                    this.preloader(true);
                    this.axios.post("/getPosts", {lastIndex: this.lastIndex}).then(response => {
                        this.setPosts(response.data)
                    });
                }
            },

            handleIncoming(e) {
                var vm = this;
                if(e.type === vm.NEW_POST)
                {
                    if(e.post.userISN !== vm.isn) {
                        vm.posts.unshift(e.post);
                        vm.postIds.push(e.post.postId);
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
                if(show)
                {
                    document.getElementById("preloader").style.display = "flex";
                }
                else
                {
                    document.getElementById("preloader").style.display = "none";
                }
            }
        },

        beforeMount () {
            window.addEventListener("scroll", this.handleScroll);
        },

        beforeDestroy () {
            window.removeEventListener("scroll", this.handleScroll);
        }
    }
</script>

<style scoped>
    .rounded {
        border-radius: 16px !important;
    }

    .bg-top {
        background-color: #D9D9D9;
        border-radius: 16px 16px 0 0;
    }

    .avatar {
        height: 75px;
    }

    .post-textarea {
        box-sizing: border-box;
        outline: none;
    }

    .horizontal-line {
        border: 0.3px solid #A2A2A2;
    }

    .icons-bg {
        background-color: #EFEFEF;
        border-radius: 6px;
        margin: 0;
    }

    input[type="file"] {
        display:none;
    }

    .custom-file-upload {
        display: inline-block;
        cursor:pointer;
        color: inherit;
        transition: 0.4s ease;
        margin: 0;
    }

    .file-icons {
        transition: 0.4s ease;
    }

    .icons-bg:hover .custom-file-upload,
    .icons-bg:hover .file-icons
    {
        color: cornflowerblue;
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

    .image-container {
        position: relative;
    }

    .layer {
        position: absolute;
        z-index: 1;
        width: 100%;
        height: 100%;
        transition: 0.4s ease-in-out;
    }

    .delete-image-button {
        display: none;
        right: 0;
        position: absolute;
        z-index: 2;
        border: none;
        background-color: #000;
        outline: none;
        transition: 0.4s ease-in-out;
    }

    .delete-image-button i {
        color: #FFF;
    }

    .image-container:hover .layer {
        transition: 0.4s ease;
        background-color: rgba(0, 0, 0, 0.8);
    }

    .image-container:hover .delete-image-button {
        cursor: pointer;
        display: block;
    }

    .button-delete {
        cursor: pointer;
        outline: none;
        transition: 0.4s ease;
    }

    .button-delete:hover {
        color: red;
    }
</style>
