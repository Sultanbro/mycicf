<template>
    <div class="modal fade bd-example-modal-lg" :style="modalHide" id="quotesJournal" tabindex="-1" role="dialog"
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
                                    <span class="ml-2">Журнал полных котиривок</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-row jc-sb flex-wrap">
                        <i v-if="loading" class="fas fa-spinner fa-spin"></i>
                        <div class="pl-5 pt-4 pb-4 pr-5">
                            <button class="btn btn-info" @click="searchQuotes"><i class="fa fa-check">Поиск</i></button>
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
                        <div class="row">
                            <div class="col-md-6">
                                <label>Номер котировки:</label>
                                <div>
                                    <input type="text" v-model="quotes.id"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Вид котировки:</label>
                                <select v-model="quotes.type" class="form-control">
                                    <option value="">Все</option>
                                    <option value="220605">Аддендум</option>
                                    <option value="220603">Первичная</option>
                                    <option value="220604">Продление</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Статус:</label>
                                <select v-model="quotes.status" class="form-control">
                                    <option value="">Все</option>
                                    <option value="223372">Аннулирована</option>
                                    <option value="223369">На согласовании</option>
                                    <option value="223371">Отказано</option>
                                    <option value="223368">Оформление</option>
                                    <option value="223370">Согласовано</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Дата котировки с:</label>
                                <div>
                                    <input v-model="quotes.dateSignFrom" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Дата котировки до:</label>
                                <div>
                                    <input v-model="quotes.dateSignTo" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Начало действий с:</label>
                                <div>
                                    <input v-model="quotes.dateBegFrom" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Начало действий по:</label>
                                <div>
                                    <input v-model="quotes.dateBegTo" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-md-3">
                                <label>Страховой продукт:</label>
                                <treeselect v-model="quotes.productIsn" placeholder="Не выбрано"
                                            :multiple="false" :options="missingProducts" :disable-branch-nodes="true"/>
                            </div>
                            <div class="col-md-2">
                                <label>Источник создания:</label>
                                <select v-model="quotes.creationSource" class="form-control">
                                    <option v-for="creationSource in creationSources" :value="creationSource[0]">{{ creationSource[1] }}</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Стадия:</label>
                                <select v-model="quotes.stages" class="form-control">
                                    <option v-for="stage in stages" :value="stage[0]">{{ stage[1] }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-md-4">
                                <label>Куратор (подразделения/cотрудник):</label>
                                <div>
                                    <input type="text" v-model="results.emplName"
                                           class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Подразделения для расчета тарифа:</label>
                                <div>
                                    <treeselect
                                        :multiple="false" :options="options" :placeholder="'Выберите'" v-model="quotes.deptIsn"/>
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
                                            <td>ID</td>
                                            <td>Дата котировки</td>
                                            <td>Продукт</td>
                                            <td>Страхователь</td>
                                            <td>Куратор</td>
                                            <td>ISN</td>
                                        </tr>
                                        <tr v-for="(res, index) in searchingResult" :key="index">
                                            <td><input type="radio" :id="index" :value="index" name="currentuser" @click="changeCheck(res, index)"></td>
                                            <td><div @click="selectQuotes(res, index)">{{res.id}}</div></td>
                                            <td>{{res.dateSign}}</td>
                                            <td>{{res.productName}}</td>
                                            <td>{{res.clientName}}</td>
                                            <td>{{res.emplName}}</td>
                                            <td>{{res.isn}}</td>
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
name: "full-quotes-journal",
    props: {
        results: Object,
        recordingCounterparty: Object,
        agreedQuotation: Object
    },
    data() {
        return {
            quotes: {
                id: '',
                type: '',
                status: '',
                dateSignFrom: moment(new Date()).format('DD.MM.YYYY'),
                dateSignTo: '',
                dateBegFrom: '',
                dateBegTo: '',
                deptIsn: '',
                creationSource: '',
                productIsn: '',
                taskIsn: '',
                pageNo: '',
                emplIsn: this.results.emplisn,
            },
            docDate: new Date(),
            maskDate: [/\d/, /\d/, ".", /\d/, /\d/, ".", /\d/, /\d/, /\d/, /\d/],
            modalHide: '',
            loading: false,
            resultDoc: false,
            creationSources: [],
            missingProducts: [],
            stages: [],
            options: null,
            searchingResult: {},
        }
    },
    created() {
        this.getBranchData();
        this.getCreationSources();
        this.getMissingProduct();
        this.getStage();
    },
    methods: {
        searchQuotes() {
            this.loading = true;
            let data = {
                quotes: this.quotes,
            }
            this.axios.post('/searchQuotation', data).then((response) => {
                if(response.data.error) {
                    this.loading = false;
                    alert(response.data.error);
                }
                this.searchingResult = response.data.result
                this.loading = false;
                if(this.searchingResult.length === 1){
                    if(this.searchingResult[0].isn === null){
                    }
                    this.agreedQuotation.isn = this.searchingResult[0].isn
                    this.agreedQuotation.fullName = this.searchingResult[0].id
                }
            });
        },
        onChange(e, res){
            this.agreedQuotation.isn = res.isn
            this.agreedQuotation.fullName = res.id
        },
        selectQuotes(res, id){
            this.agreedQuotation.isn = res.isn
            this.agreedQuotation.fullName = res.id
            this.getInfo();
        },
        changeCheck(res, id){
            if(this.searchingResult[id] !== id || this.searchingResult[id] === id){
                this.agreedQuotation.isn = ''
                this.agreedQuotation.fullName = ''
            }
            this.agreedQuotation.isn = res.isn
            this.agreedQuotation.fullName = res.id
        },
        getInfo(){
            this.loading = true;
            if(this.recordingCounterparty.type === 'Согласованная котировка ДА'){
                for(let i=0; i<this.results.resDop.length; i++){
                    if(this.results.resDop[i].fullname === this.recordingCounterparty.type){
                        // this.agreedQuotation.fullName = this.counterparty.fullName
                        // this.agreedQuotation.isn = this.counterparty.isn
                        this.results.resDop[i].value = this.agreedQuotation.fullName
                        this.results.resDop[i].val = this.agreedQuotation.isn
                    }
                }
            }
            this.$parent.$refs.modalQuotes.click()
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
        getCreationSources(){
            this.axios.post('/document/getCreationSources', {}).then((response) => {
                this.creationSources = response.data.creationSources;
            });
        },
        getStage(){
            this.axios.post('/document/getStage', {}).then((response) => {
                this.stages = response.data.stages;
            });
        },
        getMissingProduct(){
            this.axios.post('/document/getMissingProduct', {}).then((response) => {
                if (response.data.success) {
                    this.missingProducts = response.data.result;
                } else {
                    alert(response.data.error)
                }
            });
        },
        close() {
            this.$parent.$refs.modalQuotes.click()
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
