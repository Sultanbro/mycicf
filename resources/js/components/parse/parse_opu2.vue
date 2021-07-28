<template>
    <div class="">
        <div class="bg-white pl-3 pr-3 mt-3 mb-3 box-shadow border-16">
            <div class="d-flex justify-content-between align-items-center pr-3 pl-3">
                <div class="w-100 table-responsive">
                    <table class="table table-hover text-align-center fs-0_8">
                        <thead>
                        <tr class="border-table-0">
                            <td class="text-left" colspan="4">
                                <div class="d-flex align-items-center pt-1 pb-1">
                                    <h5 class="m-0 p-0">Компании</h5>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="bold-text">
                            <td></td>
                            <td colspan="6">Страховая деятельность</td>
                            <td colspan="1">Инвест деятельность</td>
                            <td colspan="1">Прочая деятельность</td>
                            <td colspan="2">Чистая прибыль</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>ДСД</td>
                            <td>Нетто Выплаты</td>
                            <td>Агентские</td>
                            <td>Нетто доход по страхованию</td>
                            <td>Изменение резервов</td>
                            <td>Фин.рез. с учетом резервов</td>
                            <td>Доход по инвест деятельности</td>
                            <td>Прочие доходы</td>
                            <td>КПН</td>
                            <td>Чистая прибыль</td>
                        </tr>
                        </thead>
                       <tbody>
                       <template v-for="(item,index) in companyOpu">
                           <tr @click="toggle(item.id)" :class="{ opened: opened.includes(item.id)}">
                               <td>{{item.company}}</td>
                               <td>{{Math.floor(item.firstData[index].dsd) | numberFormat}}</td>
                               <td>{{Math.floor(item.firstData[index].net_payout) | numberFormat}}</td>
                               <td>{{Math.floor(item.firstData[index].av) | numberFormat}}</td>
                               <td>{{Math.floor(item.firstData[index].net_ins_income) | numberFormat}}</td>
                               <td>{{Math.floor(item.firstData[index].reserve_changes) | numberFormat}}</td>
                               <td>{{Math.floor(item.firstData[index].fin_changes) | numberFormat}}</td>
                               <td>{{Math.floor(item.firstData[index].invest_income) | numberFormat}}
                               <td>{{Math.floor(item.firstData[index].other_income) | numberFormat}}</td>
                               <td>{{Math.floor(item.firstData[index].kpn) | numberFormat}}</td>
                               <td>{{Math.floor(item.firstData[index].net_income) | numberFormat}}</td>
                           </tr>
                           <tr v-if="opened.includes(item.id)">
                               <td>Второй период</td>
                               <td>{{Math.floor(item.secondData[index].dsd) | numberFormat}}</td>
                               <td>{{Math.floor(item.secondData[index].net_payout) | numberFormat}}</td>
                               <td>{{Math.floor(item.secondData[index].av) | numberFormat}}</td>
                               <td>{{Math.floor(item.secondData[index].net_ins_income) | numberFormat}}</td>
                               <td>{{Math.floor(item.secondData[index].reserve_changes) | numberFormat}}</td>
                               <td>{{Math.floor(item.secondData[index].fin_changes) | numberFormat}}</td>
                               <td>{{Math.floor(item.secondData[index].invest_income) | numberFormat}}
                               <td>{{Math.floor(item.secondData[index].other_income) | numberFormat}}</td>
                               <td>{{Math.floor(item.secondData[index].kpn) | numberFormat}}</td>
                               <td>{{Math.floor(item.secondData[index].net_income) | numberFormat}}</td>
                           </tr>
                           <tr v-if="opened.includes(item.id)">
                               <td class="bold fs-0_9 bg-grayblue">Изменения</td>
                               <td>{{ Math.floor((item.firstData[index].dsd / item.secondData[index].dsd - 1) * 100 || 0)}}%</td>
                               <td>{{ Math.floor((item.firstData[index].net_payout / item.secondData[index].net_payout - 1) * 100 || 0)}}%</td>
                               <td>{{ Math.floor((item.firstData[index].av / item.secondData[index].av - 1) * 100 || 0)}}%</td>
                               <td>{{ Math.floor((item.firstData[index].net_ins_income / item.secondData[index].net_ins_income - 1) * 100 || 0)}}%</td>
                               <td>{{ Math.floor((item.firstData[index].reserve_changes / item.secondData[index].reserve_changes - 1) * 100 || 0)}}%</td>
                               <td>{{ Math.floor((item.firstData[index].fin_changes / item.secondData[index].fin_changes - 1) * 100 || 0)}}%</td>
                               <td>{{ Math.floor((item.firstData[index].invest_income / item.secondData[index].invest_income - 1) * 100 || 0)}}%
                               <td>{{ Math.floor((item.firstData[index].other_income / item.secondData[index].other_income - 1) * 100 || 0)}}%</td>
                               <td>{{ Math.floor((item.firstData[index].kpn / item.secondData[index].kpn - 1) * 100 || 0)}}%</td>
                               <td>{{ Math.floor((item.firstData[index].net_income / item.secondData[index].net_income - 1) * 100 || 0)}}%</td>
                           </tr>
                       </template>
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "parse-opu2",

        data() {
            return {
                opened: [],
                vopened:[],
                companyOpu: [],
            }
        },
        props: {
            request: Object,
            periods: Object
        },

        methods: {
            toggle(id) {
                const index = this.opened.indexOf(id);
                if (index > -1) {
                    this.opened.splice(index, 1)
                } else {
                    this.opened.push(id)
                }
            },
            voggle(id) {
                const index = this.vopened.indexOf(id);
                if (index > -1) {
                    this.vopened.splice(index, 1)
                } else {
                    this.vopened.push(id)
                }
            },

            async OpuCompany() {

                this.axios.post('/parse/my-parse/opu', {
                        first_year: this.periods.first_year,
                        second_year: this.periods.second_year,
                        first_period: this.periods.first_period - 1,
                        second_period: this.periods.second_period - 1,
                }).then(response =>{
                   if(response.data.success){
                       this.companyOpu = response.data.data.companyOpu;
                   }else {
                       alert('Ошибка');
                   }
                });
            },
        },
    }
</script>

<style scoped>

    .opened {
        background-color: yellow;
    }

</style>
