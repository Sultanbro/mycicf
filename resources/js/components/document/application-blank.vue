<template>
    <div class="application-blank">
        <div class="pt-4">
            <div class="border-radius15 box-shadow centcoins-date-indicators bg-white ml-2 mr-2 pl-5 pr-5 pt-4 pb-3">
                <h4 class="text-center">{{results.className}}</h4>
                <div class="flex-row jc-sb mt-3 mb-3">
                    <div class="row">
                        <div class="offset-md-4 col-md-8">
                            <div class="mb-4">
                                <div v-if="!isLoading && results.docParam.showSubject === 'Y'" class="form-group row">
                                    <label class="col-md-4 col-form-label">{{results.contragent.fullname}}:</label>
                                    <div class="col-md-8">
                                        <treeselect v-model="results.contragent.value" placeholder="Не выбрано" :disabled="addChange" :multiple="false"
                                                    :options="userList" :disable-branch-nodes="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4" v-for="result in results.result1">
                                <div v-if="!isLoading && result.fullname == 'Адресат'" class="form-group row" required>
                                    <label class="col-md-4 col-form-label">{{result.fullname}}:</label>
                                    <div class="col-md-8">
                                        <treeselect v-model="result.val" :placeholder="'Не выбрано'" :disabled="addChange"
                                                    id="addressee" :multiple="false" :options="userList" :disable-branch-nodes="true" required/>
                                        <!--                                        <span class="text-danger" v-if="result.val === ''">*Обязательное поле</span>-->
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
                                <div v-if="stage">
                                    <label>Статус</label>
                                    <div>
                                        <input type="text" v-model="status"
                                               class="form-control" readonly>
                                    </div>
                                </div>
                                <div v-if="stage">
                                    <label>Стадия</label>
                                    <div>
                                        <input type="text" v-model="stage"
                                               class="form-control" readonly>
                                    </div>
                                </div>
                                <div v-if="!stage">
                                    <label>Статус</label>
                                    <div>
                                        <input type="text" v-model="results.statusName"
                                               class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                !!$show->DocRow->row!! -->
                <div v-if="results.docrows.length !== 0">
                    <div class="row justify-content-between pt-4">
                        <div class="col-4 pt-4" v-for="docrow in orderedDocrows">
                            <div>
                                <label>{{ docrow.fieldname }}</label>
                                <div v-if="docrow.fieldname === 'Итого кол-во дней' || docrow.fieldname === 'ИТОГО кол-во дней'">
                                    <input @keypress="onlyNumber" type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Дата свидетельства о рождении'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'ФИО работника' || docrow.fieldname === 'ФИО работника '">
                                    <treeselect
                                        v-model="docrow.value" :disabled="addChange" required
                                        :multiple="false"
                                        :options="userList"
                                        @select="changeSelected(index,$event)"
                                        :disable-branch-nodes="true"/>
                                </div>
                                <div v-if="docrow.fieldname === 'ФИО сотрудника'">
                                    <treeselect
                                        v-model="docrow.value" :disabled="addChange" required
                                        :multiple="false"
                                        :options="userList"
                                        @select="changeSelected(index,$event)"
                                        :disable-branch-nodes="true"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Номер свидетельства о рождении'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Подразделение'">
                                    <treeselect
                                        :multiple="false" :options="options" :placeholder="'Выберите'" v-model="docrow.value"
                                        :disabled="addChange"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Подразделение перевода:'">
                                    <treeselect
                                        :multiple="false" :options="options" :placeholder="'Выберите'" v-model="docrow.value"
                                        :disabled="addChange"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Дата выхода С'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Дата перевода'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Дата приема'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <!--                                                :key="`${index}-${docrow.value}-${3}`"-->
                                <div v-if="docrow.fieldname === 'Дата последнего рабочего дня'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Должность'">
                                    <div v-if="results.classisn === '1007421'">
                                        <select v-model="docrow.val" :disabled="addChange" class="form-control" required>
                                            <option v-for="dut in duties" :value="dut[0]">{{ dut[1] }}</option>
                                        </select>
                                    </div>
                                    <div v-else><input type="text" v-model="duty" class="form-control"
                                                  :disabled="addChange">{{ results.duty }}
                                    </div>
                                </div>
                                <div v-if="docrow.fieldname === 'Перевести на должность:'">
                                    <select v-model="docrow.val" :disabled="addChange" class="form-control" required>
                                        <option v-for="dut in duties" :value="dut[0]">{{ dut[1] }}</option>
                                    </select>
                                </div>
                                <div v-if="docrow.fieldname === 'Листок нетрудоспособности №'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Наименование медицинского учреждения, выдавшего листок нетрудоспособности'">
                                    <input type="text"
                                           v-model="docrow.value_name" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Дата С'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.val" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Период С' || docrow.fieldname === 'Период, с'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.val" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Период ПО' || docrow.fieldname === 'Период, по'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.val" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Дата ПО'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.val" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Виды родственных отношений'">
                                    <select v-model="docrow.val" :disabled="addChange" class="form-control" required>
                                        <option v-for="relation in relationTo" :value="relation[0]">{{ relation[1] }}</option>
                                    </select>
                                </div>
                                <div v-if="docrow.fieldname === 'Проработанный период С'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.val" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Проработанный период ПО'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.val" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Пострадавших вследствие'">
                                    <input type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-3" v-show="results.docParam.showRemark === 'Y'">
                    <div class="row ml-1 pb-2">Примечание</div>
                    <textarea type="text pt-2 pb-2" :rows="wallRows" :disabled="addChange" placeholder="..." class="form-control"></textarea>
                </div>
                <div class="pt-3" v-show="results.docParam.showRemark2 === 'Y'">
                    <div class="row ml-1">Доп. Примечание</div>
                    <textarea type="text pt-2" :rows="wallRows" :disabled="addChange" placeholder="..." class="form-control"></textarea>
                </div>
                <div class="row mt-5">
                    <div class="col-md-3">
                        <button v-show="results.docParam.button1caption === 'Y'" v-if="fillIn" class="btn btn-primary btn-block2" @click="fillInSz()">
                            Заполнить СЗ
                        </button>
                    </div>
                    <div class="col-md-5 text-align-center">
                        <i v-if="loading" class="fas fa-spinner fa-spin"></i>
                        <button v-if="sendOutForm" class="btn btn-primary btn-block2" @click="sendOut()">
                            Разослать на согласование
                        </button>
                        <button v-show="results.docParam.button2caption === 'Y'" v-if="!agrList &&  toForm" class="btn btn-primary btn-block2" :disabled="!addChange" @click="buttonClick()">
                            Сформировать лист согласования
                        </button>
                        <button v-if="addChange && agrList" class="btn btn-primary btn-block2" :disabled="!addChange" @click="sendOut()">
                            Разослать на согласование
                        </button>
                        <button v-if="saveDoc" class="btn btn-success btn-block2" @click="saveDocument()">
                            Сохранить
                        </button>
                    </div>
                    <div class="col-md-4">
                        <i v-if="extraLoading" class="fas fa-spinner fa-spin"></i>
                        <button v-show="results.docParam.button3caption === 'Y'" v-if="addChange" class="btn btn-danger btn-block2" @click="addChangeForm()">
                            Внести изменения в СЗ
                        </button>
                        <button v-if="annul && this.docIsn !== null" class="btn btn-danger btn-block2" @click="annulSz()">
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
                                <div v-if="!result.val">
                                    <div class="pointer" scope="col" @click="OpenModal()">{{listDocIsn}}</div>
                                </div>
                                <div v-else>
                                    <div class="pointer" scope="col" @click="OpenModal()">{{result.val}}</div>
                                </div>
                            </div>
                            <div v-else-if="result.fullname === 'Причина аннулирования СЗ'">
                                <div>
                                    <input type="text" v-model="result.val"
                                           class="form-control" :disabled="addChange">
                                </div>
                            </div>
                            <div v-else-if="result.fullname === 'Кол-во используемых дней'">
                                <select v-model="result.val" :disabled="addChange" class="form-control">
                                    <option value="834241">0,5</option>
                                    <option value="834251">1</option>
                                    <option value="834261">1,5</option>
                                    <option value="834271">2</option>
                                    <option value="834281">2,5</option>
                                    <option value="834291">3</option>
                                </select>
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
    import DocumentModal from "./document-modal"
    export default {
    name: "application-blank",
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
                // formatDate: new Date(this.results.docdate.split('.')),
                maskDate: [/\d/, /\d/, ".", /\d/, /\d/, ".", /\d/, /\d/, /\d/, /\d/],
                userList : [],
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
                agrList: false,
                docIsn: null,
                button: null,
                result: null,
                listDocIsn: null,
                coordination: {},
                saveDoc: true,
                required: false,
                sendOutForm: false,
                type: 1,
                toForm: false,
                status: '',
                stage: '',
                fillIn: false,
                relationTo: [],
                duties: [],
                wallRows: 2,
            }
        },
        created() {
            this.getUserList();
            this.getUsersInfo();
            this.getBranchData();
            this.getRelational();
            this.getDuty();
            Vue.filter('splitNumber', function (value) {
                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            })
            // this.docDate = new Date(moment(this.results.docdate));
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
                //console.log(e.id);
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
            getRelational(){
                this.axios.post('/document/getRelational', {}).then((response) => {
                    this.relationTo = response.data.relationTo;
                });
            },
            getDuty(){
                this.axios.post('/document/getDuty', {}).then((response) => {
                    this.duties = response.data.duties;
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
                    }
                }
                this.extraLoading = true;
                this.annul = true;
                this.addChange = false;
                let data = {
                    results: this.results,
                    docIsn: this.docIsn,
                    status: '2515',
                }
                this.axios.post('/document/saveDocument', data)
                    .then((response) => {
                        if(response.data.success) {
                            this.status = response.data.status;
                            this.stage = response.data.stage;
                            this.extraLoading = false;
                            this.addChange = false;
                            this.sendOutForm = false;
                            this.annul = false;
                            this.agrList = false;
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
                this.loading = false;
            },
            saveDocument(){
                this.loading = false;
                if(this.results.result1[0].val === '' || this.results.docdate === '' || this.results.contragent.value === ''){
                    this.flashMessage.warning({
                        title: "!",
                        message: 'Пожалуйста заполните все обязательные поля',
                        time: 5000
                    });
                    // setTimeout(() => {
                    //     location.reload();
                    // }, 5000);
                    // return;
                }
                this.loading = true;
                let data = {
                    results: this.results,
                    docIsn: this.docIsn,
                }
                this.axios.post('/document/saveDocument', data)
                    .then((response) => {
                        if(response.data.success) {
                            this.loading = false;
                            this.docIsn = this.docIsn ? this.docIsn : response.data.DocISN;
                            this.addChange = true;
                            this.toForm = true;
                            this.fillIn =true;
                            this.saveDoc = false;
                            this.annul = false
                        } else {
                            this.addChange = false;
                            this.loading = false;
                            this.saveDoc = true;
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
                let data = {
                    docIsn: this.docIsn,
                    button: 'BUTTON3',
                }
                this.axios.post('/document/buttonClick', data)
                    .then((response) => {
                        if(response.data.success) {
                            this.status = response.data.status;
                            this.stage = response.data.stage;
                            this.listDocIsn = response.data.DOCISN
                            this.extraLoading = false;
                            this.sendOutForm = false;
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
                let data = {
                    docIsn: this.docIsn,
                    button: 'BUTTON1',
                }
                this.axios.post('/document/buttonClick', data)
                    .then((response) => {
                        if(response.data.success) {
                            this.sendOutForm = false;
                            this.fillIn = true;
                            this.toForm = true;
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
            buttonClick() {
                this.loading = true;
                let data = {
                    docIsn: this.docIsn,
                    button: 'BUTTON2',
                }
                this.axios.post('/document/buttonClick', data)
                    .then((response) => {
                        if(response.data.success) {
                            this.sendOutForm = true;
                            this.toForm = false;
                            this.fillIn = false;
                            this.listDocIsn = response.data.DOCISN
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
            sendOut(){
                this.loading = true;
                let data = {
                    docIsn: this.docIsn,
                    type: this.type,
                    status: 2522,
                }
                this.axios.post('/sendOut', data)
                    .then((response) => {
                        if(response.data.success) {
                            this.status = response.data.status;
                            this.stage = response.data.stage;
                            this.loading = false;
                            this.addChange = true;
                            this.sendOutForm = false;
                            this.saveDoc = false;
                        } else {
                            this.addChange = false;
                            this.loading = false;
                        }
                        this.addChange = true;
                    })
                    .catch(function (error) {
                        //alert(error.response);
                    });
            },
            OpenModal () {
                this.preloader(true);
                this.changeMatch.status = false;
                if(this.listDocIsn === null){
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
            successNotify(title = 'Success notification', text = 'Some long description at search begin'){
                this.$parent.notify('success', title, text);
            },
            warningNotify(title = 'Warning notification', text = 'Some long description at search begin'){
                this.$parent.notify('warning', title, text);
            },
            errorNotify(title = 'Error notification', text = 'Some long description at search begin') {
                this.$parent.notify('error', title, text);
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
</style>
