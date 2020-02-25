<template>
    <div>
        <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="postText">Пост</label>
            <textarea class="form-control" v-model="postText" id="postText"></textarea>
        </div>
        <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12 d-flex flex-row">
            <div class="icons-bg mr-2 pt-1 pb-1 pr-2 pl-2 col-3">
                <i class="fas fa-image color-black file-icons"></i>
                <label for="photo-upload" class="custom-file-upload">Фото</label>
                <input type="file" id="photo-upload" @change="imageUpload" accept="image/*" multiple>
            </div>
            <div class="icons-bg pt-1 pr-2 pl-2 pb-1 col-3 offset-1">
                <i class="fas fa-file-upload color-black file-icons"></i>
                <label for="file-upload" class="custom-file-upload">Файл</label>
                <input type="file" id="file-upload" @change="fileUpload" multiple>
            </div>
            <div class="icons-bg pt-1 pr-2 pl-2 pb-1 col-3 offset-1">
                <i class="fas fa-play-circle color-black file-icons"></i>
                <label for="video-upload" class="custom-file-upload">Видео</label>
                <input type="file" id="video-upload" @change="videoUpload" accept="video/*">
            </div>
        </div>
        <div class="row offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12">
            <div class="d-flex flex-column ml-3 mr-3 w-100">
                <div v-for="(document, index) in files"
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
                <div v-for="(document, index) in videos"
                     class="d-flex justify-content-between bg-white pl-3 pr-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-play text-info fs-1_2"></i>
                        <div class="p-2">{{document.name}}</div>
                    </div>
                    <button class="border-0 bg-transparent button-delete" @click="deleteVideo(index)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="d-flex flex-column ml-3 mr-3 w-100">
                <div v-for="(document, index) in images"
                     class="d-flex justify-content-between bg-white pl-3 pr-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-file-image text-info fs-1_2"></i>
                        <div class="p-2">{{document.name}}</div>
                    </div>
                    <button class="border-0 bg-transparent button-delete" @click="deleteFile(index)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="postText">Опрос</label>
            <br>
            <input type="checkbox" class="flipswitch" v-model="poll"/>
        </div>
        <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12" v-if="poll">
            <label for="postText">Вопрос</label>
            <input class="form-control" type="text" v-model="question" id="question">
        </div>

        <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12" v-if="poll">
            <label for="postText">Ответы : </label>
        </div>
        <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12" v-for="(answer,index) in answers" v-if="poll">
            <div class="input-group mb-3">
                <input type="text" class="form-control" v-model="answers[index]" :placeholder="`Ответ ${index+1}`" :aria-label="`Ответ ${index+1}`" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" @click="remove(index)" v-if="answers.length > 2" type="button">-</button>
                </div>
            </div>
        </div>
        <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12" v-if="poll">
            <input type="button" value="+" class="btn btn-outline-success col-2 offset-5" @click="add">
        </div>
        <div class="flex justify-content-center form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12">
            <button type="button" @click="send" class="btn-info btn-lg btn">Отправить</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "post-new",
        data() {
            return {
                poll: false,
                postText : "",
                question : "",
                answers : ["", ""],
                images: [],
                files: [],
                imgMaxSize: 5 * 1024 * 1024,
                docMaxSize: 10 * 1024 * 1024,
                imgMaxNumber: 10,
                docMaxNumber: 5,
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
                videos: [],
                videoMaxNumber: 1,
            }
        },
        props: {
            isSenate : {
                type : Boolean,
                default : false,
            },
            isReadingClub : {
                type : Boolean,
                default : false,
            }
        },
        methods : {
            add(){
                this.answers.push("");
            },
            remove(index){
                this.answers.splice(index, 1);
            },
            send(){
                var url = "";
                if(this.isSenate){
                    url = '/senate/new/post';
                }else if(this.isReadingClub){
                    url = '/rclub/new/post';
                }
                this.axios.post(url, this.getFormData())
                    .then(response => {
                        if(response.data.success){
                            location.href = '/';
                        }else{
                            alert(response.data.errorText);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            getFormData(){
                var form = new FormData();
                form.append('postText', this.postText);
                form.append('poll', this.poll ? 1 : 0);
                this.files.forEach(file => {
                    form.append('postFiles[]', file, file.name);
                });
                this.images.forEach(file => {
                    form.append('postImages[]', file, file.name);
                });
                this.videos.forEach(file => {
                    form.append("postVideos[]", file, file.name);
                });
                if(this.poll){
                    form.append('question', this.question);
                    this.answers.forEach(answer => {
                        form.append('answers[]', answer)
                    });
                }
                return form;
            },
            videoUpload(e) {
                const videos = e.target.files;
                const vm = this;

                if(videos.length <= this.docMaxNumber) {
                    Array.from(videos).forEach(video => {
                        if(video.type.includes("video")) {
                            vm.videos.push(video);
                        }
                        else {
                            alert("Вы загрузили неверный тип документа");
                        }
                    })
                }
                else {
                    alert(`Максимальное кол-во файлов: ${this.videoMaxNumber}`)
                }
            },
            deleteVideo(index){
                this.videos.splice(index,1);
            },
            imageUpload(e){
                const documents = e.target.files;
                const vm = this;

                if(documents.length <= this.imgMaxNumber) {
                    Array.from(documents).forEach(document => {
                        if(document.size > this.imgMaxSize) {
                            alert("Документ превысил ограничение по размеру : " + document.name);
                        }
                        else if(!this.checkExtension(document.type, this.imgExtensions)) {
                            alert("Вы загрузили неверный тип документа.\n" +
                                "Доступные типы документов: svg, jpg, png");
                        }
                        else {
                            vm.images.push(document);
                        }
                    })
                }
                else {
                    alert("Максимальное кол-во файлов: 5")
                }
            },
            fileUpload(e){
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
                            vm.files.push(document);
                        }
                    })
                }
                else {
                    alert("Максимальное кол-во файлов: 5")
                }
            },
            checkExtension(type, array) {
                if(array.includes(type)) return true
                else return false;
            },
            deleteFile(index) {
                const vm = this;
                vm.documents.splice(index, 1);
            },
        }
    }
</script>

<style scoped>
    .flipswitch {
        position: relative;
        background: white;
        width: 120px;
        height: 40px;
        -webkit-appearance: initial;
        border-radius: 3px;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        outline: none;
        font-size: 14px;
        font-family: Trebuchet, Arial, sans-serif;
        font-weight: bold;
        cursor: pointer;
        border: 1px solid #ddd;
    }

    .flipswitch:after {
        position: absolute;
        top: 5%;
        display: block;
        line-height: 32px;
        width: 45%;
        height: 90%;
        background: #fff;
        box-sizing: border-box;
        text-align: center;
        transition: all 0.3s ease-in 0s;
        color: black;
        border: #888 1px solid;
        border-radius: 3px;
    }

    .flipswitch:after {
        left: 2%;
        content: "OFF";
    }

    .flipswitch:checked:after {
        left: 53%;
        content: "ON";
    }

    /* Put your css in here */
    .input-bar {
        display: table;
        width: 100%;
    }

    .input-bar-item {
        display: table-cell;
    }

    .input-bar-item > button {
        margin-left: 5px;
    }

    .width100 {
        width: 100%;
    }

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