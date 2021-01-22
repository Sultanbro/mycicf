<template>
    <div class="news-tape-bg radius-4px mt-3 pb-2">
        <div class="p-2" >
            <button @click="getAgreedCoordinationList" class="btn btn-primary">Список согласованных документов АС</button>
        </div>
        <div class="ml-2 mr-2" v-if="none">
            <div class="coordination-none-text">
                Нет документов на согласовании
            </div>
        </div>
        <div class="ml-2 mr-2" v-show="agreedAC !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2">
                    <strong>Согласованые документы АС</strong>
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
                        <tr v-for="(info, index) in agreedAC" :key="info.isn">
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
                            <td class="pointer" scope="col" @click="openModal(info.ISN, 'SZ', info)">{{info.id}}</td>
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
                            <td scope="col" class="thead-border">{{info.DeptName}}</td>
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
                            <td class="pointer" scope="col" @click="openModal(info.ISN, 'AC', info)">{{info.id}}</td>
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
        <div class="ml-2 mr-2" v-show="VC !== null">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2">
                    <strong>Согласование выплатного комитета</strong>
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
                        <tr v-for="(info, index) in VC" :key="info.isn">
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
                            <td class="pointer" scope="col" @click="openModal(info.ISN, 'OTHER', info)">{{info.id}}</td>
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
                            <td class="pointer" scope="col" @click="openModal(info.ISN, 'OTHER', info)">{{info.id}}</td>
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
            :doc_row_list="doc_row_list"
            :doc_row_inner="doc_row_inner"
            :doc_row_list_other="doc_row_list_other"
            :doc_row_list_inner_other="doc_row_list_inner_other"
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
                VC: null,
                agreedAC: null,
                other: null,
                none: false,
                coordination: {},
                attachments: [] ,
                doc_row_list: {},
                doc_row_inner: {},
                doc_row_list_other: {},
                doc_row_list_inner_other: {}
            }
        },
        mounted: function(){
            this.getTables();
        },
        props: {
            isn: Number,
            isDirector: {
                type : Boolean,
                default : false,
            }
        },
        methods: {
            getTables: function(){
                // this.preloader(true);
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
                    this.VC = response.result.VC;
                    this.other = response.result.other;
                }else{
                    alert(response.error);
                }
                if(this.AC === null && this.SP === null && this.SZ === null && this.KV === null && this.OL === null && this.AD === null && this.RV === null && this.other === null){
                    this.none = true;
                }
                this.preloader(false);
            },
            openModal (ISN, type = null, data = null) {
                this.doc_row_list = {};
                this.doc_row_inner = {};
                this.doc_row_list_other = {};
                this.doc_row_list_inner_other = {};

                // this.preloader(true);
                if(type === 'SZ' && data !== null) {
                    this.axios.post("/getCoordinationInfo", {docIsn: ISN}).then((response) => {
                        this.setModalData(response.data);
                    });
                    this.getDocRowList(data, type);
                }
                else if(type === 'AC' && data !== null) {
                    this.axios.post("/getCoordinationInfo", {docIsn: ISN}).then((response) => {
                        this.setModalData(response.data);
                    });
                    this.getDocRowList(data, type);
                }
                else if (type === 'OTHER' && data !== null && data.ClassISN == '1784781') {
                    this.axios.post("/getCoordinationInfo", {docIsn: ISN}).then((response) => {
                        this.setModalData(response.data);
                    });
                    this.getDocRowList(data, type);
                }
                else {
                    this.axios.post("/getCoordinationInfo", {docIsn: ISN}).then((response) => {
                        this.setModalData(response.data);
                    }).finally(() => {
                        this.preloader(false);
                    });
                }
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
            async getDocRowList(data, type) {
                if(type === 'SZ') {
                    let response = await this.axios.post('/getDocRowList', {
                        class_isn: data.sz_class_isn,
                        doc_isn: data.sz_isn,
                    });
                    if(response.data.success) {
                        this.setDocRowList(response.data, type);
                    }
                }
                else if(type === 'AC') {
                    if(data.ClassPovestka !== '' && data.Povestka !== '') {
                        let response = await this.axios.post('/getDocRowList', {
                            class_isn: data.ClassPovestka,
                            doc_isn: data.Povestka,
                        });
                        if(response.data.success) {
                            this.setDocRowList(response.data, type);
                        }
                    }
                    else
                        return 0;
                }
                if(type === 'OTHER') {
                    if(data.RefClassISN != '' && data.RefDocISN != '' && data.RefClassISN != null && data.RefDocISN != null) {
                        let response = await this.axios.post('/getDocRowList', {
                            class_isn: data.RefClassISN,
                            doc_isn: data.RefDocISN,
                        });
                        if (response.data.success) {
                            this.setDocRowList(response.data, type);
                        } else {
                            alert(response.data.message);
                            this.preloader(false);
                        }
                    } else {
                        this.preloader(false);
                    }
                }
            },
            setDocRowList(response, type) {
                switch (type) {
                    case 'SZ':
                        this.doc_row_list = response.doc_row_list;
                        this.doc_row_inner = response.doc_row_inner;
                        break;
                    case 'AC':
                        this.doc_row_list = response.doc_row_list;
                        this.doc_row_inner = response.doc_row_inner;
                        break;
                    case 'OTHER':
                        this.doc_row_list_other = response.doc_row_list;
                        this.doc_row_list_inner_other = response.doc_row_inner;
                        break;
                    default:
                        break;
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
            getAgreedCoordinationList() {
                this.axios.post("/getAgreedCoordination", {ISN: this.isn}).then((response) => {
                    if(response.data.success) {
                        this.agreedAC = response.data.agreedAC
                    }
                })
            },
        },

    }
</script>
