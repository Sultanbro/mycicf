<template>
    <div class="ml-0  mb-2">

        <h5>Прикрепление файлов</h5>
        <label for="file-driving-input" class="form-row mb-1 col-12">
            <div class="col-12" v-html="files_count"></div>

            <div v-if="quotationId == 0" class="btn btnprimary mt-3">
                Выбрать файл
            </div>
            <input v-if="quotationId == 0" type="file"
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
                for (let i in event.target.files) {
                    if(event.target.files[i] === "undefined" || i === 'length' || i === 'item'){
                        continue
                    }
                    fileName = fileName+'<br>'+(parseInt(i)+parseInt(1))+') '+event.target.files[i]['name'];
                    this.files_count = 'Прикреплено файлов: ' + (parseInt(i)+parseInt(1)) +' '+fileName;
                    this.docs.files.push(event.target.files[i]);
                }
            }
        },
        watch: {
            'docs.files': function () {
                if(this.quotationId != 0) {
                    let fileName = '';
                    for (let i in this.docs.files) {
                        fileName = fileName + '<br>' + (parseInt(i) + parseInt(1)) + ') ' + this.docs.files[i].originalName;
                        this.files_count = 'Прикреплено файлов: ' + (parseInt(i) + parseInt(1)) + ' ' + fileName;
                    }
                }
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
