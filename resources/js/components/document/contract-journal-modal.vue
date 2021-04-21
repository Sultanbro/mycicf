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
                            <div class="col-md-2">
                                <label>Страховой продукт:</label>
                                <treeselect v-model="contract.insuranceProduct" placeholder="Не выбрано"
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
                                    <input v-model="contract.dateBeg" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Подписан до:</label>
                                <div>
                                    <input v-model="contract.dateEnd" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Начало с:</label>
                                <div>
                                    <input v-model="contract.dateBegAction" class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Начало до:</label>
                                <div>
                                    <input v-model="contract.dateEndAction" class="form-control"
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
                                    <treeselect v-model="contract.curator" placeholder="Не выбрано" :multiple="false"
                                                :options="userList" :disable-branch-nodes="true"/>
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
                                            <td>Стадия</td>
                                            <td>Дата</td>
                                            <td>Вид</td>
                                            <td>Продукт</td>
                                            <td>Валюта</td>
                                            <td>Премия</td>
                                            <td>Страхователь</td>
                                            <td>Куратор</td>
                                            <td>Подразделение</td>
                                            <td>Дата согласования</td>
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
    },
    data() {
        return {
            contract: {
                id: '',
                blankSerNo: '',
                stage: '',
                dateBeg: moment(new Date()).format('DD.MM.YYYY'),
                dateEnd: '',
                dateBegAction: '',
                dateEndAction: '',
                dateSignFrom: '',
                dateSignTo: '',
                curator: this.results.emplisn,
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
