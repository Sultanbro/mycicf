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
                    <div class="col-md-6">
                        <table class="table table-responsive-sm table-stripper table-data table-bordered">
                            <thead>
                            </thead>
                            <tbody>
                                <div class="col-md-12" v-if="!editMode">
                                    <tr class="thead-inverse">
                                        <th class="col-md-6">Номер договора</th>
                                        <th class="">Комментарии</th>
                                    </tr>
                                </div>
                                <div class="col-md-12" v-if="editMode">
                                    <tr class="thead-inverse">
                                        <th class="col-md-6">Номер договора</th>
                                        <th class="">Комментарии</th>
                                    </tr>
                                    <tr v-for="name in contractName">
                                        <td class="input-group">
                                            <input v-model="name.contractNumber" @click="OpenModal(name)" type="text" class="form-control">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn-light" @click="OpenModal(name)">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                                <button type="submit" class="btn-light" @click="clearInfo(name)">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="col-md-6">
                                            <input v-model="name.comment" type="text" class="form-control">
                                        </td>
                                    </tr>
                                </div>
                            </tbody>
                        </table>
                        <div>
                            <button type="submit" class="btn btn-primary" @click="addContract">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button v-show="false" ref="modalContract" type="button" data-toggle="modal" data-target="#contractJournal">Large modal</button>
        <contract-journal-modal
            :recordingCounterparty="recordingCounterparty"
            :results="results"
            :contractNameTemporary="contractNameTemporary"
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
        recordingCounterparty: Object ,
        contractList: Object,
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
            contractNameTemporary: {},
        }
    },
    created() {

    },
    methods: {
        getDatePicker() {
            const vm = this;
            vm.document.docdate = vm.docDate.getDate() +'.'+ ("0" + (vm.docDate.getMonth() + 1)).slice(-2) +'.'+ vm.docDate.getFullYear();
        },
        addContract(){
            this.editMode = true;
            let i = this.contractName.length;
            this.contractName[i] = {
                id: i+1,
                contractNumber: '',
                comment: '',
            }
            this.editMode = false;
            this.editMode = true;
        },
        OpenModal(doc) {
            // if (doc === 'Список договоров  для внесение изменение') {
                this.preloader(false);
                this.contractNameTemporary = doc
                this.$refs.modalContract.click();
            // }
        },
        clearInfo(data){
            for(let i = 0; i< this.contractName.length; i++){
                if(this.contractName[i] == data){
                    this.contractName[i].contractNumber = ''
                    this.contractName[i].comment = ''
                }
            }
        },
        close() {
            this.$parent.$refs.modalContractList.click()
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
