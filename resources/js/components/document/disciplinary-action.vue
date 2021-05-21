<template>
    <div class="disciplinary-action">
        <div class="pt-4">
            <div class="border-radius15 box-shadow centcoins-date-indicators bg-white ml-2 mr-2 pl-5 pr-5 pt-4 pb-3">
                <h4 class="text-center">{{results.className}}</h4>
                <div class="flex-row jc-sb mt-3 mb-3">
                    <div class="col-md-8 offset-md-4">
                        <div class="mb-4">
                            <div v-if="idShow" class="form-group row">
                                <label class="col-md-4 col-form-label">Номер:</label>
                                <div class="col-md-8">
                                    <input type="text" v-model="results.id" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4" v-for="result in results.result1">
                            <div v-if="!isLoading && result.fullname == 'Адресат'" class="form-group row" required>
                                <label class="col-md-4 col-form-label">{{result.fullname}}:</label>
                                <div class="col-md-8">
                                    <treeselect v-model="result.val" :placeholder="'Не выбрано'" :disabled="addChange"
                                                id="addressee" :multiple="false" :options="userList" :disable-branch-nodes="true" required/>
                                </div>
                            </div>
                            <div v-if="!isLoading && result.fullname == 'Исполнитель'" class="form-group row">
                                <label class="col-md-4 col-form-label">{{result.fullname}}:</label>
                                <div class="col-md-8">
                                    <treeselect v-model="result.val" :placeholder="'Не выбрано'" :disabled="addChange"
                                                id="executor" :multiple="false" :options="userList" :disable-branch-nodes="true" required/>
                                    <!--                                        <span class="text-danger" v-if="result.val !== '(unknown)'">*Обязательное поле</span>-->
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label">Куратор документа:</label>
                            <div class="col-md-8">
                                <input type="text" v-model="results.emplName"
                                       class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row justify-content-between pt-4">
                            <div>
                                <label>Дата рег.</label>
                                <div>
                                    <date-picker
                                        v-model="docDate"
                                        format="DD.MM.YYYY"
                                        :disabled-date="disabledDates"
                                        @change="getDatePicker"
                                        :disabled="addChange"
                                    >
                                        <template #input="slotProps">
                                            <masked-input
                                                type="text"
                                                class="mx-input"
                                                :mask="maskDate"
                                                v-bind="slotProps.props"
                                                v-on="slotProps.events"
                                            >
                                            </masked-input>
                                        </template>
                                    </date-picker>
                                </div>
                            </div>
                            <div>
                                <label>Статус</label>
                                <div>
                                    <input type="text" v-model="results.status"
                                           class="form-control" readonly>
                                </div>
                            </div>
                            <div>
                                <label>Стадия</label>
                                <div>
                                    <input type="text" v-model="results.stage"
                                           class="form-control" readonly>
                                </div>
                            </div>
