<template>
<div>

        <div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16" >
            <div class="flex-row jc-sb pr-3 pl-3 vertical-middle flex-row">
                <div class="width100 table-responsive">

                    <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0" v-show="viewType === 'market'">
                        <thead>
                        <tr class="border-table-0">
                            <td colspan="2" class="text-left fs-1_3 pl-0">{{companyData.label}}</td>
                            <td class="pt-3" @click="topCompany()"><span :class="viewType === 'market' ? 'pointer parse-active' : 'pointer'">Топ по компаниям</span></td>
                            <td class="pt-3" @click="topClass()" ><span :class="viewType === 'company' ? 'pointer parse-active' : 'pointer'">Топ по классам</span></td>
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
                            <td class="text-left"><span class="bold" @click="getCompany(index)" >{{item}}</span></td>
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

                    <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0" v-if="viewType === 'company'">
                        <thead>
                        <tr class="border-table-0">
                            <td colspan="2" class="text-left fs-1_3 pl-0" >{{parseData.label}}</td>
                            <td class="pt-3" @click="topCompany()"><span :class="viewType === 'market' ? 'pointer parse-active' : 'pointer'">Топ по компаниям</span></td>
                            <td class="pt-3" @click="topClass()"><span :class="viewType === 'company' ? 'pointer parse-active' : 'pointer'">Топ по классам</span></td>
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
                        <tr v-for="(item, index) in parseData.productArrList" :class="textStyle(index)">
                            <td class="text-left" @click="getClassProduct(index)">{{item}}</td>
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
                            <td><span class="bold-text">Итого</span></td>
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

                    <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0" v-if="viewType === 'class'">
                        <thead>
                        <tr class="border-table-0">
                            <td colspan="2" class="text-left fs-1_3 pl-0" >{{productData.label}}</td>
                            <td class="pt-3" @click="topCompany()"><span :class="viewType === 'market' ? 'pointer parse-active' : 'pointer'">Топ по компаниям</span></td>
                            <td class="pt-3"  @click="topClass()" ><span :class="viewType === 'company' ? 'pointer parse-active' : 'pointer'">Топ по классам</span></td>
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
                        <tr v-for="(item,index) in classData.companyList" v-if="!!classData.ranking[index]">
                            <td><span>{{index}}</span></td>
                            <td>{{(classData.ranking[index])}}</td>
                            <td class="text-left"><span class="bold" @click="backCompany(index)">{{item}}</span></td>
                            <td>{{(classData.premium_first[index] || 0) | numberFormat}}</td>
                            <td>{{(classData.premium_second[index] || 0) | numberFormat}}</td>

                            <!--Это проценты 'Доля Мар 2021'-->
                            <td>{{Math.floor((classData.premium_first[index] /totalCompanyFirst) * 100 || 0)}}%</td>
                            <!--Это проценты 'Доля Мар 2020'-->
                            <td>{{Math.floor((classData.premium_second[index] /totalCompanySecond) * 100 || 0)}}%</td>
                            <!--Изм %-->
                            <td>{{Math.floor((classData.premium_first[index] /classData.premium_second[index] - 1) * 100 || 0)}}%</td>
                            <!--Изм сумма-->
                            <td>{{(classData.premium_first[index] - classData.premium_second[index] || 0) | numberFormat}}</td>
                            <td></td>
                            <!--Мар 2021-->
                            <td>{{(classData.payout_first[index] || 0) | numberFormat}}</td>
                            <!--Мар 2020-->
                            <td>{{(classData.payout_second[index] || 0) | numberFormat}}</td>
                            <!--Изм %-->
                            <td>{{Math.floor((classData.payout_first[index] /classData.payout_second[index] - 1) * 100 || 0)}}%</td>
                            <!--Мар 2021 проценты-->
                            <td>{{Math.floor((classData.payout_first[index] / classData.premium_first[index]) * 100 || 0)}}%</td>
                            <!--Мар 2020 проценты-->
                            <td>{{Math.floor((classData.payout_second[index] / classData.premium_second[index]) * 100 || 0)}}%</td>
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

                    <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0" v-if="viewType === 'product'">
                        <thead>
                        <tr class="border-table-0">
                            <td colspan="2" class="text-left fs-1_3 pl-0" >{{productData.label}}</td>
                            <td class="pt-3" @click="topCompany()"><span :class="viewType === 'market' ? 'pointer parse-active' : 'pointer'">Топ по компаниям</span></td>
                            <td class="pt-3"  @click="topClass()" ><span :class="viewType === 'company' ? 'pointer parse-active' : 'pointer'">Топ по классам</span></td>
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
                        <tr v-for="(item,index) in productData.companyList" v-if="!!productData.ranking[index]">
                            <td><span>{{index}}</span></td>
                            <td>{{(productData.ranking[index])}}</td>
                            <td class="text-left"><span class="bold" @click="backCompany(index)">{{item}}</span></td>
                            <td>{{(productData.premium_first[index] || 0) | numberFormat}}</td>
                            <td>{{(productData.premium_second[index] || 0) | numberFormat}}</td>

                            <!--Это проценты 'Доля Мар 2021'-->
                            <td>{{Math.floor((productData.premium_first[index] /totalCompanyFirst) * 100 || 0)}}%</td>
                            <!--Это проценты 'Доля Мар 2020'-->
                            <td>{{Math.floor((productData.premium_second[index] /totalCompanySecond) * 100 || 0)}}%</td>
                            <!--Изм %-->
                            <td>{{Math.floor((productData.premium_first[index] /productData.premium_second[index] - 1) * 100 || 0)}}%</td>
                            <!--Изм сумма-->
                            <td>{{(productData.premium_first[index] - productData.premium_second[index] || 0) | numberFormat}}</td>
                            <td></td>
                            <!--Мар 2021-->
                            <td>{{(productData.payout_first[index] || 0) | numberFormat}}</td>
                            <!--Мар 2020-->
                            <td>{{(productData.payout_second[index] || 0) | numberFormat}}</td>
                            <!--Изм %-->
                            <td>{{Math.floor((productData.payout_first[index] /productData.payout_second[index] - 1) * 100 || 0)}}%</td>
                            <!--Мар 2021 проценты-->
                            <td>{{Math.floor((productData.payout_first[index] / productData.premium_first[index]) * 100 || 0)}}%</td>
                            <!--Мар 2020 проценты-->
                            <td>{{Math.floor((productData.payout_second[index] / productData.premium_second[index]) * 100 || 0)}}%</td>
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
</div>
</template>

