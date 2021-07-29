<template>
    <div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="file">Загрузите файл</label>
            <div class="custom-file">
                <input id="file" type="file" @change="fileUploaded" class="custom-file-input">
                <label class="custom-file-label" for="file">{{filename}}</label>
            </div>
        </div>
        <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <button type="button" @click="send" class="btn-info btn-lg btn">Отправить</button>
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12" v-if="url !== ''">
            <span>https://my.cic.kz{{url}}</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "pdf-load",
        data() {
            return {
                filename : 'Выберите файл',
                files: null,
                url: ''
            }
        },
        methods: {
            fileUploaded(e) {
                var file = e.target.files;
                this.filename = file[0].name;
                this.files = file[0];
            },
            send() {
                this.axios.post('/productsinfo/save_pdf', this.getFormData())
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
                return formData;
            }
        },
    }


</script>