<!--                                <div v-if="!stage">-->
<!--                                    <label>Статус</label>-->
<!--                                    <div>-->
<!--                                        <input type="text" v-model="results.statusName"-->
<!--                                               class="form-control" readonly>-->
<!--                                    </div>-->
<!--                                </div>-->
                        </div>
                    </div>
                </div>

                <!--                !!$show->DocRow->row!! -->
                <div v-if="results.docrows.length !== 0">
                    <div class="row justify-content-between pt-4">
                        <div class="col-4 pt-4" v-for="docrow in orderedDocrows">
                            <div>
                                <label>{{ docrow.fieldname }}</label>
                                <div v-if="docrow.fieldname === 'ФИО работника' || docrow.fieldname === 'ФИО Сотрудника' || docrow.fieldname === 'ФИО сотрудника'">
                                    <treeselect
                                        v-model="docrow.value" :disabled="addChange" required
                                        :multiple="false"
                                        :options="userList"
                                        @select="changeSelected($event)"
                                        :disable-branch-nodes="true"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Должность'">
                                    <input type="text" v-model="duty" class="form-control" :disabled="addChange">
                                </div>
                                <div v-if="docrow.fieldname === '% лишения переменной части ЗП'">
                                    <select v-model="docrow.value"  :disabled="addChange" class="form-control" required>
                                        <option value="2018241" selected>100%</option>
                                        <option value="2018231">50%</option>
                                    </select>
                                </div>
                                <div v-if="docrow.fieldname === 'Подразделение'">
                                    <treeselect
                                        :multiple="false" :options="options" :placeholder="'Выберите'" v-model="docrow.value"
                                        :disabled="addChange"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Вид взыскания'">
                                    <select v-model="docrow.value"  :disabled="addChange" class="form-control" required>
                                        <option value="2018201" selected>Выговор</option>
                                        <option value="2018191">Замечание</option>
                                        <option value="2018211">Строгий выговор</option>
                                    </select>
                                </div>
                                <div v-if="docrow.fieldname === 'Месяц'">
                                    <select v-model="docrow.value" :disabled="addChange" class="form-control" placeholder="Выберите месяц" required>
                                        <option value="Январь" selected>Январь</option>
                                        <option value="Февраль">Февраль</option>
                                        <option value="Март">Март</option>
                                        <option value="Апрель">Апрель</option>
                                        <option value="Май">Май</option>
                                        <option value="Июнь">Июнь</option>
                                        <option value="Июль">Июль</option>
                                        <option value="Август">Август</option>
                                        <option value="Сентябрь">Сентябрь</option>
                                        <option value="Октябрь">Октябрь</option>
                                        <option value="Ноябрь">Ноябрь</option>
                                        <option value="Декабрь">Декабрь</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-3" v-show="results.docParam.showRemark === 'Y'">
                    <div class="row ml-1 pb-2">Примечание</div>
                    <textarea v-model="results.showRemark" type="text pt-2 pb-2" :rows="wallRows" :disabled="addChange" placeholder="..." class="form-control"></textarea>
                </div>
                <div class="pt-3" v-show="results.docParam.showRemark2 === 'Y'">
                    <div class="row ml-1">Доп. Примечание</div>
                    <textarea v-model="results.showRemark2" type="text pt-2" :rows="wallRows" :disabled="addChange" placeholder="..." class="form-control"></textarea>
                </div>
                <div class="row mt-5">
                    <div class="col-md-3">
                        <button v-show="(results.docParam.button1caption === 'Заполнить СЗ' && results.docParam.showbutton1 === 'Y') || (results.docParam.button2caption === 'Заполнить СЗ' && results.docParam.showbutton2 === 'Y')"
                                v-if="fillIn" class="btn btn-primary btn-block2" @click="fillInSz()">
                            Заполнить СЗ
                        </button>
                    </div>
                    <div class="col-md-5 text-align-center">
                        <i v-if="loading" class="fas fa-spinner fa-spin"></i>
<!--                        <button v-if="sendOutForm" class="btn btn-primary btn-block2" @click="sendOut()">-->
<!--                            Разослать на согласование-->
<!--                        </button>-->
                        <button v-show="(results.docParam.button1caption === 'Сформировать лист согласования' && results.docParam.showbutton1 === 'Y') || (results.docParam.button2caption === 'Сформировать лист согласования' && results.docParam.showbutton2 === 'Y')"
                                v-if="toForm" class="btn btn-primary btn-block2" :disabled="!addChange" @click="buttonClick()">
                            Сформировать лист согласования
                        </button>
<!--                        <button v-if="addChange && agrList" class="btn btn-primary btn-block2" :disabled="!addChange" @click="sendOut()">-->
<!--                            Разослать на согласование-->
<!--                        </button>-->
                        <button v-if="saveDoc" class="btn btn-success btn-block2" @click="saveDocument()">
                            Сохранить
                        </button>
                    </div>
                    <div class="col-md-4">
                        <i v-if="extraLoading" class="fas fa-spinner fa-spin"></i>
                        <button v-show="(results.docParam.button2caption === 'Внести изменения в СЗ' && results.docParam.showbutton2 === 'Y') || (results.docParam.button3caption === 'Внести изменения в СЗ' && results.docParam.showbutton3 === 'Y')"
                                v-if="addChange" class="btn btn-danger btn-block2" @click="addChangeForm()">
                            Внести изменения в СЗ
                        </button>
                        <button v-if="!addChange && annul" class="btn btn-danger btn-block2" @click="annulSz()">
                            Аннулировать СЗ
                        </button>
                    </div>
                    <div v-show="loading" class="loading-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div v-show="extraLoading" class="loading-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-4">
            <div class="border-radius15 box-shadow centcoins-date-indicators bg-white ml-2 mr-2 pl-2 pr-2 pt-4 pb-3">
                <table class="table text-align-center">
                    <thead>
                    <tr class="header color-white">
                        <th scope="col" style="width: 5%;">№</th>
                        <th scope="col" style="width: 15%;" class="thead-border">Атрибут</th>
                        <th scope="col" style="width: 40%;" class="thead-border">Значение</th>
                        <th scope="col" style="width: 40%;" class="thead-border">Примечание</th>
                    </tr>
                    </thead>
                    <tbody class="date-color">
                    <tr v-for="(result, index) in results.resDop" :key="index">
                        <th scope="row">{{index + 1}}</th>
                        <td>{{result.fullname}}</td>
                        <td>
                            <div v-if="result.fullname === 'Согласующий 1' || result.fullname === 'Согласующий 2'
                                || result.fullname === 'Согласующий 3'">
                                <treeselect v-model="result.val" placeholder="Не выбрано" :disabled="addChange"
                                            :multiple="false" :options="userList" :disable-branch-nodes="true"/>
                            </div>
                            <div v-else-if="result.fullname === 'Лист согласования'">
                                <div>
                                    <div v-model="result.val" class="pointer" scope="col" @click="OpenModal(result.val)">{{result.val}}</div>
                                </div>
                            </div>
                            <div v-else-if="result.fullname === 'Причина аннулирования СЗ'">
                                <div>
                                    <input type="text" v-model="result.val"
                                           class="form-control" :disabled="addChange">
                                </div>
                            </div>
                            <div v-else>
                                <div>
                                    <input type="text" v-model="result.val"
                                           class="form-control" :disabled="addChange">
                                </div>
                            </div>
                        </td>
                        <th>
                            <input type="text" rows="2" v-model="result.remark"
                                   class="form-control" :disabled="addChange">
                        </th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <FlashMessage></FlashMessage>
        <button v-show="false" ref="modalButton" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>
        <document-modal
            :coordination="coordination"
            :isn="listDocIsn"
            :changeMatch="changeMatch"
        >
        </document-modal>
    </div>
