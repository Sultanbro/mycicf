<template>
    <div class="CI-company">
        <div>
            <parse-top :periods="periods" :months="months" :years="years" :request="request" :getData="showNewData"></parse-top>
        </div>
        <div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16">
            <div class="flex-row jc-sb pr-3 pl-3 vertical-middle flex-row">
                <div class="width100 table-responsive">
                    <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0">
                        <thead>
                        <tr class="border-table-0">
                            <td colspan="2" class="text-left fs-1_3 pl-0">label</td>
                            <td class="pt-3"><span class="pointer parse-active">Топ по компаниям</span></td>
                            <td class="pt-3"><a><span class="pointer">Топ по классам</span></a></td>
                            <td colspan="5" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                            <td></td>
                            <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-left">Компания</td>
                            <td>label_first</td>
                            <td>label_second</td>
                            <td>Доля label_first</td>
                            <td>Доля label_second</td>
                            <td>Изм %</td>
                            <td>Изм сумма</td>
                            <td></td>
                            <td>label_first</td>
                            <td>label_second</td>
                            <td>Изм %</td>
                            <td>label_first</td>
                            <td>label_second</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><span>123</span></td>
                            <td>ranking[]</td>
                            <td class="text-left"><span class="bold"><a>companyList[]</a></span></td>
                            <td>key</td>
                            <td>premium_second</td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>premium_second</td>
                            <td>premium_second</td>
                            <td></td>
                            <td>payout_first</td>
                            <td>payout_second</td>
                            <td>payout_first</td>
                            <td>premium_first</td>
                            <td>premium_first</td>
                        </tr>
                        <tr>
                            <td><span></span></td>
                            <td><span></span></td>
                            <td><span class="bold">Итого</span></td>
                            <td>premium_first</td>
                            <td>premium_first</td>
                            <td></td>
                            <td></td>
                            <td>premium_first</td>
                            <td>premium_first</td>
                            <td></td>
                            <td>premium_first</td>
                            <td>premium_first</td>
                            <td>premium_first</td>
                            <td>premium_first</td>
                            <td>premium_first</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>















<!--        <div class="bg-white pl-3 pr-3 mt-3 mb-3 box-shadow border-16">
            <div class="d-flex justify-content-between align-items-center pr-3 pl-3">
                <div class="w-100 table-responsive">
                    <table class="table table-hover text-align-center fs-0_8">
                        <thead>
                        <tr class="border-table-0">
                            <td class="text-left" colspan="4">
                                <div class="d-flex align-items-center pt-1 pb-1">
                                    <h5 class="m-0 p-0">Centras Insurance</h5>
                                </div>
                            </td>
                            <td></td>
                            <td class="text-left" colspan="3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <button class="d-flex align-items-center pt-1 pb-1 pl-2 pr-2 custom-primary-button">
                                            <i class="fas fa-angle-left m-0 fs-1_1"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-center pt-1 pb-1">
                                        <h5 class="m-0">Centras Insurance</h5>
                                    </div>
                                    <div>
                                        <button class="d-flex align-items-center p-1 pb-1 pl-2 pr-2 custom-primary-button">
                                            <i class="fas fa-angle-right m-0 fs-1_1"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td></td>
                            <td class="text-left" colspan="3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <button class="d-flex align-items-center pt-1 pb-1 pl-2 pr-2 custom-primary-button">
                                            <i class="fas fa-angle-left m-0 fs-1_1"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-center pt-1 pb-1">
                                        <h5 class="m-0">Centras Insurance</h5>
                                    </div>
                                    <div>
                                        <button class="d-flex align-items-center p-1 pb-1 pl-2 pr-2 custom-primary-button">
                                            <i class="fas fa-angle-right m-0 fs-1_1"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-grayblue color-light-gray">
                            <td>123</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-left">Centras Insurance</td>
                            <td>Centras Insurance<span>Centras Insurance</span></td>
                            <td>Centras Insurance<span>Centras Insurance</span></td>
                            <td>Centras Insurance<span>Centras Insurance</span></td>
                            <td class="bg-grayblue"></td>
                            <td>Centras Insurance<span>Centras Insurance</span></td>
                            <td>Centras Insurance<span>Centras Insurance</span></td>
                            <td>Centras Insurance<span>Centras Insurance</span></td>
                            <td class="bg-grayblue"></td>
                            <td>Centras Insurance<span>Centras Insurance</span></td>
                            <td>Centras Insurance<span>Centras Insurance</span></td>
                            <td>Centras Insurance<span>Centras Insurance</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>-->
    </div>
</template>

<script>
    import ParseTop from './parse-top'
    import ParseOpu from './parse-opu'
    export default {
        name: "top-company",
        components:{
            ParseOpu,
            ParseTop,
        },
        data(){
            return {
                periods: {
                    first_year: 2019,
                    second_year: 2018,
                    first_period: 1,
                    second_period: 12,
                },
                months: [],
                years: [],
            }
        },
        props: {
            request: Object
        },
        methods: {
            showNewData(){
                this.getOpuData('new_date');
            },
        }
    }
</script>

<style scoped>
.CI-company {
}
</style>
