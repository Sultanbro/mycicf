<template>
    <div class="width100">
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
<!--                                <div class="col-md-6">-->
<!--                                    <GChart-->
<!--                                            type="PieChart"-->
<!--                                            :data="secondChartData"-->
<!--                                            :options="secondChartOptions"-->
<!--                                    />-->
<!--                                </div>-->
                            </div>
                        </div>
                        <div class="flex-column chart-mainData-attributes-contain width100">
                            <strong class="chart-mainData-attributes"><span>Выплаты: </span><span>6 508 560</span></strong>
                            <strong class="chart-mainData-attributes"><span>АВ: </span><span>3 308 510</span></strong>
                            <strong class="chart-mainData-attributes"><span>Доход: </span><span>2 890 260</span></strong>
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
<!--                    <div class="col-md-6">-->
<!--                        <div>-->
<!--                            <div class="width-100">-->
<!--                                <div style="height: 500px;">-->
<!--                                    <GChart-->
<!--                                            type="ColumnChart"-->
<!--                                            :data="thirdChartData"-->
<!--                                            :options="thirdChartOptions"-->
<!--                                    />-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
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
</template>

<script>
    export default {
        name: "main-data-charts",
        data () {
            return {
                // Array will be automatically processed with visualization.arrayToDataTable function
                chartData: [
                    ['Рынок', 'Доля'],
                    ['План', 2000000],
                    ['Сборы', 1650000],
                ],
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
                    colors: ['#65aef2','#0079ea','#ffda83','#a3a0fb'],
                },
                secondChartData: [
                    // ['Year', 'Sales'],
                    // ['прологация', 1000],
                    // ['кросс-продажи', 1170],
                    // ['договоры', 660],
                    ['Element', '', { role: 'style' }],
                    ['прологация', 8.94, '#0079ea'],            // RGB value
                    ['кросс-продажи', 10.49, '#3293ee'],            // English color name
                    ['договоры', 19.30, '#7cb8f1'],
                    // ['Platinum', 21.45, 'color: #e5e4e2' ], // CSS-style declaration
                ],
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
                thirdChartData: [
                    ['Рынок', 'Доля'],
                    ['Имущество', 2000000],
                    ['ДМС', 1650000],
                    ['КАСКО', 1650000],
                    ['ОГПО ВТС', 1650000],
                ],
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
                fourthChartData:[
                    ['Year', 'План', 'Продажи'],
                    ['',  -1000, 0],
                    ['',  900, 660],
                    ['', 2000, -3000]
                ],
                fourthChartOptions: {
                    colors: ['#a3a1fb','#54d8ff'],
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
            }
        },
        // created() {
        //     console.log(this.$refs.divElement.clientWidth);
        // }
    }
</script>

<style scoped>

</style>