</template>
<script>
import DatePicker from "vue2-datepicker";
import 'vue2-datepicker/index.css';
import MaskedInput from 'vue-text-mask';
import 'vue2-datepicker/locale/ru';
import moment from 'moment'
import DocumentModal from "./document-modal";
export default {
    name: "disciplinary-action",
    props: {
        results: Object,
        clearSum:Function,
    },
    data() {
        return {
            changeMatch: {
                status: false
            },
            docDate: new Date(),
            maskDate: [/\d/, /\d/, ".", /\d/, /\d/, ".", /\d/, /\d/, /\d/, /\d/],
            userList : [],
            proxyTypes: [],
            isLoading: false,
            loading: false,
            extraLoading: false,
            addChange: false,
            annul: false,
            res: {},
            usersInfo: [],
            duty : "",
            dept : "",
            options: null,
            parentId: 50,
            docIsn: null,
            button: null,
            result: null,
            listDocIsn: null,
            coordination: {},
            saveDoc: true,
            required: false,
            type: 1,
            toForm: false,
            fillIn: false,
            index: '',
            unitGroups: [],
            wallRows: 2,
            idShow: false,
            isn: '0',
            delete: '0',
        }
    },
    created() {
        this.getUserList();
        this.getUsersInfo();
        this.getBranchData();
        this.getProxyTypes();
        Vue.filter('splitNumber', function (value) {
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        })
    },
    methods: {
        getDatePicker() {
            const vm = this;
            vm.results.docdate = vm.docDate.getDate() +'.'+ ("0" + (vm.docDate.getMonth() + 1)).slice(-2) +'.'+ vm.docDate.getFullYear();
        },
        handleChangeDate() {
            return moment(date).format('DD.MM.YYYY');
        },
        disabledDates(date) {
            const today = moment(new Date()).add(-1,'days').toDate();
            today.setHours(0, 0, 0, 0);
            return date <= today;
        },
        changeSelected(index,e){
            //console.log(this.usersInfo[parseInt(e.id)].duty);
            // if(this.results.docrows[parseInt(index)+1] === 'Должность') {
            this.duty = this.usersInfo[parseInt(e.id)].duty
            this.dept = this.usersInfo[parseInt(e.id)].dept
        },
        getUsersInfo(){
            this.axios.post('/document/getUserInfo', {}).then((response) => {
                this.usersInfo = response.data.usersInfo;
            });
        },
        getProxyTypes(){
            this.axios.post('/document/getProxyType', {}).then((response) => {
                this.proxyTypes = response.data.proxyTypes;
            });
        },
        getUserList() {
            let data = {sz:true}
            this.axios.post('/full/getFullBranch', data).then((response) => {
                this.userList = response.data.result;
                this.isLoading = false;
            });
        },
        getBranchData() {
            this.axios.post('/getSearchBranch', {}).then(response => {
                this.options = response.data.result;
            })
        },
        annulSz(){
            for(let i=0; i<this.results.resDop.length; i++){
                if(this.results.resDop[i].fullname === 'Причина аннулирования СЗ' && this.results.resDop[i].val === ''){
                    this.flashMessage.warning({
                        title: "!",
                        message: 'Укажите причину аннулирования служебной записки в доп.атрибутах документа',
                        time: 5000
                    });
                    return;
                }
            }
            this.extra = true;
            this.annul = true;
            this.addChange = false;
            this.results.status = 'Аннулирован'
            let data = {
                results: this.results,
                docIsn: this.docIsn,
            }
            this.axios.post('/document/saveDocument', data)
                .then((response) => {
                    if(response.data.success) {
                        this.results.status = response.data.status;
                        this.results.stage = response.data.stage;
                        this.extraLoading = false;
                        this.addChange = false;
                        this.annul = false;
                        this.toForm = false;
                        this.fillIn = false;
                        this.saveDoc = false;
                    } else {
                        this.addChange = false;
                        this.annul = true;
                        this.extraLoading = false;
                    }
                });
            this.addChange = false;
            this.extraLoading = false;
        },
        saveDocument(){
            this.loading = false;
            // if(this.results.result1[0].val === '' || this.results.result1[1].val === '' || this.results.docdate === ''){
            //     this.flashMessage.warning({
            //         title: "!",
            //         message: 'Пожалуйста заполните все обязательные поля',
            //         time: 5000
            //     });
            //     return;
            // }
            this.loading = true;
            if(this.duty.length > 0){
                for(let i=0; i<this.results.docrows.length; i++){
                    if(this.results.docrows[i].fieldname === 'Должность'){
                        this.results.docrows[i].value_name = this.duty
                    }
                }
            }
            let data = {
                results: this.results,
                docIsn: this.docIsn,
            }
            this.axios.post('/document/saveDocument', data)
                .then((response) => {
                    if(response.data.success) {
                        this.loading = false;
                        this.docIsn = this.docIsn ? this.docIsn : response.data.DocISN;
                        this.results.stage = response.data.stage;
                        this.addChange = true;
                        this.toForm = true;
                        this.fillIn =true;
                        this.saveDoc = false;
                        this.annul = false;
                    } else {
                        this.addChange = false;
                        this.loading = false;
                        alert(response.data.error);
                    }
                    this.loading = false;
                })
                .catch(function (error) {
                    //alert(error.response);
                });
        },
        addChangeForm() {
            this.extraLoading = true;
            if(this.results.docParam.button2caption === 'Внести изменения в СЗ' && this.results.docParam.showbutton2 === 'Y'){
                this.button = 'BUTTON2'
            } else if(this.results.docParam.button3caption === 'Внести изменения в СЗ' && this.results.docParam.showbutton3 === 'Y'){
                this.button = 'BUTTON3'
            }
            let data = {
                docIsn: this.docIsn,
                button: this.button,
            }
            this.axios.post('/document/buttonClick', data)
                .then((response) => {
                    if(response.data.success) {
                        this.results.status = response.data.status;
                        this.results.stage = response.data.stage;
                        this.listDocIsn = response.data.DOCISN
                        for(let i=0; i<this.results.resDop.length; i++){
                            if(this.results.resDop[i].fullname === 'Лист согласования'){
                                this.results.resDop[i].val = this.listDocIsn
                            }
                        }
                        this.extraLoading = false;
                        this.addChange = false;
                        this.toForm = false;
                        this.annul = true;
                        this.saveDoc = true;
                    } else {
                        this.addChange = true;
                        this.extraLoading = false;
                    }
                })
        },
        onlyNumber ($event) {
            //console.log($event.keyCode); //keyCodes value
            let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
            if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                $event.preventDefault();
            }
        },
        fillInSz(){
            this.loading = true;
            if(this.results.docParam.button1caption === 'Заполнить СЗ' && this.results.docParam.showbutton1 === 'Y'){
                this.button = 'BUTTON1'
            } else if(this.results.docParam.button2caption === 'Заполнить СЗ' && this.results.docParam.showbutton2 === 'Y'){
                this.button = 'BUTTON2'
            }
            let data = {
                docIsn: this.docIsn,
                button: this.button,
            }
            this.axios.post('/document/buttonClick', data)
                .then((response) => {
                    if(response.data.success) {
                        if((this.results.docParam.button1caption === 'Заполнить СЗ' && this.results.docParam.showbutton1 === 'Y') || (this.results.docParam.button2caption === 'Заполнить СЗ' && this.results.docParam.showbutton2 === 'Y')){
                            let dat = {
                                docisn: this.docIsn,
                                isn: this.results.classisn,
                                button: this.button,
                            }
                            this.axios.get('/document/'+this.results.classisn+'/'+this.docIsn, dat).then((response) => {
                                this.results.showRemark = response.data.results.showRemark === null ? '' : response.data.results.showRemark
                                this.results.showRemark2 = response.data.results.showRemark2 === null ? '' : response.data.results.showRemark2
                                this.results.id = response.data.results.id;
                                if(this.results.id.length > 0){
                                    this.idShow = true;
                                }
                                this.fillIn = true;
                                this.toForm = true;
                                this.saveDoc = false;
                            })
                        } else {
                            this.fillIn = true;
                            this.toForm = true;
                            this.saveDoc = false;
                        }
                    } else {
                        this.addChange = false;
                        this.loading = false;
                    }
                    this.loading = false;
                    this.addChange = true;
                })
                .catch(function (error) {
                    //alert(error.response);
                });
        },
        buttonClick() {
            this.loading = true;
            if(this.results.docParam.button1caption === 'Сформировать лист согласования' && this.results.docParam.showbutton1 === 'Y'){
                this.button = 'BUTTON1'
            } else if(this.results.docParam.button2caption === 'Сформировать лист согласования' && this.results.docParam.showbutton2 === 'Y'){
                this.button = 'BUTTON2'
            }
            let data = {
                docIsn: this.docIsn,
                button: this.button,
            }
            this.axios.post('/document/buttonClick', data)
                .then((response) => {
                    if(response.data.success) {
                        this.results.status = response.data.status
                        this.results.stage = response.data.stage
                        this.toForm = false;
                        this.fillIn = false;
                        this.listDocIsn = response.data.DOCISN
                        if(this.listDocIsn.length > 0){
                            for(let i=0; i<this.results.resDop.length; i++){
                                if(this.results.resDop[i].fullname === 'Лист согласования'){
                                    this.results.resDop[i].val = this.listDocIsn
                                }
                            }
                        }
                        this.result = response.data.error
                        this.saveDoc = false;
                    } else {
                        this.addChange = false;
                    }
                    this.loading = false;
                    this.addChange = true;
                })
                .catch(function (error) {
                    //alert(error.response);
                });
        },
        // sendOut(){
        //     this.loading = true;
        //     this.results.status = 2522
        //     let data = {
        //         docIsn: this.listDocIsn,
        //         type: this.type,
        //         results: this.results,
        //     }
        //     this.axios.post('/sendOut', data)
        //         .then((response) => {
        //             if(response.data.success) {
        //                 this.results.status = response.data.status;
        //                 this.results.stage = response.data.stage;
        //                 this.loading = false;
        //                 this.addChange = true;
        //                 this.sendOutForm = false;
        //                 this.saveDoc = false;
        //             } else {
        //                 this.addChange = false;
        //                 this.loading = false;
        //             }
        //             this.addChange = true;
        //         })
        //         .catch(function (error) {
        //             //alert(error.response);
        //         });
        // },
        OpenModal(doc) {
            this.preloader(true);
            this.changeMatch.status = false;
            if(this.listDocIsn === null || doc !== this.listDocIsn){
                for(let i=0; i<this.results.result.length; i++){
                    if(this.results.result[i].fullname === 'Лист согласования'){
                        this.listDocIsn = this.results.result[i].val
                    }
                }
            }
            this.axios.post('/getCoordinationInfo', {docIsn: this.listDocIsn}).then(response => {
                if(response.data.success){
                    this.coordination = response.data.response;
                    // this.coordinator = response.data.response.Coordinations;
                    // for(const item in response.data.response.Coordinations) {
                    //     this.coordinator = item.SubjISN;
                    // }
                    this.preloader(false);
                    this.$refs.modalButton.click();
                }else{
                    this.attachments = [];
                }
            });
        },
        preloader(show){
            if(show){
                document.getElementById('preloader').style.display = 'flex';
            }else{
                document.getElementById('preloader').style.display = 'none';
            }
        },
        // }, :key="`${index}-${docrow.value}`"
    },
    computed: {
        orderedDocrows: function () {
            return _.orderBy(this.results.docrows, 'orderno')
        },
    },
    components: {
        DocumentModal,
        DatePicker,
        MaskedInput,
    },
}
</script>
<style scoped>
.vdp-datepicker input {
    background: none;
}
.datepicker-label {
    z-index: 999;
    color: rgb(0, 0, 0);
    font-size: 1.4rem;
    font-family: Roboto, sans-serif;
    margin-top: -25px;
    margin-left: 15px;
    background: white;
}
</style>

