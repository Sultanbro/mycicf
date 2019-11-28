<template>
    <div class="box-shadow radius-4px mt-3 pb-2">
        <div class="pt-4">
            <div class="bg-white ml-3 mr-3 pt-4 pb-3">
                <div class="d-flex align-items-center">
                    <div class="mr-2">
                        <input v-model="dateBeg" type="month" class="border-0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                    </div>
                    <div>
                        <treeselect class="w-95" v-model="ISN" :multiple="false" :options="options" />
                    </div>
                    <div>
                        <div class="date-color border-gray show-btn" @click="getMotivation">
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
        <div class="pt-4">
            <div class="d-flex align-items-center justify-content-between bg-white ml-3 mr-3 pt-3 pb-3">
                <div>
                    <span class="fs-1 CAPS">{{category_end_first}}</span>
                </div>
                <div>
                    <div class="d-flex align-items-center">
                        <span class="fs-1_5 bold">
                            <i class="fas fa-hand-holding-usd"></i>
                        </span>
                        <span class="fs-2 ml-3 color-blue bold">{{this.motSum}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="mr-3 ml-3 mt-2">
            <div class="table-responsive-sm">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th scope="col">Критерии</th>
                            <th scope="col">Расчеты</th>
                            <th scope="col">Выполнение</th>
                        </tr>
                        <tr v-for="(motivation, index) in motivations">
                            <td>{{motivation.types}}</td>
                            <td>{{motivation.sum}}</td>
                            <td>
                                <i class="fa fa-lg fa-circle motivation" :style="{color : motivation.color}" aria-hidden="true"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="#" class="flex-row vertical-middle mr-4 ml-4 mt-2">
            <i class="far fa-file-word color-blue fs-1_3"></i>
            <span class="ml-2 color-black fs-1_1">положение по мотивации</span>
        </a>
        <div class="col-md-12 pl-0 pr-0 min-width-50 mt-3 width100">
            <div class="bg-white ml-3 mr-3 pl-3 pr-3 pt-4 pb-3">
                <div class="width100 flex-row">
                    <div class="col-md-12 pl-0 pr-0 flex-row width100 main-data-first-chart-contain" ref="divElement" style="height : 200px">
                        <GChart
                                class="data-chart-pie jc-center"
                                type="LineChart"
                                :data="chartData"
                                :options="chartOptions"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "motivation",
        data() {
            return {
                ISN: '',
                options: null,
                motivations: [],
                motSum: null,
                category_end_first: 'Менеджер по корпоративному страхованию',
                dateBeg: new Date(new Date().getFullYear(), new Date().getMonth(),  1, 6).toJSON().slice(0, 7),
                chartData:[],
                chartOptions: {
                    colors: ['#a3a1fb','#54d8ff'],
                    title: 'Мотивация',
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
        props : {
            isn : Number
        },
        mounted () {
            this.ISN = this.isn;
            // this.getMotivation()
            this.getOptions();
        },
        methods : {
            getMotivation() {
                this.preloader(true)
                this.axios.post('/getMotivationList', {
                        isn: this.ISN,
                        begin : this.dateBeg,
                        end: this.dateEnd,
                    })
                    .then(response => {
                        if(response.data.success){
                            this.motivations = response.data.list
                            this.category = response.data.cat
                            this.motSum = response.data.mot_sum
                            this.setChartData(response.data.motivations)
                        }else{
                            alert(response.data.error)
                        }
                    })
                    .catch(error => {
                        alert(error)
                    })
                    .finally(() => {
                        this.preloader(false)
                    });
            },
            setChartData(data) {
                var array = [
                    ['Месяц', 'Мотивация']
                ];
                data.forEach(row => {
                    array.push([row['Date'], parseInt(row['Sum'])])
                });
                this.chartData = array;
            },
            getOptions() {
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
            }
        }
    }
</script>

<style scoped>


</style>
