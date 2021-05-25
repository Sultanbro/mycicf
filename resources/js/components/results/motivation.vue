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
                <span v-if="category === 1">Премия начисляется при выполнении личного плана продаж по договорам страхования c размером агентского вознаграждения не более 30% от брутто поступивших страховых премий за исключением договоров ОС ГПО ВТС</span>
                <span v-else-if="category === 1.1">
                    Премия начисляется при выполнении работником личного плана продаж по оплаченным договорам за исключением договоров ОС ГПО ВТС физических лиц в размере не менее 100%.
                </span>
                <span v-else-if="category === 2">
                1.Фиксированная премия начисляется в зависимости от объема продаж за исключением продаж по договорам ОС ГПО ВТС физических лиц.
                <br>2.При расчете премии учитываются условия, предусмотренные п.14 р.4 Положения.<br>3.Ежемесячный базовый план продаж составляет 1 000 000 тг.<br>4. В случае превышения коэффициента себестоимости более 45% (сорока пяти процентов), рассчитанная премия выплачивается в размере 50% (пятьдесят процентов).<br>5. В случае удержания коэффициента себестоимости не более 25% (двадцати пяти процентов), рассчитанная премия выплачивается в размере 150% (сто пятьдесят процентов).
                </span>
                <span v-else-if="category === 3">
                    1.Работникам прямых продаж, выплачивается ежемесячная премия, размер которой определяется в зависимости от результатов продаж по ОС ГПО ВТС и по иным классам страхования с учетом условий п.14 р.4 Положения.<br>
    2. За заключение договоров по ОС ГПО ВТС физических лиц работникам прямых продаж выплачивается ежемесячная премия по каждому заключенному договору в размере 3% от суммы поступившей страховой премии.
                </span>
                <span v-else-if="category === 4">
                    Премия начисляется при условиях:<br>
    a) выполнения базового плана продаж страховой группы не менее чем на 80%<br>
    b) при положительной разнице между установленной себестоимостью и фактической себестоимостью страховой группы за отчетный месяц<br>
    Премия по остальным видам страхования выплачивается по договорам с размером агентского вознаграждения не более 30%<br>
                </span>
                <span v-else-if= "category === 5">
                    Заместителю директора филиала премия выплачивается за выполнение личного и базового плана продаж по корпоративному страхованию от страховых брутто премий (за исключением договоров ОС ГПО ВТС физических лиц), с учетом показателя себестоимости.<br>
    При этом размер базового плана продаж должен быть не менее суммы планов продаж менеджеров, курируемых Заместителем директора филиала.<br>
                    В ином случае за размер базового плана принимается сумма планов продаж курируемых менеджеров.
                </span>
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
                            v-if="index === 4 && category === 1"
                        >
                            {{motivation.types}}
                        </td>
                        <td
                            v-tooltip="{
                                content: stringTooltip,
                                placement: 'bottom-end',
                                classes: ['motivation-tooltip']
                            }"
                            v-else-if="index === 2 && category === 1"
                        >
                            {{motivation.types}}
                        </td>
                        <td
                            v-tooltip="{
                                content: tableTooltip11,
                                placement: 'bottom-end',
                                classes: ['motivation-tooltip']
                            }"
                            v-else-if="index === 3 && category === 1.1"
                        >
                            {{motivation.types}}
                        </td>
                        <td
                            v-tooltip="{
                                content: tableTooltip2,
                                placement: 'bottom-end',
                                classes: ['motivation-tooltip']
                            }"
                            v-else-if="index === 4 && category === 2"
                        >
                            {{motivation.types}}
                        </td>
                        <td
                            v-tooltip="{
                                content: tableTooltip3,
                                placement: 'bottom-end',
                                classes: ['motivation-tooltip']
                            }"
                            v-else-if="index === 4 && category === 3"
                        >
                            {{motivation.types}}
                        </td>
                        <td
                            v-tooltip="{
                                content: tableTooltip4,
                                placement: 'bottom-end',
                                classes: ['motivation-tooltip']
                            }"
                            v-else-if="index === 1 && category === 4"
                        >
                            {{motivation.types}}
                        </td>
                        <td
                            v-tooltip="{
                                content: tableTooltip5,
                                placement: 'bottom-end',
                                classes: ['motivation-tooltip']
                            }"
                            v-else-if="index === 5 && category === 5"
                        >
                            {{motivation.types}}
                        </td>
                        <td
                            v-tooltip="{
                                content: stringTooltip5,
                                placement: 'bottom-end',
                                classes: ['motivation-tooltip']
                            }"
                            v-else-if="index === 6 && category === 5"
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
                tableTooltip11 : '<table align="center" border="1" cellpadding="5" cellspacing="0" bordercolor="white"">\n' +
                    '        <tr>\n' +
                    '            <th>Показатель себестоимости</th>\n' +
                    '            <th>Размер премии, в %</th>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>0%</td>\n' +
                    '            <td>9</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 0,01% до 20%</td>\n' +
                    '            <td>7</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 20,01% до 40%</td>\n' +
                    '            <td>5</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 40,01% </td>\n' +
                    '            <td>3</td>\n' +
                    '        </tr>\n' +
                    '    </table>',
                tableTooltip2:'<table align="center" border="1" cellpadding="5" cellspacing="0" bordercolor="white"">\n' +
                    '        <tr>\n' +
                    '            <th>Сумма страховых премий, в тенге</th>\n' +
                    '            <th>Ежемесячная премия (нетто),в тенге,коэффициент в %</th>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 1 000 001 до 1 500 000</td>\n' +
                    '            <td>55 000</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 1 500 001 до 2 000 000</td>\n' +
                    '            <td>100 000</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 2 000 001 до 2 500 000</td>\n' +
                    '            <td>130 000</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 2 500 001 до 3 000 000</td>\n' +
                    '            <td>145 000</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 3 000 001 до 3 500 000</td>\n' +
                    '            <td>160 000</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 3 500 001 до 4 000 000</td>\n' +
                    '            <td>180 000</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 4 000 001 до 4 500 000</td>\n' +
                    '            <td>200 000</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 4 500 001 до 5 000 000</td>\n' +
                    '            <td>220 000</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 5 000 001 до 6 000 000</td>\n' +
                    '            <td>240 000</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 6 000 001 до 7 000 000</td>\n' +
                    '            <td>280 000</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 7 000 001 до 8 000 000</td>\n' +
                    '            <td>320 000</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 8 000 001 до 10 000 000</td>\n' +
                    '            <td>400 000</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>Свыше 10 000 001</td>\n' +
                    '            <td>4%</td>\n' +
                    '        </tr>\n' +
                    '    </table>',
                tableTooltip3: '<table align="center" border="1" cellpadding="5" cellspacing="0" bordercolor="white"">\n' +
                    '        <tr>\n' +
                    '            <th>Поступившие страховые премии</th>\n' +
                    '            <th>До 500 000</th>\n' +
                    '            <th>500 001 – 1 000 000</th>\n' +
                    '            <th>1 000 001 – 3 000 000</th>\n' +
                    '            <th>3 000 001 и более</th>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>Размер мотивации</td>\n' +
                    '            <td>5%</td>\n' +
                    '            <td>7%</td>\n' +
                    '            <td>9%</td>\n' +
                    '            <td>11%</td>\n' +
                    '        </tr>\n' +
                    '    </table>',
                tableTooltip4: '    <table align="center" border="1" cellpadding="5" cellspacing="0" bordercolor="white"">\n' +
                    '        <tr>\n' +
                    '            <th>Поступившие страховые премии</th>\n' +
                    '            <th>Размер премии, в %</th>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 100 000 до 1 000 000</td>\n' +
                    '            <td>5%</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>свыше 1 000 001</td>\n' +
                    '            <td>7%</td>\n' +
                    '        </tr>\n' +
                    '    </table>',
                tableTooltip5: '    <table align="center" border="1" cellpadding="5" cellspacing="0" bordercolor="white"">\n' +
                    '        <tr>\n' +
                    '            <th>Выполнение базового плана <br> по корпоративным продажам, в %</th>\n' +
                    '            <th>Размер ежемесячной премии <br> (в должностных окладах)</th>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>от 100 до 150</td>\n' +
                    '            <td>1 оклад</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>более 150 до 200</td>\n' +
                    '            <td>1,25 оклада</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>более 200 до 300</td>\n' +
                    '            <td>1,5 оклада</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td>300 и более</td>\n' +
                    '            <td>2 оклада</td>\n' +
                    '        </tr>\n' +
                    '    </table>',
                stringTooltip: 'Средневзвешенный размер<br> комиссии и дополнительных <br>расходов от брутто поступивших <br>страховых премий, в %',
                stringTooltip5: 'В случае превышения коэффициента себестоимости<br> отдела более 40%, премия выплачивается <br> в размере 50%'
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
                            }else if(this.category === 1.1){
                                this.label = 'Менеджер по корпоративному страхованию (филиалы)'
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
                            }else if(this.category === 1.1){
                                this.label = 'Менеджер по корпоративному страхованию (филиалы)'
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
