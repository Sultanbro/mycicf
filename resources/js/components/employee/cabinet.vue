<template>
    <div class="cabinet-wrap mt-2 colleagues-section wrap-cabinet cabinet-text">
        <div class="align-items-center colleagues-section__header cabinet-first">

            <div class="radius-4px mt-3 pb-2">
                <div class="mb-2 bg-white rounded"></div>
            </div>
            <div class="nav-drop initial alert-cab alert-c ">
                <div class="d-flex flex-row justify-content-around a cabinet-header">
                    <div class="cabinet_item">
                        <a class="cabinet-link" @click="actionType = 'rating'" href="javascript:void(0)">
                            <i class="far fa-star cabinet-icon"></i>
                            <span>Рейтинг</span>
                        </a>
                    </div>
                    <div class="cabinet_item">
                        <a class="cabinet-link" @click="actionType = 'motivation'" href="javascript:void(0)">
                            <i class="far fa-grin-stars cabinet-icon"></i>
                            <span>Мотивация</span>
                        </a>
                    </div>
                    <div class="cabinet_item">
                        <a  class="cabinet-link" @click="actionType = 'report'" href="javascript:void(0)">
                            <i class="fas fa-chart-pie cabinet-icon"></i>
                            <span>Отчеты</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

            <!-- третий блок -->
        <!-- блок с названием должности ит таблица -->
        <div v-show="actionType === 'rating'" class="align-items-center colleagues-section__header cabinet-third">
            <div class="align-items-center colleagues-section__header cabinet-second">
                <div class="radius-4px mt-3 pb-2">
                    <div class="mb-2 bg-white rounded"></div>
                    <div class="nav-drop initial alert-cab alert-c ">
                        <div class="mr-2 d-flex">
                            <div class="ml-2 mr-2">
                                <input type="month" class="border-0 date-color bg-white pl-3 pt-1 pb-1 date-width cabinet-date" v-model="dateBeg">
                            </div>
                            <!--                            <div class="ml-2 mr-2">-->
                            <!--                                <input type="date" class="border-0 date-color bg-white pl-3 pt-1 pb-1 date-width cabinet-date" v-model="dateEnd">-->
                            <!--                            </div>-->
                            <div class="dealer-raiting-margins">
                                <treeselect v-model="ISN" :multiple="false" :options="options" />
                            </div>

                            <div class="dealer-raiting-input3-contain dealer-raiting-margins">
                                <div class="flex-row date-color pl-4 pr-2">
                                    <div @click="getTables"
                                         class="flex-row pointer show-btn-contain border-gray pl-4 width-min-content pr-4 pt-1 pb-1 ad-width190-800 jc-center ad-dealer-raiting-ml-2-800">
                                        <div><i class="far fa-eye"></i></div>
                                        <div class="ml-2 show-btn">Показать</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- кнопки рейтинг поиск-->
            <div class="radius-4px mt-3 pb-2" v-if="Object.keys(managerInfo).length > 0">
                <div class="mb-2 bg-white rounded"></div>
                    <div class="nav-drop initial alert-cab alert-c ">
                        <div class="mr-2 dev d-flex flex-row justify-content-start">
                            <div class="cabinet-rate">
                                <div class="cabinet-photo ">
                                    <img class="photo-form" src="/images/avatar.png" v-if="fakeImage">
                                    <img :src="imageUrl" @error="fakeImage = true" v-else>
                                </div>
                                <div class="back">
                                    <div class="cabinet-mark" v-if="emplRate === 'A' || emplRate === 'A+' || emplRate === 'A-'">{{this.emplRate}}</div>
                                    <div class="cabinet-mark" v-else-if="emplRate === 'B' || emplRate === 'B+' || emplRate === 'B-'">{{this.emplRate}}</div>
                                    <div class="cabinet-mark" v-else-if="emplRate === 'C'">{{this.emplRate}}</div>
                                    <div class="cabinet-mark" v-else-if="emplRate === 'D'">{{this.emplRate}}</div>
                                </div>
                            </div>

                            <div class="fio">
                                <p>{{fullname}}</p>
                                <p>{{duty}}</p>
                            </div>
