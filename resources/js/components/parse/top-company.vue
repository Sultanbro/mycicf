<template>
<div>
    <div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16" v-if="viewType === 'company'">
        <div class="flex-row jc-sb pr-3 pl-3 vertical-middle flex-row">
            <div class="width100 table-responsive">

                <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0">
                    <thead>
                    <tr class="border-table-0">
                        <td colspan="2" class="text-left fs-1_3 pl-0">{{companyData.label}}</td>
                        <td class="pt-3" @click="changeView('company')"><span :class="viewType === 'company' ? 'pointer parse-active' : 'pointer'">Топ по компаниям</span></td>
                        <td class="pt-3" @click="changeView('class')"><span :class="viewType === 'class' ? 'pointer parse-active' : 'pointer'">Топ по классам</span></td>
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

    <div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16" v-if="viewType === 'class'">
        <div class="flex-row jc-sb pr-3 pl-3 vertical-middle flex-row">
            <div class="width100 table-responsive">

                <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0">
                    <thead>
                    <tr class="border-table-0">
                        <td colspan="2" class="text-left fs-1_3 pl-0">{{parseData.label}}</td>
                        <td class="pt-3" @click="changeView('company')"><span :class="viewType === 'company' ? 'pointer parse-active' : 'pointer'">Топ по компаниям</span></td>
                        <td class="pt-3" @click="changeView('class')"><span :class="viewType === 'class' ? 'pointer parse-active' : 'pointer'">Топ по классам</span></td>
                        <td colspan="5" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                        <td></td>
                        <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
                    </tr>
                    <tr>
                        <th>Класс страхования</th>
                        <th>{{parseData.label_first}}</th>
                        <th>{{parseData.label_second}}</th>
                        <th>доля {{parseData.label_first}}</th>
                        <th>доля {{parseData.label_second}}</th>
                        <th>изм %</th>
                        <th>изм сумма</th>
                        <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                        <th>{{parseData.label_first}}</th>
                        <th>{{parseData.label_second}}</th>
                        <th>% изм</th>
                        <th>{{parseData.label_first}}</th>
                        <th>{{parseData.label_second}}</th>
                    </tr>
                    </thead>
                   <!-- <tbody>
                    <tr  class="fontbold" v-for="(item, index) in parseData.insuranceClassList">
                        <td><strong>{{item}}</strong></td>
                        <td><span>{{(parseData.premium_first[index] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.premium_first[index] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.premium_first[index] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.premium_first[index] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.premium_first[index] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.premium_first[index] || 0) | numberFormat}}</span></td>
                        <td><span></span></td>
                        <td><span>{{(parseData.premium_first[index] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.premium_first[index] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.premium_first[index] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.premium_first[index] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.premium_first[index] || 0) | numberFormat}}</span></td>
                    </tr>
&lt;!&ndash;                    @foreach($premium_first as $product_id => $value)
                    @if(in_array($product_id, $insuranceClassList[$id]))&ndash;&gt;
                    <tr v-for="product_id in parseData.premium_first">

                        <td><span>{{product_id}}>{{parseData.productList[product_id]}}</span></td>
                        <td><span>{{(parseData.premium_first[product_id] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.premium_second[product_id] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.premium_first[product_id] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.premium_second[product_id] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.premium_first[product_id] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.premium_first[product_id] - parseData.premium_second[product_id]  || 0) | numberFormat}}</span></td>
                        <td><span></span></td>
                        <td><span>{{(parseData.payout_first[product_id] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.payout_second[product_id] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.payout_first[product_id] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.payout_second[product_id] || 0) | numberFormat}}</span></td>
                        <td><span>{{(parseData.payout_second[product_id] || 0) | numberFormat}}</span></td>
                    </tr>
                    @endif
                    @endforeach
                    @endforeach
                    <tr>
                        <td><span>ВСЕГО</span></td>
                        <td><span>{{number_format(array_sum($premium_first), 0, '.', ' ')}}</span></td>
                        <td><span>{{number_format(array_sum($premium_second), 0, '.', ' ')}}</span></td>
                        <td><span></span></td>
                        <td><span></span></td>
                        <td><span>{{$controller->getChangedVal(array_sum($premium_first), array_sum($premium_second))}}</span></td>
                        <td><span>{{number_format(array_sum($premium_first)-array_sum($premium_second), 0, '.', ' ')}}</span></td>
                        <td><span></span></td>
                        <td><span>{{number_format(array_sum($payout_first), 0, '.', ' ')}}</span></td>
                        <td><span>{{number_format(array_sum($payout_second), 0, '.', ' ')}}</span></td>
                        <td><span>{{$controller->getChangedVal(array_sum($payout_first), array_sum($payout_second))}}</span></td>
                        <td><span>{{$controller->getPayoutChange(array_sum($payout_first), array_sum($premium_first))}}</span></td>
                        <td><span>{{$controller->getPayoutChange(array_sum($payout_second), array_sum($premium_second))}}</span></td>
                    </tr>
                    </tbody>-->
                </table>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "top-company",
        data() {
            return {
                viewType: 'company',
                premium_first: this.companyData.premium_first,
                premium_second: this.companyData.premium_second,
                payout_first: this.companyData.payout_first,
                payout_second: this.companyData.payout_second,
                ranking: this.companyData.ranking,
                label_first: this.companyData.label_first,
                label_second:this.companyData.label_second,

                periods: {
                    first_year: null,
                    second_year: null,
                    first_period: null,
                    second_period: null,
                },
            }
        },
        props: {
            companyData: Object,
            parseData: Object,
        },
        methods: {

            changeView(type) {
                this.viewType = type;
            },

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
