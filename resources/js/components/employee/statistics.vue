<template>
    <div>
        <div v-if="checkUrl()" class="news-tape-bg radius-4px mt-3 pb-2">
            <div class="pt-4">
                <div class="border-radius15 bg-white ml-2 mr-2 pl-3 pr-3 pt-4 pb-3 d-flex align-items-center">
                    <div class="d-flex">
                        <div class="ml-4 mr-4">
                            <input type="date" class="border-0 date-color bg-darkgray pl-3 pt-1 pb-1 date-width" v-model="dateBeg">
                        </div>
                        <div class="ml-4 mr-4">
                            <input type="date" class="border-0 date-color bg-darkgray pl-3 pt-1 pb-1 date-width" v-model="dateEnd">
                        </div>
                    </div>
                    <div class="ml-4 mr-4">
                        <treeselect class="w-95" v-model="ISN" :multiple="false" :options="options"></treeselect>
                    </div>
                    <div class="ml-4 mr-4">
                        <treeselect class="w-95" v-model="PRODUCT_ISN" :multiple="false" :options="products"></treeselect>
                    </div>
                    <div class="ml-4 mr-4">
                        <div class="date-color border-gray show-btn" @click="getReport">
                            <div class="d-flex pt-1 pb-1 pl-4 pr-4">
                                <div>
                                    <i class="far fa-eye"></i>
                                </div>
                                <div class="ml-2">
                                    <span>Показать</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="news-tape-bg radius-4px mt-3 pb-2">
            <div class="pt-4">
                <div class="border-radius15 bg-white ml-2 mr-2 pl-3 pr-3 pt-4 pb-3 d-flex align-items-center">
                    <div class="d-flex">
                        <div class="ml-4 mr-4">
                            <input type="date" class="border-0 date-color bg-darkgray pl-3 pt-1 pb-1 date-width" v-model="dateBeg">
                        </div>
                        <div class="ml-4 mr-4">
                            <input type="date" class="border-0 date-color bg-darkgray pl-3 pt-1 pb-1 date-width" v-model="dateEnd">
                        </div>
                    </div>
                    <div class="ml-4 mr-4">
                        <div class="date-color border-gray show-btn" @click="getReport">
                            <div class="d-flex pt-1 pb-1 pl-4 pr-4">
                                <div>
                                    <i class="far fa-eye"></i>
                                </div>
                                <div class="ml-2">
                                    <span>Показать</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="width100" v-show="show">
        <div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16">
            <div class="flex-row jc-sb pb-4 vertical-middle flex-row">
                <div class="width100 pl-0 pr-0 main-data-chart-contains">
                    <div class="flex-row pl-0 pr-0 vertical-middle main-data-border min-width-50">
                        <div>
                            <div class="width100 flex-row">
                                <div class="col-md-12 pl-0 pr-0 flex-row width100" ref="divElement" style="height : 200px;">
                                    <GChart
                                        type="PieChart"
                                        :data="chartData"
                                        :options="ChartOptions"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 pl-0 pr-0 min-width-50">
                        <div>
                            <div class="width100 flex-row">
                                <div class="col-md-12 pl-0 pr-0 flex-row width100" ref="divElement" style="height : 200px">
                                    <GChart
                                        type="BarChart"
                                        :data="secondChartData"
                                        :options="secondChartOptions"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16">
            <div class="flex-row jc-sb pb-4 vertical-middle flex-row">
                <div class="width100 col-md-12 pl-0 pr-0 main-data-chart-contains main-data-chart-contains-size">
                    <div class="flex-row pl-0 pr-0 vertical-middle main-data-border min-width-50">
                        <div class="main-data-chart-contains-size min-width-50 flex-row pl-0 pr-0 vertical-middle">
                            <div class="width100 flex-row">
                                <div class="col-md-12 pl-0 pr-0 flex-row width100" ref="divElement" style="height : 200px;">
                                    <GChart
                                        type="PieChart"
                                        :data="thirdChartData"
                                        :options="thirdChartOptions"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 pl-0 pr-0 min-width-50">
                        <div>
                            <div class="width100 flex-row">
                                <div class="col-md-12 pl-0 pr-0 flex-row width100" ref="divElement" style="height : 200px">
                                    <GChart
                                        type="BarChart"
                                        :data="fourthChartData"
                                        :options="fourthChartOptions"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        name: "statistics",
        data () {
            return {
                options: null,
                products: null,
                dateBeg: new Date(new Date().getFullYear(), new Date().getMonth(),  1, 6).toJSON().slice(0, 10),
                dateEnd: new Date(new Date().getFullYear(), new Date().getMonth() + 1, 1).toJSON().slice(0, 10),
                Amount : 0,
                Payout : 0,
                AV : 0,
                Income : 0,
                Plan: 0,
                chartData: [],
                chartOptions: {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    },
                    title: 'По продуктно',
                    legend: {
                        position: 'bottom',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 18,
                        },
                    },
                    chartArea:{left:0},
                    fontSize : 14,
                    pieSliceText: 'none',
                    // reverseCategories: 'true',
                    pieHole: 0.5,
                    width: 450,
                    height : 200,
                    // width : ,
                    colors: ['#55d8fe','#ff8373', '#ffda83', '#a3a0fb'],
                },
                secondChartData: [],
                secondChartOptions: {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    },
                    colors: ['#0079ea','#3293ee','#7cb8f1'],
                    chartArea:{left:100, right: 0},
                    width: 400,
                    axisTitlesPosition: 'out',
                    // vAxis: {
                    //     // title: 'Hello',
                    //     titleTextStyle: {
                    //         color: '#FF0000'
                    //     }
                    //         },
                    strokeWidth: 5,
                    title: 'Качественные показатели',
                    height : 200,
                    fontSize: 14,
                    legend: { position: "none" },
                },
                thirdChartData: [],
                thirdChartOptions: {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    },
                    title: '% от общего рассмотрения в ЦО ДА',
                    legend: {
                        position: 'right',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 14,
                        },
                    },
                    chartArea:{left:0},
                    fontSize : 14,
                    pieSliceText: 'none',
                    // reverseCategories: 'true',
                    pieHole: 0.5,
                    width: 450,
                    height : 200,
                    // width : ,
                    colors: ['#55d8fe','#ff8373', '#ffda83', '#a3a0fb'],
                },
                fourthChartData:[],
                fourthChartOptions: {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    },
                    colors: ['#0079ea','#3293ee','#7cb8f1'],
                    chartArea:{left:100, right: 0},
                    width: 400,
                    padding: 123,
                    axisTitlesPosition: 'out',
                    // vAxis: {
                    //     // title: 'Hello',
                    //     titleTextStyle: {
                    //         color: '#FF0000'
                    //     }
                    //         },
                    strokeWidth: 5,
                    title: 'Детализация по рассмотренным заявкам',
                    height : 200,
                    fontSize: 14,
                    legend: { position: "none" },
                },
                show: false,
                ISN: null,
                PRODUCT_ISN: null
            }
        },
        props : {
            isn : Number
        },
        mounted() {
            this.ISN = this.isn;
            this.getProducts();
            this.getReport();
            if(this.checkUrl()){
                this.getOptions();
            }


        },
        methods : {
            getReport() {
                this.preloader(true);
                this.axios.post('/getStatisticsReport', {
                    isn: this.ISN,
                    dateBeg : this.dateBeg,
                    dateEnd : this.dateEnd,
                    product: this.PRODUCT_ISN
                })
                    .then(response => {
                        this.setChartData(response.data)
                    })
                    .catch(error => {
                        alert(error)
                        this.preloader(false)
                    });
            },
            setChartData(response) {
                if(response.success){
                    this.Amount = response.info.Amount;
                    this.Payout = response.info.Payout;
                    this.AV = response.info.AV;
                    this.Income = response.info.Income;
                    this.Plan = response.info.FeesPlan;
                    this.setMainData(response.info.FeesPlan, this.Amount);
                    this.setIndicators(response.info.ProlProc, response.info.CrossProc, response.info.Treaties);
                    this.setPortfelData(response.info.PRODUCTS);
                    this.setDynamicData(response.info.DINAMIC);
                    this.show = true;
                    this.preloader(false);
                }else{
                    alert(response.error);
                }
            },
            setMainData(Plan, Amount) {
                if(parseInt(Plan) > parseInt(Amount)) {
                    this.chartData = [
                        ['Рынок', 'Доля'],
                        ['Сборы', parseInt(Amount)],
                        [' ', parseInt(Plan)-parseInt(Amount)],
                    ];
                }else{
                    this.chartData = [
                        ['Рынок', 'Доля'],
                        ['Сборы', parseInt(Amount)],
                    ];

                }
            },
            setIndicators(Prolongation, Cross, Agreements){
                this.secondChartData = [
                    ['Element', '', { role: 'style' }],
                    ['пролонгация', this.getPercent(parseInt(Prolongation.substring(0, Prolongation.length - 1)), Agreements), '#0079ea'],
                    ['кросс-продажи', this.getPercent(parseInt(Cross.substring(0, Cross.length - 1)), Agreements), '#3293ee'],
                    ['кол-во договоров', Agreements, '#7cb8f1'],
                ]
            },
            setPortfelData(PRODUCTS){
                var array = [
                    ['Рынок', 'Доля'],
                ];
                if(Array.isArray(PRODUCTS.row)) {
                    PRODUCTS.row.forEach(data => {
                        array.push([data.PRODUCT, parseInt(data.COUNT)]);
                    });
                }else{
                    array.push([PRODUCTS.row.PRODUCT, parseInt(PRODUCTS.row.COUNT)]);
                }
                this.thirdChartData = array;
            },
            setDynamicData(Dynamic){
                var array = [
                    ['Дата', 'Выплаты', 'Премии', 'План'],
                ];
                if(Array.isArray(Dynamic.row)) {
                    Dynamic.row.forEach(data => {
                        array.push([this.getDateString(data.Month, data.Year), parseInt(data.Payout), parseInt(data.Prem), parseInt(data.FeesPlan)]);
                    });
                }else{
                    array.push([this.getDateString(Dynamic.row.Month, Dynamic.row.Year), parseInt(Dynamic.row.Payout), parseInt(Dynamic.row.Prem), parseInt(Dynamic.row.FeesPlan)])
                }
                this.fourthChartData = array;
            },
            getDateString(Month, Year){
                var monthLabels = [
                    'Янв',
                    'Фев',
                    'Мар',
                    'Апр',
                    'Май',
                    'Июн',
                    'Июл',
                    'Авг',
                    'Сен',
                    'Окт',
                    'Ноя',
                    'Дек',
                ];
                return monthLabels[parseInt(Month)-1]+" "+Year;
            },
            getPercent(val, max){
                return parseInt(max*val/100);
            },
            getOptions () {
                this.preloader(true);
                this.axios.post('/getBranchData', {}).then((response) => {
                    this.options = response.data.result;
                    this.preloader(false);
                });
            },
            preloader(show){
                if(show)
                {
                    document.getElementById('preloader').style.display = 'flex';
                }
                else
                {
                    document.getElementById('preloader').style.display = 'none';
                }
            },
            checkUrl(){
                return ((window.location.pathname).slice(1,10) !== 'colleague');
            },
            numberWithSpaces(x) {
                var parts = x.toString().split(".");
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                return parts.join(".");
            },

            getProducts() {
                this.preloader(true);
                this.axios.post('/testiruem', {}).then((response) => {
                    this.products = response.data.result;
                    console.log(response);
                }).catch(error => {
                    alert(error)
                }).finally(() => {
                    this.preloader(false);
                });
            }
        },

    }
</script>

<style scoped>

</style>
