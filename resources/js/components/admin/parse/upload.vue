<template>
    <div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="docType">Тип отчета</label>
            <select id="docType" class="form-control" v-model="docType">
                <option v-for="(item, index) in docTypeList" :value="index">{{item}}</option>
            </select>
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="file">Файл</label>
            <div class="custom-file">
                <input id="file" type="file" @change="fileUploaded" class="custom-file-input">
                <label class="custom-file-label" for="file">{{filename}}</label>
            </div>
        </div>
        <div class="flex flex-column form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <div>
                <label for="month">Дата</label>
            </div>
            <div class="flex flex-row">
                <select class="form-control col-6" v-model="month" id="month">
                    <option v-for="item in monthLabels" :value="item.id">{{item.label}}</option>
                </select>
                <select class="form-control col-6" v-model="year" id="year">
                    <option v-for="item in yearLabels" :value="item.id">{{item.label}}</option>
                </select>
            </div>
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12" v-if="!newTypes.includes(docType)">
            <label for="row">Строка продуктов/фин.показателей</label>
            <input class="form-control" type="number" v-model="row" id="row">
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12" v-if="newTypes.includes(docType)">
            <label for="company">Наименование СК</label>
            <select class="form-control" v-model="company" id="company">
                <option v-for="item in companyList" :value="item.id">{{item.label}}</option>
            </select>        </div>
        <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <button type="button" @click="send" class="btn-info btn-lg btn">Отправить</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "upload",
        data() {
            return {
                filename : 'Выберите файл',
                docType : 0,
                docTypeList: [],
                files: null,
                month : null,
                year : null,
                row: null,
                company: null,
                monthLabels: [],
                yearLabels: [],
                newTypes: [5, 6],
                companyList: [],
            }
        },
        mounted() {
            this.getDocTypes()
            this.getMonthLabels();
            this.getYearLabels();
            this.getCompanyList();
        },
        methods: {
            getDocTypes() {
                this.axios.post('/parse/getDocTypes', {})
                    .then(response => {
                        if(response.data.success){
                            this.docTypeList = response.data.result
                        }else{
                            alert(response.data.error)
                        }
                    })
                    .catch(error => {
                        alert(error)
                    });
            },
            fileUploaded(e) {
                var file = e.target.files;
                this.filename = file[0].name;
                this.files = file[0];
            },
            getMonthLabels(){
                this.axios.post('/getMonthLabels', {})
                    .then(response => {
                        if(response.data.success){
                            this.monthLabels = response.data.result
                        } else {
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            getYearLabels(){
                for(let i=2010; i<=new Date().getFullYear(); i++){
                    this.yearLabels.push({
                        id: i,
                        label : i,
                    })
                }
            },
            getCompanyList(){
                this.axios.post('/getCompanyList', {})
                    .then(response => {
                        if(response.data.success){
                            this.companyList = response.data.result;
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            send(){
                this.axios.post('/parse/upload', this.getFormData())
                    .then(response => {
                        if(response.data.success){
                            alert('Данные успешно получены, подождите пока идёт обработка полученных данных');
                            //location.href='/';
                            location.reload();
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            getFormData() {
                let formData = new FormData();
                formData.append('type', this.docType);
                formData.append('month', this.month);
                formData.append('year', this.year);
                formData.append('row', this.row);
                formData.append('company', this.company);
                formData.append('file', this.files);
                return formData;
            }
        }
    }
</script>

<style scoped>

</style>