<template>
    <div class="box-shadow radius-4px pb-2">
        <div class="pt-2" v-if="checkUrl()">
            <div class="bg-white ml-3 mr-3 pt-4 pb-3 flex-column">
                <div>
                    <label for="dateBeg" class="bold">Отчетный месяц</label>
                </div>
                <div class="flex flex-start ad-flex-column-800 ad-alignitems-center-800 ml-0-contain ad-stretch-800">
                    <div class="dealer-raiting-input1-contain dealer-raiting-margins">
                        <input v-model="dateBeg" type="month" class="border0 date-color ad-width190-800 bg-darkgray pl-4 pr-2 pt-1 pb-1 dealer-raiting-input1">
                    </div>
                    <div class="dealer-raiting-margins">
                        <treeselect v-model="ISN" :multiple="false" :options="options" />
                    </div>
                    <div class="dealer-raiting-input3-contain dealer-raiting-margins">
                        <div class="flex-row date-color pl-4 pr-2">
                            <div @click="getRating"
                                 class="flex-row pointer show-btn-contain border-gray pl-4 width-min-content pr-4 pt-1 pb-1 ad-width190-800 jc-center ad-dealer-raiting-ml-2-800">
                                <div><i class="far fa-eye"></i></div>
                                <div class="ml-2 show-btn">Показать</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-2" v-else>
            <div class="bg-white ml-3 mr-3 pt-4 pb-3 flex-column">
                <div>
                    <label for="dateBeg" class="bold">Отчетный месяц</label>
                </div>
                <div class="flex flex-start ad-flex-column-800 ad-alignitems-center-800 ml-0-contain ad-stretch-800">
                    <div class="dealer-raiting-input1-contain dealer-raiting-margins">
                        <input v-model="dateBeg" type="month" class="border0 date-color ad-width190-800 bg-darkgray pl-4 pr-2 pt-1 pb-1 dealer-raiting-input1">
                    </div>
                    <div class="dealer-raiting-input3-contain dealer-raiting-margins">
                        <div class="flex-row date-color pl-4 pr-2">
                            <div @click="getRating"
                                 class="flex-row show-btn-contain pointer border-gray pl-4 width-min-content pr-4 pt-1 pb-1 ad-width190-800 jc-center ad-dealer-raiting-ml-2-800">
                                <div><i class="far fa-eye"></i></div>
                                <div class="ml-2 show-btn">Показать</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-2"
             v-if="showFullInformation">
            <div class="d-flex align-items-center justify-content-between bg-white ml-3 mr-3 pt-3 pb-3">
                <div>
                    <span class="fs-1 CAPS">{{dutyName}}</span>
                </div>
                <div>
                    <strong class="vertical-middle ad-flex-column-440 ad-alignitems-end-440">
                        <span class="fs-1_5">рейтинг</span>
                        <span class="fs-2 ml-3 class-a pl-4 pr-4 blocks-small-borderRad" v-if="emplRate === 'A' || emplRate === 'A+' || emplRate === 'A-'">{{this.emplRate}}</span>
                        <span class="fs-2 ml-3 class-b pl-4 pr-4 blocks-small-borderRad" v-else-if="emplRate === 'B' || emplRate === 'B+' || emplRate === 'B-'">{{this.emplRate}}</span>
                        <span class="fs-2 ml-3 class-c pl-4 pr-4 blocks-small-borderRad" v-else-if="emplRate === 'C'">{{this.emplRate}}</span>
                        <span class="fs-2 ml-3 class-d pl-4 pr-4 blocks-small-borderRad" v-else-if="emplRate === 'D'">{{this.emplRate}}</span>
                    </strong>
                </div>
            </div>
        </div>
        <div class="mr-2 ml-2 mt-2"
             v-if="showFullInformation">
            <div>
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th scope="col">Критерии</th>
                                <th scope="col">Показатель</th>
                                <th scope="col">Оценка</th>
                            </tr>
                            <tr v-for="rating in ratings">
                                <td :title="rating.tooltip">{{rating.criteria}}</td>
                                <td>{{rating.mark}}</td>
                                <td>{{rating.assessment}}</td>
                            </tr>
                            <tr class="meanShare">
                                <td colspan="2">Итого</td>
                                <td>{{meanShare}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
<!--            <a href="#" class="flex-row vertical-middle mr-4 ml-4 mt-2 pb-2 pt-2 block">-->
<!--                <i class="far fa-file-word color-blue fs-1_3"></i>-->
<!--                <span class="ml-2 color-black fs-1_1">положение по мотивации</span>-->
<!--            </a>-->
        </div>
<!--        <div class="pt-3 pb-3 pl-0 pr-0 mt-3 bg-white ml-2 mr-2 box-shadow border-16">-->
<!--            <div>-->
<!--                <div class="width100 flex-row">-->
<!--                    <div class="col-md-12 pl-0 pr-0 flex-row width100 main-data-first-chart-contain" ref="divElement" style="height : 200px">-->
<!--                        <GChart-->
<!--                                class="data-chart-pie jc-center"-->
<!--                                type="LineChart"-->
<!--                                :data="fourthChartData"-->
<!--                                :options="fourthChartOptions"-->
<!--                        />-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</template>

<script>
    export default {
        name: "rating",
        data() {
            return {
                ISN: '',
                options: null,
                showFullInformation: false,
                ratings: [],
                emplRate: null,
                category: null,
                deptName: null,
                dutyName: null,
                dateBeg: new Date(new Date().getFullYear(), new Date().getMonth() - 1,  1, 6).toJSON().slice(0, 7),
                meanShare : null,
                fourthChartData: null,

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

        props: {
            isn: Number
        },

        mounted() {
            this.ISN = this.isn;
            if(this.checkUrl()){
                this.getOptions();
            }
        },

        methods: {
            getRating() {
                this.preloader(true);
                this.axios.post('/getRatingList', {isn: this.ISN, begin: this.dateBeg,}).then(response => {
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
            }
        }
    }
</script>

<style scoped>

</style>
