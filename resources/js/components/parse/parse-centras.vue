<template>
    <div class="bg-white mt-4 pl-3 pr-3 box-shadow border-16">
        <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0">
            <thead>
            <tr class="border-table-0">
                <td colspan="2" class="text-left fs-1_3 pl-0">Компания</td>
                <td colspan="5" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                <td></td>
                <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="text-left">Департамент</td>
                <td>ДСД</td>
                <td>АВ</td>
                <td>Нетто выплаты</td>
                <td>КВ</td>
                <td>Изм %</td>
                <td>Изм сумма</td>
                <td></td>
                <td>АВ</td>
                <td>КВ</td>
                <td>Изм %</td>
                <td>Сборы</td>
                <td>Исполнение</td>
            </tr>
            </thead>

            <tbody>
            <!--ДКС-->
            <tr @click="dks">
                <td><span></span></td>
                <td></td>
                <td class="text-left"><span class="bold">ДКС</span></td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dksBranch">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.dks.emplName || 'Данных нет'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dksBranch" @click="uks1Manager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.uks1.deptName || 'Данных нет'*/ 'Управление корпоративного страхования №1'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="uks1" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.uks1.emplName || 'Данных по менеджеру нет' }}</td>
                <td>{{oracleData.uks1.DSD || 0}}</td>
                <td>{{oracleData.uks1.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dksBranch" @click="uks2Manager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.uks2.deptName || 'Данных нет'*/ 'Управление корпоративного страхования №2'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="uks2" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.uks2.emplName || 'Данных по менеджеру нет'}}</td>
                <td>{{oracleData.uks2.DSD || 0}}</td>
                <td>{{oracleData.uks2.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dksBranch" @click="uks3Manager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.uks3.deptName || 'Данных нет'*/ 'Управление корпоративного страхования №3'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="uks3" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.uks3.emplName || 'Данных по менеджеру нет'}}</td>
                <td>{{oracleData.uks3.DSD || 0}}</td>
                <td>{{oracleData.uks3.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dksBranch" @click="uks4Manager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.uks4.deptName || 'Данных нет'*/ 'Управление корпоративного страхования №4'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="uks4" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.uks4.emplName || 'Данных по менеджеру нет'}}</td>
                <td>{{oracleData.uks4.DSD || 0}}</td>
                <td>{{oracleData.uks4.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dksBranch" @click="ukrManager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.ukr.deptName || 'Данных нет'*/ 'Управление корпоративного развития'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="ukr" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.ukr.emplName || 'Данных по менеджеру нет'}}</td>
                <td>{{oracleData.ukr.DSD || 0}}</td>
                <td>{{oracleData.ukr.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>

            <!--ДСП-->
            <tr @click="dsp">
                <td><span></span></td>
                <td></td>
                <td class="text-left"><span class="bold">ДСП</span></td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dspBranch">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.dsp.emplName || 'Данных нет'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dspBranch" @click="almatyManager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.almaty.deptName || 'Данных нет'*/ 'Филиал по г.Алматы'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="almaty" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.almaty.emplName || 'Данных по менеджеру нет' }}</td>
                <td>{{oracleData.almaty.DSD || 0}}</td>
                <td>{{oracleData.almaty.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dspBranch" @click="uapManager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.uap.deptName || 'Данных нет'*/ 'Управление активных продаж'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="uap">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.uap.emplName || 'Данных по менеджеру нет' }}</td>
                <td>{{oracleData.uap.DSD || 0}}</td>
                <td>{{oracleData.uap.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dspBranch" @click="us1Manager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.us1.deptName || 'Данных нет'*/ 'Управление страхования №1'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="us1" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.us1.emplName || 'Данных по менеджеру нет'}}</td>
                <td>{{oracleData.us1.DSD || 0}}</td>
                <td>{{oracleData.us1.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dspBranch" @click="us2Manager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.us2.deptName || 'Данных нет'*/ 'Управление страхования №2'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="us2" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.us2.emplName || 'Данных по менеджеру нет'}}</td>
                <td>{{oracleData.us2.DSD || 0}}</td>
                <td>{{oracleData.us2.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dspBranch" @click="us3Manager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.us3.deptName || 'Данных нет'*/ 'Управление страхования №3'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="us3" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.us3.emplName || 'Данных по менеджеру нет'}}</td>
                <td>{{oracleData.us3.DSD || 0}}</td>
                <td>{{oracleData.us3.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dspBranch" @click="us4Manager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.us4.deptName || 'Данных нет'*/ 'Управление страхования №4'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="us4" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.us4.emplName || 'Данных по менеджеру нет'}}</td>
                <td>{{oracleData.us4.DSD || 0}}</td>
                <td>{{oracleData.us4.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dspBranch" @click="us5Manager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.us5.deptName || 'Данных нет'*/ 'Управление страхования №5'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="us5" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.us5.emplName || 'Данных по менеджеру нет'}}</td>
                <td>{{oracleData.us5.DSD || 0}}</td>
                <td>{{oracleData.us5.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dspBranch" @click="us6Manager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.us6.deptName || 'Данных нет'*/ 'Управление страхования №6'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="us6" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.us6.emplName || 'Данных по менеджеру нет'}}</td>
                <td>{{oracleData.us6.DSD || 0}}</td>
                <td>{{oracleData.us6.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dspBranch" @click="us7Manager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.us7.deptName || 'Данных нет'*/ 'Управление страхования №7'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="us7" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.us7.emplName || 'Данных по менеджеру нет'}}</td>
                <td>{{oracleData.us7.DSD || 0}}</td>
                <td>{{oracleData.us7.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>

            <!--ДРПО-->
            <tr @click="drpo">
                <td><span></span></td>
                <td></td>
                <td class="text-left"><span class="bold">ДРПО</span></td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="drpoBranch">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.drpo.emplName || 'Данных нет'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="drpoBranch" @click="uppManager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{/*oracleData.almaty.deptName || 'Данных нет'*/ 'Управление партнерских продаж'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="upp" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.upp.emplName || 'Данных по менеджеру нет' }}</td>
                <td>{{oracleData.upp.DSD || 0}}</td>
                <td>{{oracleData.upp.comissionProc || 0}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>

            <!--ДП-->
            <tr @click="dp">
                <td><span></span></td>
                <td></td>
                <td class="text-left"><span class="bold">ДП</span></td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="dpBranch">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.dp.emplName || 'Данных нет'}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>

            <!--Филиалы-->
            <tr @click="firstBranch">
                <td><span></span></td>
                <td></td>
                <td class="text-left"><span class="bold">Филиалы</span></td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <!--Актобе-->
            <tr v-if="showBranches" @click="aktobeManager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.aktobe.deptName}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="aktobe" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.aktobe.emplName}}</td>
                <td>{{oracleData.aktobe.DSD}}</td>
                <td>{{oracleData.aktobe.comissionProc}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <!--Нур-Султан-->
            <tr v-if="showBranches" @click="nur_sultanManager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.nur_sultan.deptName}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="nur_sultan" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.nur_sultan.emplName}}</td>
                <td>{{oracleData.nur_sultan.DSD}}</td>
                <td>{{oracleData.nur_sultan.comissionProc}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <!--Шымкент-->
            <tr v-if="showBranches" @click="shymkentManager">
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.shym.deptName}}</td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="shymkent" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.shym.emplName}}</td>
                <td>{{oracleData.shym.DSD}}</td>
                <td>{{oracleData.shym.comissionProc}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>

            <!--kupipolis-->
            <tr @click="kupipolisWeb">
                <td><span></span></td>
                <td></td>
                <td class="text-left"><span class="bold">kupipolis</span></td>
                <td>4</td>
                <td>5</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr v-if="polisBranch" >
                <td><span>1</span></td>
                <td>2</td>
                <td class="text-left">{{oracleData.kupipolis.emplName}}</td>
                <td>{{oracleData.kupipolis.DSD}}</td>
                <td>{{oracleData.kupipolis.comissionProc}}</td>
                <!--Это проценты 'Доля Мар 2021'-->
                <td>%</td>
                <!--Это проценты 'Доля Мар 2020'-->
                <td>%</td>
                <!--Изм %-->
                <td>%</td>
                <!--Изм сумма-->
                <td></td>
                <td></td>
                <!--Мар 2021-->
                <td></td>
                <!--Мар 2020-->
                <td></td>
                <!--Изм %-->
                <td>%</td>
                <!--Мар 2021 проценты-->
                <td>%</td>
                <!--Мар 2020 проценты-->
                <td>%</td>
            </tr>
            <tr>
                <td>Итог</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>


<script>
 export default {
        name: "parse-centras",
        props: {
            oracleData: Object,
        },
        data() {
            return {
                search: '',
                options: {},
                typeFilter: 'all',
                /*ДКС*/
                dksBranch: false,
                uks1: false,
                uks2: false,
                uks3: false,
                uks4: false,
                ukr: false,

                /*ДСП*/
                dspBranch: false,
                almaty: false,
                uap: false,
                us1: false,
                us2: false,
                us3: false,
                us4: false,
                us5: false,
                us6: false,
                us7: false,
                /*ДРПО*/
                drpoBranch: false,
                upp: false,

                /*ДП*/
                dpBranch: false,

                /*Филиалы*/
                showBranches: false,
                aktobe: false,
                nur_sultan: false,
                shymkent: false,

                /*kupipolis*/
                polisBranch: false,


            }
        },
        methods: {
            dks(){
                this.dksBranch = !this.dksBranch;
            },
            dksManager() {
                this.dksDept = !this.dksDept;
            },
            uks1Manager() {
                this.uks1 = !this.uks1;
            },
            uks2Manager() {
                this.uks2 = !this.uks2;
            },
            uks3Manager() {
                this.uks3 = !this.uks3;
            },
            uks4Manager() {
                this.uks4 = !this.uks3;
            },
            ukrManager() {
                this.ukr = !this.ukr;
            },

            /*ДСП*/
            dsp(){
                this.dspBranch = !this.dspBranch;
            },
            almatyManager() {
                this.almaty = !this.almaty;
            },
            uapManager() {
                this.uap = !this.uap;
            },
            us1Manager() {
                this.us1 = !this.us1;
            },
            us2Manager() {
                this.us2 = !this.us2;
            },
            us3Manager() {
                this.us3 = !this.us3;
            },
            us4Manager() {
                this.us4 = !this.us4;
            },
            us5Manager() {
                this.us5 = !this.us5;
            },
            us6Manager() {
                this.us6 = !this.us6;
            },
            us7Manager() {
                this.us7 = !this.us7;
            },

            /*ДРПО*/
            drpo(){
                this.drpoBranch = !this.drpoBranch;
            },
            uppManager() {
                this.upp = !this.upp;
            },

            /*ДП*/
            dp(){
                this.dpBranch = !this.dpBranch;
            },

            /*Филиалы*/
            firstBranch() {
                this.showBranches = !this.showBranches;
            },
            aktobeManager() {
                this.aktobe = !this.aktobe;
            },
            nur_sultanManager() {
                this.nur_sultan = !this.nur_sultan;
            },
            shymkentManager() {
                this.shymkent = !this.shymkent;
            },

            /*kupipolis*/
            kupipolisWeb() {
                this.polisBranch = !this.polisBranch;
            },

        }
 }

</script>
