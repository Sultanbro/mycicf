<template>
    <div class="box-shadow radius-4px mt-3 pb-2">
        <div class="pt-4">
            <div class="bg-white ml-2 mr-2 pt-4 pb-3">
                <div class="flex-row jc-sb">
                    <div>
                        <input v-model="dateBeg" type="date" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                    </div>
                    <div>
                        <input v-model="dateEnd" type="date" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                    </div>
                    <div>
                        <input type="number" v-model="ISN">
                    </div>
                    <div>
                        <div class="flex-row date-color pl-4 pr-2">
                            <div class="flex-row border-gray pl-4 width-min-content pr-4 pt-1 pb-1">
                                <div><i class="far fa-eye"></i></div>
                                <div class="ml-2" @click="getMotivation()">Показать</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-4">
            <div class="flex-row vertical-middle jc-sb bg-white ml-2 mr-2 pt-3 pb-3">
                <div>
                    <span class="fs-1 CAPS">{{category_start}} {{category}} {{category_end_first}}</span>
                </div>
                <div>
                    <strong class="vertical-middle">
                        <span class="fs-1_5"><i class="fas fa-hand-holding-usd"></i></span>
                        <span class="fs-2 ml-3 color-blue">280 000</span>
                    </strong>
                </div>
            </div>
        </div>
        <div class="mr-2 ml-2 mt-2">
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
                        <!--                            <td>{{index + 1}}</td>-->
                        <!--                            <td>{{motivation.types}}</td>-->
                        <!--                            <td>{{motivation.sum}}</td>-->
                        <td></td>
                        <td></td>
                        <td><i class="fa fa-lg fa-circle motivation" :style="{color : motivation.color}" aria-hidden="true"></i></td>
                    </tr>
                    <tr v-for="test in testArray">
                        <td v-for="t in test.items">{{t.name}}</td>
                    </tr>

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
        <div class="col-md-12 pl-0 pr-0 min-width-50 mt-3 width100">
            <div class="bg-white ml-2 mr-2 pl-3 pr-3 pt-4 pb-3">
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
                category: 1,
                category_start: 'категория',
                motivations: [],
                category_end_first: 'Менеджер по корпоративному страхованию',
                dateBeg: new Date(new Date().getFullYear(), new Date().getMonth(),  1, 6).toJSON().slice(0, 10),
                dateEnd: new Date(new Date().getFullYear(), new Date().getMonth() + 1, 1).toJSON().slice(0, 10),

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
        },
        methods : {
            // getMotivation(){
            //     this.preloader(true)
            //     this.axios.post('/getMotivationList', {
            //             isn: this.ISN,
            //             begin : this.dateBeg,
            //             end: this.dateEnd,
            //         })
            //         .then(response => {
            //             if(response.data.success){
            //                 this.motivations = response.data.list
            //                 this.category = response.data.cat
            //             }else{
            //                 alert(response.data.error)
            //             }
            //         })
            //         .catch(error => {
            //             alert(error)
            //         })
            //         .finally(() => {
            //             this.preloader(false)
            //         });
            // },
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