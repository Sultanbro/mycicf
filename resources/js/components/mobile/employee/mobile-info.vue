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

            <!-- Small modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button>

            <div class="modal fade bd-example-modal-sm" id="qwe" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-margin">
                    <div class="modal-content border-rad-20">
                        <div>
                            <div class="flex-row border-top-rad-20 bg-blue-standart jc-center vertical-middle">
                                <span class="color-white mt-2 mb-2">Страховые случаи</span>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="color-dimgray mt-4 ml-5 mr-5 mb-2">Авария при проведении СМР, Затопления водой из водо-, тепло-, отопительных систем, Кража/хищение, Наезд движущейся техники, исключая башенный кран, Ошибки, допущенные при монтаже, Падение пилотируемых летательных аппаратов или их обломков, Пожар, Просадка</div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0">
                            <button type="button" class="btn color-white width100 bg-notification-center ml-4 mr-4" data-dismiss="modal">Закрыть</button>
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
