<template>
    <div class="">
        <!--<parse-top :periods="periods" :months="months" :request="request" :years="years" :getData="showNewBalanceData"></parse-top>-->

        <div class="bg-white pl-3 pr-3 mt-3 mb-3 box-shadow border-16" v-if="showTable">
            <div class="d-flex justify-content-between align-items-center pr-3 pl-3">
                <div class="w-100 table-responsive">
                    <table class="table table-hover text-align-center fs-0_8">
                        <thead>
                        <tr class="border-table-0">
                            <td class="text-left" colspan="3">
                                <div class="d-flex align-items-center pt-1 pb-1">
                                    <h5 class="m-0 p-0">Centras Insurance</h5>
                                </div>
                            </td>
                            <td></td>
                            <td class="text-left" colspan="2">
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
                            <td class="text-left" colspan="2">
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
                        <tr v-for="(centrasBalance, index) in centrasBalanceData" :class="textStyle(centrasBalance.label)">
                            <td class="text-left">{{centrasBalance.label}}</td>
                            <td>{{centrasBalance.firstPeriod.toLocaleString()}}</td>
                            <td>{{centrasBalance.secondPeriod.toLocaleString()}}</td>
                            <td class="bg-grayblue"></td>
                            <td>{{balanceCompanies[index_1][index].firstPeriod.toLocaleString()}}</td>
                            <td>{{balanceCompanies[index_1][index].secondPeriod.toLocaleString()}}</td>
                            <td class="bg-grayblue"></td>
                            <td>{{balanceCompanies[index_2][index].firstPeriod.toLocaleString()}}</td>
                            <td>{{balanceCompanies[index_2][index].secondPeriod.toLocaleString()}}</td>
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
        name: "parse-indicators",

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
                centrasBalanceData: [],
                balanceCompanies: [],
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
            getBalanceData(new_date = null) {
                if(new_date != null){
                    this.preloader(true);
                    this.index_1 = 0;
                    this.index_2 = 1;
                    this.balanceCompanies = [];
                    this.sendedCompanies = this.first_company_list;
                    this.current_index = null;
                    this.company_id = 3;
                } else {
                    this.sendedCompanies = this.company_list;
                }
                this.axios.post('/parse/balance/getData', {
                    company_list: this.first_company_list,
                    first_year: this.periods.first_year,
                    second_year: this.periods.second_year,
                    first_period: this.periods.first_period,
                    second_period: this.periods.second_period,
                }).then(response => {
                    if(response.data.success) {
                        this.setBalanceData(response.data);
                    }
                    this.preloader(false);
                }).catch(error => {
                    this.preloader(false);
                    alert(error);
                });
            },
            setBalanceData(response) {
                for(let index = 0; index < response.balanceData.length; index++) {
                    if(response.balanceData[index].companyId !== this.centras_id) {
                        this.balanceCompanies.push(response.balanceData[index].balanceResult);
                    }
                    else {
                        this.centrasBalanceData = response.balanceData[index].balanceResult;
                    }
                }
                for(var i = 0; i < this.companies.length; i++){
                    if(this.companies[i].id === this.centras_id) i++;
                    else {
                        this.balanceCompanies.push([]);
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
                const response = await axios.get('/parse/getCurrentPeriods/BALANCE');
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

            async getNextBalance() {
                this.preloader(true);
                const response = await this.axios.post('/parse/balance/getData', {
                    company_list: [this.company_id],
                    first_year: this.periods.first_year,
                    second_year: this.periods.second_year,
                    first_period: this.periods.first_period,
                    second_period: this.periods.second_period,
                });
                this.setNextBalance(response.data);
            },
            setNextBalance(response) {
                this.balanceCompanies[this.current_index] = response.balanceData[0].balanceResult;
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
                        this.getNextBalance().then(a => {
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
                        else {
                            tempIndex++;
                        }
                    }
                    this.company_id = this.companies[tempIndex].id;
                    this.header_two = this.companies[tempIndex].name;
                    if(!this.checkIsSended()) {
                        this.current_index = tempIndex;
                        this.getNextBalance().then(a => {
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
                        else {
                            tempIndex--;
                        }
                    }
                    console.log(tempIndex);
                    this.company_id = this.companies[tempIndex].id;
                    this.header_one = this.companies[tempIndex].name;
                    if(!this.checkIsSended()) {
                        this.current_index = tempIndex;
                        this.getNextBalance().then(a => {
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
                        else {
                            tempIndex--;
                        }
                    }

                    this.company_id = this.companies[tempIndex].id;
                    this.header_two = this.companies[tempIndex].name;
                    if(!this.checkIsSended()) {
                        this.current_index = tempIndex;
                        this.getNextBalance().then(a => {
                            this.sendedCompanies.push(this.company_id);
                            this.index_2 = tempIndex;
                        });
                    }
                    else {
                        this.index_2 = tempIndex;
                    }
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

            showNewBalanceData(){
                this.getBalanceData('new_date');
            },

            textStyle(label){
                var textStyle = 'bold fs-0_9 bg-grayblue';
                textStyle = label == 'Активы' || label == 'Обязательства' || label == 'Резервы' || label == 'Капитал' ? textStyle : '';
                return textStyle;
            }
        },

        mounted() {
            this.getCurrentPeriods().then(() => {
                this.getBalanceData();
            });
        },
    }
</script>

<style scoped>
</style>
