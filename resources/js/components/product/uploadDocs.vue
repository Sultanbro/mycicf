<template>
    <div class="col-12 row mt-2 mb-2 ml-0 ">
        <h4 v-if="docs.express">Прикрепление файлов НШБ</h4>
        <h4 v-else>Прикрепление файлов</h4>
        <label for="file-driving-input" class="form-row mb-1 col-12">
            <div class="col-12" v-html="files_count"></div>

            <div v-if="quotationId == 0 || quotationId != 0" class="btn btn-primary mt-3">
                Выбрать файл
            </div>
            <input v-if="quotationId == 0 || quotationId != 0"
                   type="file"
                   v-show="false"
                   multiple
                   @change="uploadImages($event);calcChanged()"
                   id="file-driving-input">
        </label>
    </div>
</template>

<script>
    export default {
        name: "upload-docs",
        data() {
            return {
                files_count: '',
                uploaded: '',
            }
        },
        props: {
            docs : Object,
            quotationId: String,
            calcChanged: Function
        },
        methods: {
            uploadImages(event, type, docType) {
                this.docs.files = [];
                let fileName = '';
                let files = event.target.files;
                for (let i in files) {
                    console.log(i +'='+files[i]['name']);
                    if(files[i] == "undefined" || i == 'length' || i == 'item'){
                        continue
                    }
                    fileName = fileName+'<br>'+(parseInt(i)+parseInt(1))+') '+files[i]['name'];
                    this.files_count = 'Прикреплено файлов: ' + (parseInt(i)+parseInt(1)) +' '+fileName;
                    this.docs.files.push(files[i]);
                }
            }
        },
        watch: {
            'docs.files': function () {
                //if(this.quotationId != 0) {
                //     let fileName = '';
                //     for (let i in this.docs.files) {
                //         fileName = fileName + '<br>' + (parseInt(i) + parseInt(1)) + ') ' + this.docs.files[i].originalName;
                //         this.files_count = 'Прикреплено файлов: ' + (parseInt(i) + parseInt(1)) + ' ' + fileName;
                //     }
                //}
            }
        }
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>