<!--                            <div class="ml-3 mr-3 mt-2 collapse in" id="persons-data">-->
<!--                                <div class="left-menu-fonts">-->
<!--                                    <span><strong>{{duty}}</strong></span>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="fio">-->
<!--                                <div class="pointer left-menu-nickname-fonts ml-3 mr-3 mt-1 mb-1 jc-sb width100">-->
<!--                                    <span>{{fullname}}</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="ml-3 mr-3 mt-2 collapse in" id="persons-data">-->
<!--                                <div class="left-menu-fonts">-->
<!--                                    <span><strong>{{duty}}</strong></span>-->
<!--                                </div>-->
<!--                                <div class="left-menu-fonts" v-if="rating !== ''">-->
<!--                                    <span><strong><i class="far color-blue fa-star mr2"></i>&nbsp;</strong><span>{{rating}}</span></span>-->
<!--                                </div>-->
<!--                                <div class="left-menu-fonts" v-if="birthday !== ''">-->
<!--                                    <span><strong><i class="fas color-blue fa-gift"></i>&nbsp;&nbsp;</strong><span>Родился(-ась) {{birthday}}</span></span>-->
<!--                                </div>-->
<!--                                <div class="left-menu-fonts" v-if="place_of_birth !== ''">-->
<!--                                    <span><strong><i class="fas color-blue fa-map-marker-alt ml2 mr2"></i>&nbsp;&nbsp;</strong><span>Из {{place_of_birth}}</span></span>-->
<!--                                </div>-->
<!--                                <div class="left-menu-fonts" v-if="married !== ''">-->
<!--                                    <span><strong><i class="fas color-blue fa-heart"></i>&nbsp;&nbsp;</strong><span>{{married}}</span></span>-->
<!--                                </div>-->
<!--                                <div class="left-menu-fonts" v-if="education !== ''">-->
<!--                                    <span><strong><i class="fas color-blue fa-graduation-cap"></i>&nbsp;</strong><span>Учился(-ась) {{education}}</span></span>-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="rate">
                                <p class="rate-first">Рейтинг</p>
                                <p class="rate-mark" v-if="emplRate === 'A' || emplRate === 'A+' || emplRate === 'A-'">{{this.emplRate}}</p>
                                <p class="rate-mark" v-else-if="emplRate === 'B' || emplRate === 'B+' || emplRate === 'B-'">{{this.emplRate}}</p>
                                <p class="rate-mark" v-else-if="emplRate === 'C'">{{this.emplRate}}</p>
                                <p class="rate-mark" v-else-if="emplRate === 'D'">{{this.emplRate}}</p>
                            </div>
                        </div>
                        <div class="criterion">
                            <table class="table table-st criterion-table cabinet-table">
                                <thead>
                                <tr>
                                    <th scope="col">Критерии</th>
                                    <th scope="col">Показатель</th>
                                    <th scope="col">Оценка</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="rating in ratings">
                                    <td><span v-tooltip.top-center="rating.tooltip">{{rating.criteria}}</span></td>
                                    <td>{{rating.mark}}</td>
                                    <td>{{rating.assessment}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="cabinet-total d-flex flex-row justify-content-start">
                            <div class="cabinet-left"> Итого:</div>
                            <div class="cabinet-right">{{meanShare}}</div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- кнопкиии мотивация поиск-->
        <div v-show="actionType === 'motivation'" class="align-items-center colleagues-section__header cabinet-second">
            <div class="box-shadow radius-4px pb-2 mt-3">
                <div class="pt-2" v-if="checkUrl()">
                    <div class="bg-white ml-3 mr-3 pt-4 pb-3">
                        <div>
                            <label for="dateBeg" class="bold">Отчетный месяц</label>
                        </div>
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
                <div class="pt-2">
                    <div class="d-flex align-items-center justify-content-between bg-white ml-3 mr-3 pt-3 pb-3">
                        <div>
                            <span class="fs-1 CAPS bold">{{label}}</span>
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
                <!--<a href="#" class="flex-row vertical-middle mr-4 ml-4 mt-2">-->
                <!--<i class="far fa-file-word color-blue fs-1_3"></i>-->
                <!--<span class="ml-2 color-black fs-1_1">положение по мотивации</span>-->
                <!--</a>-->
                <div ref="chart" style="display: none;" class="col-md-12 pl-0 pr-0 min-width-50 mt-3 width100">
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
        </div>
        <!-- кнопкиии отчет поиск-->
        <div v-show="actionType === 'report'" class="align-items-center colleagues-section__header cabinet-second">
            <div class="radius-4px mt-3 pb-2">
                <div class="mb-2 bg-white rounded"></div>
                <div class="nav-drop initial alert-cab alert-c ">
                    <div class="mr-2 d-flex">
                        <div class="ml-2 mr-2">
                            <input type="date" class="border-0 date-color bg-white pl-3 pt-1 pb-1 date-width cabinet-date" v-model="dateBeg">
                            <input type="date" class="border-0 date-color bg-white pl-3 pt-1 pb-1 date-width cabinet-date" v-model="dateEnd">
                        </div>
                        <!--                            <div class="ml-2 mr-2">-->
                        <!--                                <input type="date" class="border-0 date-color bg-white pl-3 pt-1 pb-1 date-width cabinet-date" v-model="dateEnd">-->
                        <!--                            </div>-->
                        <div class="dealer-raiting-margins">
                            <treeselect v-model="ISN" :multiple="false" :options="options" />
                        </div>
                        <!-- кнопка поиск отчет-->
                        <div class="dealer-raiting-input3-contain dealer-raiting-margins">
                            <div class="flex-row date-color pl-4 pr-2">
                                <div @click="getTables"
                                     class="flex-row pointer show-btn-contain border-gray pl-4 width-min-content pr-4 pt-1 pb-1 ad-width190-800 jc-center ad-dealer-raiting-ml-2-800">
                                    <div><i class="far fa-eye"></i></div>
                                    <div class="ml-2 show-btn">ОТЧЕТ</div>
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
                                        <strong class="chart-mainData-attributes"><span>Сборы: </span><span>{{numberWithSpaces(Amount)}}</span></strong>
                                        <strong class="chart-mainData-attributes"><span>Выплаты: </span><span>{{numberWithSpaces(Payout)}}</span></strong>
                                        <strong class="chart-mainData-attributes"><span>АВ: </span><span>{{numberWithSpaces(AV)}}</span></strong>
                                        <strong class="chart-mainData-attributes"><span>Доход: </span><span>{{numberWithSpaces(Income)}}</span></strong>
                                        <strong class="chart-mainData-attributes"><span>План: </span><span>{{numberWithSpaces(Plan)}}</span></strong>
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
                                <div class="col-md-6 pl-0 pr-0 min-width-50 main-data-border-left">
                                    <div class="width100 flex-row">
                                        <div class="col-12 pl-0 pr-0 flex-row width100 main-data-first-chart-contain" ref="divElement" style="height : 200px">
                                            <GChart
                                                class="width100"
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
    </div>
</template>

<script>
    console.log('work') ;
    export default {
        name: "cabinet",
        data() {
            return {
                //dateBeg: new Date(new Date().getFullYear(), new Date().getMonth(),  1, 6).toJSON().slice(0, 10),
                dateEnd: new Date(new Date().getFullYear(), new Date().getMonth() + 1, 1).toJSON().slice(0, 10),
                ISN: '',
                options: null,
                showFullInformation: false,
                ratings: [],
                emplRate: null,
                category: null,
                deptName: null,
                dutyName: null,
                dateBeg: new Date(new Date().getFullYear(), new Date().getMonth() - 1, 1, 6).toJSON().slice(0, 7),
                meanShare: null,
                fourthChartData: null,
                fakeImage: false,
                imageUrl: null,
                fullname: '',
                imageCounter: 1,
                duty: '',
                birthday: '',
                place_of_birth: '',
                married: '',
                education: '',
                rating: '',
                managerInfo: {},
                isHidden: false,
                actionType: 'rating',

                motivations: [],
                motSum: null,
                label: '',
                category: 0,

                Amount: 0,
                Payout: 0,
                AV: 0,
                Income: 0,
                Plan: 0,
                chartData: [],
                chartOptions: {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    },
                    title: 'Отчет',
                    legend: {
                        position: 'left',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 15,
                        },
                    },
                    chartArea: {left: 15},
                    fontSize: 14,
                    pieSliceText: 'none',
                    // reverseCategories: 'true',
                    pieHole: 0.9,
                    width: 400,
                    height: 200,
                    // width : ,
                    colors: ['#65aef2', 'transparent', '#ffda83', '#a3a0fb'],
                },
                secondChartData: [],
                secondChartOptions: {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    },
                    colors: ['#0079ea', '#3293ee', '#7cb8f1'],
                    chartArea: {left: 15, right: 0},
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
                    height: 200,
                    fontSize: 14,
                    legend: {position: "none"},
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
                    chartArea: {left: 15},
                    fontSize: 14,
                    pieSliceText: 'none',
                    // reverseCategories: 'true',
                    pieHole: 0.5,
                    width: 400,
                    height: 200,
                    // width : ,
                    colors: ['#55d8fe', '#ff8373', '#ffda83', '#a3a0fb'],
                },
                fourthChartData: [],
                fourthChartOptions: {
                    colors: ['#a3a1fb', '#54d8ff', 'red'],
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
                ISN: null
            }
        },
        props: {
            isn: Number
        },

        mounted() {
            this.ISN = this.isn;
            this.getReport()
            if(this.checkUrl()){
                this.getOptions();
            }
        },
        created: function(){
            //this.getTables();
            this.imageUrl = "/storage/images/employee/" + this.isn + ".png";
        },
        methods: {
            // getUserData(){
            //     this.axios.post('/cabinet/getRating', {
            //         begin : this.dateBeg,
            //         end : this.dateEnd,
            //         isn : this.ISN
            //     })
            //     .then(response => {
            //         console.log(response)
            //     });
            // },

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
                            this.setMotChartData(response.data.motivations)
                            this.$refs.chart.style.display = 'block'
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
            setMotChartData(data) {
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
            getTables: function(){
                this.axios.post("/getColleagueData", {isn: this.ISN}).then((response) => {
                    this.fetchResponse(response.data)
                })
            },

            fetchResponse: function(response) {
                console.log(response);
                if (response.success) {
                     var information = response.response;

                    this.fullname = information.Name;
                    this.duty = information.Duty;
                    this.birthday = information.Birthday;
                    this.married = information.Married;
                    this.education = information.Education;
                    this.rating = information.Rating;
                    //this.place_of_birth = information.City;
                    this.managerInfo = information;
                    this.getRating();
                } else {
                    alert(response.error);
                }
            },

            getRating() {
                this.preloader(true);
                this.axios.post('/cabinet/getRatingList', {isn: this.ISN, begin: this.dateBeg,}).then(response => {
                    if(response.data.success) {
                        this.ratings = response.data.rating;
                        this.emplRate = response.data.emplRate;
                        this.category = response.data.category;
                        this.deptName = response.data.deptName;
                        this.dutyName = response.data.dutyName;
                        this.meanShare = response.data.meanShare;
                    }
                }).catch(error => {
                    alert(error);
                }).finally(() => {
                    this.preloader(false);
                    this.showFullInformation = true;
                })
            },
            getOptions() {
                this.preloader(true);
                this.axios.post('/getBranchData', {}).then((response) => {
                    this.options = response.data.result;
                    this.preloader(false);
                });
            },
            getReport() {
                this.preloader(true);
                this.axios.post('/getReport', {
                    isn: this.ISN,
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
            preloader(show) {
                if(show) {
                    document.getElementById('preloader').style.display = 'flex';
                }
                else {
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
            }
        }
    }
</script>

<style scoped>

</style>

