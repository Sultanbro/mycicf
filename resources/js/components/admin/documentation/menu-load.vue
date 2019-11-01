<template>
    <div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="linkText">Текст</label>
            <input class="form-control" type="text" v-model="linkText" id="linkText">
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="file">Родительский элемент</label>
            <div class="bg-darkgray flex-row date-color pr-1 pt-1 pb-1 date-width">
                <treeselect v-model="parentId" :multiple="false" :options="options" />
            </div>
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="file">Загрузите иконку</label>
            <div class="custom-file">
                <input id="file" type="file" @change="fileUploaded" class="custom-file-input">
                <label class="custom-file-label" for="file">{{filename}}</label>
            </div>
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="url">URL</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://my.cic.kz/documentation/</span>
                </div>
                <input type="text" class="form-control" id="url" v-model="url">
            </div>
        </div>
        <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <button type="button" @click="send" class="btn-info btn-lg btn">Отправить</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "svg-load",
        data() {
            return {
                filename : 'Выберите файл',
                files: null,
                url: '',
                linkText: '',
                options: [],
                parentId : null
            }
        },
        mounted() {
            this.getOptions();
        },
        methods: {
            fileUploaded(e) {
                var file = e.target.files;
                this.filename = file[0].name;
                this.files = file[0];
            },
            send() {
                this.axios.post('/wnd/save_menu', this.getFormData())
                    .then(response => {
                        if(response.data.success){
                            this.url = response.data.url
                        }
                    })
                    .catch(error => {
                        alert(error)
                    });
            },
            getFormData() {
                let formData = new FormData();
                formData.append('file', this.files);
                formData.append('url', this.url);
                formData.append('label', this.linkText);
                formData.append('parent_id', this.parentId);
                return formData;
            },
            getOptions(){
                this.axios.post('/wnd/list_menu', {})
                    .then(response => {
                        if(response.data.success){
                            this.options = response.data.list
                        }else{
                            alert(response.data.error)
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            }
        },
    }


</script>