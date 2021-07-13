<template>
    <div class="modal fade bd-example-modal-lg" :style="modalHide" id="contractListModal" tabindex="-1" role="dialog"
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
                                    <span class="ml-2">Приложение СЗ. На внесение изменений в договор</span>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                    <div class="flex-row jc-sb flex-wrap">-->
<!--                        <div class="pl-5 pt-4 pb-4 pr-5">-->
<!--                            <input type="checkbox">-->
<!--                            <span class="ml-2">Ограничение числа строк результата</span>-->
<!--                        </div>-->
<!--                        <i v-if="loading" class="fas fa-spinner fa-spin"></i>-->
<!--                        <div class="pl-5 pt-4 pb-4 pr-5">-->
<!--                            <button class="btn btn-info" @click="searchCounterparty"><i class="fa fa-check">Поиск</i></button>-->
<!--                        </div>-->
<!--                        <div class="tex">-->
<!--                            <button class="btn btn-success" @click="getInfo"><i class="fa fa-check">Ok</i></button>-->
<!--                        </div>-->
<!--                        <div v-show="loading" class="loading-ellipsis">-->
<!--                            <div></div>-->
<!--                            <div></div>-->
<!--                            <div></div>-->
<!--                            <div></div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div>
                        <table class="table table-responsive-sm table-stripper table-data table-bordered">
                            <thead class="thead-inverse">
                            <tr>
                                <th>Номер договора</th>
                                <th>Комментарии</th>
                            </tr>
                            </thead>
                            <tbody>
                                <div v-if="!editMode" v-for="name in contractName">
                                    <tr><div class="input-group">
                                        <input v-model="name.contractNumber" @click="OpenModal('Список договоров  для внесение изменение')" type="text" class="form-control">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn-light" @click="OpenModal('Список договоров  для внесение изменение')">
                                                <i class="fa fa-search"></i>
                                            </button>
                                            <button type="submit" class="btn-light" @click="clearInfo('Список договоров  для внесение изменение')">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div></tr>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <button v-show="false" ref="modalContract" type="button" data-toggle="modal" data-target="#contractJournal">Large modal</button>
        <contract-journal-modal
            :recordingCounterparty="recordingCounterparty"
            :results="results"
            :contractName="contractName"
        >
        </contract-journal-modal>
    </div>
</template>

<script>
import DatePicker from "vue2-datepicker";
import 'vue2-datepicker/index.css';
import MaskedInput from 'vue-text-mask';
import 'vue2-datepicker/locale/ru';
import moment from 'moment'
import ContractJournalModal from "./contract-journal-modal";
export default {
name: "contract-list-modal",
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
        addressee: {
            fullName: '',
            isn: '',
            type: '',
        },
        worker: {
            fullName: '',
            isn: '',
            type: '',
        },
        contragent: {},
        previousCuratorAgent: {},
        recordingCounterparty: Object ,
        courtName: {},
        beneficiary: {},
    },
    data() {
        return {
            docDate: new Date(),
            maskDate: [/\d/, /\d/, ".", /\d/, /\d/, ".", /\d/, /\d/, /\d/, /\d/],
            modalHide: '',
            loading: false,
            resultDoc: false,
            counterpartyType: [],
            searchingResult: {},
            check:false,
            index: '',
            editMode: false,
            contractName: [],
        }
    },
    created() {
        this.getBranchData();
        this.getUserList();
        this.getCounterpartyType();
    },
    methods: {
        getDatePicker() {
            const vm = this;
            vm.document.docdate = vm.docDate.getDate() +'.'+ ("0" + (vm.docDate.getMonth() + 1)).slice(-2) +'.'+ vm.docDate.getFullYear();
        },
        addContract(){
            let i = this.contractName.length;
            this.contractName[i] = {
                id: i+1,
                contractNumber: '',
                comment: '',
            }
        },
        OpenModal(doc) {
            if (doc === 'Список договоров  для внесение изменение') {
                this.preloader(false);
                this.recordingCounterparty.type = doc
                this.$refs.modalContractList.click();
            }
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
        ContractJournalModal,
        DatePicker,
        MaskedInput,
    }
}
</script>

<style scoped>

</style>
