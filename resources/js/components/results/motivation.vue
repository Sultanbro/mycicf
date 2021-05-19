<template>
    <div>
        <div class="rating-search p-4 mb-3">
            <div>
                <label for="rating-input">
                    <input id="rating-input"
                           type="month"
                           class="rating-date-input"
                           v-model="motivation_date">
                </label>
            </div>
            <div>
                <treeselect v-model="employee_isn"
                            :options="treeOptions"
                            :multiple="false"></treeselect>
            </div>
            <div class="rating-search-btn" @click="getMotivationSearch">
                <span>Показать</span>
            </div>
        </div>
        <!-- Rating Table Section-->
        <div class="rating-wrapper p-4 mb-3" v-if="showMotivation">
            <div class="rating-wrapper p-4 mb-3">
                <span>Премия начисляется при выполнении личного плана продаж по договорам страхования c размером агентского вознаграждения не более 30% от брутто поступивших страховых премий за исключением договоров ОС ГПО ВТС</span>
            </div>
            <div class="rating-wrapper__inner">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="employee-info">{{label}}</h6>
                    </div>
                </div>
                <div class="text-center">
                    <span>к оплате</span>
                    <div class="employee-sum">
                        <h3 class="employee-rating">{{ motSum }}</h3>
                    </div>
                </div>
            </div>
            <div class="rating-table mt-3">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Критерии</th>
                        <th scope="col">Расчеты</th>
                        <th scope="col">Выполнение</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(motivation, index) in motivations"
                        :key="index">
                        <td
                            v-tooltip="{
                                content: tableTooltip,
                                placement: 'bottom-end',
                                classes: ['motivation-tooltip']
                            }"
                            v-if="index === 4"
                        >
                            {{motivation.types}}
                        </td>
                        <td
                            v-tooltip="{
                                content: stringTooltip,
                                placement: 'bottom-end',
                                classes: ['motivation-tooltip']
                            }"
                            v-else-if="index === 2"
                        >
                            {{motivation.types}}
                        </td>
                        <td v-else>{{motivation.types}}</td>
                        <td>{{motivation.sum}}</td>
                        <td>
                            <i class="fa fa-lg fa-circle motivation" :style="{color : motivation.color}" aria-hidden="true"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Chart Section -->
        <div v-if="showMotivation">
            <div class="rating-wrapper p-4">
                <div class="ml-3">
                    <h4 class="employee-rating">Динамика мотивации</h4>
                </div>
                <div class="chart-container">
                    <apexchart ref="realtimeChart" type="area" height="400" :options="chartOptions" :series="series"></apexchart>
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
                treeOptions: null,
                motivation_date: this.begin !== undefined ? this.begin : new Date(new Date().getFullYear(), new Date().getMonth() - 1,  1, 6).toJSON().slice(0, 7),
                imageUrl: null,
                fakeImage: false,
                employee_isn: this.isn,
                showMotivation: false,
                showChart: false,
                employee_info: {},
                chart_data: {},
                motivations: [],
                category: 0,
                motSum: null,
                label: '',
                chartOptions: {
                    xaxis: {
                        categories: [],
                    }
                },
                series: [{
                    name: 'Итог',
                    data: []
                }],

                tableTooltip: '<table align="center" border="1" cellpadding="5" cellspacing="0" bordercolor="white" width="100%">\n' +
                    '    <tr>\n' +
                    '        <th rowspan="2">Себестоимость</th>\n' +
                    '        <th colspan="2">Мотивация</th>\n' +
                    '    </tr>\n' +
                    '    <tr>\n' +
                    '        <th>План продаж <br>80 - 100 % с нарастанием</th>\n' +
                    '        <th>План продаж 101 % <br>и выше с нарастанием</th>\n' +
                    '    </tr>\n' +
                    '    <tr>\n' +
                    '        <td>0</td>\n' +
                    '        <td>7</td>\n' +
                    '        <td>9</td>\n' +
                    '    </tr>\n' +
                    '    <tr>\n' +
                    '        <td>0,01-10</td>\n' +
                    '        <td>5</td>\n' +
                    '        <td>7</td>\n' +
                    '    </tr>\n' +
                    '    <tr>\n' +
                    '        <td>10,01- 15</td>\n' +
                    '        <td>4</td>\n' +
                    '        <td>5</td>\n' +
                    '    </tr>\n' +
                    '    <tr>\n' +
                    '        <td>15,01 - 20</td>\n' +
                    '        <td>3</td>\n' +
                    '        <td>4</td>\n' +
                    '    </tr>\n' +
                    '    <tr>\n' +
                    '        <td>20,01 - 25</td>\n' +
                    '        <td>2</td>\n' +
                    '        <td>3</td>\n' +
                    '    </tr>\n' +
                    '    <tr>\n' +
                    '        <td>25,01 - 30</td>\n' +
                    '        <td>1</td>\n' +
                    '        <td>2</td>\n' +
                    '    </tr>\n' +
                    '</table>\n',

                stringTooltip: 'Средневзвешенный размер<br> комиссии и дополнительных <br>расходов от брутто поступивших <br>страховых премий, в %'
            }
        },
        mounted() {
            this.imageUrl = "/storage/images/employee/" + this.employee_info.isn + ".png";
            this.getTreeOptions();
        },
        updated() {
            this.imageUrl = "/storage/images/employee/" + this.employee_info.isn + ".png";
        },
        props: {
            isn: Number,
            begin: String,
            personIsn: Number,
            personBegin: String,
        },
        methods: {
            getTreeOptions() {
                this.preloader(true);
                this.axios.post('/getBranchData', {})
                    .then((response) => {
                        this.setTreeOptions(response.data);
                    })
                    .then(() => {
                        this.getMotivation(this.personIsn, this.personBegin);
                    })
                    .catch(error => {
                        alert(error);
                    })
            },
            setTreeOptions(data) {
                this.treeOptions = data.result;
            },
            getMotivation(isn , begin) {
                this.preloader(true)
                this.showMotivation = false;
                let data = {
                    isn: isn ? isn : this.employee_isn,
                    begin: begin ? begin : this.motivation_date,
                };
                this.axios.post('/getMotivationList', data)
                    .then(response => {
                        if(response.data.success){
                            this.motivations = response.data.list
                            this.category = response.data.cat
                            if(this.category === 1){
                                this.label = 'Менеджер по корпоративному страхованию'
                            }else if(this.category === 2){
                                this.label = ' Менеджеры по корпоративным продажам (филиалы)'
                            }else if(this.category === 3){
                                this.label = 'Менеджеры по прямым продажам'
                            }else{
                                this.label = ''
                            }
                            this.motSum = response.data.mot_sum
                            this.setChartData(response.data)
                            this.showMotivation = true
                            this.employee_isn = this.$parent.personIsn;
                            this.motivation_date = this.$parent.personBegin;
                        }
                        else{
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
            getMotivationSearch(isn , begin) {
                this.preloader(true)
                this.showMotivation = false;
                this.axios.post('/getMotivationList', {
                    isn: this.employee_isn,
                    begin: this.motivation_date,

                })
                    .then(response => {
                        if(response.data.success){
                            this.motivations = response.data.list
                            this.category = response.data.cat
                            if(this.category === 1){
                                this.label = 'Менеджер по корпоративному страхованию'
                            }else if(this.category === 2){
                                this.label = ' Менеджеры по корпоративным продажам (филиалы)'
                            }else if(this.category === 3){
                                this.label = 'Менеджеры по прямым продажам'
                            }else{
                                this.label = ''
                            }
                            this.motSum = response.data.mot_sum
                            this.setChartData(response.data)
                            this.showMotivation = true
                        }
                        else{
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
                this.chartOptions.xaxis.categories = data.chart_data.x_axis;
                this.series[0].data = data.chart_data.y_axis;
            },
            preloader(show) {
                if (show) {
                    document.getElementById('preloader').style.display = 'flex';
                } else {
                    document.getElementById('preloader').style.display = 'none';
                }
            },
        }
    }
</script>

<style scoped lang="scss">
    label {
        padding: 0;
        margin: 0;
    }
    .rating-search {
        background-color: #FFF;
        border-radius: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .rating-date-input {
        padding: 4px;
        border: 1px solid #DDD;
    }
    .rating-search-btn {
        display: flex;
        padding: 5px 15px;
        cursor: pointer;
        color: cornflowerblue;
        border: 1px solid cornflowerblue;
        transition: 0.4s ease;
    }
    .rating-search-btn:hover {
        background-color: cornflowerblue;
        box-shadow: 0 0 20px rgba(47, 100, 187, 0.3);
        color: #FFF;
    }
    .rating-wrapper {
        background-color: #FFF;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .rating-wrapper__inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }
    .employee-rating {
        color: whitesmoke;
        font-weight: bold;
        margin: 0;
    }
    .employee-sum {
        background-color: #4a76a8;
        border-radius: 10px;
        padding: 4px;
    }
    .employee-info {
        font-weight: bold;
    }
    .rating-avatar {
        border-radius: 50%;
        width: 70px;
        height: 70px;
    }
    .rating-table {
        padding-top: 1rem;
        border-top: 1px solid cornflowerblue;
    }
    .rating-table-bottom {
        display: flex;
        justify-content: space-between;
        padding: 0 0.8rem;
        font-size: 1.4rem;
        font-weight: bold;
        color: cornflowerblue;
        border-top: 1px solid cornflowerblue;
    }
    .chart-container {
        width: 100%;
        overflow: hidden;
    }
</style>
