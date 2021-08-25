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
                    <tr v-for="(item,index) in companyData.companyList" v-if="!!companyData.ranking[index]">
                        <td><span>{{index}}</span></td>
                        <td>{{(companyData.ranking[index])}}</td>
                        <td class="text-left"><span class="bold">{{item}}</span></td>
                        <td>{{(companyData.premium_first[index] || 0) | numberFormat}}</td>
                        <td>{{(companyData.premium_second[index] || 0) | numberFormat}}</td>

                        <!--Это проценты 'Доля Мар 2021'-->
                        <td>{{Math.floor((companyData.premium_first[index] /totalCompanyFirst) * 100 || 0)}}%</td>
                        <!--Это проценты 'Доля Мар 2020'-->
                        <td>{{Math.floor((companyData.premium_second[index] /totalCompanySecond) * 100 || 0)}}%</td>
                        <!--Изм %-->
                        <td>{{Math.floor((companyData.premium_first[index] /companyData.premium_second[index] - 1) * 100 || 0)}}%</td>
                        <!--Изм сумма-->
                        <td>{{(companyData.premium_first[index] - companyData.premium_second[index] || 0) | numberFormat}}</td>
                        <td></td>
                        <!--Мар 2021-->
                        <td>{{(companyData.payout_first[index] || 0) | numberFormat}}</td>
                        <!--Мар 2020-->
                        <td>{{(companyData.payout_second[index] || 0) | numberFormat}}</td>
                        <!--Изм %-->
                        <td>{{Math.floor((companyData.payout_first[index] /companyData.payout_second[index] - 1) * 100 || 0)}}%</td>
                        <!--Мар 2021 проценты-->
                        <td>{{Math.floor((companyData.payout_first[index] / companyData.premium_first[index]) * 100 || 0)}}%</td>
                        <!--Мар 2020 проценты-->
                        <td>{{Math.floor((companyData.payout_second[index] / companyData.premium_second[index]) * 100 || 0)}}%</td>
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
        <td colspan="3" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
        <td></td>
        <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
            </tr>
            <tr>
            <td class="text-left">Классы</td>
            <td>{{label_first}}</td>
            <td>{{label_second}}</td>
            <td>Доля {{label_first}}</td>
            <td>Доля {{label_second}}</td>
            <td>Изм %</td>
            <td>Изм сумма</td>
            <td class="bg-grayblue"></td>
            <td>{{label_first}}</td>
            <td>{{label_second}}</td>
            <td>Изм %</td>
            <td>{{label_first}}</td>
            <td>{{label_second}}</td>
            </tr>
        </thead>
        <tbody>
        <tr v-for="(item, index) in changeArr" :class="textStyle(index)">
            <td class="text-left">{{item}}</td>
            <td>{{(PremiumFirst[index] || 0) | numberFormat}}</td>
            <td>{{(PremiumSecond[index] || 0) | numberFormat}}</td>
            <td>{{Math.floor((PremiumFirst[index] /totalClassFirst) * 100 || 0)}}%</td>
            <td>{{Math.floor((PremiumSecond[index] /totalClassSecond) * 100 || 0)}}%</td>

            <td>{{Math.floor((PremiumFirst[index] /PremiumSecond[index] - 1) * 100 || 0)}}%</td>
            <td>{{(PremiumFirst[index] - PremiumSecond[index] || 0) | numberFormat}}</td>
            <td class="bg-grayblue"></td>

            <td>{{(PayoutFirst[index] || 0) | numberFormat}}</td>
            <td>{{(PayoutSecond[index] || 0) | numberFormat}}</td>
            <td>{{Math.floor((PayoutFirst[index] /PayoutSecond[index] - 1) * 100 || 0) }}%</td>

            <td>{{Math.floor(PayoutFirst[index] /PremiumFirst[index] * 100 || 0)}}%</td>
            <td>{{Math.floor(PayoutSecond[index] /PremiumSecond[index] * 100 || 0)}}%</td>
        </tr>
        <tr>
            <td>Итого</td>
            <td>{{totalClassFirst | numberFormat}}</td>
            <td>{{totalClassSecond | numberFormat}}</td>
            <td></td>
            <td></td>
            <td>{{Math.floor((totalClassFirst/totalClassSecond - 1) * 100 || 0)}}%</td>
            <td>{{totalClassFirst - totalClassSecond | numberFormat}}</td>
            <td></td>
            <td>{{payoutClassFirst | numberFormat}}</td>
            <td>{{payoutClassSecond | numberFormat}}</td>
            <td>{{Math.floor((payoutClassFirst /payoutClassSecond - 1) * 100 || 0)}}%</td>
            <td>{{Math.floor((payoutClassFirst/ totalClassFirst) * 100 || 0)}}%</td>
            <td>{{Math.floor((totalClassSecond/ totalClassSecond) * 100 || 0)}}%</td>
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
        name: "top-company",
        data() {
            return {
                labels : ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек',],
                viewType: 'company',
                productArr:[],
                productKey:[],
                productValue:[],

                sumPF: [],
                class_pf1: [],
                class_pf2: [],
                class_pf3: [],
                productPF: [],

                sumPS: [],
                class_ps1: [],
                class_ps2: [],
                class_ps3: [],
                productPS: [],

                sumPt1: [],
                class_pt1: [],
                class_pt2: [],
                class_pt3: [],
                productPt: [],

                sumPts1: [],
                class_pts1: [],
                class_pts2: [],
                class_pts3: [],
                productPts: [],

            }
        },
        props: {
            companyData: Object,
            parseData: Object,
            periods: Object
        },
        methods: {
            changeView(type) {
                this.viewType = type;
            },

            textStyle(index){
                var textStyle = 'bold fs-0_9 bg-grayblue';
                textStyle = index == 0 || index == 10 || index == 14 ? textStyle : '';
                return textStyle;
            },
        },
        computed: {
            changeArr(){
                this.productKey = (Object.values(this.parseData.insuranceClass));
                this.productValue = (Object.values(this.parseData.productList));

                this.productArr.push(this.productKey[0]);
                this.productArr.push(this.productValue[23],this.productValue[29],this.productValue[24],this.productValue[27],this.productValue[30],
                this.productValue[28],this.productValue[26],this.productValue[25],this.productValue[31]);

                    this.productArr.push(this.productKey[1]);
                    this.productArr.push(this.productValue[1],this.productValue[0],this.productValue[2]);

                    this.productArr.push(this.productKey[2]);
                    this.productArr.push(this.productValue[9],this.productValue[15],this.productValue[3],this.productValue[8],this.productValue[19],
                    this.productValue[5],this.productValue[11],this.productValue[14],this.productValue[16],this.productValue[6],this.productValue[12],
                    this.productValue[4],this.productValue[7],this.productValue[20],this.productValue[10],this.productValue[21],this.productValue[13],
                    this.productValue[22],this.productValue[18],this.productValue[17]);

                    return this.productArr;
            },

            PremiumFirst(){
                this.productPF = (Object.values(this.parseData.premium_first));
                this.class_pf1 = (Object.values(this.parseData.class_sum[1]));
                this.class_pf2 = (Object.values(this.parseData.class_sum[2]));
                this.class_pf3 = (Object.values(this.parseData.class_sum[3]));
                this.sumPF.push(this.class_pf1[0]);

                this.sumPF.push(this.productPF[23],this.productPF[29],this.productPF[24],this.productPF[27],
                    this.productPF[30],this.productPF[28],
                    this.productPF[26],this.productPF[25],this.productPF[31]);

                this.sumPF.push(this.class_pf2[0]);
                this.sumPF.push(this.productPF[1],this.productPF[0],this.productPF[2]);

                this.sumPF.push(this.class_pf3[0]);
                this.sumPF.push(this.productPF[9],this.productPF[15],this.productPF[3],this.productPF[8],
                    this.productPF[19],
                    this.productPF[5],this.productPF[11],this.productPF[14],this.productPF[16],
                    this.productPF[6],this.productPF[12],
                    this.productPF[4],this.productPF[7],this.productPF[20],this.productPF[10],
                    this.productPF[21],this.productPF[13],
                    this.productPF[22],this.productPF[18],this.productPF[17]);

                return this.sumPF;
            },

            PremiumSecond(){
                this.productPS = (Object.values(this.parseData.premium_second));
                this.class_ps1 = (Object.values(this.parseData.class_sum[1]));
                this.class_ps2 = (Object.values(this.parseData.class_sum[2]));
                this.class_ps3 = (Object.values(this.parseData.class_sum[3]));
                this.sumPS.push(this.class_ps1[2]);

                this.sumPS.push(this.productPS[23],this.productPS[29],this.productPS[24],this.productPS[27],
                    this.productPS[30],this.productPS[28],
                    this.productPS[26],this.productPS[25],this.productPS[31]);

                this.sumPS.push(this.class_ps2[2]);
                this.sumPS.push(this.productPS[1],this.productPS[0],this.productPS[2]);

                this.sumPS.push(this.class_ps3[2]);
                this.sumPS.push(this.productPS[9],this.productPS[15],this.productPS[3],this.productPS[8],
                    this.productPS[19],
                    this.productPS[5],this.productPS[11],this.productPS[14],this.productPS[16],
                    this.productPS[6],this.productPS[12],
                    this.productPS[4],this.productPS[7],this.productPS[20],this.productPS[10],
                    this.productPS[21],this.productPS[13],
                    this.productPS[22],this.productPS[18],this.productPS[17]);

                return this.sumPS;
            },

            PayoutFirst(){
                this.productPt = (Object.values(this.parseData.payout_first));
                this.class_pt1 = (Object.values(this.parseData.class_sum[1]));
                this.class_pt2 = (Object.values(this.parseData.class_sum[2]));
                this.class_pt3 = (Object.values(this.parseData.class_sum[3]));
                this.sumPt1.push(this.class_pt1[1]);

                this.sumPt1.push(this.productPt[23],this.productPt[29],this.productPt[24],this.productPt[27],
                    this.productPt[30],this.productPt[28],
                    this.productPt[26],this.productPt[25],this.productPt[31]);

                this.sumPt1.push(this.class_pt2[1]);
                this.sumPt1.push(this.productPt[1],this.productPt[0],this.productPt[2]);

                this.sumPt1.push(this.class_pt3[1]);
                this.sumPt1.push(this.productPt[9],this.productPt[15],this.productPt[3],this.productPt[8],
                    this.productPt[19],
                    this.productPt[5],this.productPt[11],this.productPt[14],this.productPt[16],
                    this.productPt[6],this.productPt[12],
                    this.productPt[4],this.productPt[7],this.productPt[20],this.productPt[10],
                    this.productPt[21],this.productPt[13],
                    this.productPt[22],this.productPt[18],this.productPt[17]);

                return this.sumPt1;
            },

            PayoutSecond(){
                this.productPts = (Object.values(this.parseData.payout_second));
                this.class_pts1 = (Object.values(this.parseData.class_sum[1]));
                this.class_pts2 = (Object.values(this.parseData.class_sum[2]));
                this.class_pts3 = (Object.values(this.parseData.class_sum[3]));
                this.sumPts1.push(this.class_pts1[3]);

                this.sumPts1.push(this.productPts[23],this.productPts[29],this.productPts[24],this.productPts[27],
                    this.productPts[30],this.productPts[28],
                    this.productPts[26],this.productPts[25],this.productPts[31]);

                this.sumPts1.push(this.class_pts2[3]);
                this.sumPts1.push(this.productPts[1],this.productPts[0],this.productPts[2]);

                this.sumPts1.push(this.class_pts3[3]);
                this.sumPts1.push(this.productPts[9],this.productPts[15],this.productPts[3],this.productPts[8],
                    this.productPts[19],
                    this.productPts[5],this.productPts[11],this.productPts[14],this.productPts[16],
                    this.productPts[6],this.productPts[12],
                    this.productPts[4],this.productPts[7],this.productPts[20],this.productPts[10],
                    this.productPts[21],this.productPts[13],
                    this.productPts[22],this.productPts[18],this.productPts[17]);

                return this.sumPts1;
            },

          totalCompanyFirst (){
              return Object.values(this.companyData.premium_first).reduce(function(sum, elem){
                  return sum + elem
              }, 0);
          },
            totalCompanySecond(){
              return Object.values(this.companyData.premium_second).reduce(function (sum,elem) {
                    return sum + elem
              }, 0);
            },
            payoutCompanyFirst(){
                return Object.values(this.companyData.payout_first).reduce(function (sum,elem) {
                    return sum + elem
                }, 0);
            },
            payoutCompanySecond(){
                return Object.values(this.companyData.payout_second).reduce(function (sum,elem) {
                    return sum + elem
                }, 0);
            },


            totalClassFirst (){
                return this.PremiumFirst[0] + this.PremiumFirst[10] + this.PremiumFirst[14];
            },
            totalClassSecond(){
                return this.PremiumSecond[0] + this.PremiumSecond[10] + this.PremiumSecond[14];
            },
            payoutClassFirst(){
                return this.PayoutFirst[0] + this.PayoutFirst[10] + this.PayoutFirst[14];
            },
            payoutClassSecond(){
                return this.PayoutSecond[0] + this.PayoutSecond[10] + this.PayoutSecond[14];
            },

            label_first(){
                return this.labels[this.periods.first_period - 2]+ ' ' + this.periods.first_year;
            },
            label_second(){
                return this.labels[this.periods.second_period - 2]+ ' ' + this.periods.second_year;
            }
        },
    }
</script>

<style scoped>

</style>
