<template>
    <div class="modal fade bd-example-modal-lg" :style="modalHide" id="counterpartyModal" tabindex="-1" role="dialog"
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
                                    <span class="ml-2">Журнал контрагентов</span>
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
                            <button class="btn btn-info" @click="searchCounterparty"><i class="fa fa-check">Поиск</i></button>
                        </div>
                        <div class="tex">
                            <button class="btn btn-success" @click="getInfo"><i class="fa fa-check">Ok</i></button>
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
                                <label>Фамилия:</label>
                                <div>
                                    <input type="text" v-model="document.lastName"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Имя:</label>
                                <div>
                                    <input type="text" v-model="document.firstName"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Отчество:</label>
                                <div>
                                    <input type="text" v-model="document.parentName"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-md-3">
                                <label>ИИН/БИН:</label>
                                <div>
                                    <input type="text" v-model="document.iin"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Тип:</label>
                                <div>
                                    <select v-model="document.classISN" class="form-control">
                                        <option v-for="type in counterpartyType" :value="type[0]">{{ type[1] }}</option>
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
</template>

<script>
import DatePicker from "vue2-datepicker";
import 'vue2-datepicker/index.css';
import MaskedInput from 'vue-text-mask';
import 'vue2-datepicker/locale/ru';
import moment from 'moment'
export default {
    name: "counterparty-journal-modal",
    props: {
        results: {},
        counterparty: {
            isn: '',
            iin: '',
            fullName: '',
            classISN: '',
        },
        agent: {
            isn: '',
            iin: '',
            fullName: '',
            classISN: '',
            type: '',
        },
        contragent: {},
        previousCuratorAgent: {},
        recordingCounterparty: Object ,
    },
    data() {
        return {
            document: {
                iin: '',
                firstName: '',
                lastName: '',
                parentName: '',
                classISN: '',
            },
            docDate: new Date(),
            maskDate: [/\d/, /\d/, ".", /\d/, /\d/, ".", /\d/, /\d/, /\d/, /\d/],
            modalHide: '',
            loading: false,
            resultDoc: false,
            counterpartyType: [],
            searchingResult: {},
            check:false,
            index: '',
        }
    },
    created() {
        this.getBranchData();
        this.getUserList();
        this.getCounterpartyType();
    },
    methods: {
        changeCheck(res, id){
            // console.log(res)
            // console.log(id)
            // console.log(this.counterparty)
            if(this.searchingResult[id] !== id || this.searchingResult[id] === id){
                this.counterparty.isn = ''
                this.counterparty.fullName = ''
            }
            this.counterparty.isn = res.isn
            this.counterparty.fullName = res.lastName + ' ' + res.firstName + ' ' + res.parentName
        },
        getDatePicker() {
            const vm = this;
            vm.document.docdate = vm.docDate.getDate() +'.'+ ("0" + (vm.docDate.getMonth() + 1)).slice(-2) +'.'+ vm.docDate.getFullYear();
        },
        getBranchData() {
            this.axios.post('/getSearchBranch', {}).then(response => {
                this.options = response.data.result;
            })
        },
        getCounterpartyType() {
            this.axios.post('/document/getCounterpartyType', {}).then((response) => {
                this.counterpartyType = response.data.counterpartyType;
            });
        },
        getUserList() {
            let data = {sz:true}
            this.axios.post('/full/getFullBranch', data).then((response) => {
                this.userList = response.data.result;
                this.isLoading = false;
            });
        },
        onChange(e, res){
            this.counterparty.isn = res.isn
            this.counterparty.fullName = res.lastName + ' ' + res.firstName + ' ' + res.parentName
        },
        searchCounterparty() {
            this.loading = true;
            let data = {
                document: this.document,
            }
            this.axios.post('/searchCounterparty', data).then((response) => {
                if(response.data.error) {
                    this.loading = false;
                    alert(response.data.error);
                }
                this.searchingResult = response.data.result
                this.loading = false;
                if(this.searchingResult.length === 1){
                    if(this.searchingResult[0].isn === null){
                    }
                    this.counterparty.isn = this.searchingResult[0].isn
                    this.counterparty.fullName = this.searchingResult[0].lastName + ' ' + this.searchingResult[0].firstName + ' ' + this.searchingResult[0].parentName
                }
            });
        },
        selectCounterparty(res, id){
                this.counterparty.isn = res.isn
                this.counterparty.fullName = res.lastName + ' ' + res.firstName + ' ' + res.parentName
                this.getInfo();
        },
        getInfo(){
            this.loading = true;
            if (this.recordingCounterparty.type === 'Контрагент'){
                this.results.contragent.value = this.counterparty.fullName
                this.results.contragent.subjIsn = this.counterparty.isn
                this.contragent.fullName = this.counterparty.fullName
                this.contragent.isn = this.counterparty.isn
            }else if(this.recordingCounterparty.type === 'Куратор агента (предыдущий, при перезакреплении)'){
                for(let i=0; i<this.results.resDop.length; i++){
                    if(this.results.resDop[i].fullname === this.recordingCounterparty.type){
                        this.previousCuratorAgent.fullName = this.counterparty.fullName
                        this.previousCuratorAgent.isn = this.counterparty.isn
                        this.previousCuratorAgent.type = this.recordingCounterparty.type
                        this.results.resDop[i].value = this.counterparty.fullName
                        this.results.resDop[i].val = this.counterparty.isn
                    }
                }
            }else {
                for(let i=0; i<this.results.docrows.length; i++){
                    if(this.results.docrows[i].fieldname === this.recordingCounterparty.type){
                        this.agent.fullName = this.counterparty.fullName
                        this.agent.isn = this.counterparty.isn
                        this.agent.type = this.recordingCounterparty.type
                        this.results.docrows[i].value_name = this.counterparty.fullName
                        this.results.docrows[i].value = this.counterparty.isn
                    }
                }
            }
            this.$parent.$refs.modalCounterparty.click()
            this.loading = false;
        },
        close() {
            this.$parent.$refs.modalCounterparty.click()
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
