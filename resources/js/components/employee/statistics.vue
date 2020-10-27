<template>
    <div>
        <div v-if="checkUrl()" class="news-tape-bg radius-4px mt-3 pb-2">
            <div class="pt-4">
                <div class="border-radius15 bg-white ml-2 mr-2 pl-3 pr-3 pt-4 pb-3 d-flex align-items-center">
                    <div class="d-flex col">
                        <div class="ml-4 mr-4">
                            <input type="date" class="border-0 date-color bg-darkgray pl-3 pt-1 pb-1 date-width" v-model="dateBeg">
                            <input type="date" class="border-0 mt-1 date-color bg-darkgray pl-3 pt-1 pb-1 date-width" v-model="dateEnd">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ml-9 mr-9">
                            <treeselect class="w-95" v-model="ISN" :multiple="false" :options="options"></treeselect>
                        </div>
                        <div class="ml-6 mr-6 mt-1">
                            <treeselect class="w-95" v-model="PRODUCT_ISN" :multiple="false" :options="products"></treeselect>
                        </div>
                    </div>
                    <div class="ml-4 mr-4 col-2">
                        <div class="date-color border-gray show-btn btn-statistics"
                             @click="getReport">
                            <div class="d-flex pt-2 pb-2 pl-3 pr-3 justify-content-center">
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
                        <div class="date-color border-gray show-btn btn-statistics" @click="getReport">
                            <div class="d-flex pt-1 pb-1 pl-4 pr-4 justify-content-center">
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
                                    <div class="col-md-12 pl-0 pr-0 flex-row width100" ref="divElement" style="height : 270px;">
                                        <GChart
                                            class="data-chart-pie"
                                            type="PieChart"
                                            :data="chartData"
                                            :options="chartOptions"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-row pl-0 pr-0 vertical-middle main-data-border-left min-width-50">
                            <div>
                                <div class="width100 flex-row">
                                    <div class="col-md-12 pl-0 pr-0 flex-row width100" ref="divElement" style="height : 270px">
                                        <GChart
                                            class="data-chart-pie"
                                            type="PieChart"
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
                        <div class="main-data-chart-contains-size min-width-50 main-data-border flex-row pl-0 pr-0 vertical-middle">
                            <div class="width100 flex-row">
                                <div class="col-md-12 pl-0 pr-0 flex-row width100" ref="divElement" style="height : 270px;">
                                    <GChart
                                        type="BarChart"
                                        :data="thirdChartData"
                                        :options="thirdChartOptions"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pl-0 pr-0 min-width-50 main-data-border-left">
                            <div class="width100 flex-row">
                                <div class="col-12 pl-0 pr-0 flex-row width100 main-data-first-chart-contain" ref="divElement" style="height : 270px">
                                    <GChart
                                        class="width100"
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
                chartData: [],
                chartOptions: {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    },
                    title: '% рассмотрения заявок в разрезе подразделения:',
                    legend: {
                        position: 'rigth',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 13,
                        },
                    },
                    chartArea:{left:15},
                    fontSize : 14,
                    pieSliceText: 'none',
                    // reverseCategories: 'true',
                    pieHole: 0.5,
                    width: 550,
                    height : 280,
                    // colors: ['#55d8fe', '#ff8373', '#ffda83', '#a3a0fb', '#68ed4a', '#db65ca'],
                    // width : ,
                },
                secondChartData: [],
                secondChartOptions: {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    },
                    title: '% рассмотрения заявок в разрезе продуктов страхования:',
                    legend: {
                        position: 'rigth',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 15,
                        },
                    },
                    chartArea:{left:15, right: 0},
                    fontSize : 14,
                    pieSliceText: 'none',
                    // reverseCategories: 'true',
                    pieHole: 0.5,
                    // pieStartAngle: 100,
                    width: 550,
                    height : 280,
                    // colors: ['#55d8fe', '#ff8373', '#ffda83', '#a3a0fb'],
                    // width : ,
                },
                thirdChartData: [],
                thirdChartOptions: {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    },
                    title: 'Качественные показатели по гензаявкам:',
                    legend: {
                        position: 'rigth',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 15,
                        },
                    },
                    chartArea:{left:15},
                    fontSize : 14,
                    pieSliceText: 'none',
                    // reverseCategories: 'true',
                    pieHole: 0.5,
                    width: 550,
                    height : 280,
                    colors: ['#55d8fe', '#ff8373', '#ffda83', '#a3a0fb', '#68ed4a'],
                },
                fourthChartData:[],
                fourthChartOptions: {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    },
                    title: 'Качественные показатели по котировкам:',
                    legend: {
                        position: 'rigth',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 15,
                        },
                    },
                    chartArea:{left:15},
                    fontSize : 14,
                    pieSliceText: 'none',
                    // reverseCategories: 'true',
                    pieHole: 0.5,
                    width: 550,
                    height : 280,
                },
                show: false,
                ISN: null,
                PRODUCT_ISN: 13
            }
        },
        props : {
            isn : Number
        },
        mounted() {
            this.ISN = this.isn;
            this.getProducts();
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
                    this.chartData = response.pieQuantity;
                    this.secondChartData = response.pieType;
                    this.thirdChartData = response.genData;
                    this.fourthChartData = response.calc;
                    this.show = true;
                }else{
                    alert(response.error);
                    this.show = false;
                }
                this.preloader(false);
            },
            setQuantityData(data){
                this.chartData = data
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
                this.axios.post('/getBranchProdData', {}).then((response) => {
                    this.options = response.data.result;
                    this.ISN = response.data.value
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
                this.axios.post('/getProducts', {}).then((response) => {
                    this.products = response.data.result;
                    console.log(response);
                }).catch(error => {
                    alert(error)
                }).finally(() => {
                    this.preloader(false);
                });
            },
        },
    }
</script>

<style scoped>
    .btn-statistics{
        max-width: 200px;
        width: 100%;
        margin: 0 auto;
    }
</style>
