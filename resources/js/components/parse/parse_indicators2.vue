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
                            <td colspan="7">Активы</td>
                            <td colspan="8">Пассивы</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>ДС</td>
                            <td>Вклады</td>
                            <td>ЦБ</td>
                            <td>Обратное РЕПО</td>
                            <td>Страховая ДЗ</td>
                            <td>Прочая ДЗ</td>
                            <td>Прочие активы</td>
                            <td>РЕПО</td>
                            <td>Прочая кредиторская задолженность</td>
                            <td>Резервы(РПН РЗНУ РПНУ)</td>
                            <td>Нераспределенная прибыль</td>
                            <td>Прочие</td>
                        </tr>
                        </thead>
                        <tbody>
                        <template v-for="(item,index) in companyBalance">
                            <tr @click="toggle(item.id)" :class="{ opened: opened.includes(item.id)}">
                                <td>{{item.company}}</td>
                                <td>{{Math.floor(item.firstData[index].cash) | numberFormat}}</td>
                                <td>{{Math.floor(item.firstData[index].deposits) | numberFormat}}</td>
                                <td>{{Math.floor(item.firstData[index].securities) | numberFormat}}</td>
                                <td>{{Math.floor(item.firstData[index].rev_repo) | numberFormat}}</td>
                                <td>{{Math.floor(item.firstData[index].ins_dz) | numberFormat}}</td>
                                <td>{{Math.floor(item.firstData[index].other_dz) | numberFormat}}</td>
                                <td>{{Math.floor(item.firstData[index].other_actives) | numberFormat}}</td>

                                <td>{{Math.floor(item.firstData[index].repo) | numberFormat}}</td>
                                <td>{{Math.floor(item.firstData[index].reserves) | numberFormat}}</td>
                                <td>{{Math.floor(item.firstData[index].rnp) + Math.floor(item.firstData[index].rznu)
                                    + Math.floor(item.firstData[index].rpnu) | numberFormat}}</td>
                                <td>{{Math.floor(item.firstData[index].other_liability) | numberFormat}}</td>
                                <td>{{Math.floor(item.firstData[index].retained_earnings) | numberFormat}}</td>
                            </tr>
                            <tr v-if="opened.includes(item.id)">
                                <td>Второй период</td>
                                <td>{{Math.floor(item.secondData[index].cash) | numberFormat}}</td>
                                <td>{{Math.floor(item.secondData[index].deposits) | numberFormat}}</td>
                                <td>{{Math.floor(item.secondData[index].securities) | numberFormat}}</td>
                                <td>{{Math.floor(item.secondData[index].rev_repo) | numberFormat}}</td>
                                <td>{{Math.floor(item.secondData[index].ins_dz) | numberFormat}}</td>
                                <td>{{Math.floor(item.secondData[index].other_dz) | numberFormat}}</td>
                                <td>{{Math.floor(item.secondData[index].other_actives) | numberFormat}}</td>

                                <td>{{Math.floor(item.secondData[index].repo) | numberFormat}}</td>
                                <td>{{Math.floor(item.secondData[index].reserves) | numberFormat}}</td>
                                <td>{{Math.floor(item.secondData[index].rnp) + Math.floor(item.secondData[index].rznu)
                                    + Math.floor(item.secondData[index].rpnu) | numberFormat}}</td>
                                <td>{{Math.floor(item.secondData[index].other_liability) | numberFormat}}</td>
                                <td>{{Math.floor(item.secondData[index].retained_earnings) | numberFormat}}</td>
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
        name: "parse-indicators2",

        data() {
            return {
                opened: [],
                vopened:[],
                companyBalance: [],
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

            async BalanceCompany() {

                this.axios.post('/parse/my-parse/balance', {
                    first_year: this.periods.first_year,
                    second_year: this.periods.second_year,
                    first_period: this.periods.first_period - 1,
                    second_period: this.periods.second_period - 1,
                }).then(response =>{
                    if(response.data.success){
                        this.companyBalance = response.data.data.companyBalance;
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
