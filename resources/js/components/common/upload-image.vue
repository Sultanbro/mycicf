<template>
    <div class="uploader"
         @dragenter="OnDragEnter"
         @dragleave="OnDragLeave"
         @dragover.prevent
         @drop="onDrop"
         :class="{ dragging: isDragging }">

        <div class="upload-control" v-show="images.length || showData()">
            <label for="file">Выбрать файл</label>
            <button @click="upload">Загрузить</button>
        </div>


        <div v-show="!images.length && !showData()">
            <div>Перетащите свои изображения сюда</div>
            <div>или</div>
            <div class="file-input">
                <label for="file">Выберите файл</label>
                <input type="file" id="file" @change="onInputChange" multiple>
                <input type="hidden" name="docId" :value="info.DocID">
            </div>
        </div>
        <div class="images-preview" v-show="info.AttachLink" v-for="attachLink in info.AttachLink">
            <div class="img-wrapper" v-for="(link, key) in attachLink">
                <img width="100" height="65" :src="'/storage/'+ link.substring(7)" :alt="`Image Uplaoder ${key}`">
            </div>
        </div>
        <div class="images-preview" v-show="images.length">
            <div class="img-wrapper" v-for="(image, index) in images" :key="index">
                <svg @click="deleteImage(index)" aria-hidden="true" focusable="false" data-prefix="fas"
                     id="removeImage"
                     data-icon="times-circle"
                     role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                     class="gray5 absolute center-v right-1 pointer hover-red5 svg-inline--fa fa-times-circle fa-w-16 fa-fw fa-lg">
                    <path fill="currentColor"
                          d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"
                          class=""></path>
                </svg>
                <img width="100" height="65" :src="image" :alt="`Image Uplaoder ${index}`">
                <div class="details">
                    <span class="name" v-text="files[index].name"></span>
                    <span class="size" v-text="getFileSize(files[index].size)"></span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            isDragging: false,
            dragCount: 0,
            files: [],
            images: [],
            maxCount: 15
        }),
        props: {
            info: Object,
        },
        methods: {
            OnDragEnter(e) {
                e.preventDefault();

                this.dragCount++;
                this.isDragging = true;
                return false;
            },
            OnDragLeave(e) {
                e.preventDefault();
                this.dragCount--;
                if (this.dragCount <= 0)
                    this.isDragging = false;
            },
            onInputChange(e) {
                const files = e.target.files;
                Array.from(files).forEach(file => this.addImage(file));
            },
            onDrop(e) {
                e.preventDefault();
                e.stopPropagation();
                this.isDragging = false;
                const files = e.dataTransfer.files;
                Array.from(files).forEach(file => this.addImage(file));
            },
            addImage(file) {
                if (!file.type.match('image.*')) {
                    this.$toastr.e(`${file.name} это не изображение`);
                    return;
                }
                this.files.push(file);
                const img = new Image(),
                    reader = new FileReader();
                reader.onload = (e) => this.images.push(e.target.result);
                reader.readAsDataURL(file);
            },
            deleteImage(index) {
                this.$delete(this.images, index)
                this.$delete(this.files, index)
            },
            getFileSize(size) {
                const fSExt = ['Bytes', 'KB', 'MB', 'GB'];
                let i = 0;

                while (size > 900) {
                    size /= 1024;
                    i++;
                }
                return `${(Math.round(size * 100) / 100)} ${fSExt[i]}`;
            },
            upload() {
                const formData = new FormData();
                let values = $("input[name='docId']").map(function () {
                    return $(this).val();
                }).get();
                if (this.files.length > this.maxCount) {
                    this.$toastr.e(`Максимальное количество ${this.maxCount} файл`);
                    return;
                }
                this.files.forEach(file => {
                    formData.append('images[]', file, file.name);
                    formData.append('docId', values)
                });
                axios.post('/upload', formData)
                    .then(response => {
                        this.$toastr.s(response.data.message);
                        document.getElementById('removeImage').style.display = 'none';
                        document.getElementById("urlStorage").setAttribute('value', response.data.result)
                        document.getElementById("saveDocument").removeAttribute('disabled')
                    })
            },
            showData() {
                return Object.values(this.info.AttachLink).length > 0
            },
        }
    }
</script>

<style lang="scss" scoped>
    .uploader {
        width: 100%;
        background: #95bbdf;
        color: #fff;
        padding: 40px 15px;
        text-align: center;
        border-radius: 10px;
        border: 3px dashed #fff;
        font-size: 20px;
        position: relative;

        &.dragging {
            background: #fff;
            color: #2196F3;
            border: 3px dashed #2196F3;

            .file-input label {
                background: #2196F3;
                color: #fff;
            }
        }

        i {
            font-size: 85px;
        }

        .file-input {
            width: 200px;
            margin: auto;
            height: 68px;
            position: relative;

            label,
            input {
                background: #fff;
                color: #2196F3;
                width: 100%;
                position: absolute;
                left: 0;
                top: 0;
                padding: 10px;
                border-radius: 4px;
                margin-top: 7px;
                cursor: pointer;
            }

            input {
                opacity: 0;
                z-index: -2;
            }
        }

        .images-preview {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;

            .img-wrapper {
                position: relative;
                width: 100px;
                display: flex;
                flex-direction: column;
                margin: 10px 15px 10px 10px;
                height: 100px;
                justify-content: space-between;
                background: #fff;
                box-shadow: 5px 5px 20px #3e3737;

                img {
                    max-height: 105px;
                }

                svg {
                    position: absolute;
                    right: 0;
                    width: 21px;
                    margin-top: 0px;
                    margin-right: -22px;
                    color: white;
                }

                svg:hover {
                    color: #ff4700;
                }
            }

            .details {
                font-size: 12px;
                background: #fff;
                color: #000;
                display: flex;
                flex-direction: column;
                align-items: self-start;
                padding: 3px 6px;

                .name {
                    overflow: hidden;
                    height: 18px;
                }
            }
        }

        .upload-control {
            position: absolute;
            width: 100%;
            background: #fff;
            top: 0;
            left: 0;
            border-top-left-radius: 7px;
            border-top-right-radius: 7px;
            padding: 10px;
            padding-bottom: 4px;
            text-align: right;

            button, label {
                background: #2196F3;
                border: 2px solid #03A9F4;
                border-radius: 3px;
                color: #fff;
                font-size: 15px;
                cursor: pointer;
            }

            label {
                padding: 2px 5px;
                margin-right: 10px;
            }
        }
    }
</style>
