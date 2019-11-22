<template>
    <div class="box-shadow radius-4px mt-3 pb-2">
        <div class="pt-4">
            <div class="bg-white ml-2 mr-2 mt-1 box-shadow border-16 pt-3 pb-3 ad-jc-center-800">
                <div class="d-flex align-items-center">
                    <div class="ml-2 dealer-raiting-input1-contain dealer-raiting-margins">
                        <input v-model="dateBeg" type="month" class="border0 date-color ad-width190-800 bg-darkgray pl-4 pr-2 pt-1 pb-1 dealer-raiting-input1">
                    </div>
<!--                    <div class="mr-2">-->
<!--                        <input v-model="dateEnd" type="date" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">-->
<!--                    </div>-->
                    <div class="">
                        <treeselect class="w-50 ad-width190-800 ml-2" v-model="ISN" :multiple="false" :options="options" />
                    </div>
                    <div class="dealer-raiting-input3-contain dealer-raiting-margins">
                        <div class="date-color show-btn flex-row pl-4 pr-2" @click="getMotivation">
                            <div class="flex-row show-btn-contain border-gray pl-4 width-min-content pr-4 pt-1 pb-1 ad-width190-800 jc-center ad-dealer-raiting-ml-2-800">
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
            <div class="d-flex border-16 flex-row vertical-middle jc-sb bg-white ml-2 mr-2 pt-3 pb-3 border-4px box-shadow pl-2 pr-2 show-btn-contain">
                <div>
                    <span class="fs-1 CAPS">{{category_end_first}}</span>
                </div>
                <div>
                    <div class="d-flex align-items-center ad-flex-column-440 ad-alignitems-end-440">
                        <span class="fs-1_5 bold">
                            <i class="fas fa-hand-holding-usd"></i>
                        </span>
                        <span class="fs-2 ml-3 color-blue bold">{{this.motSum}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-shadow border-16 mr-2 ml-2 mt-2">
            <div class="table-responsive-sm">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <!--                            <th scope="col">№</th>-->
                            <!--                            <th scope="col">Мотивация</th>-->
                            <!--                            <th scope="col">Критерии</th>-->
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
<!--                        <tr v-for="test in testArray">-->
<!--                            <td v-for="t in test.items">{{t.name}}</td>-->
<!--                        </tr>-->
                    </tbody>
                </table>
            </div>
        </div>
        <a href="#" class="flex-row vertical-middle mr-4 ml-4 mt-2">
            <i class="far fa-file-word color-blue fs-1_3"></i>
            <span class="ml-2 color-black fs-1_1">положение по мотивации</span>
        </a>
<!--        <div class="mr-2 ml-2 mt-2">-->
<!--            <div class="table-responsive-sm">-->
<!--                <table class="table table-bordered table-striped">-->
<!--                    <tbody>-->
<!--                    <tr>-->
<!--                        &lt;!&ndash;                            <th scope="col">№</th>&ndash;&gt;-->
<!--                        &lt;!&ndash;                            <th scope="col">Мотивация</th>&ndash;&gt;-->
<!--                        &lt;!&ndash;                            <th scope="col">Критерии</th>&ndash;&gt;-->
<!--                        <th scope="col">Критерии</th>-->
<!--                        <th scope="col">Расчеты</th>-->
<!--                        <th scope="col">Выполнение</th>-->
<!--                    </tr>-->
<!--                    <tr v-for="(motivation, index) in motivations">-->
<!--                        &lt;!&ndash;                            <td>{{index + 1}}</td>&ndash;&gt;-->
<!--                        &lt;!&ndash;                            <td>{{motivation.types}}</td>&ndash;&gt;-->
<!--                        &lt;!&ndash;                            <td>{{motivation.sum}}</td>&ndash;&gt;-->
<!--                        <td></td>-->
<!--                        <td></td>-->
<!--                        <td><i class="fa fa-lg fa-circle motivation" :style="{color : motivation.color}" aria-hidden="true"></i></td>-->
<!--                    </tr>-->
<!--                    <tr v-for="itemSecond in motivationTdArray">-->
<!--                        <td v-for="itemTd in itemSecond.motivationChildArray">{{itemTd.itemName}}</td>-->
<!--                    </tr>-->
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->
<!--        </div>-->
        <div class="col-md-12 pl-0 pr-0 min-width-50 mt-3 width100" v-if="false">
            <div class="bg-white ml-3 mr-3 pl-3 pr-3 pt-4 pb-3">
                <div class="width100 flex-row">
                    <div class="col-md-12 pl-0 pr-0 flex-row width100 main-data-first-chart-contain" ref="divElement" style="height : 200px">
                        <GChart
                                class="data-chart-pie jc-center"
                                type="LineChart"
                                :data="fourthChartData"
                                :options="fourthChartOptions"
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
                // dateEnd: new Date(new Date().getFullYear(), new Date().getMonth() + 1, 1).toJSON().slice(0, 10),

                // motivationTdArray: [
                //     { // <- item
                //         motivationChildArray: [
                //             {   // <- itemTd
                //                 itemName: 'Имя'
                //             },
                //             {
                //                 itemName: 'Фамилия'
                //             },
                //             {
                //                 itemName: 'item 3'
                //             }
                //         ]
                //     },
                //     {
                //         motivationChildArray: [
                //             {
                //                 itemName: 'item 4'
                //             },
                //             {
                //                 itemName: 'item 5'
                //             },
                //             {
                //                 itemName: 'item 6'
                //             }
                //         ],
                //     },
                //     {
                //         motivationChildArray: [
                //             {
                //                 itemName: 'item 7'
                //             },
                //             {
                //                 itemName: 'item 8'
                //             },
                //             {
                //                 itemName: 'item 9'
                //             }
                //         ],
                //     },
                // ],

                testArray: [
                    { // <- test
                        items: [
                            {   // <- t
                                name: 'item 1'
                            },
                            {
                                name: 'item 2'
                            },
                            {
                                name: 'item 3'
                            }
                        ]
                    },
                    { // <-test
                        items: [
                            { // <- t
                                name: 'item 4'
                            },
                            {
                                name: 'item 5'
                            },
                            {
                                name: 'item 6'
                            }
                        ]
                    },
                    {
                        items: [
                            {
                                name: 'item 7'
                            },
                            {
                                name: 'item 8'
                            },
                            {
                                name: 'item 9'
                            }
                        ]
                    },
                ],
                fourthChartData:[
                    ['Year', 'План', 'Мотивация'],
                    ['Сентябрь',  -1000, 0],
                    ['Октябрь',  900, 660],
                    ['Ноябрь', 2000, -3000],
                    ['Ноябрь', 2000, 500],
                    ['Ноябрь', 500, 900],
                ],
                fourthChartOptions: {
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
