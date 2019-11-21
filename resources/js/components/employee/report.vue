<template>
    <div>
        <div class="news-tape-bg radius-4px mt-3 pb-2">
            <div class="pt-4">
                <div class="border-radius15 bg-white ml-2 mr-2 pl-3 pr-3 pt-4 pb-3 flex-row jc-sb">
                    <div class="flex-row">
                        <div>
                            <input type="date" class="border0 ml-3 mr-3 date-color bg-darkgray pl-3 pt-1 pb-1 date-width" v-model="dateBeg">
                        </div>
                        <div>
                            <input type="date" class="border0 date-color bg-darkgray pl-3 pt-1 pb-1 date-width" v-model="dateEnd">
                        </div>
                        <!--<div>
                            <div class="bg-darkgray flex-row date-color pr-1 pt-1 pb-1 date-width">
                                <treeselect v-model="isn" :multiple="false" :options="options" />
                            </div>
                        </div>-->
                    </div>
                    <div>
                        <input type="number" v-model="vIsn"/>
                    </div>
                    <div>
                        <div class="flex-row border-gray pt-2 pb-2 pl-4  pr-4 width-min-content pointer" @click="getReport()">
                            <div><i class="far fa-eye"></i></div>
                            <div class="ml-2">Показать</div>
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
                                                class="data-chart-pie"
                                                type="PieChart"
                                                :data="chartData"
                                                :options="chartOptions"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="flex-column chart-mainData-attributes-contain width100">
                                <strong class="chart-mainData-attributes"><span>Сборы: </span><span>{{Amount}}</span></strong>
                                <strong class="chart-mainData-attributes"><span>Выплаты: </span><span>{{Payout}}</span></strong>
                                <strong class="chart-mainData-attributes"><span>АВ: </span><span>{{AV}}</span></strong>
                                <strong class="chart-mainData-attributes"><span>Доход: </span><span>{{Income}}</span></strong>
                            </div>
                        </div>
                        <div class="col-md-6 pl-0 pr-0 min-width-50">
                            <div>
                                <div class="width100 flex-row">
                                    <div class="col-md-12 pl-0 pr-0 flex-row width100" ref="divElement" style="height : 200px">
                                        <GChart
                                                class="data-chart-bar"
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
                        <div class="main-data-chart-contains-size min-width-50 flex-row pl-0 pr-0 vertical-middle">
                            <div>
                                <div class="width100 flex-row">
                                    <div class="col-md-12 pl-0 pr-0 flex-row width100" ref="divElement" style="height : 200px;">
                                        <GChart
                                                class="data-chart-pie"
                                                type="PieChart"
                                                :data="thirdChartData"
                                                :options="thirdChartOptions"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pl-0 pr-0 min-width-50 main-data-border-left">
                            <div>
                                <div class="width100 flex-row">
                                    <div class="col-md-12 pl-0 pr-0 flex-row width100 main-data-first-chart-contain" ref="divElement" style="height : 200px">
                                        <GChart
                                                class="data-chart-pie"
                                                type="LineChart"
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
        name: "report",
        data () {
            return {
                dateBeg: new Date(new Date().getFullYear(), new Date().getMonth(),  1, 6).toJSON().slice(0, 10),
                dateEnd: new Date(new Date().getFullYear(), new Date().getMonth() + 1, 1).toJSON().slice(0, 10),
                Amount : 0,
                Payout : 0,
                AV : 0,
                Income : 0,
                chartData: [],
                chartOptions: {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    },
                    title: 'Основные данные',
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
                    pieHole: 0.8,
                    width: 290,
                    height : 200,
                    // width : ,
                    colors: ['#65aef2','transparent','#ffda83','#a3a0fb'],
                },
                secondChartData: [],
                secondChartOptions: {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    },
                    colors: ['#0079ea','#3293ee','#7cb8f1'],
                    chartArea:{left:100, right: 0},
                    width: 330,
                    axisTitlesPosition: 'in',
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
                    title: 'Портфель',
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
                    colors: ['#a3a1fb','#54d8ff', 'red'],
                    title: 'Динамика',
                    fontSize: 12,
                    curveType: 'function',
                    legend: {
                        position: 'bottom',
                        textStyle: {
                            fontSize: 14,
                        },
                    }
                },
                show: false,
                vIsn: null
            }
        },
        props : {
            isn : Number
        },
        mounted() {
            this.vIsn = this.isn;
            // this.getReport()
        },
        methods : {
            getReport() {
                this.preloader(true);
                this.axios.post('/getReport', {
                    isn: this.vIsn,
                    dateBeg : this.dateBeg,
                    dateEnd : this.dateEnd
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
                    this.Income =response.info.Income;
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
                    ['прологация', this.getPercent(parseInt(Prolongation.substring(0, Prolongation.length - 1)), Agreements), '#0079ea'],
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
            preloader(show){
                if(show)
                {
                    document.getElementById('preloader').style.display = 'flex';
                }
                else
                {
                    document.getElementById('preloader').style.display = 'none';
                }
            }
        }

    }
</script>

<style scoped>

</style>