<template>
    <div class="modal fade bd-example-modal-lg" :style="modalHide" id="contractListAnnul" tabindex="-1" role="dialog"
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
                                    <span class="ml-2">Приложение СЗ. Список договоров для аннулирования/расторжения</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-row jc-sb flex-wrap">
                        <div class="offset-md-6">
                            <button class="btn btn-success" @click="getInfo"><i class="fa fa-check">Ok</i></button>
                        </div>
                    </div>
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
                                        <input v-model="name.contractNumber" @click="OpenModal(name)" type="text" class="form-control" :disabled="name.isn == '1' && contractListCheckBool">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn-light" @click="OpenModal(name)" :disabled="name.isn == '1' && contractListCheckBool">
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
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary" @click="addContract">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="offset-4 col-md-4">
                            <button type="submit" class="btn btn-primary" @click="saveContract">Сохранить
                            </button>
                        </div>
                        <div v-show="loading" class="loading-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
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
import MaskedInput from "vue-text-mask";
import ContractJournalModal from "./contract-journal-modal";
import 'vue2-datepicker/index.css';
import 'vue2-datepicker/locale/ru';
export default {
name: "contract-list-annul",
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
            check:false,
            index: '',
            editMode: false,
            contractName: [],
            contractNameTemporary: {},
            contractListClassIsn: '826621',
            contractNameCheck: {},
            contractListCheckBool: false,
            searchingResult: {},
        }
    },
    methods: {
        getDatePicker() {
            const vm = this;
            vm.document.docdate = vm.docDate.getDate() +'.'+ ("0" + (vm.docDate.getMonth() + 1)).slice(-2) +'.'+ vm.docDate.getFullYear();
        },
        addContract(){
            this.editMode = true;
            let i = this.contractName.length;
            if(this.contractName.length != 0){
                if(this.contractName[i-1].isn == '0' && this.contractName[i-1].valn1 == ''){
                    alert('Сначала нужно сохранить договор!')
                    return;
                }
            }
            this.contractName[i] = {
                id: i+1,
                contractNumber: '',
                comment: '',
                valn1: '',
                isn: '0',
                delete: '0',
            }
            this.editMode = false;
            this.editMode = true;
        },
        saveContract(){
            if(this.contractName.length == 0){
                alert('Вы не создали документ!')
                this.$parent.$refs.modalContractListAnnul.click()
                return
            }
            for(let i=0; i<this.contractName.length; i++){
                if(this.contractName[0].valn1 == '' && this.contractName[0].isn == '0'){
                    alert('Вы не выбрали документ!')
                    this.contractName = []
                    this.$parent.$refs.modalContractListAnnul.click()
                    return
                }
                if(this.contractName[i].valn1 == undefined && this.contractName[i].isn == '0' || this.contractName[i].valn1 == '' && this.contractName[i].isn == '0'){
                    delete this.contractName[i]
                    this.contractName.splice(i, 1)
                    this.editMode = false
                    this.editMode = true
                    if(this.contractName.length == 0){
                        this.contractName = []
                        this.$parent.$refs.modalContractListAnnul.click()
                        return
                    }
                }
            }
            this.loading = true
            let data = {
                contractName: this.contractName,
                contractNameCheck: this.contractNameCheck,
                docDate: this.docDate,
                contractListClassIsn: this.contractListClassIsn,
                results: this.results,
                contractListDocIsn: this.contractList.isn,
            }
            this.axios.post('/document/saveDocument', data)
                .then((response) => {
                    if(response.data.success) {
                        for (let i=0; i<this.contractName.length; i++){
                            this.contractName[i].isn = '1'
                        }
                        this.contractListCheckBool = true
                        alert('Успешно сохранено!')
                    } else {
                        alert(response.data.error);
                    }
                    this.loading = false;
                })
                .catch(function (error) {
                    // alert(response.data.error);
                });
        },
        getInfo(){
            if(this.contractName[0].isn == '0'){
                alert('Вы не сохранили договор в Приложение !')
            }
            this.$parent.$refs.modalContractListAnnul.click();
        },
        OpenModal(doc) {
            this.preloader(true);
            this.preloader(false);
            this.contractNameTemporary = doc
            this.recordingCounterparty.type = 'Список договоров  для аннулирования/прекращения'
            this.$refs.modalContract.click();
        },
        clearInfo(doc){
            for(let i=0; i<this.contractName.length; i++){
                if(this.contractName[0].valn1 == '' && this.contractName[0].isn == '0'){
                    this.contractName = []
                    this.$parent.$refs.modalContractListAnnul.click()
                }
                if(this.contractName[i].valn1 == undefined && this.contractName[i].isn == '0' || this.contractName[i].valn1 == '' && this.contractName[i].isn == '0'){
                    delete this.contractName[i]
                    this.contractName.splice(i, 1)
                    this.editMode = false
                    this.editMode = true
                    if(this.contractName.length == 0){
                        this.contractName = []
                        this.$parent.$refs.modalContractListAnnul.click()
                    }
                }
            }
            this.contractNameCheck = doc
            let data = {
                contractList: this.travellersList,
                contractListCheckBool: this.contractListCheckBool,
                contractName: this.contractName,
                contractNameCheck: this.contractNameCheck,
                docDate: this.docDate,
                contractListClassIsn: this.contractListClassIsn,
                results: this.results,
                contractListDocIsn: this.contractList.isn,
            }
            this.axios.post('/document/saveDocument', data)
                .then((response) => {
                    if(response.data.success) {
                        this.results.docIsn = this.docIsn ? this.docIsn : response.data.docIsn
                        for (let i=0; i<this.contractName.length; i++){
                            if(doc == this.contractName[i]){
                                delete this.contractName[i]
                                this.contractName.splice(i, 1)
                            }
                        }
                        this.contractNameCheck = []
                        alert('Успешно удалено!')
                    } else {
                        alert(response.data.error);
                    }
                    this.loading = false;
                })
                .catch(function (error) {
                    // alert(response.data.error);
                });

        },
        close() {
            this.contractName = []
            this.$parent.$refs.modalContractListAnnul.click()
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
