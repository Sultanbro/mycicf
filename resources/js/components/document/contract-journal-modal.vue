<template>
    <div class="modal fade bd-example-modal-lg" :style="modalHide" id="contractJournal" tabindex="-1" role="dialog"
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
                                    <span class="ml-2">Журнал договоров</span>
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
                            <button class="btn btn-info" @click="searchContract"><i class="fa fa-check">Поиск</i></button>
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
                            <div class="col-md-2">
                                <label>Номер договора:</label>
                                <div>
                                    <input type="text" v-model="contract.id"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Серия-Номер бланка:</label>
                                <select v-model="contract.blankSerNo" class="form-control">
                                    <option value="">Все</option>
                                    <option value="220605">Аддендум</option>
                                    <option value="220603">Первичная</option>
                                    <option value="220604">Продление</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Статус:</label>
                                <select v-model="contract.status" class="form-control">
                                    <option value="С">Оформление</option>
                                    <option value="П">Подписан</option>
                                    <option value="В">Выпущен</option>
                                    <option value="Д">Прекращен страхователем</option>
                                    <option value="Щ">Прекращен страховщиком</option>
                                    <option value="А">Аннулирован</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Страховой продукт:</label>
                                <treeselect v-model="contract.productIsn" placeholder="Не выбрано"
                                            :multiple="false" :options="missingProducts" :disable-branch-nodes="true"/>
                            </div>
                            <div class="col-md-3">
                                <label>Генеральный договор:</label>
                                <select v-model="contract.creationSource" class="form-control">
                                    <option v-for="creationSource in creationSources" :value="creationSource[0]">{{ creationSource[1] }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-md-2">
                                <label>Подписан с:</label>
                                <div>
                                    <input v-model="contract.dateBegFrom" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Подписан до:</label>
                                <div>
                                    <input v-model="contract.dateBegTo" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Начало с:</label>
                                <div>
                                    <input v-model="contract.dateEndFrom" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Начало до:</label>
                                <div>
                                    <input v-model="contract.dateEndTo" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Окончание с:</label>
                                <div>
                                    <input v-model="contract.dateSignFrom" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Окончание до:</label>
                                <div>
                                    <input v-model="contract.dateSignTo" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-md-4">
                                <label>Куратор (подразделения/cотрудник):</label>
                                <div>
                                    <treeselect v-model="contract.emplIsn" placeholder="Не выбрано" :multiple="false"
                                                :options="userList" :disable-branch-nodes="true"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Стадия:</label>
                                <select v-model="contract.stage" class="form-control">
                                    <option value="">Все</option>
                                    <option value="221101">Ввод данных</option>
                                    <option value="221102">Подписан сторонами</option>
                                    <option value="221103">Принят к учету</option>
                                    <option value="221104">Утратил силу</option>
                                    <option value="221105">Аннулирован</option>
                                    <option value="1185361">Готов к выпуску</option>
                                </select>
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
                                            <td>Продукт</td>
                                            <td>Дата нач.</td>
                                            <td>Дата окон.</td>
                                            <td>Страхователь</td>
                                            <td>Статус</td>
                                            <td>Куратор</td>
                                            <td>Премия оплаченная</td>
                                            <td>Премия начисленная</td>
                                            <td>ISN</td>
                                        </tr>
                                        <tr v-for="(res, index) in searchingResult" :key="index">
                                            <td><input type="radio" :id="index" :value="index" name="currentuser" @click="changeCheck(res, index)"></td>
                                            <td><div @click="selectQuotes(res, index)">{{res.id}}</div></td>
                                            <td>{{res.productName}}</td>
                                            <td>{{res.dateBeg}}</td>
                                            <td>{{res.dateEnd}}</td>
                                            <td>{{res.clientName}}</td>
                                            <td>{{res.status}}</td>
                                            <td>{{res.emplName}}</td>
                                            <td>{{res.factPrem}}</td>
                                            <td>{{res.planPrem}}</td>
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
    name: "contract-journal-modal",
    props: {
        results: Object,
        recordingCounterparty: Object,
        contractNameTemporary: Object,
    },
    data() {
        return {
            contract: {
                id: '',
                blankSerNo: '',
                stage: '',
                status: '',
                dateBegFrom: moment(new Date()).format('DD.MM.YYYY'),
                dateBegTo: '',
                dateEndFrom: '',
                dateEndTo: '',
                dateSignFrom: '',
                dateSignTo: '',
                productIsn: '',
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
            searchingResult: {},
            userList: [],
        }
    },
    created() {
        this.getBranchData();
        this.getUserList();
        this.getCreationSources();
        this.getMissingProduct();
        this.getStage();
    },
    methods: {
        searchContract() {
            this.loading = true;
            let data = {
                contract: this.contract,
            }
            this.axios.post('/searchContract', data).then((response) => {
                if(response.data.error) {
                    this.loading = false;
                    alert(response.data.error);
                }
                this.searchingResult = response.data.result
                this.loading = false;
                if(this.searchingResult.length === 1){
                    if(this.searchingResult[0].isn === null){
                    }
                    this.contractName.isn = this.searchingResult[0].isn
                    this.contractName.fullName = this.searchingResult[0].id
                }
            });
        },
        onChange(e, res){
            this.contractName.isn = res.isn
            this.contractName.fullName = res.id
        },
        selectQuotes(res, id){
            this.contractName.isn = res.isn
            this.contractName.fullName = res.id
            this.getInfo();
        },
        changeCheck(res, id){
            if(this.searchingResult[id] !== id || this.searchingResult[id] === id){
                this.contractName.isn = ''
                this.contractName.fullName = ''
            }
            this.contractName.isn = res.isn
            this.contractName.fullName = res.id
        },
        getInfo(){
            this.loading = true;
            if(this.recordingCounterparty.type === 'Номер договора'){
                for(let i=0; i<this.results.resDop.length; i++){
                    if(this.results.resDop[i].fullname === this.recordingCounterparty.type){
                        this.results.resDop[i].value = this.contractName.fullName
                        this.results.resDop[i].val = this.contractName.isn
                    }
                }
            }
            if(this.recordingCounterparty.type === 'Список договоров  для внесение изменение'){
                this.contractNameTemporary.contractNumber = this.contractName.fullName
                this.contractNameTemporary.isn = this.contractName.isn
                for(let i=0; i<this.contractName.length; i++){
                    if(this.contractName[i].id === this.contractNameTemporary.id){
                        this.contractName[i].contractNumber = this.contractName.fullName
                        this.contractName[i].valn1 = this.contractName.isn
                    }
                }
            }
            if(this.recordingCounterparty.type === 'Список договоров  для аннулирования/прекращения'){
                this.contractNameTemporary.contractNumber = this.contractName.fullName
                this.contractNameTemporary.isn = this.contractName.isn
                for(let i=0; i<this.contractName.length; i++){
                    if(this.contractName[i].id === this.contractNameTemporary.id){
                        this.contractName[i].contractNumber = this.contractName.fullName
                        this.contractName[i].valn1 = this.contractName.isn
                    }
                }
            }
            this.$parent.$refs.modalContract.click()
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
        getDatePicker() {
            const vm = this;
            vm.results.docdate = vm.docDate.getDate() +'.'+ ("0" + (vm.docDate.getMonth() + 1)).slice(-2) +'.'+ vm.docDate.getFullYear();
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
            this.$parent.$refs.modalContract.click()
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
