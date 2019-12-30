<template>
    <div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="company">Наименование СК</label>
            <select class="form-control" v-model="company" id="company">
                <option v-for="item in companyList" :value="item.id">{{item.label}}</option>
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
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="fullname">Рейтинг</label>
            <textarea class="form-control" v-model="fullname" id="fullname"></textarea>
        </div>
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
                year : 2010,
                month : 1,
                fullname : '',
                company : 1,
                monthLabels : [],
                yearLabels : [],
                companyList : [],
            }
        },
        mounted() {
            this.getMonthLabels();
            this.getYearLabels();
            this.getCompanyList();
        },
        methods: {
            getMonthLabels() {
                this.axios.post('/getMonthLabels', {})
                    .then(response => {
                        if (response.data.success) {
                            this.monthLabels = response.data.result
                        } else {
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            getYearLabels() {
                for (let i = 2010; i <= new Date().getFullYear(); i++) {
                    this.yearLabels.push({
                        id: i,
                        label: i,
                    })
                }
            },
            getCompanyList() {
                this.axios.post('/getCompanyList', {})
                    .then(response => {
                        if (response.data.success) {
                            this.companyList = response.data.result;
                        } else {
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            send() {
                this.axios.post('/parse/add/info', {
                    company : this.company,
                    year : this.year,
                    month : this.month,
                    fullname : this.fullname,
                })
                    .then(response => {
                        if (response.data.success) {
                            alert('Данные успешно получены, подождите пока идёт обработка полученных данных');
                            location.href = '/';
                        } else {
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
        }
    }
</script>

<style scoped>

</style>