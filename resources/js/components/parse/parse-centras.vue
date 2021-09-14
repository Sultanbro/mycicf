<template>
    <div>
        <div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16" >
            <div class="flex-row jc-sb pr-3 pl-3 vertical-middle flex-row">
                <div class="width100 table-responsive">
                    <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0">
                        <thead>
                        <tr class="border-table-0">
                            <td colspan="2" class="text-left fs-1_3 pl-0">label</td>
<!--                            <td class="pt-3" @click="topCompany()"><span :class="viewType === 'market' ? 'pointer parse-active' : 'pointer'">Топ по компаниям</span></td>
                            <td class="pt-3" @click="topClass()" ><span :class="viewType === 'company' ? 'pointer parse-active' : 'pointer'">Топ по классам</span></td>-->
                            <td colspan="5" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                            <td></td>
                            <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-left">Компания</td>
                            <td>{{label_first}}</td>
                            <td>{{label_second}}</td>
                            <td>Доля {{label_first}}</td>
                            <td>Доля {{label_second}}</td>
                            <td>Изм %</td>
                            <td>Изм сумма</td>
                            <td></td>
                            <td>{{label_first}}</td>
                            <td>{{label_second}}</td>
                            <td>Изм %</td>
                            <td>{{label_first}}</td>
                            <td>{{label_second}}</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-left">ДКС</td>
                            <td class="text-left">{{}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-left">ДСП</td>
                        </tr>
                       <tr>
                           <td></td>
                           <td></td>
                           <td class="text-left">ДРПО</td>
                       </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-left">ДП</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-left">Филиалы</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-left">kupipolis</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><span class="bold-text">Итого</span></td>
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
