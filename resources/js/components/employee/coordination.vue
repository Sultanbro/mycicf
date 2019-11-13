<template>
    <div class="news-tape-bg radius-4px mt-3 pb-2">
        <div class="ml-2 mr-2" v-if="none">
            <div class="coordination-none-text">
                Нет документов на согласовании
            </div>
        </div>
        <div class="ml-2 mr-2" v-show="SZ !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2">
                    <strong>Служебные записки</strong>
                </div>
                <div>
                    <table class="dosier-table table text-align-center">
                        <thead>
                        <tr class="header color-white">
                            <th scope="col">Номер документа</th>
                            <th scope="col" class="thead-border">Тип документа</th>
                            <th scope="col" class="thead-border">Инициатор</th>
                            <th scope="col" class="thead-border">Подразделение</th>
                            <th scope="col">Дата</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">
                        <tr v-for="(info, index) in SZ" :key="info.ISN">
                            <td class="pointer" scope="col" @click="openModal(info.ISN)">{{info.id}}</td>
                            <td scope="col" class="thead-border">{{info.type}}</td>
                            <td scope="col" class="thead-border">{{info.curator}}</td>
                            <td scope="col" class="thead-border">{{info.DeptName}}</td>
                            <td scope="col">{{info.docdate}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ml-2 mr-2" v-show="KV !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2">
                    <strong>Согласование КВ по ОГПО</strong>
                </div>
                <div>
                    <table class="dosier-table table text-align-center">
                        <thead>
                        <tr class="header color-white">
                            <th scope="col">Номер документа</th>
                            <th scope="col" class="thead-border">Инициатор</th>
                            <th scope="col" class="thead-border">Подразделение</th>
                            <th scope="col" class="thead-border">ФИО агента</th>
                            <th scope="col">Дата</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">
                        <tr v-for="(info, index) in KV" :key="info.ISN">
                            <td class="pointer" scope="col" @click="openModal(info.ISN)">{{info.id}}</td>
                            <td scope="col" class="thead-border">{{info.curator}}</td>
                            <td scope="col" class="thead-border">{{info.DeptName}}</td>
                            <td scope="col" class="thead-border">{{info.empl}}</td>
                            <td scope="col">{{info.docdate}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ml-2 mr-2" v-show="OL !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2">
                    <strong>Обходной лист</strong>
                </div>
                <div>
                    <table class="dosier-table table text-align-center">
                        <thead>
                        <tr class="header color-white">
                            <th scope="col">Номер документа</th>
                            <th scope="col" class="thead-border">ФИО работника</th>
                            <th scope="col" class="thead-border">Подразделение</th>
                            <th scope="col">Дата</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">
                        <tr v-for="(info, index) in OL" :key="info.ISN">
                            <td class="pointer" scope="col" @click="openModal(info.ISN)">{{info.id}}</td>
                            <td scope="col" class="thead-border">{{info.empl}}</td>
                            <td scope="col" class="thead-border">{{DeptName}}</td>
                            <td scope="col">{{info.docdate}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ml-2 mr-2" v-show="AD !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2">
                    <strong>Согласование административных дней</strong>
                </div>
                <div>
                    <table class="dosier-table table text-align-center">
                        <thead>
                            <tr class="header color-white">
                            <th scope="col">Номер документа</th>
                            <th scope="col" class="thead-border">ФИО сотрудника</th>
                            <th scope="col" class="thead-border">Период</th>
                            <th scope="col">Кол-во дней</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">
                        <tr v-for="(info, index) in AD" :key="info.ISN">
                            <td class="pointer" scope="col" @click="openModal(info.ISN)">{{info.id}}</td>
                            <td scope="col" class="thead-border">{{info.empl}}</td>
                            <td scope="col" class="thead-border">{{info.docdate}}</td>
                            <td scope="col">{{info.days}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ml-2 mr-2" v-show="RV !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2">
                    <strong>Согласование распоряжений на выплату</strong>
                </div>
                <div>
                    <table class="dosier-table table text-align-center">
                        <thead>
                            <tr class="header color-white">
                                <th scope="col">Номер документа</th>
                                <th scope="col" class="thead-border">Инициатор</th>
                                <th scope="col" class="thead-border">Подразделение</th>
                                <th scope="col">Дата выплаты</th>
                            </tr>
                        </thead>
                        <tbody class="date-color">
                        <tr v-for="(info, index) in RV" :key="info.ISN">
                            <td class="pointer" scope="col" @click="openModal(info.ISN)">{{info.id}}</td>
                            <td scope="col" class="thead-border">{{info.curator}}</td>
                            <td scope="col" class="thead-border">{{info.DeptName}}</td>
                            <td scope="col">{{info.PayDate}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ml-2 mr-2" v-show="AC !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2">
                    <strong>Согласование АС</strong>
                </div>
                <div>
                    <table class="dosier-table table text-align-center">
                        <thead>
                        <tr class="header color-white">
                            <th scope="col">Номер документа</th>
                            <th scope="col" class="thead-border">Тип документа</th>
                            <th scope="col" class="thead-border">Инициатор</th>
                            <th scope="col" class="thead-border">Подразделение</th>
                            <th scope="col">Дата</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">
                        <tr v-for="(info, index) in AC" :key="info.isn">
                            <td class="pointer" scope="col" @click="openModal(info.ISN)">{{info.id}}</td>
                            <td scope="col" class="thead-border">{{info.type}}</td>
                            <td scope="col" class="thead-border">{{info.curator}}</td>
                            <td scope="col" class="thead-border">{{info.DeptName}}</td>
                            <td scope="col">{{info.docdate}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ml-2 mr-2" v-show="SP !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2">
                    <strong>Согласование Правления</strong>
                </div>
                <div>
                    <table class="dosier-table table text-align-center">
                        <thead>
                        <tr class="header color-white">
                            <th scope="col">Номер документа</th>
                            <th scope="col" class="thead-border">Тип документа</th>
                            <th scope="col" class="thead-border">Инициатор</th>
                            <th scope="col" class="thead-border">Подразделение</th>
                            <th scope="col">Дата</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">
                        <tr v-for="(info, index) in SP" :key="info.isn">
                            <td class="pointer" scope="col" @click="openModal(info.ISN)">{{info.id}}</td>
                            <td scope="col" class="thead-border">{{info.type}}</td>
                            <td scope="col" class="thead-border">{{info.curator}}</td>
                            <td scope="col" class="thead-border">{{info.DeptName}}</td>
                            <td scope="col">{{info.docdate}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ml-2 mr-2" v-show="other !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2">
                    <strong>Прочие документы на согласование</strong>
                </div>
                <div>
                    <table class="dosier-table table text-align-center">
                        <thead>
                        <tr class="header color-white">
                            <th scope="col">Номер документа</th>
                            <th scope="col" class="thead-border">Тип документа</th>
                            <th scope="col" class="thead-border">Инициатор</th>
                            <th scope="col" class="thead-border">Подразделение</th>
                            <th scope="col">Дата</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">
                        <tr v-for="(info, index) in other" :key="info.ISN">
                            <td class="pointer" scope="col" @click="openModal(info.ISN)">{{info.id}}</td>
                            <td scope="col" class="thead-border">{{info.type}}</td>
                            <td scope="col" class="thead-border">{{info.curator}}</td>
                            <td scope="col" class="thead-border">{{info.DeptName}}</td>
                            <td scope="col">{{info.docdate}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button v-show="false" ref="modalButton" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

        <coordination-modal
            :coordination="coordination"
            :isn="isn"
            :attachments="attachments"
        >
        </coordination-modal>
    </div>

</template>

<script>
    export default {
        name: "coordination",
        data() {
            return {
                datebeg: '2018-01-01',
                dateend: '2019-09-10',
                AC: null,
                SP: null,
                SZ: null,
                KV: null,
                OL: null,
                AD: null,
                RV: null,
                other: null,
                none: false,
                coordination: {},
                attachments: [] ,
            }
        },
        mounted: function(){
            this.getTables();
        },
        props: {
            isn: Number,
        },
        methods: {
            getTables: function(){
                this.preloader(true);
                this.axios.post("/getCoordinationList", {isn: this.isn}).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            fetchResponse: function(response){
                if(response.success){
                    this.AC = response.result.AC;
                    this.SP = response.result.SP;
                    this.SZ = response.result.SZ;
                    this.KV = response.result.KV;
                    this.OL = response.result.OL;
                    this.AD = response.result.AD;
                    this.RV = response.result.RV;
                    this.other = response.result.other;
                }else{
                    alert(response.error);
                }
                if(this.AC === this.SP === this.SZ === this.KV === this.OL === this.AD === this.RV === this.other === null){
                    this.none = true;
                }
                this.preloader(false);
            },
            openModal (ISN) {
                this.preloader(true);
                this.axios.post("/getCoordinationInfo", {docIsn: ISN}).then((response) => {
                    this.setModalData(response.data)
                });
            },
            setModalData: function (response) {
                if(response.success){
                    this.coordination = response.response;
                    this.getAttachments();
                    this.$refs.modalButton.click();
                }
                else
                {
                    alert('ERROR')
                }
                this.preloader(false);
            },
            getAttachments () {
                var vm = this;
                this.axios.post('/getAttachmentList', {
                    docIsn: vm.coordination.ISN
                }).then(response => {
                    if(response.data.success){
                        vm.attachments = response.data.attachments;
                    }else{
                        vm.attachments = [];
                    }
                });
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
            }
        },

    }
</script>
