<template>
    <div>
        <div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16" >
            <div class="flex-row jc-sb pr-3 pl-3 vertical-middle flex-row">
                <div class="width100 table-responsive">
            <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0" v-if="viewType === 'departments'">
                        <thead>
                        <tr class="border-table-0">
                            <td colspan="2" class="text-left fs-1_3 pl-0">
                                Сентрас Иншуранс</td>
                            <td colspan="5" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                            <td></td>
                            <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
                        </tr>
                        <tr>
                            <td class="text-left">Департамент</td>
                            <td>План</td>
                            <td class="text-left">Брутто премии {{oracleData.label_first}}</td>
                            <td> ДСД {{oracleData.label_first}}</td>
                            <td>АВ/Рейтинг {{oracleData.label_first}}</td>
                            <td>Нетто премии {{oracleData.label_first}}</td>
                            <td>Тотал премии {{oracleData.label_first}}</td>
                            <td>Изм сумма / %</td>
                            <td></td>
                            <td>План</td>
                            <td class="text-left">Брутто премии {{oracleData.label_second}}</td>
                            <td> ДСД {{oracleData.label_second}}</td>
                            <td>АВ/Рейтинг {{oracleData.label_second}}</td>
                            <td>Нетто премии {{oracleData.label_second}}</td>
                            <td>Тотал премии {{oracleData.label_second}}</td>
                        </tr>
                        </thead>
                        <tbody>
                        <template v-for="(elem,value) in oracleData.collectsSum">
                        <tr>
                            <td class="text-left" @click=getAdm(value)>{{value}}</td>
                            <td>{{(elem.feesplan || 0) | numberFormat}}</td>
                            <td>{{(elem.brutto_prem || 0) | numberFormat}}</td>
                            <td>{{(elem.dsd || 0) | numberFormat}}</td>
                            <td>{{(elem.comission_and_rating || 0) | numberFormat}}</td>
                            <td>{{(elem.netto_refund_sum || 0) | numberFormat}}</td>
                            <td>{{(elem.total_refund_sum || 0) | numberFormat}}</td>
                            <td>%%</td>
                            <td></td>
                            <td>{{(oracleData.collectsSum2[value].feesplan || 0) | numberFormat}}</td>
                            <td>{{(oracleData.collectsSum2[value].brutto_prem || 0) | numberFormat}}</td>
                            <td>{{(oracleData.collectsSum2[value].dsd || 0) | numberFormat}}</td>
                            <td>{{(oracleData.collectsSum2[value].comission_and_rating || 0) | numberFormat}}</td>
                            <td>{{(oracleData.collectsSum2[value].netto_refund_sum || 0) | numberFormat}}</td>
                            <td>{{(oracleData.collectsSum2[value].total_refund_sum || 0) | numberFormat}}</td>
                        </tr>
                        </template>
                        <tr>
                            <td><span class="bold">Итого</span></td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0"
                           v-if="viewType === 'admins'">
                        <thead>
                        <tr class="border-table-0">
                            <td colspan="2" class="text-left fs-1_3 pl-0">{{deptValue}}</td>
                            <td colspan="5" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                            <td></td>
                            <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
                        </tr>
                        <tr>
                            <td class="text-left">Управление</td>
                            <td>План</td>
                            <td class="text-left">Брутто премии {{oracleData.label_first}}</td>
                            <td> ДСД {{oracleData.label_first}}</td>
                            <td>АВ/Рейтинг {{oracleData.label_first}}</td>
                            <td>Нетто премии {{oracleData.label_first}}</td>
                            <td>Тотал премии {{oracleData.label_first}}</td>
                            <td>Изм сумма / %</td>
                            <td></td>
                            <td>План</td>
                            <td class="text-left">Брутто премии {{oracleData.label_second}}</td>
                            <td> ДСД {{oracleData.label_second}}</td>
                            <td>АВ/Рейтинг {{oracleData.label_second}}</td>
                            <td>Нетто премии {{oracleData.label_second}}</td>
                            <td>Тотал премии {{oracleData.label_second}}</td>
                        </tr>
                        </thead>
                        <tbody>
                        <template
                            v-for="(item,key) in oracleData.collects1[deptValue]">
                            <tr>
                                <td class="text-left" @click=getMan(key)>{{key}}</td>
                                <td>{{(item.feesplan || 0) | numberFormat}}</td>
                                <td>{{(item.brutto_prem || 0) | numberFormat}}</td>
                                <td>{{(item.dsd || 0) | numberFormat}}</td>
                                <td>{{(item.comission_and_rating || 0) | numberFormat}}</td>
                                <td>{{(item.netto_refund_sum || 0) | numberFormat}}</td>
                                <td>{{(item.total_refund_sum || 0) | numberFormat}}</td>
                                <td>%%</td>
                                <td></td>
                                <td>{{(oracleData.collects2[deptValue][key].feesplan || 0) | numberFormat}}</td>
                                <td>{{(oracleData.collects2[deptValue][key].brutto_prem || 0) | numberFormat}}</td>
                                <td>{{(oracleData.collects2[deptValue][key].dsd || 0) | numberFormat}}</td>
                                <td>{{(oracleData.collects2[deptValue][key].comission_and_rating || 0) | numberFormat}}</td>
                                <td>{{(oracleData.collects2[deptValue][key].netto_refund_sum || 0) | numberFormat}}</td>
                                <td>{{(oracleData.collects2[deptValue][key].total_refund_sum || 0) | numberFormat}}</td>
                            </tr>
                        </template>
                        <tr>
                            <td><span class="bold">Итого</span></td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0"
                           v-if="viewType === 'managers'">
                        <thead>
                        <tr class="border-table-0">
                            <td colspan="2" class="text-left fs-1_3 pl-0">{{adminValue}}</td>
                            <td colspan="5" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                            <td></td>
                            <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
                        </tr>
                        <tr>
                            <td>Менеджер</td>
                            <td>План</td>
                            <td class="text-left">Брутто премии {{oracleData.label_first}}</td>
                            <td> ДСД {{oracleData.label_first}}</td>
                            <td>АВ/Рейтинг {{oracleData.label_first}}</td>
                            <td>Нетто премии {{oracleData.label_first}}</td>
                            <td>Тотал премии {{oracleData.label_first}}</td>
                            <td>Изм сумма / %</td>
                            <td></td>
                            <td class="text-left">Брутто премии {{oracleData.label_second}}</td>
                            <td> ДСД {{oracleData.label_second}}</td>
                            <td>АВ/Рейтинг {{oracleData.label_second}}</td>
                            <td>Нетто премии {{oracleData.label_second}}</td>
                            <td>Тотал премии {{oracleData.label_second}}</td>
                        </tr>
                        </thead>
                        <tbody>
                        <template v-for="(item,key) in oracleData.collects1[deptValue][adminValue][managValue]">
                            <tr>
                                    <td class="text-left">{{item.empl_name}}</td>
                                    <td>{{(item.feesplan || 0) | numberFormat}}</td>
                                    <td>{{(item.brutto_prem || 0) | numberFormat}}</td>
                                    <td>{{(item.dsd || 0) | numberFormat}}</td>
                                    <td>{{(item.comission_and_rating || 0) | numberFormat}}</td>
                                    <td>{{(item.netto_refund_sum || 0) | numberFormat}}</td>
                                    <td>{{(item.total_refund_sum || 0) | numberFormat}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        {{((oracleData.collects2[deptValue][adminValue][managValue][key] || {}).brutto_prem || 0) | numberFormat}}
                                    </td>
                                    <td>
                                        {{((oracleData.collects2[deptValue][adminValue][managValue][key] || {}).dsd || 0) | numberFormat}}
                                    </td>
                                    <td>
                                        {{((oracleData.collects2[deptValue][adminValue][managValue][key] || {}).comission_and_rating || 0) | numberFormat}}
                                    </td>
                                    <td>{{((oracleData.collects2[deptValue][adminValue][managValue][key] || {}).netto_refund_sum || 0)
                                        | numberFormat}}</td>
                                    <td>{{((oracleData.collects2[deptValue][adminValue][managValue][key] || {}).total_refund_sum || 0) | numberFormat}}</td>
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
            viewType: 'departments',
            deptValue: null,
            adminValue: null,
            managValue: null,
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
            getAdm(value){
                this.deptValue = value;
                this.viewType = 'admins';
            },
            getMan(key){
                this.adminValue = key;
                this.managValue = key;
                this.viewType = 'managers';
            },
            aa(){
                //console.log(this.oracleData.collects1[this.deptValue][this.adminValue][this.managValue].firstDate[0]);

/*                for(let i=0; i< this.oracleData.collects1[this.deptValue][this.adminValue][this.managValue].firstDate.length; i++){
                    console.log(this.oracleData.collects1[this.deptValue][this.adminValue][this.managValue].firstDate[i]);
                }*/
            }
        },
    }
</script>

<style scoped>
    .text-left{
        font-weight: bold;
    }
</style>