<script>
    export default {
        name: "top-company",
        data() {
            return {
                labels : ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек',],
                viewType: 'market',
                companyId: 0,
                productId: 0,
                classId: 0,
                title: '',
                parseData: null,
                classData: null,
                productData: null,

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
            periods: Object,
        },
        methods: {

            async getCompanyTopSum() {
                let response = await this.axios.get('/parse/company/product', {
                    params: {
                        company_list: this.first_company_list,
                        first_year: this.periods.first_year,
                        second_year: this.periods.second_year,
                        first_period: this.periods.first_period -1,
                        second_period: this.periods.second_period - 1,
                        companyId: this.companyId,
                    }
                });

                if(response.data.success) {
                    this.parseData = response.data.data;
                }
            },

            async getClassTopSum() {
                let response = await this.axios.get('/parse/company/icompany', {
                    params: {
                        company_list: this.first_company_list,
                        first_year: this.periods.first_year,
                        second_year: this.periods.second_year,
                        first_period: this.periods.first_period -1,
                        second_period: this.periods.second_period -1,
                        dateType: this.type,
                        disc: this.discount,
                        classId: this.classId,
                        classData: this.classData,
                    }
                });
                if (response.data.success) {
                    this.classData = response.data.data;
                }
            },

            async getProductTopSum() {
                let response = await this.axios.get('/parse/company/icompany', {
                    params: {
                        company_list: this.first_company_list,
                        first_year: this.periods.first_year,
                        second_year: this.periods.second_year,
                        first_period: this.periods.first_period -1,
                        second_period: this.periods.second_period -1,
                        dateType: this.type,
                        disc: this.discount,
                        productId: this.productId,
                        productData: this.productData,
                    }
                });
                if (response.data.success) {
                    this.productData = response.data.data;
                }
            },

            backCompany(index){
                return this.viewType = 'market';
            },

            async getCompany(index){
                this.companyId = index;
                this.getCompanyTopSum();
                this.viewType = 'company';
            },
            async getClassProduct(index){
                if(index === 1 || index === 10 || index === 14){
                    this.getClass(index);
                }else {
                    this.getProduct(index);
                }
            },
            async getClass(index){
                if(index === 10){
                    this.classId = 2;
                }else if(index === 14){
                    this.classId = 3
                }else if(index === 1){
                    return this.classId = 3
                }
                this.getClassTopSum();
                return  this.viewType = 'class';
            },

            async getProduct(index) {
                if(index === 10){
                    this.productId = 0;
                }else if(index === 14){
                    this.productId = 0;
                }
                else if(index === 1){
                    this.productId = 0;
                } else {
                    this.productId = index;
                }
                this.getProductTopSum();
                this.viewType = 'product';
            },
            topCompany(){
                return this.viewType = 'market';
            },
            topClass(){
                return this.viewType = 'class';
            },
            textStyle(index){
                var textStyle = 'bold fs-0_9 bg-grayblue';
                textStyle = index == 1 || index == 10 || index == 14 ? textStyle : '';
                return textStyle;
            },
        },

        computed: {
/*            label(){
                let keyArr = Object.keys(this.parseData.productArrList);

                for(let i=0; i < keyArr.length; i++){
                    if(this.companyId === keyArr[i]){
                        this.companyId;
                    }else if(this.companyId !== keyArr[i]) {
                        this.companyId = keyArr[i];
                    }
                  else  if(this.productId ===  keyArr[i]){
                        this.productId;
                    }else if(this.productId !== keyArr[i]) {
                       this.productId = keyArr[i];
                    }
                }
            },*/
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
                return this.labels[this.periods.first_period  - 2]+ ' ' + this.periods.first_year;
            },
            label_second(){
                return this.labels[this.periods.second_period - 2]+ ' ' + this.periods.second_year;
            }
        },
    }
</script>

<style scoped>

</style>
