<template>
    <div class="CI-company">
        <div class="results-container mt-3 mb-3">
            <div @click="viewType = 'parse-centras'" class="results-item" :class="viewType === 'parse-centras' ? 'results-item_active' : ''">
                <div class="d-flex align-items-center">
                    <i class="far fa-star results-icon"></i>
                    <span>Компания</span>
                </div>
            </div>
            <div @click="viewType = 'report'" class="results-item" :class="viewType === 'report' ? 'results-item_active' : ''">
                <div class="d-flex align-items-center">
                    <i class="fas fa-users results-icon"></i>
                    <span>Группа</span>
                </div>
            </div>
            <div @click="viewType = 'top-company'" class="results-item" :class="viewType === 'top-company' ? 'results-item_active' : ''">
                <div class="d-flex align-items-center">
                    <i class="fas fa-chart-pie results-icon"></i>
                    <span>Рынок</span>
                </div>
            </div>
    </div>

        <div class="bg-white pl-3 pr-3 box-shadow border-16">
            <div class="flex-row jc-sb pt-3 pr-3 pb-4 pl-3 vertical-middle flex-row">

                <div class="flex-row jc-sb" v-if="viewType === 'top-company' || viewType === 'parse-opu' || viewType === 'parse_opu2' || viewType === 'parse-indicators'
                || viewType === 'parse_indicators2'">
                    <div @click="showData()" class="custom-primary-button-inverse button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                        <i class="fa fa-chart-pie"></i>
                        <div class="mt-1 fs-0_8">
                            Сборы
                        </div>
                    </div>
                        <div
                            @click="Opu()" class="custom-primary-button-inverse button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                            <i class="fa fa-user-friends"></i>
                            <div class="mt-1 fs-0_8">
                                Конкуренты
                            </div>
                        </div>
                    <div class="d-flex">
                        <a @click="Opu()">
                            <div class="custom-primary-button-inverse button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer" v-show="viewType !== 'top-company'">ОПУ</div>
                        </a>
                        <a @click="Balance()">
                            <div class="custom-primary-button-inverse button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer" v-show="viewType !== 'top-company'">БАЛАНС</div>
                        </a>

                        <a @click="Opu2()">
                            <div class="custom-primary-button-inverse button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer" v-show="viewType !== 'top-company'">Показатели</div>
                        </a>

                        <a @click="Balance2()">
                            <div class="custom-primary-button-inverse button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer" v-show="viewType !== 'top-company'">Активы</div>
                        </a>
                    </div>
                </div>

                <div>
                    <div class="flex-row">
                        <div class="mr-10 parse-top-company-select">
                            <div>
                                <select class="border-0-bottom p-1 pointer" id="dateType" v-model="type">
                                    <option v-for="dateType in dateTypes"
                                            :value="dateType.value">
                                        {{dateType.name}}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="flex-row jc-sb" id="monthBlock">
                            <div class="mr-4 ml-4">
                                <select id="fYear" class="border-0 date-color bg-darkgray pl-2 pr-2 pt-1 pb-1" v-model="periods.first_year">
                                    <option selected disabled hidden :value="null">Не выбрано</option>
                                    <option v-for="year in years" :value="year">{{year}}</option>
                                </select>
                                <select id="firstMonth" class="border-0 date-color bg-darkgray pl-2 pr-2 pt-1 pb-1" v-model="periods.first_period">
                                    <option selected disabled hidden :value="null">Не выбрано</option>
                                    <option v-for="(month, index) in months" :value="index + 1">{{month}}</option>
                                </select>
                            </div>

                            <div class="mr-4 ml-4">
                                <div>
                                    <select id="sYear" class="border-0 date-color bg-darkgray pl-2 pr-2 pt-1 pb-1" v-model="periods.second_year">
                                        <option selected disabled hidden :value="null">Не выбрано</option>
                                        <option v-for="year in years" :value="year">{{year}}</option>
                                    </select>
                                    <select id="secondMonth" class="border-0 date-color bg-darkgray pl-2 pr-2 pt-1 pb-1" v-model="periods.second_period">
                                        <option selected disabled hidden :value="null">Не выбрано</option>
                                        <option v-for="(month, index) in months" :value="index + 1">{{month}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex-row vertical-middle parse-top-company-margins jc-sb">
                        <div class="mr-4 ml-4" v-show="viewType === 'top-company'">
                            <label class="vertical-middle pointer mb-0">
                                <div class="termination-checkbox">
                                    <input type="checkbox" id="termination">
                                </div>
                                <div>
                                    <span class="ml-1">Расторжение</span>
                                </div>
                            </label>
                        </div>
                        <div class="mr-4 ml-4" v-show="viewType === 'top-company'">
                            <div class="vertical-middle">
                                <div class="vertical-middle color-red pl-4 pr-4">
                        <span class="valuePadding pl-2 pr-2">
                                    <input type="number" max="100" min="0" value="0" id="inputRRPDiscount" v-model="discount">
                                    %
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="mr-4 ml-4">
                            <div class="flex-row date-color">
                                <div @click="executeRequest()" class="flex-row custom-primary-button-inverse pl-4 width-min-content pr-4 pt-1 pb-1 color-white button-accept pointer">
                                    <div>
                                        <i class="fa fa-filter"></i>
                                    </div>
                                    <div class="pl-2">
                                        Показать
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <top-company v-show="viewType === 'top-company'"
                         :dateType="dateType"
                         :companyData="companyData"
                         :parseData="parseData"
                         :periods="periods"
                         v-if="companyData"></top-company>

            <parse-opu v-show="viewType === 'parse-opu'" :periods="periods" ref="opuRef"/>
            <parse_opu2 v-show="viewType === 'parse_opu2'" :periods="periods" ref="opuRef2"/>

            <parse-indicators v-show="viewType === 'parse-indicators'" :periods="periods" ref="balanceRef"/>
            <parse-indicators v-show="viewType === 'parse_indicators2'" :periods="periods" ref="balanceRef2"/>

            <parse-centras  v-show="viewType === 'parse-centras'" :dateType="dateType" :companyData="companyData" :periods="periods"  v-if="companyData"></parse-centras>
        </div>

    </div>
</template>

<script>
    export default {
        name: "my-parse",
        mounted() {
            let url = new URL(location.href);
            let search = url.searchParams;
            let params = [...search.entries()];
            this.dateType = search.get('dateType');
            let firstPeriod = search.get('firstPeriod');
        },
        data() {
            return {
                viewType: 'top-company',
                viewType: 'parse-centras',
                type: "rise",
                discount: 0,
                dateTypes: [
                    {
                        name: "C нарастанием",
                        value: "rise",
                    },
                    {
                        name: "Месяц",
                        value: "month",
                    },
                    {
                        name: "Квартал",
                        value: "quarter",
                    },
                    {
                        name: "Год",
                        value: "year"
                    }
                ],

                periods: {
                    first_year: null,
                    second_year: null,
                    first_period: null,
                    second_period: null,
                },
                months: [
                    '',
                    'Январь',
                    'Февраль',
                    'Март',
                    'Апрель',
                    'Май',
                    'Июнь',
                    'Июль',
                    'Август',
                    'Сентябрь',
                    'Октябрь',
                    'Ноябрь',
                    'Декабрь',
                ],
                years: (() => {
                    let current = new Date().getFullYear();

                    let result = [];

                    for (let year = 2014; year <= current; year++) {
                        result.push(year);
                    }

                    return result;
                })(),

                parseData: null,
                companyData: null
            }
        },
        methods: {

            async getClassTopSum() {
                let response = await this.axios.get('/parse/my-parse/product', {
                    params: {
                        company_list: this.first_company_list,
                        first_year: this.periods.first_year,
                        second_year: this.periods.second_year,
                        first_period: this.periods.first_period,
                        second_period: this.periods.second_period,
                    }
                });

                if(response.data.success) {
                    this.parseData = response.data.data;
                }
            },

            async getCompanyTopSum() {
                let response = await this.axios.get('/parse/my-parse/icompany', {
                    params: {
                        company_list: this.first_company_list,
                        first_year: this.periods.first_year,
                        second_year: this.periods.second_year,
                        first_period: this.periods.first_period -1,
                        second_period: this.periods.second_period -1,
                        productId: this.productId,
                        classId: this.classId,
                        dateType: this.type,
                        disc: this.discount,

                    }
                });
                if (response.data.success) {
                    this.$nextTick(()=>{
                        this.companyData = response.data.data;
                    });
                }
            },

            showData() {
                this.viewType='top-company';
                this.getCompanyTopSum();
            },
            Opu(){
                this.viewType='parse-opu';
                this.$refs.opuRef.getOpuData();
            },
            Opu2(){
                this.viewType='parse_opu2';
                this.$refs.opuRef2.getOpuData();
            },
            Balance(){
                this.viewType='parse-indicators';
                this.$refs.balanceRef.getBalanceData('new_date');
            },
            Balance2(){
                this.viewType='parse_indicators2';
                this.$refs.balanceRef2.getBalanceData('new_date');
            },

            executeRequest(){
                if(this.viewType =='top-company'){
                    this.getCompanyTopSum();
                    this.getClassTopSum();
                }
                else if(this.viewType =='parse-opu' ){
                    this.Opu();
                }
                else if(this.viewType =='parse-indicators'){
                    this.Balance();
                }
            }
        },
    }
</script>

<style scoped>
    .results-container {
        background-color: #FFF;
        border-radius: 15px;
        display: flex;
        justify-content: center;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .results-item {
        cursor: pointer;
        color: #333;
        padding: 1rem 1.4rem;
        transition: 0.4s ease all;
        border: 1px solid transparent;
        display: flex;
        width: 100%;
        justify-content: center;
    }
    .results-item:first-child {
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
    }
    .results-item:last-child {
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }
    .results-item:hover {
        border: 1px solid cornflowerblue;
        color: cornflowerblue;
    }
    .results-item:hover .fa-star {
        transition: 0.4s ease;
        color: #FFCA3D;
        text-shadow: 0 0 8px rgba(255, 205, 40, 0.5);
    }
    .results-item:hover .fa-grin-stars {
        transition: 0.4s ease;
        color: #99d900;
        text-shadow: 0 0 8px rgba(128, 235, 0, 0.5);
    }
    .results-item:hover .fa-chart-pie {
        transition: 0.4s ease;
        color: #ff9322;
        text-shadow: 0 0 8px rgba(255, 145, 62, 0.5);
    }
    .results-item_active {
        color: #FFF;
        pointer-events: none;
        background-color: cornflowerblue;
        box-shadow: 0 0 20px rgba(47, 100, 187, 0.3);
    }
    .results-icon {
        font-size: 1.3rem;
        margin-right: 0.5rem;
    }
    .d-flex {
        align-items: center;
    }
</style>
