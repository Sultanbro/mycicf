<template>
    <div>
        <div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16">
            <div class="flex-row jc-sb pr-3 pb-4 pl-3 vertical-middle flex-row">
                <div class="width100">
                    <div class="col-md-12">
                        <div>
                            <div class="width100 flex-row">
                                <div class="col-md-6" style="height : 500px">
                                    <GChart
                                            type="PieChart"
                                            :data="chartData"
                                            :options="chartOptions"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <GChart
                                            type="PieChart"
                                            :data="secondChartData"
                                            :options="secondChartOptions"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div>
                        <div class="width-100">
                            <div style="height: 500px;">
                                <GChart
                                        type="ColumnChart"
                                        :data="thirdChartData"
                                        :options="thirdChartOptions"
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
        name: "parse-charts",
        data () {
            return {
                // Array will be automatically processed with visualization.arrayToDataTable function
                chartData: [
                    ['Рынок', 'Доля'],
                    ['Евразия', 1000],
                    ['Халык', 1170],
                    ['НОМАД', 660],
                    ['Сентрас Иншуранс', 1030],
                ],
                chartOptions: {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    },
                    title: 'Доля рынка за Авг 2019',
                    pieHole: 0.5,
                    height : 500,
                    colors: ['#55d8fe','#ff8373','#ffda83','#a3a0fb'],
                },
                secondChartData: [
                    ['Рынок', 'Доля'],
                    ['Евразия', 1000],
                    ['Халык', 1170],
                    ['НОМАД', 660],
                    ['Сентрас Иншуранс', 1030],
                ],
                secondChartOptions: {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    },
                    colors: ['#55d8fe','#ff8373','#ffda83','#a3a0fb'],
                    title: 'Доля рынка за Авг 2018',
                    pieHole: 0.5,
                    height : 500,
                },
                thirdChartData: [
                    ["any", "Сборы Авг 2019", "Выплаты Авг 2019", "Сборы Авг 2018", "Выплаты Авг 2018"],
                    ["Евразия", 300, 1200, 500, 400],
                    ["Халык", 1170, 460, 250, 200],
                    ["Сентрас Иншуранс", 660, 1120, 300, 200],
                    ["Казахмыс", 1030, 540, 350, 200],
                    ["Коммеск", 1030, 540, 350, 200],
                    ["НОМАД", 1030, 540, 350, 200],
                    ["Amanat", 1030, 540, 350, 200],
                    ["Лондон-Алматы", 1030, 540, 350, 200],
                ],
                thirdChartOptions: {
                    chart: {
                        title: "Company Performance",
                        subtitle: "Sales, Expenses, and Profit: 2014-2017"
                    },
                    colors: ['#ed4c4c','#4267b2','#f97389','#5595f4'],
                    height : 500,
                }
            }
        }
    }
</script>

<style scoped>

</style>