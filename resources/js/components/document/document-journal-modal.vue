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
                                    <span class="ml-2">Журнал документа</span>
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
                    </div>
                    <div class="pl-5 pb-4 pr-5">
                        <div class="border-bottom: 1px solid grey">
                            <span class="color-blue-standart">Критерии</span>
                        </div><hr>
                        <div class="row justify-content-between">
                            <div>
                                <label>Номер документа:</label>
                                <div>
                                    <input type="text"
                                           class="form-control">
                                </div>
                            </div>
                            <div>
                                <label>Внешний номер:</label>
                                <div>
                                    <input type="text"
                                           class="form-control">
                                </div>
                            </div>
                            <div>
                                <label>Тип документа:</label>
                                <div>
                                    <select class="form-control">
                                        <option :value="1">1</option>
                                    </select>
                                    <div>
                                        <input
                                            type="checkbox"
                                            true-value="Y"
                                            false-value="N"
                                        >Показывать аннулированные документы
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Дата документа с:</label>
                                <div>
                                    <input class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Дата документа до:</label>
                                <div>
                                    <input class="form-control"
                                           type="tel"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between pt-2">
                            <div>
                                <label>Контрагент:</label>
                                <div>
                                    <input type="text"
                                           class="form-control">
                                </div>
                            </div>
                            <div>
                                <label>Куратор (сотрудник):</label>
                                <div>
                                    <input type="text"
                                           class="form-control">
                                </div>
                            </div>
                            <div>
                                <label>Куратор (Подразделение):</label>
                                <div>
                                    <select class="form-control">
                                        <option :value="1">1</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label>Статус документа:</label>
                                <div>
                                    <select class="form-control">
                                        <option :value="1">1</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label>Стадия прохождения документа:</label>
                                <div>
                                    <select class="form-control">
                                        <option :value="1">1</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class=" row col-md-6 offset-md-6">
                            <div class="col-md-4">
                                <label>Сумма док. от:</label>
                                <div>
                                    <select class="form-control">
                                        <option :value="1">1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Сумма док. до:</label>
                                <div>
                                    <select class="form-control">
                                        <option :value="1">1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Валюта:</label>
                                <div>
                                    <select class="form-control">
                                        <option :value="1">1</option>
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
                                <div class="table-responsive-sm pb-8">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Тип документа</td>
                                            <td>№</td>
                                            <td>Дата</td>
                                            <td>Сумма док-та</td>
                                            <td>Контрагент</td>
                                            <td>Статус</td>
                                            <td>Стадия</td>
                                            <td>Валюта</td>
                                            <td>Сумма в валюте</td>
                                            <td>Примечание</td>
                                            <td>Начало</td>
                                            <td>Окончание</td>
                                            <td>Доср.прекр.</td>
                                            <td>Внешн. №</td>
                                            <td>Подразделение</td>
                                            <td>Куратор</td>
                                            <td>Подписант</td>
                                            <td>Дата создания</td>
                                            <td>Создатель</td>
                                            <td>Источник создания</td>
                                            <td>Коп</td>
                                            <td>ISN</td>
                                        </tr>
                                        <tr>
                                                <input type="text" class="form-control">
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
    data() {
        return {
            document: Object,
            docDate: new Date(),
            maskDate: [/\d/, /\d/, ".", /\d/, /\d/, ".", /\d/, /\d/, /\d/, /\d/],
            modalHide: '',
            loading: false,
            resultDoc: false
        }
    },
    created() {
        this.getBranchData();
        this.getUserList();
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
        close() {
            this.$parent.$refs.modalButton.click()
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
