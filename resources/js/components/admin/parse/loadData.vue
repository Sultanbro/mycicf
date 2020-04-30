<template>
    <div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="company">Компания</label>
            <select id="company" class="form-control" v-model="company">
                <option v-for="(item, index) in companies" :value="index">{{item}}</option>
            </select>
        </div>
        <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <button type="button" @click="getDataTable" class="btn-primary btn-lg btn">Показать</button>
        </div>
        <table class="table table-responsive-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th v-for="month in monthLabels">{{month.label}}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(year, index) in table">
                    <th>{{index}}</th>
                    <th v-for="month in year">
                        <span :style="{color: month.payout === 0 ? 'red' : 'green'}">В</span>
                        <span :style="{color: month.premium === 0 ? 'red' : 'green'}">П</span>
                        <span :style="{color: month.standart === 0 ? 'red' : 'green'}">М</span>
                        <span :style="{color: month.finance === 0 ? 'red' : 'green'}">Ф</span>
                        <span :style="{color: month.opu === 0 ? 'red' : 'green'}">О</span>
                        <span :style="{color: month.balance === 0 ? 'red' : 'green'}">Б</span>
                    </th>
                </tr>
            </tbody>
        </table>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="docType">Тип отчета</label>
            <select id="docType" class="form-control" v-model="docType">
                <option v-for="(item, index) in docTypeList" :value="index">{{item}}</option>
            </select>
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
        <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <button type="button" @click="deleteData" class="btn-danger btn-lg btn">Удалить</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "load-data",
        data() {
            return {
                table: [],
                companies: [],
                monthLabels: [],
                company: 8,
                month: 1,
                year : 2014,
                docType: 1,
                docTypeList: [],
                yearLabels: [],
            }
        },
        mounted () {
            this.getCompanies();
            this.getDataTable();
            this.getMonthLabels();
            this.getDocTypes();
            this.getYearLabels();
        },
        methods: {
            getCompanies() {
                this.axios.post('/parse/get/companies', {})
                    .then(response => {
                        if(response.data.success){
                            this.companies = response.data.result;
                        } else {
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            getDataTable() {
                this.axios.post('/parse/get/data', {company: this.company})
                    .then(response => {
                        if(response.data.success){
                            this.table = response.data.data;
                        } else {
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
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
            getYearLabels(){
                for(let i=2010; i<=new Date().getFullYear(); i++){
                    this.yearLabels.push({
                        id: i,
                        label : i,
                    })
                }
            },
            deleteData(){
                if(confirm('Вы действительно хотите удалить данные за период')){
                    this.axios.post('/parse/delete/data', {
                        month : this.month,
                        year : this.year,
                        type : this.docType
                    })
                        .then(response => {
                            if(response.data.success){
                                location.href='/parse/load/data'
                            }else{
                                alert(response.data.error);
                            }
                        })
                        .catch(error => {
                            alert(error)
                        });
                }
            }
        }
    }
</script>

<style scoped>

</style>