<template>
    <div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16">
        <div class="flex-row jc-sb pr-3 pl-3 vertical-middle flex-row">
            <div class="width100 table-responsive">

                <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0">
                    <thead>
                    <tr class="border-table-0">
                        <td colspan="2" class="text-left fs-1_3 pl-0">{{companyData.label}}</td>
                        <td class="pt-3"><span class="pointer parse-active">Топ по компаниям</span></td>
                        <td class="pt-3"><a onclick="getProducts(0)"><span class="pointer">Топ по классам</span></a></td>
                        <td colspan="5" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                        <td></td>
                        <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-left">{{(periods || {}).first_year}}</td>
                        <td>{{companyData.label_first}}</td>
                        <td>{{companyData.label_second}}</td>
                        <td>Доля {{companyData.label_first}}</td>
                        <td>Доля {{companyData.label_second}}</td>
                        <td>Изм %</td>
                        <td>Изм сумма</td>
                        <td></td>
                        <td>{{companyData.label_first}}</td>
                        <td>{{companyData.label_second}}</td>
                        <td>Изм %</td>
                        <td>{{companyData.label_first}}</td>
                        <td>{{companyData.label_second}}</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item,index) in companyData.companyList" v-if="!!ranking[index]">
                        <td>{{index}}</td>
                        <td>{{(ranking[index])}}</td>
                        <td class="text-left"><span class="bold">{{item}}</span></td>
                        <td>{{(premium_first[index] || 0) | numberFormat}}</td>
                        <td>{{(premium_second[index] || 0) | numberFormat}}</td>

                        <!--Это проценты 'Доля Мар 2021'-->
                        <td>{{Math.floor((premium_first[index] /totalCompanyFirst) * 100 || 0)}}%</td>
                        <!--Это проценты 'Доля Мар 2020'-->
                        <td>{{Math.floor((premium_second[index] /totalCompanySecond) * 100 || 0)}}%</td>
                        <!--Изм %-->
                        <td>{{Math.floor((premium_first[index] /premium_second[index] - 1) * 100 || 0)}}%</td>
                        <!--Изм сумма-->
                        <td>{{(premium_first[index] - premium_second[index] || 0) | numberFormat}}</td>
                        <td></td>
                        <!--Мар 2021-->
                        <td>{{(payout_first[index] || 0) | numberFormat}}</td>
                        <!--Мар 2020-->
                        <td>{{(payout_second[index] || 0) | numberFormat}}</td>
                        <!--Изм %-->
                        <td>{{Math.floor((payout_first[index] /payout_second[index] - 1) * 100 || 0)}}%</td>
                        <!--Мар 2021 проценты-->
                        <td>{{Math.floor((payout_first[index] / premium_first[index]) * 100 || 0)}}%</td>
                        <!--Мар 2020 проценты-->
                        <td>{{Math.floor((payout_second[index] / premium_second[index]) * 100 || 0)}}%</td>
                    </tr>
                    <tr>
                        <td><span></span></td>
                        <td><span></span></td>
                        <td><span class="bold">Итого</span></td>
                        <td>{{totalCompanyFirst | numberFormat}}</td>
                        <td>{{totalCompanySecond | numberFormat}}</td>
                        <td></td>
                        <td></td>
                        <td>{{Math.floor((totalCompanyFirst/totalCompanySecond - 1) * 100 || 0)}}%</td>
                        <td>{{totalCompanyFirst - totalCompanySecond | numberFormat}}</td>
                        <td></td>
                        <td>{{payoutCompanyFirst | numberFormat}}</td>
                        <td>{{payoutCompanySecond | numberFormat}}</td>
                        <td>{{Math.floor((payoutCompanyFirst /payoutCompanySecond - 1) * 100 || 0)}}%</td>
                        <td>{{Math.floor((payoutCompanyFirst/ totalCompanyFirst) * 100 || 0)}}%</td>
                        <td>{{Math.floor((payoutCompanySecond/ totalCompanySecond) * 100 || 0)}}%</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "parse-centras",

        data() {
            return {
                premium_first: this.companyData.premium_first,
                premium_second: this.companyData.premium_second,
                payout_first: this.companyData.payout_first,
                payout_second: this.companyData.payout_second,
                ranking: this.companyData.ranking,
                label_first: this.companyData.label_first,
                label_second:this.companyData.label_second
            }

        },

        props: {
            companyData: Object,
        },

        computed: {
            totalCompanyFirst (){
                return Object.values(this.premium_first).reduce(function(sum, elem){
                    return sum + elem
                }, 0);
            },
            totalCompanySecond(){
                return Object.values(this.premium_second).reduce(function (sum,elem) {
                    return sum + elem
                }, 0);
            },
            payoutCompanyFirst(){
                return Object.values(this.payout_first).reduce(function (sum,elem) {
                    return sum + elem
                }, 0);
            },
            payoutCompanySecond(){
                return Object.values(this.payout_second).reduce(function (sum,elem) {
                    return sum + elem
                }, 0);
            },
        },
    }
</script>

<style scoped>

</style>
