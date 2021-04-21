<template>
    <div class="modal fade bd-example-modal-lg" :style="modalHide" id="docJournal" tabindex="-1" role="dialog"
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
                                    <span class="ml-2">Журнал документов</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-row jc-sb flex-wrap">
                        <div class="pl-5 pt-4 pb-4 pr-5">
                            <div class="flex-column pt-2 pb-2 flex-row">
                                <button class="btn-info ml-2">Новый документ</button>
                            </div>
                        </div>
                        <div class="pl-5 pt-4 pb-4 pr-5">
                            <input type="checkbox">
                            <span class="ml-2">Ограничение числа строк результата</span>
                        </div>
                        <div class="pl-5 pt-4 pb-4 pr-5">
                                <button class="btn btn-info"><i class="fa fa-check">Поиск</i></button>
                        </div>
                        <div class="tex">
                            <button class="btn btn-success"><i class="fa fa-check">Ok</i></button>
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
                        <div class="row justify-content-between">
                            <div class="col-md-2">
                                <label>Номер документа:</label>
                                <div>
                                    <input v-model="document.number" type="text"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Внешний номер:</label>
                                <div>
                                    <input v-model="document.externalNumber" type="text"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Тип документа:</label>
                                <div>
                                    <treeselect v-model="document.type" placeholder="Не выбрано"
                                                :multiple="false" :options="documentType" :disable-branch-nodes="true"/>
<!--                                    <div>-->
<!--                                        <input-->
<!--                                            type="checkbox"-->
<!--                                            true-value="Y"-->
<!--                                            false-value="N"-->
<!--                                        >Показывать аннулированные документы-->
<!--                                    </div>-->
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Дата документа с:</label>
                                <div>
                                    <input v-model="document.dateBeg" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Дата документа до:</label>
                                <div>
                                    <input v-model="document.dateEnd" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between pt-2">
                            <div class="col-md-3">
                                <label>Контрагент:</label>
                                <div>
                                    <treeselect v-model="document.contragent" placeholder="Не выбрано" :multiple="false"
                                                :options="userList" :disable-branch-nodes="true"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Куратор (сотрудник):</label>
                                <div>
                                    <treeselect v-model="document.curator" placeholder="Не выбрано" :multiple="false"
                                                :options="userList" :disable-branch-nodes="true"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Куратор (Подразделение):</label>
                                <div>
                                    <treeselect v-model="document.subdivision" placeholder="Не выбрано" :multiple="false"
                                                :options="options" :disable-branch-nodes="true"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Статус документа:</label>
                                <select v-model="document.status" class="form-control">
                                    <option value="">Все</option>
                                    <option value="2515">Аннулирован</option>
                                    <option value="2516">В работе</option>
                                    <option value="2522">На подписи</option>
                                    <option value="2517">Оплачен</option>
                                    <option value="2518">Подписан</option>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-between pt-2">
                            <div class="col-md-3">
                                <label>Стадия прохождения документа:</label>
                                <div>
                                    <select v-model="document.stage" class="form-control">
                                        <option v-for="stagePassage in stagePassages" :value="stagePassage[0]">{{ stagePassage[1] }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row col-md-6 offset-md-3">
                                <div class="col-md-4">
                                    <label>Сумма док. от:</label>
                                    <div>
                                        <input v-model="document.sumBeg" class="form-control"
                                               type="tel"
                                               v-mask="'##.##.####'"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Сумма док. до:</label>
                                    <div>
                                        <input v-model="document.sumEnd" class="form-control"
                                               type="tel"
                                               v-mask="'##.##.####'"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Валюта:</label>
                                    <div>
                                        <select v-model="document.currency" class="form-control">
                                            <option value="9716">USD Доллар США</option>
                                            <option value="9721">EUR Евро</option>
                                            <option value="9788">RUB Российский рубль</option>
                                            <option value="9813">KZT Тенге</option>
                                            <option value="9832">GBP Фунт стерлингов</option>
                                            <option value="9838">Швейцарский франк</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="pl-5 pb-4 pr-5">
                        <div class="border-bottom: 1px solid grey">
                            <span class="color-blue-standart">Результат</span>
                        </div><hr>
                        <div class="fadeInRight">
                            <div class="scrollable pb-4">
                                <div class="table-responsive-sm pb-8">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <td>№</td>
                                            <td>Номер документа</td>
                                            <td>Дата</td>
                                            <td>Сумма док-та</td>
                                            <td>Контрагент</td>
                                            <td>Статус</td>
                                            <td>Стадия</td>
                                            <td>Подразделение</td>
                                            <td>Куратор</td>
                                        </tr>
                                        <tr v-for="(doc, index) in searchingDocument" :key="index">
                                            <td><input type="radio" :id="index" :value="index" name="currentuser" @click="changeCheck(doc, index)"></td>
                                            <td><div @click="selectDocument(doc, index)">{{doc.number}}</div></td>
                                            <td>{{doc.docDate}}</td>
                                            <td>{{doc.iin}}</td>
                                            <td>{{doc.sum}}</td>
                                            <td>{{doc.contragent}}</td>
                                            <td>{{doc.status}}</td>
                                            <td>{{doc.stage}}</td>
                                            <td>{{doc.subdivision}}</td>
                                            <td>{{doc.curator}}</td>
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
</template>

<script>
import DatePicker from "vue2-datepicker";
import 'vue2-datepicker/index.css';
import MaskedInput from 'vue-text-mask';
import 'vue2-datepicker/locale/ru';
import moment from 'moment'
export default {
    name: "document-journal-modal",
    props: {
        results: Object,
        recordingCounterparty: Object ,
    },
    data() {
        return {
            document: {
                number: '',
                type: '',
                externalNumber: '',
                status: '',
                contragent: '',
                dateBeg: moment(new Date()).format('DD.MM.YYYY'),
                dateEnd: '',
                curator: '',
                subdivision: '',
                sumBeg: '',
                sumEnd: '',
                currency: '',
                stage: '',
            },
            docDate: new Date(),
            maskDate: [/\d/, /\d/, ".", /\d/, /\d/, ".", /\d/, /\d/, /\d/, /\d/],
            modalHide: '',
            loading: false,
            resultDoc: false,
            documentType: [],
            userList: [],
            options: [],
            stagePassages: [],
            index: '',
            searchingDocument: {},
        }
    },
    created() {
        this.getBranchData();
        this.getUserList();
        this.getProductType();
        this.getStagePassage();
    },
    methods: {
        searchDocument() {
            this.loading = true;
            let data = {
                document: this.document,
            }
            this.axios.post('/searchCounterparty', data).then((response) => {
                if(response.data.error) {
                    this.loading = false;
                    alert(response.data.error);
                }
                this.searchingDocument = response.data.result
                this.loading = false;
            });
        },
        selectDocument(doc, id){
            for(let i=0; i<this.results.docrows.length; i++){
                if(this.results.docrows[i].fieldname === this.recordingCounterparty.type){
                    this.results.resDop[i].val = doc.isn
                }
            }
            this.$parent.$refs.modalCounterparty.click();
            this.loading = false;
        },
        getInfo(){
            this.loading = true;
            for(let i=0; i<this.results.docrows.length; i++){
                if(this.results.resDop[i].fullname === 'Приложение'){
                    this.results.resDop[i].val = this.searchingDocument.isn
                }
            }
            this.$parent.$refs.modalCounterparty.click()
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
        DatePicker,
        MaskedInput,
    }
}
</script>

<style scoped>
    .scrollable {
        overflow: scroll;
    }
</style>
