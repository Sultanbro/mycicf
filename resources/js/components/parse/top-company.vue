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

    <!--<div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16" v-if="viewType === 'class'">
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
                   &lt;!&ndash; <tbody>
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
                    </tbody>&ndash;&gt;
                </table>
            </div>
        </div>
    </div>-->
    <div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16" v-if="viewType === 'class'">
        <div class="flex-row jc-sb pr-3 pl-3 vertical-middle flex-row">
            <div class="width100 table-responsive">
    <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0"><thead>
    <tr class="border-table-0">
        <td colspan="2" class="text-left fs-1_3 pl-0">{{companyData.label}}</td>
        <td class="pt-3" @click="changeView('company')"><span :class="viewType === 'company' ? 'pointer parse-active' : 'pointer'">Топ по компаниям</span></td>
        <td class="pt-3" @click="changeView('class')"><span :class="viewType === 'class' ? 'pointer parse-active' : 'pointer'">Топ по классам</span></td>
        <td colspan="5" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
        <td></td>
        <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
    </tr>

    <tr><td class="text-left">Класс страхования</td> <td>Мар 2020</td> <td>Мар 2020</td> <td>Доля Мар 2020</td> <td>Доля Мар 2020</td> <td>Изм %</td> <td>Изм сумма</td> <td></td> <td>Мар 2020</td> <td>Мар 2020</td> <td>Изм %</td> <td>Мар 2020</td> <td>Мар 2020</td></tr></thead> <tbody><tr><td class="text-left"><strong><a onclick="getCompaniesByClass(1)">Обязательное</a></strong></td> <td>18 746 561</td> <td>18 746 561</td> <td>16%</td> <td>16%</td> <td>0%%</td> <td>0</td> <td></td> <td>8 749 889</td> <td>8 749 889</td> <td>0%</td> <td>46%</td> <td>46%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(24)">ОС ГПО ВТС</a></td> <td>17 301 693</td> <td>17 301 693</td> <td>15%</td> <td>15%</td> <td>0%</td> <td>0</td> <td></td> <td>8 180 120</td> <td>8 180 120</td> <td>0%</td> <td>47%</td> <td>47%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(25)">ОС ГПО ПП</a></td> <td>486 902</td> <td>486 902</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>97 792</td> <td>97 792</td> <td>0%</td> <td>20%</td> <td>20%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(30)">Страхование туриста</a></td> <td>372 844</td> <td>372 844</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>238 105</td> <td>238 105</td> <td>0%</td> <td>63%</td> <td>63%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(28)">ОЭС</a></td> <td>335 335</td> <td>335 335</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(31)">ГПО владельцев опасных объектов</a></td> <td>223 231</td> <td>223 231</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>238</td> <td>238</td> <td>0%</td> <td>-0%</td> <td>-0%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(27)">ОСГПО частных нотариусов</a></td> <td>13 478</td> <td>13 478</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(29)">ОС ГПО аудиторских орг-й</a></td> <td>13 078</td> <td>13 078</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(26)">Страхование в растениеводстве</a></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td> <td>0</td> <td></td> <td>0</td> <td>0</td> <td>0%</td> <td>0</td> <td>0</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(32)">ОСНС</a></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td> <td>0</td> <td></td> <td>233 634</td> <td>233 634</td> <td>0%</td> <td>0</td> <td>0</td></tr> <tr><td class="text-left"><strong><a onclick="getCompaniesByClass(2)">Личное</a></strong></td> <td>17 787 456</td> <td>17 787 456</td> <td>15%</td> <td>15%</td> <td>0%%</td> <td>0</td> <td></td> <td>5 904 418</td> <td>5 904 418</td> <td>0%</td> <td>33%</td> <td>33%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(2)">ДМС</a></td> <td>15 856 541</td> <td>15 856 541</td> <td>14%</td> <td>14%</td> <td>0%</td> <td>0</td> <td></td> <td>5 395 166</td> <td>5 395 166</td> <td>0%</td> <td>34%</td> <td>34%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(1)">НС</a></td> <td>1 930 915</td> <td>1 930 915</td> <td>1%</td> <td>1%</td> <td>0%</td> <td>0</td> <td></td> <td>509 252</td> <td>509 252</td> <td>0%</td> <td>26%</td> <td>26%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(3)">МСТ</a></td> <td>501 259</td> <td>501 259</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>114 746</td> <td>114 746</td> <td>0%</td> <td>22%</td> <td>22%</td></tr> <tr><td class="text-left"><strong><a onclick="getCompaniesByClass(3)">Имущественное</a></strong></td> <td>75 305 607</td> <td>75 305 607</td> <td>67%</td> <td>67%</td> <td>0%%</td> <td>0</td> <td></td> <td>46 492 696</td> <td>46 492 696</td> <td>0%</td> <td>61%</td> <td>61%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(10)">ДС имущества</a></td> <td>49 776 305</td> <td>49 776 305</td> <td>44%</td> <td>44%</td> <td>0%</td> <td>0</td> <td></td> <td>3 233 607</td> <td>3 233 607</td> <td>0%</td> <td>6%</td> <td>6%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(4)">КАСКО</a></td> <td>6 615 085</td> <td>6 615 085</td> <td>5%</td> <td>5%</td> <td>0%</td> <td>0</td> <td></td> <td>1 932 354</td> <td>1 932 354</td> <td>0%</td> <td>29%</td> <td>29%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(20)">ДС от ПФУ</a></td> <td>5 862 070</td> <td>5 862 070</td> <td>5%</td> <td>5%</td> <td>0%</td> <td>0</td> <td></td> <td>38 842 872</td> <td>38 842 872</td> <td>0%</td> <td>662%</td> <td>662%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(16)">ДГПО</a></td> <td>4 703 713</td> <td>4 703 713</td> <td>4%</td> <td>4%</td> <td>0%</td> <td>0</td> <td></td> <td>90 079</td> <td>90 079</td> <td>0%</td> <td>1%</td> <td>1%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(6)">ДС воздушного транспорта</a></td> <td>2 491 581</td> <td>2 491 581</td> <td>2%</td> <td>2%</td> <td>0%</td> <td>0</td> <td></td> <td>1 088 387</td> <td>1 088 387</td> <td>0%</td> <td>43%</td> <td>43%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(9)">ДС грузов</a></td> <td>1 394 639</td> <td>1 394 639</td> <td>1%</td> <td>1%</td> <td>0%</td> <td>0</td> <td></td> <td>70 564</td> <td>70 564</td> <td>0%</td> <td>5%</td> <td>5%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(7)">ДС водного транспорта</a></td> <td>941 860</td> <td>941 860</td> <td>0%</td> <td>0%</td> <td>0%</td> <td>0</td> <td></td> <td>18 763</td> <td>18 763</td> <td>0%</td> <td>1%</td> <td>1%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(15)">Профессиональная ответственность</a></td> <td>729 611</td> <td>729 611</td> <td>0%</td> <td>0%</td> <td>0%</td> <td>0</td> <td></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(8)">ДС космических объектов</a></td> <td>687 320</td> <td>687 320</td> <td>0%</td> <td>0%</td> <td>0%</td> <td>0</td> <td></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(12)">ДГПО воздушного транспорта</a></td> <td>623 493</td> <td>623 493</td> <td>0%</td> <td>0%</td> <td>0%</td> <td>0</td> <td></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(13)">ДГПО водного транспорта</a></td> <td>433 063</td> <td>433 063</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(21)">ДС убытков финансовых организаций</a></td> <td>298 655</td> <td>298 655</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(5)">ДС ЖД транспорта</a></td> <td>294 944</td> <td>294 944</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>45 485</td> <td>45 485</td> <td>0%</td> <td>15%</td> <td>15%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(11)">ДГПО Авто</a></td> <td>234 527</td> <td>234 527</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>27 269</td> <td>27 269</td> <td>0%</td> <td>11%</td> <td>11%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(17)">страхование займов</a></td> <td>119 274</td> <td>119 274</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>1 143 316</td> <td>1 143 316</td> <td>0%</td> <td>958%</td> <td>958%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(22)">Титульное страхование</a></td> <td>74 186</td> <td>74 186</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(14)">ДГПО влад.космич.объектов</a></td> <td>12 857</td> <td>12 857</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(23)">Страхование судебных расходов</a></td> <td>12 424</td> <td>12 424</td> <td>-0%</td> <td>-0%</td> <td>0%</td> <td>0</td> <td></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(19)">страхование гарантий</a></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td> <td>0</td> <td></td> <td>0</td> <td>0</td> <td>0%</td> <td>0</td> <td>0</td></tr> <tr><td class="text-left"><a onclick="getCompaniesByProduct(18)">ипотечное страхование</a></td> <td>0</td> <td>0</td> <td>0%</td> <td>0%</td> <td>0%</td> <td>0</td> <td></td> <td>0</td> <td>0</td> <td>0%</td> <td>0</td> <td>0</td></tr> <tr><td class="bold text-left fs-0_9">Итого</td> <td>111 839 624</td> <td>111 839 624</td> <td></td> <td></td> <td>0%</td> <td>0</td> <td></td> <td>61 261 749</td> <td>61 261 749</td> <td>0%</td> <td>54%</td> <td>54%</td></tr></tbody></table></div></div>
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
