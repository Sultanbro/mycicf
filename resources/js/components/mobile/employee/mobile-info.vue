<template>
    <div>
        <div class="mt-2 bg-white">
            <div class="container-fluid flex-column vertical-middle">
                <div class="flex-column vertical-middle">
                    <div>
                        <div class="flex-column">
                            <div class="flex-column vertical-middle">
                                <div class="mobile-date-flex width100">
                                    <div class="mobile-date-contain">
                                        <input type="date" class="border0 width100 date-color bg-darkgray pl-2 pr-2 pt-1 pb-1 date-width" v-model="datebeg">
                                    </div>
                                    <div class="mobile-date-contain">
                                        <input type="date" class="width100 border0 date-color bg-darkgray pl-2 pr-2 pt-1 pb-1 date-width" v-model="datebeg">
                                    </div>
                                </div>
                                <div class="mobile-date-flex">
                                    <div class="mobile-date-contain mobile-dossier-fio-input mobile-date-width">
                                        <div class="bg-darkgray width100 flex-row date-color pl-2 pr-2 pt-1 pb-1 date-width">
                                            <treeselect v-model="isn" :multiple="false" :options="options" />
                                        </div>
                                    </div>
                                    <div class="pl-4 mb-3 border-rad-20 pr-4 pt-1 pb-1 mt-3 mobile-date-width bg-blue-standart color-white" @click="getTables()">
                                        <div class="flex-row width100 jc-center pointer vertical-middle">
                                            <i class="far fa-eye"></i>
                                            <div class="ml-2">Показать</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white mt-2">
            <div class="flex-column">
                <div v-show="carier !== null">
                    <div class="border-radius15 bg-white mt-2">
                        <div class="ml-3 pt-2 pb-2">
                            <strong>Кадровое перемещение</strong>
                        </div>
                        <div class="table-responsive width100">
                            <table class="dosier-table table text-align-center">
                                <thead>
                                <tr class="header color-white">
                                    <th scope="col">Дата</th>
                                    <th scope="col" class="thead-border">Подразделение</th>
                                    <th scope="col">Должность</th>
                                </tr>
                                </thead>
                                <tbody class="date-color">
                                <tr v-for="(info, index) in carier">
                                    <td>{{info.DateBeg}} - {{info.DateEnd  === '0' ? 'н.в.' : info.DateEnd}}</td>
                                    <td class="table-td-border">{{info.Dept}}</td>
                                    <td>{{info.DutyName}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white mt-2">
            <div class="flex-column">
                <div v-show="vacation !== null">
                    <div class="border-radius15 bg-white mt-2">
                        <div class="ml-3 pt-2 pb-2">
                            <strong>Отпуск</strong>
                        </div>
                        <div class="table-responsive width100">
                            <table class="dosier-table table text-align-center">
                                <thead>
                                <tr class="header color-white">
                                    <th scope="col">Вид</th>
                                    <th scope="col" class="thead-border">Период</th>
                                    <th scope="col" class="thead-border">Период отпуска</th>
                                    <th scope="col">Дни</th>
                                </tr>
                                </thead>
                                <tbody class="date-color">
                                <tr v-for="(info, index) in vacation">
                                    <td>{{info.Fullname}}</td>
                                    <td class="table-td-border">{{info.Period}}</td>
                                    <td class="table-td-border">{{info.DateBeg}} - {{info.DateEnd  === '0' ? 'н.в.' : info.DateEnd}}</td>
                                    <td>{{info.Duration}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white mt-2">
            <div class="flex-column">
                <div v-show="admins !== null">
                    <div class="border-radius15 bg-white mt-2">
                        <div class="ml-3 pt-2 pb-2">
                            <strong>Административные дни</strong>
                        </div>
                        <div class="table-responsive width100">
                            <table class="dosier-table table text-align-center">
                                <thead>
                                <tr class="header color-white">
                                    <th scope="col">Кол-во дней</th>
                                    <th scope="col" class="thead-border">Период</th>
                                    <th scope="col">Примечание</th>
                                </tr>
                                </thead>
                                <tbody class="date-color">
                                <tr v-for="(info, index) in admins">
                                    <td>{{info.Duration}}</td>
                                    <td class="thead-border">{{info.Period}}</td>
                                    <td>{{info.Remark}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white mt-2">
            <div class="flex-column">
                <div v-show="mission !== null">
                    <div class="border-radius15 bg-white mt-2">
                        <div class="ml-3 pt-2 pb-2">
                            <strong>Командировка</strong>
                        </div>
                        <div class="table-responsive width100">
                            <table class="dosier-table table text-align-center">
                                <thead>
                                <tr class="header color-white">
                                    <th scope="col">Город</th>
                                    <th scope="col" class="thead-border">Период</th>
                                    <th scope="col">Примечание</th>
                                </tr>
                                </thead>
                                <tbody class="date-color">
                                <tr v-for="(info, index) in mission">
                                    <td>{{info.City}}</td>
                                    <td class="table-td-border">{{info.Period}}</td>
                                    <td>{{info.Remark}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white mt-2">
            <div class="flex-column">
                <div v-show="sick !== null">
                    <div class="border-radius15 bg-white mt-2">
                        <div class="ml-3 pt-2 pb-2">
                            <strong>Больничные дни</strong>
                        </div>
                        <div class="table-responsive width100">
                            <table class="dosier-table table text-align-center">
                                <thead>
                                <tr class="header color-white">
                                    <th scope="col">Кол-во дней</th>
                                    <th scope="col" class="thead-border">Период</th>
                                    <th scope="col">Примечание</th>
                                </tr>
                                </thead>
                                <tbody class="date-color">
                                <tr v-for="(info, index) in sick">
                                    <td>{{info.Duration}}</td>
                                    <td class="thead-border">{{info.Period}}</td>
                                    <td>{{info.Remark}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white mt-2">
            <div class="flex-column">
                <div v-show="thanks !== null">
                    <div class="border-radius15 bg-white mt-2">
                        <div class="ml-3 pt-2 pb-2">
                            <strong>Дисциплинарные взыскания</strong>
                        </div>
                        <div class="table-responsive width100">
                            <table class="dosier-table table text-align-center">
                                <thead>
                                <tr class="header color-white">
                                    <th scope="col">Вид</th>
                                    <th scope="col" class="thead-border">Дата</th>
                                    <th scope="col" class="thead-border">Штраф</th>
                                    <th scope="col">Примечание</th>
                                </tr>
                                </thead>
                                <tbody class="date-color">
                                <tr v-for="(info, index) in thanks">
                                    <td>{{info.FullName}}</td>
                                    <td class="table-td-border">{{info.DocDate}}</td>
                                    <td class="table-td-border">{{info.ExtraPay}}</td>
                                    <td>{{info.Remark}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "mobile-info",
        data() {
            return {
                datebeg: '2018-01-01',
                dateend: '2019-09-10',
                carier: null,
                vacation: null,
                sick: null,
                mission: null,
                thanks: null,
                admins: null,
                options: null,
            }
        },
        props : {
            isn: Number,
        },
        mounted: function(){
            this.getOptions();
            this.getTables();
        },
        props: {
            isn: Number,
        },
        methods: {
            getTables: function(){
                this.axios.post("/emplInfo", {isn: this.isn, datebeg: this.datebeg, dateend: this.dateend}).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            getOptions: function () {
                this.axios.post('/getBranchData', {}).then((response) => {
                    this.options = response.data.result;
                })
            },
            fetchResponse: function(response){
                if(response.success){
                    this.carier = response.result.CARIER;
                    this.vacation = response.result.VACATION;
                    this.sick = response.result.SICK;
                    this.mission = response.result.MISSION;
                    this.thanks = response.result.THANKS;
                    this.admins = response.result.ADMINS;
                }else{
                    alert(response.error);
                }
            },
            // modalBlur: function () {
            //     var qwe = document.getElementById(qwe);
            //   // var app = document.getElementById(app);
            //   if (qwe.className == active){
            //       alert('qwe');
            //   }
            //   else{
            //       alert('empty')
            //   }
            // },
        },

    }
</script>
