<template>
    <div class="modal fade bd-example-modal-lg" :style="modalHide" id="paymentModal" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content products-margin modal-lg-custom modal-custom-border-top">
                <div>
                    <div class="bg-blue-standart modal-custom-border-top">
                        <div class="border-bottom-white">
                            <div class="pl-5 pt-4 pb-1 pr-5">
                                <div @click="close"
                                     class="color-white-standart vertical-middle pt-3 pb-3 inline pointer">
                                    <i class="fas fa-chevron-circle-left"></i>
                                    <span class="pl-1">НАЗАД</span>
                                </div>
                                <div class="pt-2 pb-1 bold">
                                    <i class="far fa-file-alt"></i>
                                    <span class="ml-2">Журнал выплат</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-row jc-sb flex-wrap">
                        <div class="pl-5 pt-4 pb-4 pr-5">
                            <input type="checkbox">
                            <span class="ml-2">Ограничение числа строк результата</span>
                        </div>
                        <i v-if="loading" class="fas fa-spinner fa-spin"></i>
                        <div class="pl-5 pt-4 pb-4 pr-5">
                            <button class="btn btn-info" @click="searchPayment">Поиск</button>
                        </div>
                        <div class="tex">
                            <button class="btn btn-success" @click="getInfo">Ok</button>
                        </div>
                        <div v-show="loading" class="loading-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="pl-5 pb-4 pr-5">
                        <div class="border-bottom: 1px solid grey">
                            <span class="color-blue-standart">Критерии</span>
                        </div><hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Номер документа:</label>
                                <div>
                                    <input type="text" v-model="document.number"
                                           class="form-control">
                                </div>
                            <div class="col-md-6">
                                <label>Тип выплаты:</label>
                                <div>
                                    <select v-model="document.paymentType" class="form-control">
                                        <option v-for="type in counterpartyType" :value="type[0]">{{ type[1] }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Приоритет:</label>
                                <div>
                                    <select v-model="document.priority" class="form-control">
                                        <option v-for="type in counterpartyType" :value="type[0]">{{ type[1] }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Дата док. с:</label>
                                <div>
                                    <input v-model="document.docDateFrom"
                                           class="form-control"
                                           type="tel" v-mask="'##.##.####'">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Дата док. до:</label>
                                <div>
                                    <input v-model="document.docDateTo"
                                           class="form-control"
                                           type="tel" v-mask="'##.##.####'">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Дата платежа с.</label>
                                <div>
                                    <input class="form-control"
                                           type="tel"
                                           v-model="document.datePaymentTo"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Дата платежа до</label>
                                <div>
                                    <input class="form-control"
                                           type="tel"
                                           v-model="document.datePaymentTo"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-md-3">
                                <label>Контрагент:</label>
                                <div class="input-group">
                                    <input v-model="contragent.fullName" @click="OpenModal('КонтрагентДокумент')" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn-light" @click="OpenModal('КонтрагентДокумент')">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="submit" class="btn-light" @click="clearInfo('КонтрагентДокумент')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Сумма документа с:</label>
                                <div>
                                    <input type="text" v-model="document.amountFrom"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Сумма документа до:</label>
                                <div>
                                    <input type="text" v-model="document.amountTo"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Валюта</label>
                                <div>
                                    <select v-model="document.currIsn" :disabled="addChange" class="form-control">
                                        <option value="9813" selected>Тенге</option>
                                        <option value="9716">Доллар США</option>
                                        <option value="9721">Евро</option>
                                        <option value="9788">Российский рубль</option>
                                        <option value="9832">Фунт стерлингов</option>
                                        <option value="9838">Швейцарский франк</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-5 pb-4 pr-5">
                        <div class="border-bottom: 1px solid grey">
                            <span class="color-blue-standart">Результат</span>
                        </div><hr>
                        <div class="fadeInRight">
                            <div class="scrollable">
                                <div class="table-responsive-sm pb-5">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <td>№</td>
                                            <td>Фамилия Имя Отчество</td>
                                            <td>Дата рождения</td>
                                            <td>ИИН</td>
                                            <td>Тип контрагента</td>
                                        </tr>
                                        <tr v-for="(res, index) in searchingResult" :key="index">
                                            <td><input type="radio" :id="index" :value="index" name="currentuser" @click="changeCheck(res, index)"></td>
                                            <td><div @click="selectCounterparty(res, index)">{{res.lastName}} {{res.firstName}} {{res.parentName}}</div></td>
                                            <td>{{res.birthday}}</td>
                                            <td>{{res.iin}}</td>
                                            <td>{{res.classIsn}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import moment from "moment";
import CounterpartyJournalModal from "./counterparty-journal-modal";
import DatePicker from "vue2-datepicker";
import MaskedInput from "vue-text-mask";

export default {
name: "payment-journal-modal",
    props: {
        results: Object,
        paymentCommand: {},
    },
    data() {
        return {
            document: {
                id: '',
                classIsn: '',
                extId: '',
                status: '',
                subjIsn: '',
                subjName: '',
                docDateFrom: moment(new Date()).format('DD.MM.YYYY'),
                docDateTo: '',
                emplIsn: '',
                deptIsn: '',
                amountFrom: '',
                amountTo: '',
                currIsn: '',
                stage: '',
                showCancelled: 'N',
            },
            docDate: new Date(),
            maskDate: [/\d/, /\d/, ".", /\d/, /\d/, ".", /\d/, /\d/, /\d/, /\d/],
            modalHide: '',
            loading: false,
            documentType: [],
            documentTypeAhd: [],
            userList: [],
            options: [],
            stagePassages: [],
            index: '',
            searchingDocument: {},
            contragent: {
                fullName: '',
                isn: '',
            },
            recordingCounterparty: {type: ''},
            counterparty: {
                isn: '',
                fullName: '',
            },
            openCounterpartyModal: false,
            modalId: {
                type: "#counterpartyModal2",
                id: "counterpartyModal2",
                required : true
            },
        }
    },
    created() {
        this.getBranchData();
        this.getUserList();
        this.getProductType();
        this.getProductTypeAhd();
        this.getStagePassage();
    },
    methods: {
        searchPayment() {
            this.loading = true;
            if(this.contragent.fullName != '' && this.contragent.isn != ''){
                this.document.subjName = this.contragent.fullName;
                this.document.isn = this.contragent.isn
            }
            let data = {
                document: this.document,
            }
            this.axios.post('/searchDocument', data).then((response) => {
                if(response.data.error) {
                    this.loading = false;
                    alert(response.data.error);
                }
                this.searchingDocument = response.data.result
                this.loading = false;
                if(this.searchingDocument.length === 1){
                    if(this.searchingDocument[0].isn === null){
                    }else{
                        this.documentName.isn = this.searchingDocument[0].isn
                        this.documentName.id = this.searchingDocument[0].id
                    }
                }
            });
        },
        changeCheck(res, id){
            if(this.searchingDocument[id] !== id || this.searchingDocument[id] === id){
                this.documentName.isn = ''
                this.documentName.id = ''
            }
            this.documentName.isn = res.isn
            this.documentName.id = res.id
        },
        selectDocument(doc){
            this.documentName.isn = doc.isn
            this.documentName.id = doc.id
            this.getInfo();
        },
        getInfo(){
            this.loading = true;
            for(let i=0; i<this.results.resDop.length; i++){
                if(this.recordingDocument.type==='Договор АХД'){
                    if(this.results.resDop[i].fullname === this.recordingDocument.type){
                        this.results.resDop[i].val = this.documentName.isn
                        this.results.resDop[i].value = this.documentName.id
                        this.contractAhd.fullName = this.documentName.id
                        this.contractAhd.isn = this.documentName.isn
                    }
                } else {
                    this.documentBase.fullName = this.documentName.id
                    this.documentBase.isn = this.documentName.isn
                }
            }
            for(let i=0; i<this.results.docrows.length; i++){
                if(this.results.docrows[i].fieldname === this.recordingDocument.type){
                    this.results.docrows[i].value = this.documentName.isn
                    this.results.docrows[i].value_name = this.documentName.id
                }
            }
            this.$parent.$refs.modalDocument.click()
            this.loading = false;
        },
        getBranchData() {
            this.axios.post('/getSearchBranch', {}).then(response => {
                this.options = response.data.result;
            })
        },
        getUserList() {
            let data = {sz:true}
            this.axios.post('/full/getFullBranch', data).then((response) => {
                this.userList = response.data.result;
                this.isLoading = false;
            });
        },
        getProductType(){
            this.axios.post('/document/getProductType', {}).then((response) => {
                this.documentType = response.data.result;
            });
        },
        getProductTypeAhd(){
            this.axios.post('/document/getProductTypeAhd', {}).then((response) => {
                this.documentTypeAhd = response.data.result;
            });
        },
        getStagePassage(){
            this.axios.post('/document/getStagePassage', {}).then((response) => {
                this.stagePassages = response.data.stagePassages;
            });
        },
        getDatePicker() {
            const vm = this;
            vm.results.docdate = vm.docDate.getDate() +'.'+ ("0" + (vm.docDate.getMonth() + 1)).slice(-2) +'.'+ vm.docDate.getFullYear();
        },
        close() {
            this.$parent.$refs.modalDocument.click();
        },
        OpenModal(doc) {
            this.preloader(true);
            if(doc === 'КонтрагентДокумент'){
                this.recordingCounterparty.type = doc
                this.preloader(false);
                this.$refs.modalCounterparty2.click()
            }
        },
        clearInfo(data){
            if(data === 'КонтрагентДокумент'){
                this.contragent.fullName = ''
                this.contragent.isn = ''
            }
        },
        preloader(show){
            if(show){
                document.getElementById('preloader').style.display = 'flex';
                this.modalHide = 'z-index:0;';
            } else {
                document.getElementById('preloader').style.display = 'none';
                this.modalHide = 'z-index:1050;';
            }
        }
    },
    components: {
        CounterpartyJournalModal,
        DatePicker,
        MaskedInput,
    }
}
</script>

<style scoped>

</style>
