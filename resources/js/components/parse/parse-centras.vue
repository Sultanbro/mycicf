<template>
    <div>
        <div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16" >
            <div class="flex-row jc-sb pr-3 pl-3 vertical-middle flex-row">
                <div class="width100 table-responsive">
            <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0" v-if="viewType === 'Department'">
                        <thead>
                        <tr class="border-table-0">
                            <td colspan="2" class="text-left fs-1_3 pl-0">Label</td>
                            <td colspan="5" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                            <td></td>
                            <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-left">Департамент</td>
                            <td>{{oracleData.label_first}}</td>
                            <td>{{oracleData.label_second}}</td>
                            <td>Доля {{oracleData.label_first}}</td>
                            <td>Доля {{oracleData.label_second}}</td>
                            <td>Изм %</td>
                            <td>Изм сумма</td>
                            <td></td>
                            <td>{{oracleData.label_first}}</td>
                            <td>{{oracleData.label_second}}</td>
                            <td>Изм %</td>
                            <td>{{oracleData.label_first}}</td>
                            <td>{{oracleData.label_second}}</td>
                        </tr>
                        </thead>
                        <tbody>
                        <template v-for="(value,elem) in oracleData.collects" :value="oracleData.collects">
                        <tr>
                            <td><span>{{}}</span></td>
                            <td>{{123}}</td>
                            <td class="text-left"><span class="bold">{{elem}}</span></td>
                            <td>{{}}</td>
                        </tr>
                        </template>
                        <tr>
                            <td><span></span></td>
                            <td><span></span></td>
                            <td><span class="bold">Итого</span></td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0">
                        <thead>
                        <tr class="border-table-0">
                            <td colspan="2" class="text-left fs-1_3 pl-0">Label</td>
                            <td colspan="5" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                            <td></td>
                            <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-left">Департамент</td>
                            <td>{{oracleData.label_first}}</td>
                            <td>{{oracleData.label_second}}</td>
                            <td>Доля {{oracleData.label_first}}</td>
                            <td>Доля {{oracleData.label_second}}</td>
                            <td>Изм %</td>
                            <td>Изм сумма</td>
                            <td></td>
                            <td>{{oracleData.label_first}}</td>
                            <td>{{oracleData.label_second}}</td>
                            <td>Изм %</td>
                            <td>{{oracleData.label_first}}</td>
                            <td>{{oracleData.label_second}}</td>
                        </tr>
                        </thead>
                        <tbody>
                        <template v-for="(value,elem) in oracleData.collects.ДКС" :value="oracleData.collects.ДКС">
                            <tr>
                                <td><span>{{}}</span></td>
                                <td>{{123}}</td>
                                <td class="text-left"><span class="bold">{{elem}}</span></td>
                                <td>{{}}</td>
                            </tr>
                        </template>
                        <tr>
                            <td><span></span></td>
                            <td><span></span></td>
                            <td><span class="bold">Итого</span></td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0">
                        <thead>
                        <tr class="border-table-0">
                            <td colspan="2" class="text-left fs-1_3 pl-0">Label</td>
                            <td colspan="5" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                            <td></td>
                            <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
                        </tr>
                        <tr>
                            <td>Менеджер</td>
                            <td>План</td>
                            <td class="text-left">Брутто премии {{oracleData.label_first}}</td>
                            <td> ДСД {{oracleData.label_first}}</td>
                            <td>АВ/Рейтинг {{oracleData.label_second}}</td>
                            <td>Нетто премии {{oracleData.label_second}}</td>
                            <td>Тотал премии {{oracleData.label_second}}</td>
                            <td>Изм сумма / %</td>
                            <td></td>
                            <td>{{oracleData.label_first}}</td>
                            <td>{{oracleData.label_second}}</td>
                            <td>Изм %</td>
                            <td>{{oracleData.label_first}}</td>
                            <td>{{oracleData.label_second}}</td>
                        </tr>
                        </thead>
                        <tbody>
                        <template v-for="(value,elem) in oracleData.collects.ДКС.УКС1" :value="oracleData.collects.ДКС">
                            <tr>
                                <td class="text-left"> {{value.empl_name}}</td>
                                <td>{{value.feesplan}}</td>
                                <td>{{value.brutto_prem}}</td>
                                <td>{{value.dsd}}</td>
                                <td>{{value.comission_and_rating}}</td>
                                <td>{{value.netto_refund_sum}}</td>
                                <td>{{value.total_refund_sum}}</td>
                            </tr>
                        </template>
                        <tr>
                            <td><span class="bold">Итого</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "parse-centras",
        data() {
            return {
            viewType: 'Department'
            }
        },
        props: {
            oracleData: Object,
            periods: Object,
        },
        methods: {
            textStyle(index){
                var textStyle = 'bold fs-0_9 bg-grayblue';
                textStyle = index == 1 || index == 10 || index == 14 ? textStyle : '';
                return textStyle;
            },
        },
    }
</script>

<style scoped>

</style>
