<template>
    <div class="width100">
        <div class="col-md-12 flex-row">
            <div class="col-md-6" style="height : 500px">
                <GChart
                        type="PieChart"
                        :data="chartData"
                        :options="chartOptions"
                />
            </div>
            <div class="col-md-6">

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
                    pieHole: 0.5,
                    height : 500,
                }
            }
        }
    }
</script>

<style scoped>

</style>