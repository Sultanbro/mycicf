<template>
    <div class="">
        <!--<parse-top :periods="periods" :months="months" :years="years" :request="request" :getData="showNewData"></parse-top>-->

        <div class="bg-white pl-3 pr-3 mt-3 mb-3 box-shadow border-16" v-if="showTable">
            <div class="d-flex justify-content-between align-items-center pr-3 pl-3">
                <div class="w-100 table-responsive">
                    <table class="table table-hover text-align-center fs-0_8">
                        <thead>
                            <tr class="border-table-0">
                                <td class="text-left" colspan="4">
                                    <div class="d-flex align-items-center pt-1 pb-1">
                                        <h5 class="m-0 p-0">Centras Insurance</h5>
                                    </div>
                                </td>
                                <td></td>
                                <td class="text-left" colspan="3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <button class="d-flex align-items-center pt-1 pb-1 pl-2 pr-2 custom-primary-button" @click="showPrev('table_one')">
                                                <i class="fas fa-angle-left m-0 fs-1_1"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex align-items-center pt-1 pb-1">
                                            <h5 class="m-0">{{header_one}}</h5>
                                        </div>
                                        <div>
                                            <button class="d-flex align-items-center p-1 pb-1 pl-2 pr-2 custom-primary-button" @click="showNext('table_one')">
                                                <i class="fas fa-angle-right m-0 fs-1_1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                                <td class="text-left" colspan="3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <button class="d-flex align-items-center pt-1 pb-1 pl-2 pr-2 custom-primary-button" @click="showPrev('table_two')">
                                                <i class="fas fa-angle-left m-0 fs-1_1"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex align-items-center pt-1 pb-1">
                                            <h5 class="m-0">{{header_two}}</h5>
                                        </div>
                                        <div>
                                            <button class="d-flex align-items-center p-1 pb-1 pl-2 pr-2 custom-primary-button" @click="showNext('table_two')">
                                                <i class="fas fa-angle-right m-0 fs-1_1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="bg-grayblue color-light-gray">
                                <td v-for="(tableHeader, index) in tableHeaders" :class="index === 0 ? 'text-left' : ''" @click="">{{tableHeader}}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(centrasOpu, index) in centrasOpuData" :class="textStyle(index)">
                                <td class="text-left">{{centrasOpu.label}}</td>
                                <td>{{centrasOpu.firstPeriod.toLocaleString()}}<span>{{ showPercent(index) }}</span></td>
                                <td>{{centrasOpu.secondPeriod.toLocaleString()}}<span>{{ showPercent(index) }}</span></td>
                                <td><span v-if="showPercent(index) == ''">{{centrasOpu.changes}}</span></td>
                                <td class="bg-grayblue"></td>
                                <td>{{opuCompanies[index_1][index].firstPeriod.toLocaleString()}}<span>{{ showPercent(index) }}</span></td>
                                <td>{{opuCompanies[index_1][index].secondPeriod.toLocaleString()}}<span>{{ showPercent(index) }}</span></td>
                                <td><span v-if="showPercent(index) == ''">{{opuCompanies[index_1][index].changes}}</span></td>
                                <td class="bg-grayblue"></td>
                                <td>{{opuCompanies[index_2][index].firstPeriod.toLocaleString()}}<span>{{ showPercent(index) }}</span></td>
                                <td>{{opuCompanies[index_2][index].secondPeriod.toLocaleString()}}<span>{{ showPercent(index) }}</span></td>
                                <td><span v-if="showPercent(index) == ''">{{opuCompanies[index_2][index].changes}}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "parse-opu",

        data() {
            return {
                company_list: [8],
                first_company_list: [8],
                periods: {
                    first_year: 2019,
                    second_year: 2018,
                    first_period: 1,
                    second_period: 12,
                },
                months: [],
                years: [],

                companies: [],
                sendedCompanies: [],
                company_id: 3,
                header_one: '',
                header_two: '',

                centras_id: 8,
                centrasOpuData: [],
                opuCompanies: [],
                tableHeaders: [],

                index_1: 0,
                index_2: 1,
                current_index: null,
                showTable: false,
            }
        },
        props: {
            request: Object
        },
        methods: {
            getOpuData(new_date = null) {
                if(new_date != null){
                    this.preloader(true);
                    this.index_1 = 0;
                    this.index_2 = 1;
                    this.opuCompanies = [];
                    this.sendedCompanies = this.first_company_list;
                    this.current_index = null;
                    this.company_id = 3;
                } else {
                    this.sendedCompanies = this.company_list;
                }
                this.axios.post('/parse/opu/getData', {
                    company_list: this.first_company_list,
                    first_year: this.periods.first_year,
                    second_year: this.periods.second_year,
                    first_period: this.periods.first_period,
                    second_period: this.periods.second_period,
                }).then(response => {
                    if(response.data.success) {
                        this.setOpuData(response.data);
                    } else {
                        alert(response.data.error);
                    }
                    this.preloader(false);
                }).catch(error => {
                    this.preloader(false);
                    alert(error);
                });
            },
            setOpuData(response) {
                for(let index = 0; index < response.opuData.length; index++) {
                    if(response.opuData[index].companyId !== this.centras_id) {
                        this.opuCompanies.push(response.opuData[index].opuResult);
                    }
                    else {
                        this.centrasOpuData = response.opuData[index].opuResult;
                    }
                }
                for(var i = 0; i < this.companies.length; i++) {
                    if(this.companies[i].id === this.centras_id) i++;
                    else {
                        this.opuCompanies.push([]);
                    }
                }

                this.tableHeaders = response.tableHeaders;
                this.header_one = this.companies[0].name;
                this.header_two = this.companies[1].name;
                this.showTable = true;
                this.preloader(false);
            },

            async getCurrentPeriods() {
                this.preloader(true);
                const response = await axios.get('/parse/getCurrentPeriods/OPU');
                this.setCurrentPeriods(response.data);
                // await this.axios.get('/parse/getCurrentPeriods/OPU').then(response => {
                //     if(response.data.success) {
                //         this.setCurrentPeriods(response.data);
                //     }
                // }).catch(error => {
                //     alert(error);
                // });
            },
            setCurrentPeriods(response) {
                for(let company in response.companies) {
                    if(parseInt(company) != this.centras_id) {
                        this.companies.push({
                            id: parseInt(company),
                            name: response.companies[company],
                        });

                        if(Object.keys(this.company_list).length < 3) {
                            this.company_list.push(parseInt(company));
                            this.first_company_list.push(parseInt(company));
                        }
                    }
                }

                for(let month in response.months) {
                    this.months.push({
                        id: parseInt(month),
                        name: response.months[month],
                    })
                }

                for(let year = 2014; year <= new Date().getFullYear(); year++) {
                    this.years.push(year);
                }

                if (this.request) {
                    this.periods.first_year = this.request.firstYear ? this.request.firstYear : response.periods.first_year;
                    this.periods.first_period = this.request.firstPeriod ? this.request.firstPeriod : response.periods.first_period;
                    this.periods.second_year = this.request.secondYear ? this.request.secondYear : response.periods.second_year;
                    this.periods.second_period = this.request.secondPeriod ? this.request.secondPeriod : response.periods.second_period;
                }
            },

            async getNextOpu() {
                this.preloader(true);
                const response = await this.axios.post('/parse/opu/getData', {
                    company_list: [this.company_id],
                    first_year: this.periods.first_year,
                    second_year: this.periods.second_year,
                    first_period: this.periods.first_period,
                    second_period: this.periods.second_period,
                });
                this.setNextOpu(response.data);
            },
            setNextOpu(response) {
                this.opuCompanies[this.current_index] = response.opuData[0].opuResult;
                //this.company_list = [];
                //this.index_1 = this.opuCompanies.length - 1;
                this.preloader(false);
            },

            showNext(type) {
                if(type === 'table_one') {
                    var tempIndex = this.index_1;
                    if(this.index_1 === this.companies.length - 1) {
                        tempIndex = 0;
                    }
                    else {
                        if(this.index_1 === this.index_2 - 1) {
                            tempIndex += 2;
                            if(this.index_1 === this.companies.length) {
                                tempIndex = 0;
                            }
                        }
                        else tempIndex++;
                    }
                    this.company_id = this.companies[tempIndex].id;
                    this.header_one = this.companies[tempIndex].name;
                    if(!this.checkIsSended()) {
                        this.current_index = tempIndex;
                        this.getNextOpu().then(a => {
                            this.sendedCompanies.push(this.company_id);
                            this.index_1 = tempIndex;
                        });
                    }
                    else {
                        this.index_1 = tempIndex;
                    }
                }
                else {
                    var tempIndex = this.index_2;
                    if(this.index_2 === this.companies.length - 1) {
                        tempIndex = 0;
                    }
                    else {
                        if(this.index_2 === this.index_1 - 1) {
                            tempIndex += 2;
                            if(this.index_2 === this.companies.length) {
                                tempIndex = 0;
                            }
                        }
                        else tempIndex++;
                    }
                    this.company_id = this.companies[tempIndex].id;
                    this.header_two = this.companies[tempIndex].name;
                    if(!this.checkIsSended()) {
                        this.current_index = tempIndex;
                        this.getNextOpu().then(a => {
                            this.sendedCompanies.push(this.company_id);
                            this.index_2 = tempIndex;
                        });
                    }
                    else {
                        this.index_2 = tempIndex;
                    }
                }
            },
            showPrev(type) {
                if(type === 'table_one') {
                    var tempIndex = this.index_1;
                    if(this.index_1 === 0){
                        tempIndex = this.companies.length - 1;
                    }
                    else {
                        if(this.index_1 === this.index_2 + 1) {
                            tempIndex -=2;
                            if(this.index_1 === 1) {
                                tempIndex = this.companies.length - 1;
                            }
                        }
                        else
                            tempIndex--;
                    }
                    console.log(tempIndex);
                    this.company_id = this.companies[tempIndex].id;
                    this.header_one = this.companies[tempIndex].name;
                    if(!this.checkIsSended()) {
                        this.current_index = tempIndex;
                        this.getNextOpu().then(a => {
                            this.sendedCompanies.push(this.company_id);
                            this.index_1 = tempIndex;
                        });
                    }
                    else
                        this.index_1 = tempIndex;
                }
                else {
                    var tempIndex = this.index_2;
                    if(this.index_2 === 0) {
                        tempIndex = this.companies.length - 1;
                    }
                    else {
                        if(this.index_2 === this.index_1 + 1) {
                            tempIndex -=2;
                            if(this.index_2 === 1) {
                                tempIndex = this.companies.length - 1;
                            }
                        }
                        else
                            tempIndex--;
                    }

                    this.company_id = this.companies[tempIndex].id;
                    this.header_two = this.companies[tempIndex].name;
                    if(!this.checkIsSended()) {
                        this.current_index = tempIndex;
                        this.getNextOpu().then(a => {
                            this.sendedCompanies.push(this.company_id);
                            this.index_2 = tempIndex;
                        });
                    }
                    else
                        this.index_2 = tempIndex;
                }
            },

            checkIsSended() {
                return this.sendedCompanies.includes(this.company_id);
            },

            preloader(show) {
                if(show)
                {
                    document.getElementById("preloader").style.display = "none";
                }
                else
                {
                    document.getElementById("preloader").style.display = "none";
                }
            },
            showNewData(){
                this.getOpuData('new_date');
            },

            showPercent(index){
                var percent = '';
                switch(index){
                    case 2:
                        percent = '%';
                        break;
                    case 5:
                        percent = '%';
                        break;
                    case 7:
                        percent = '%';
                        break;
                    case 11:
                        percent = '%';
                        break;
                }
                return percent;
            },

            textStyle(index){
                var textStyle = 'bold fs-0_9 bg-grayblue';
                textStyle = index == 0 || index == 3 || index == 8 || index == 12 || index == 14 || index == 18 || index == 20 ? textStyle : '';
                return textStyle;
            }
        },

        mounted() {
            this.getCurrentPeriods().then(() => {
                this.getOpuData();
            });
        },
    }
</script>

<style scoped>
</style>
