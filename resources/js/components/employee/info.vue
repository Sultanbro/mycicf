<template>
    <div class="news-tape-bg radius-4px mt-3 pb-2">
        <div class="pt-4">
            <div class="border-radius15 flex-row jc-start vertical-middle bg-white ml-2 mr-2 pl-3 pr-3 pt-4 pb-3">
                <div class="flex-row jc-sb">
                    <div class="flex-column">
                        <label for="dateBeg" class="bold">Период с</label>
                        <input type="date" min="2015-02-03" max="2022-04-05" id="dateBeg" class="border0 date-color bg-darkgray pl-3 pt-1 pb-1 date-width" v-model="datebeg">
                    </div>
                    <div class="flex-column ml-3">
                        <label for="dateEnd" class="bold">Период по</label>
                        <input type="date" min="2015-02-03" max="2022-04-05" id="dateEnd" class="border0 date-color bg-darkgray pl-3 pt-1 pb-1 date-width" v-model="dateend">
                    </div>
                    <div class="flex-column ml-3 dossierIsn">
                        <div v-if="checkUrl()" class="bg-darkgray flex-row date-color pr-1 pt-1 pb-1 date-width">
                            <treeselect v-model="isn" :multiple="false" :options="options" />
                        </div>
                    </div>
                </div>

                    <div class="flex-row border-gray pl-3 width-min-content pr-3 pt-2 pb-2 pointer showBtn btn ml-3" @click="getTables()">

                        <div class="ml-2 "><i class="far fa-eye"></i> Показать</div>
                    </div>
                </div>
            </div>
        <div class="ml-2 mr-2" v-show="carier !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2 pointer" @click="reverseCaret()" data-toggle="collapse" href="#staff_movement" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <strong>Кадровое перемещение</strong>
                    <i class="fas " :class="caretClass" data-toggle="collapse" href="#multiCollapseExample1"></i>
                </div>
                <div id="staff_movement" class="collapse">
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
                                <td class="keep-all">{{info.DateBeg}} - {{info.DateEnd  === '0' ? 'н.в.' : info.DateEnd}}</td>
                                <td class="table-td-border">{{info.Dept}}</td>
                                <td>{{info.DutyName}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ml-2 mr-2" v-show="vacation !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2 pointer" @click="reverseCaret2()" data-toggle="collapse" href="#vacation" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <strong>Отпуск</strong>
                    <i class="fas " :class="caretClass2" data-toggle="collapse" href="#multiCollapseExample1"></i>
                </div>
                <div class="collapse" id="vacation">
                    <table class="dosier-table table text-align-center">
                        <thead>
                        <tr class="header color-white">
                            <th scope="col">Вид</th>
                            <th scope="col" class="thead-border">Период</th>
                            <th scope="col" class="thead-border">Период отпуска</th>
                            <th scope="col">Использованные дни</th>
                            <th scope="col">Оставшиеся дни</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">
                        <tr v-for="(info, index) in vacation">
                            <td>{{info.Fullname}}</td>
                            <td class="table-td-border">{{info.Period}}</td>
                            <td class="table-td-border">{{info.Date}}</td>
                            <td class="table-td-border">{{info.Duration}}</td>
                            <td>{{info.Rest}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ml-2 mr-2" v-if="admins !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2 pointer" @click="reverseCaret3()" data-toggle="collapse" href="#admin_days" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <strong>Административные дни</strong>
                    <i class="fas " :class="caretClass3" data-toggle="collapse" href="#multiCollapseExample1"></i>
                </div>
                <div class="collapse" id="admin_days">
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
                        <tr class="count-days">
                            <td colspan="3">Не использованные административные дни : &nbsp;&nbsp;&nbsp;{{days}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ml-2 mr-2" v-if="admins === null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2 pointer" @click="reverseCaret3()" data-toggle="collapse" href="#admin_days" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <strong>Административные дни</strong>
                    <i class="fas " :class="caretClass3" data-toggle="collapse" href="#multiCollapseExample1"></i>
                </div>
                <div class="collapse" id="admin_days">
                    <table class="dosier-table table text-align-center">
                        <thead>
                        <tr class="header color-white">
                            <th scope="col">Кол-во дней</th>
                            <th scope="col" class="thead-border">Период</th>
                            <th scope="col">Примечание</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">
                        <tr>
                            <td>Нет данных</td>
                            <td class="thead-border">Нет данных</td>
                            <td>Нет данных</td>
                        </tr>
                        <tr class="count-days">
                            <td colspan="3">Не использованные административные дни : &nbsp;&nbsp;&nbsp;{{days}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ml-2 mr-2" v-show="mission !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2 pointer" @click="reverseCaret4()" data-toggle="collapse" href="#business_trip" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <strong>Командировка</strong>
                    <i class="fas " :class="caretClass4" data-toggle="collapse" href="#multiCollapseExample1"></i>
                </div>
                <div class="collapse" id="business_trip">
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
        <div class="ml-2 mr-2" v-show="sick !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2 pointer" @click="reverseCaret5()" data-toggle="collapse" href="#sick_days" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <strong>Больничные дни</strong>
                    <i class="fas " :class="caretClass5" data-toggle="collapse" href="#multiCollapseExample1"></i>
                </div>
                <div class="collapse" id="sick_days">
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
        <div class="ml-2 mr-2" v-show="thanks  !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2 pointer" @click="reverseCaret6()" data-toggle="collapse" href="#disciplinary_action" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <strong>Дисциплинарные взыскания</strong>
                    <i class="fas " :class="caretClass6" data-toggle="collapse" href="#multiCollapseExample1"></i>
                </div>
                <div class="collapse" id="disciplinary_action">
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
</template>


<style>
     .btn:hover  {
         background: #00f7a5 !important;
     }
</style>

<script>
    export default {
        name: "info",
        data() {
            return {
                datebeg: '1990-01-01',
                dateend: new Date(new Date().getFullYear(), new Date().getMonth(),  new Date().getDate(), 6).toJSON().slice(0, 10),
                carier: null,
                vacation: null,
                sick: null,
                mission: null,
                thanks: null,
                admins: null,
                options: null,
                days: 0,
                caretClass: 'fa-chevron-down',
                caretClass2: 'fa-chevron-down',
                caretClass3: 'fa-chevron-down',
                caretClass4: 'fa-chevron-down',
                caretClass5: 'fa-chevron-down',
                caretClass6: 'fa-chevron-down',
            }
        },
        props : {
            isn: Number,
        },
        mounted: function(){
            if(this.checkUrl()){
                this.getOptions();
            }
            this.getTables();
        },
        methods: {
            getTables (){
                this.preloader(true);
                this.axios.post("/emplInfo", {isn: this.isn, datebeg: this.datebeg, dateend: this.dateend}).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            getOptions () {
                this.preloader(true);
                this.axios.post('/getBranchData', {}).then((response) => {
                    this.options = response.data.result;
                    this.preloader(false);
                });
            },
            fetchResponse (response){
                if(response.success){
                    this.carier = response.result.CARIER;
                    this.vacation = response.result.VACATION;
                    this.sick = response.result.SICK;
                    this.mission = response.result.MISSION;
                    this.thanks = response.result.THANKS;
                    this.admins = response.result.ADMINS;
                    this.days = response.result.DAYS;
                }else{
                    alert(response.error);
                }
                this.preloader(false);
            },
            preloader(show){
                if(show)
                {
                    document.getElementById('preloader').style.display = 'flex';
                }
                else
                {
                    document.getElementById('preloader').style.display = 'none';
                }
            },
            checkUrl(){
                return ((window.location.pathname).slice(1,10) !== 'colleague');
            },
            reverseCaret: function () {
                this.caretClass = this.caretClass === 'fa-chevron-down' ? 'fa-chevron-up' : 'fa-chevron-down';
            },
            reverseCaret2: function () {
                this.caretClass2 = this.caretClass2 === 'fa-chevron-down' ? 'fa-chevron-up' : 'fa-chevron-down';
            },
            reverseCaret3: function () {
                this.caretClass3 = this.caretClass3 === 'fa-chevron-down' ? 'fa-chevron-up' : 'fa-chevron-down';
            },
            reverseCaret4: function () {
                this.caretClass4 = this.caretClass4 === 'fa-chevron-down' ? 'fa-chevron-up' : 'fa-chevron-down';
            },
            reverseCaret5: function () {
                this.caretClass5 = this.caretClass5 === 'fa-chevron-down' ? 'fa-chevron-up' : 'fa-chevron-down';
            },
            reverseCaret6: function () {
                this.caretClass6 = this.caretClass6 === 'fa-chevron-down' ? 'fa-chevron-up' : 'fa-chevron-down';
            },
        },
    }
</script>
