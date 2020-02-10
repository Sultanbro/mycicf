<template>
    <div class="bg-white pl-3 pr-3 box-shadow border-16">
        <div class="flex-row jc-sb pt-3 pr-3 pb-4 pl-3 vertical-middle flex-row">
            <div class="flex-row jc-sb">
                <div class="custom-primary-button-inverse pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                    <i class="fa fa-chart-pie"></i>
                    <div class="mt-1 fs-0_8">Сборы</div>
                </div>
                <a href="/parse/finance">
                    <div class="custom-primary-button-inverse pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                        <i class="fa fa-sliders-h settings-icon-transform270"></i>
                        <div class="mt-1 fs-0_8">Показатели</div>
                    </div>
                </a>
                <div class="custom-primary-button-inverse button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                    <i class="fa fa-user-friends"></i>
                    <div class="mt-1 fs-0_8">Конкуренты</div>
                </div>
            </div>

            <div class="d-flex">
                <a href="/parse/table-opu">
                    <div class="p-2">ОПУ</div>
                </a>
                <a href="/parse/table-indicators">
                    <div class="p-2">БАЛАНС</div>
                </a>
<!--                <a href="/parse/table-info">-->
<!--                    <div class="p-2">ИНФО</div>-->
<!--                </a>-->
            </div>

            <div class="flex-row">
                <div class="mr-10 parse-top-company-select">
                    <div>
                        <select class="border-0-bottom p-1 pointer" id="dateType" v-model="type">
                            <option v-for="dateType in dateTypes" :value="dateType.value" >{{dateType.name}}</option>
                        </select>
                    </div>
                </div>

                <div class="flex-row jc-sb" id="monthBlock">
                    <div class="mr-4 ml-4">
                        <select id="fYear" class="border-0 date-color bg-darkgray pl-2 pr-2 pt-1 pb-1" v-model="periods.first_year">
                            <option selected disabled hidden :value="null">Не выбрано</option>
                            <option v-for="year in years" :value="year">{{year}}</option>
                        </select>
                        <select id="firstMonth" class="border-0 date-color bg-darkgray pl-2 pr-2 pt-1 pb-1" v-model="periods.first_period">
                            <option selected disabled hidden :value="null">Не выбрано</option>
                            <option v-for="month in months" :value="month.id">{{month.name}}</option>
                        </select>
                    </div>

                    <div class="mr-4 ml-4">
                        <div>
                            <select id="sYear" class="border-0 date-color bg-darkgray pl-2 pr-2 pt-1 pb-1" v-model="periods.second_year">
                                <option selected disabled hidden :value="null">Не выбрано</option>
                                <option v-for="year in years" :value="year">{{year}}</option>
                            </select>
                            <select id="secondMonth" class="border-0 date-color bg-darkgray pl-2 pr-2 pt-1 pb-1" v-model="periods.second_period">
                                <option selected disabled hidden :value="null">Не выбрано</option>
                                <option v-for="month in months" :value="month.id">{{month.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="d-flex vertical-middle parse-top-company-margins jc-sb">
                    <div class="mr-4 ml-4">
                        <div class="d-flex custom-primary-button-inverse border-0 pl-4 pr-4 pt-1 pb-1 color-white button-accept pointer" @click="getData">
                            <div>
                                <i class="fa fa-filter"></i>
                                <span class="pl-2">Показать</span>
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
        name: "parse-top",

        data: () => ({
            type: "rise",
            dateTypes: [
                {
                    name: "C нарастанием",
                    value: "rise",
                },
                {
                    name: "Месяц",
                    value: "month",
                },
                {
                    name: "Квартал",
                    value: "quarter",
                },
                {
                    name: "Год",
                    value: "year"
                }
            ],
        }),

        props: {
            periods: Object,
            months: Array,
            years: Array,
            getData: Function,
        },
    }
</script>

<style scoped>

</style>
