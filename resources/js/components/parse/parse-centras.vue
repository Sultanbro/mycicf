<template>
    <div class="bg-white mt-4 pl-3 pr-3 box-shadow border-16">
        <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0">
            <thead>
            <tr class="border-table-0">
                <td colspan="2" class="text-left fs-1_3 pl-5">Сентрас Иншуранс</td>
                <td></td>
                <td></td>
                <td colspan="5" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                <td></td>
                <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
            </tr>
            <tr>
                <td class="empty-td"></td>
                <td class="text-left">Департамент</td>
                <td>ДСД</td>
                <td>АВ</td>
                <td>Нетто выплаты</td>
                <td>КВ</td>
                <td>Изм %</td>
                <td>Изм сумма</td>
                <td>АВ</td>
                <td></td>
                <td>КВ</td>
                <td>Изм %</td>
                <td>Сборы</td>
                <td>Исполнение</td>
            </tr>
            </thead>

            <tbody>
            <!--ДКС-->
            <template>
            <tr @click="dks">
                <td class="empty-td"></td>
                <td class="text-left">
                <span class="fa fa-plus" v-show="dksBranch === false"></span>
                <span class="fa fa-minus" v-show="dksBranch === true"></span>
                 <span class="bold">ДКС</span>
                </td>
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
                <td class="empty-td"></td>
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
                <td class="empty-td"></td>
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
                <template v-if="dksBranch === true">
                    <tr v-if="uks1">
                        <td class="empty-td"></td>
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
                </template>
            <tr v-if="dksBranch" @click="uks2Manager">
                <td class="empty-td"></td>
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
                <template v-if="dksBranch === true">
                <tr v-if="uks2" >
                    <td class="empty-td"></td>
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
                </template>
            <tr v-if="dksBranch" @click="uks3Manager">
                <td class="empty-td"></td>
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
                <template v-if="dksBranch === true">
                <tr v-if="uks3">
                    <td class="empty-td"></td>
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
                </template>
            <tr v-if="dksBranch" @click="uks4Manager">
                <td class="empty-td"></td>
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
                <template v-if="dksBranch === true">
                <tr v-if="uks4" >
                    <td class="empty-td"></td>
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
                </template>
            <tr v-if="dksBranch" @click="ukrManager">
                <td class="empty-td"></td>
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
                <template v-if="dksBranch === true">
                <tr v-if="ukr">
                    <td class="empty-td"></td>
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
                </template>
            </template>

            <!--ДСП-->
            <template>
            <tr @click="dsp">
                <td class="empty-td"></td>
                <td class="text-left">
                    <span class="fa fa-plus" v-show="dspBranch === false"></span>
                    <span class="fa fa-minus" v-show="dspBranch === true"></span>
                    <span class="bold">ДСП</span>
                </td>
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
                <td class="empty-td"></td>
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
                <td class="empty-td"></td>
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
                <template v-if="dspBranch === true">
                    <tr v-if="almaty" >
                <td class="empty-td"></td>
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
                </template>
            <tr v-if="dspBranch" @click="uapManager">
                <td class="empty-td"></td>
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
                <template v-if="dspBranch === true">
                    <tr v-if="uap">
                <td class="empty-td"></td>
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
                </template>
            <tr v-if="dspBranch" @click="us1Manager">
                <td class="empty-td"></td>
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
                <template v-if="dspBranch === true">
                    <tr v-if="us1" >
                <td class="empty-td"></td>
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
                </template>
            <tr v-if="dspBranch" @click="us2Manager">
                <td class="empty-td"></td>
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
                <template v-if="dspBranch === true">
            <tr v-if="us2">
                <td class="empty-td"></td>
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
                </template>
            <tr v-if="dspBranch" @click="us3Manager">
                <td class="empty-td"></td>
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
                <template v-if="dspBranch === true">
                    <tr v-if="us3">
                <td class="empty-td"></td>
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
                </template>
            <tr v-if="dspBranch" @click="us4Manager">
                <td class="empty-td"></td>
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
                <template v-if="dspBranch === true">
                    <tr v-if="us4">
                <td class="empty-td"></td>
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
                </template>
            <tr v-if="dspBranch" @click="us5Manager">
                <td class="empty-td"></td>
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
                <template v-if="dspBranch === true">
                     <tr v-if="us5">
                <td class="empty-td"></td>
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
                </template>
            <tr v-if="dspBranch" @click="us6Manager">
                <td class="empty-td"></td>
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
                <template v-if="dspBranch === true">
                    <tr v-if="us6">
                <td class="empty-td"></td>
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
                </template>
            <tr v-if="dspBranch" @click="us7Manager">
                <td class="empty-td"></td>
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
                <template v-if="dspBranch === true">
                    <tr v-if="us7">
                <td class="empty-td"></td>
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
                </template>
            </template>

            <!--ДРПО-->
            <template>
            <tr @click="drpo">
                <td class="empty-td"></td>
                <td class="text-left">
                    <span class="fa fa-plus" v-show="drpoBranch === false"></span>
                    <span class="fa fa-minus" v-show="drpoBranch === true"></span>
                    <span class="bold">ДРПО</span>
                </td>
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
                <td class="empty-td"></td>
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
                <td class="empty-td"></td>
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
                <template v-if="drpoBranch === true">
                    <tr v-if="upp" >
                <td class="empty-td"></td>
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
                </template>
            </template>

            <!--ДП-->
            <template>
            <tr @click="dp">
                <td class="empty-td"></td>
                <td class="text-left">
                    <span class="fa fa-plus" v-show="dpBranch === false"></span>
                    <span class="fa fa-minus" v-show="dpBranch === true"></span>
                    <span class="bold">ДП</span>
                </td>
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
                <td class="empty-td"></td>
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
            </template>

            <!--Филиалы-->
            <template>
                <tr @click="firstBranch">
                    <td class="empty-td"></td>
                    <td class="text-left">
                        <span class="fa fa-plus" v-show="showBranches === false"></span>
                        <span class="fa fa-minus" v-show="showBranches === true"></span>
                        <span class="bold">Филиалы</span>
                    </td>
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
                    <td class="empty-td"></td>
                    <td class="text-left">Актобе</td>
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
                    <template v-if="showBranches === true">
                        <tr v-if="aktobe" v-for="(elem, index) in oracleData.aktobe">
                    <td class="empty-td"></td>
                    <td class="text-left">{{elem.emplName}}</td>
                    <td>{{elem.DSD}}</td>
                    <td>{{elem.comissionProc}}</td>
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
                    </template>

                <!--Нур-Султан-->
                <tr v-if="showBranches" @click="nur_sultanManager">
                    <td class="empty-td"></td>
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
                    <template v-if="showBranches === true">
                       <tr v-if="nur_sultan" >
                    <td class="empty-td"></td>
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
                    </template>

                <!--Шымкент-->
                <tr v-if="showBranches" @click="shymkentManager">
                    <td class="empty-td"></td>
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
                    <template v-if="showBranches === true">
                       <tr v-if="shymkent" >
                    <td class="empty-td"></td>
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
                    </template>
            </template>

            <!--kupipolis-->
            <template>
            <tr @click="kupipolisWeb">
                <td class="empty-td"></td>
                <td class="text-left">
                    <span class="fa fa-plus" v-show="polisBranch === false"></span>
                    <span class="fa fa-minus" v-show="polisBranch === true"></span>
                    <span class="bold">kupipolis</span>
                </td>
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
                <td class="empty-td"></td>
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
            </template>

            <tr>
                <td class="empty-td"></td>
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
                this.uks4 = !this.uks4;
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

        },
 }

</script>

<style scoped>
    span.fa {
        color: white;
        line-height: 13px;
        border-radius: 2px;
        border-radius: 2px;
    }
    .fa-plus {
        padding-top: 2px;
        padding-right: 2px;
        padding-left: 2px;
        margin-right: 10px;
        background-color: #3AC5C9;
    }
    .fa-minus {
        padding-top: 1px;
        padding-right: 2px;
        padding-left: 2px;
        margin-right: 10px;
        background-color: #E85764;
    }
    .text-left {
        width: 200px;
    }
    .empty-td {
        width: 20px;
    }

</style>
