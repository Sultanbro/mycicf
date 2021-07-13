<template>
    <div class="application-blank">
        <div class="pt-4">
            <div class="border-radius15 box-shadow centcoins-date-indicators bg-white ml-2 mr-2 pl-5 pr-5 pt-4 pb-3">
                <h4 class="text-center">{{results.className}}</h4>
                <div class="flex-row jc-sb mt-3 mb-3">
                    <div class="row">
                        <div class="offset-md-4 col-md-8">
                            <div class="mb-4">
                                <div v-if="idShow" class="form-group row">
                                    <label class="col-md-4 col-form-label">Номер:</label>
                                    <div class="col-md-8">
                                        <input type="text" v-model="results.id" :disabled="addChange" placeholder="..." class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div v-if="!isLoading && results.docParam.showSubject === 'Y'" class="form-group row">
                                    <label class="col-md-4 col-form-label">{{results.contragent.fullname}}:</label>
                                    <div class="col-md-8">
                                        <treeselect v-model="results.contragent.subjIsn" placeholder="Не выбрано" :disabled="addChange" :multiple="false"
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
                                <div class="col-md-2" v-if="results.classisn === '820621'">
                                    <label>Дата начала</label>
                                    <div>
                                        <input class="form-control"
                                               type="tel"
                                               v-model="results.dateBeg" :disabled="addChange"
                                               v-mask="'##.##.####'"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-2" v-if="results.classisn === '820621'">
                                    <label>Дата оконч.</label>
                                    <div>
                                        <input class="form-control"
                                               type="tel"
                                               v-model="results.dateEnd" :disabled="addChange"
                                               v-mask="'##.##.####'"
                                        />
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
                                <div v-if="(docrow.fieldname === 'ФИО работника' || docrow.fieldname === 'ФИО работника ') &&  results['classisn'] !== '1007421'">
                                    <treeselect
                                        v-model="docrow.value" :disabled="addChange" required
                                        :multiple="false"
                                        :options="userList"
                                        @select="changeSelected($event)"
                                        :disable-branch-nodes="true"/>
                                </div>
                                <div v-if="docrow.fieldname === 'ФИО работника' && results['classisn'] === '1007421'">
                                    <div class="input-group">
                                        <input v-model="worker.fullName ? worker.fullName : docrow.value_name" @click="OpenModal('ФИО работника')" type="text" class="form-control">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn-light" @click="OpenModal('ФИО работника')">
                                                <i class="fa fa-search"></i>
                                            </button>
                                            <button type="submit" class="btn-light" @click="clearInfo('ФИО работника')">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="docrow.fieldname === 'ФИО сотрудника'">
                                    <treeselect
                                        v-model="docrow.value" :disabled="addChange" required
                                        :multiple="false"
                                        :options="userList"
                                        @select="changeSelected($event)"
                                        :disable-branch-nodes="true"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Номер свидетельства о рождении'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Подразделение' && results.classisn !== '1007411'">
                                    <treeselect
                                        :multiple="false" :options="options" :placeholder="'Выберите'" v-model="docrow.value"
                                        :disabled="addChange"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Подразделение' && results.classisn === '1007411'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Подразделение перевода:'">
                                    <treeselect
                                        :multiple="false" :options="options" :placeholder="'Выберите'" v-model="docrow.value"
                                        :disabled="addChange"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Дата выхода С'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Дата перевода'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
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
                                        <select v-model="docrow.value" :disabled="addChange" class="form-control" required>
                                            <option v-for="dut in duties" :value="dut[0]">{{ dut[1] }}</option>
                                        </select>
                                    </div>
                                    <div v-else><input type="text" v-model="duty" class="form-control"
                                                  :disabled="addChange">
                                    </div>
                                </div>
                                <div v-if="docrow.fieldname === 'Перевести на должность:'">
                                    <select v-model="docrow.value" :disabled="addChange" class="form-control" required>
                                        <option v-for="dut in duties" :value="dut[0]">{{ dut[1] }}</option>
                                    </select>
                                </div>
                                <div v-if="docrow.fieldname === 'Листок нетрудоспособности №'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Наименование медицинского учреждения, выдавшего листок нетрудоспособности'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Дата С'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Период С' || docrow.fieldname === 'Период, с'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Период ПО' || docrow.fieldname === 'Период, по'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Дата ПО'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Виды родственных отношений'">
                                    <select v-model="docrow.value" :disabled="addChange" class="form-control" required>
                                        <option v-for="relation in relationTo" :value="relation[0]">{{ relation[1] }}</option>
                                    </select>
                                </div>
                                <div v-if="docrow.fieldname === 'Проработанный период С'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Проработанный период ПО'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Пострадавших вследствие'">
                                    <select v-model="docrow.value"  :disabled="addChange" class="form-control">
                                        <option value="1014321">Экологического бедствия в Приаралье</option>
                                        <option value="1014331">Ядерных испытаний на Семипалатинском испытательном ядерном полигоне</option>
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
                        <button v-show="(results.docParam.button1caption === 'Узнать количество доступных дней' && results.docParam.showbutton1 === 'Y') || (results.docParam.button2caption === 'Узнать количество доступных дней' && results.docParam.showbutton2 === 'Y')"
                                v-if="fillIn" class="btn btn-primary btn-block2" @click="fillInSz()">
                            Узнать количество доступных дней
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
                        <button v-show="(results.docParam.button2caption === 'Внести изменения в СЗ' && results.docParam.showbutton2 === 'Y') || (results.docParam.button3caption === 'Внести изменения в СЗ' && results.docParam.showbutton3 === 'Y')
                                || (results.docParam.button2caption === 'Внести изменения' && results.docParam.showbutton2 === 'Y')"
                                v-if="addChange" class="btn btn-danger btn-block2" @click="addChangeForm()">
                            Внести изменения в СЗ
                        </button>
                        <button v-show="(results.docParam.button2caption === 'Узнать период' && results.docParam.showbutton2 === 'Y') || (results.docParam.button3caption === 'Узнать период' && results.docParam.showbutton3 === 'Y')"
                                v-if="addChange" class="btn btn-danger btn-block2" @click="addChangeForm()">
                            Узнать период
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
                        <td scope="row">{{index + 1}}</td>
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
                            <div v-else-if="result.fullname === 'Обходной лист'">
                                <div class="input-group">
                                    <input v-model="result.value ? result.value : bypassSheet.fullName" @click="OpenModal('Обходной лист')" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn-light" @click="OpenModal('Обходной лист')">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="submit" class="btn-light" @click="clearInfo('Обходной лист')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
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
                                    <option value="">0</option>
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
                        <td>
                            <input type="text" rows="2" v-model="result.remark"
                                   class="form-control" :disabled="addChange">
                        </td>
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
        <button v-show="false" ref="modalCounterparty" type="button" data-toggle="modal" data-target="#counterpartyModal">Large modal</button>
        <counterparty-journal-modal
            :counterparty="counterparty"
            :worker="worker"
            :recordingCounterparty="recordingCounterparty"
            :results="results"
        >
        </counterparty-journal-modal>
        <button v-show="false" ref="modalDocument" type="button" data-toggle="modal" data-target="#docJournal"></button>
        <document-journal-modal
            :results="results"
            :documentName="documentName"
            :recordingDocument="recordingDocument"
            :bypassSheet="bypassSheet"
        ></document-journal-modal>
    </div>
</template>

<script>
    import DatePicker from "vue2-datepicker";
    import 'vue2-datepicker/index.css';
    import MaskedInput from 'vue-text-mask';
    import 'vue2-datepicker/locale/ru';
    import moment from 'moment'
    import DocumentModal from "./document-modal"
    import CounterpartyJournalModal from "./counterparty-journal-modal";
    import DocumentJournalModal from "./document-journal-modal";
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
                dateBeg: new Date(),
                dateEnd: new Date('+3 days'),
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
                // agrList: false,
                docIsn: null,
                button: null,
                result: null,
                listDocIsn: null,
                coordination: {},
                saveDoc: true,
                required: false,
                // sendOutForm: false,
                type: 1,
                toForm: false,
                fillIn: false,
                relationTo: [],
                duties: [],
                wallRows: 2,
                idShow: '',
                counterparty: {
                    isn: '',
                    iin: '',
                    fullName: '',
                    classISN: '',
                },
                worker: {
                    fullName: '',
                    isn: '',
                    type: '',
                },
                bypassSheet: {
                    fullName: '',
                    isn: '',
                    type: '',
                },
                documentName: {
                    isn: '',
                    id: '',
                },
                recordingDocument: {type: ''},
                recordingCounterparty: {type: ''},
                isn: '0',
                delete: '0',
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
            changeSelected(e){
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
                        return;
                    }
                }
                this.extraLoading = true;
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
                            // this.sendOutForm = false;
                            this.annul = false;
                            // this.agrList = false;
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
                // if(this.results.result1[0].val === '' || this.results.docdate === '' || this.results.contragent.subjIsn === ''){
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
                            this.docIsn = this.docIsn ? this.docIsn : response.data.docIsn;
                            this.results.docIsn = this.docIsn ? this.docIsn : response.data.docIsn
                            this.results.stage = response.data.stage;
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
                        // alert(response.data.error);
                    });
            },
            addChangeForm() {
                this.extraLoading = true;
                if((this.results.docParam.button2caption === 'Внести изменения в СЗ' && this.results.docParam.showbutton2 === 'Y') ||
                    (this.results.docParam.button2caption === 'Узнать период' && this.results.docParam.showbutton2 === 'Y') ||
                    (this.results.docParam.button2caption === 'Внести изменения' && this.results.docParam.showbutton2 === 'Y')){
                    this.button = 'BUTTON2'
                } else if((this.results.docParam.button3caption === 'Внести изменения в СЗ' && this.results.docParam.showbutton3 === 'Y')
                    || (this.results.docParam.button3caption === 'Узнать период' && this.results.docParam.showbutton3 === 'Y')
                    || (this.results.docParam.button3caption === 'Внести изменения' && this.results.docParam.showbutton3 === 'Y')){
                    this.button = 'BUTTON3'
                }
                let data = {
                    docIsn: this.docIsn ? this.docIsn: this.results.docIsn,
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
                                    this.results.resDop[i].val = response.data.DOCISN
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
                if((this.results.docParam.button1caption === 'Заполнить СЗ' && this.results.docParam.showbutton1 === 'Y') || (this.results.docParam.button1caption === 'Узнать количество доступных дней' && this.results.docParam.showbutton1 === 'Y')){
                    this.button = 'BUTTON1'
                } else if((this.results.docParam.button2caption === 'Заполнить СЗ' && this.results.docParam.showbutton2 === 'Y') || (this.results.docParam.button2caption === 'Узнать количество доступных дней' && this.results.docParam.showbutton2 === 'Y')){
                    this.button = 'BUTTON2'
                } else if((this.results.docParam.button3caption === 'Заполнить СЗ' && this.results.docParam.showbutton3 === 'Y') || (this.results.docParam.button3caption === 'Узнать количество доступных дней' && this.results.docParam.showbutton3 === 'Y')) {
                    this.button = 'BUTTON3' }
                let data = {
                    docIsn: this.docIsn ? this.docIsn: this.results.docIsn,
                    button: this.button,
                }
                this.axios.post('/document/buttonClick', data)
                    .then((response) => {
                        if(response.data.success) {
                            if((this.results.docParam.button1caption === 'Заполнить СЗ' && this.results.docParam.showbutton1 === 'Y') || (this.results.docParam.button2caption === 'Заполнить СЗ' && this.results.docParam.showbutton2 === 'Y')
                            || (this.results.docParam.button1caption === 'Узнать количество доступных дней' && this.results.docParam.showbutton1 === 'Y')){
                                let dat = {
                                    docisn: this.docIsn,
                                    isn: this.results.classisn,
                                    button: this.button,
                                }
                                this.axios.get('/document/'+this.results.classisn+'/'+this.docIsn, dat).then((response) => {
                                    this.results.showRemark = response.data.results.showRemark === null ? '' : response.data.results.showRemark
                                    this.results.showRemark2 = response.data.results.showRemark2 === null ? '' : response.data.results.showRemark2
                                    if(this.results.id.length > 0){
                                        this.idShow = true;
                                    }
                                    this.addChange = false
                                    this.fillIn = false;
                                    this.toForm = false;
                                    this.saveDoc = true;
                                })
                            } else {
                                this.addChange = false;
                                this.fillIn = true;
                                this.toForm = false;
                                this.saveDoc = true;
                            }
                        } else {
                            this.addChange = false;
                            this.loading = false;
                        }
                        this.loading = false;
                        this.addChange = true;
                    })
                    .catch(function (error) {
                        // alert(response.data.error);
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
                    docIsn: this.docIsn ? this.docIsn : this.results.docIsn,
                    button: this.button,
                }
                this.axios.post('/document/buttonClick', data)
                    .then((response) => {
                        if(response.data.success) {
                            this.results.status = response.data.status
                            this.results.stage = response.data.stage
                            this.toForm = false;
                            this.fillIn = false;
                            this.addChange = true
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
                            alert(response.data.error)
                            this.toForm = false;
                            this.saveDoc = true;
                            this.fillIn = true;
                        }
                        this.loading = false
                    })
                    .catch(function (error) {
                        // alert(response.data.error);
                    });
            },
            // sendOut(){
            //     this.loading = true;
            //     this.results.status = 2522
            //     let data = {
            //         docIsn: this.docIsn,
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
            //                 // this.sendOutForm = false;
            //                 this.saveDoc = false;
            //             } else {
            //                 this.addChange = false;
            //                 this.loading = false;
            //             }
            //             this.addChange = true;
            //         })
            //         .catch(function (error) {
            //             // alert(response.data.error);
            //         });
            // },
            OpenModal (doc) {
                this.preloader(true)
                this.changeMatch.status = false
                this.preloader(true)
                this.changeMatch.status = false
                if(doc === this.listDocIsn){
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
                            this.preloader(false)
                            this.$refs.modalButton.click()
                        }else{
                            this.attachments = [];
                        }
                    });
                } else if(doc === 'ФИО работника'){
                    this.preloader(false);
                    this.recordingCounterparty.type = doc
                    this.$refs.modalCounterparty.click();
                } else if(doc === 'Обходной лист'){
                    this.preloader(false);
                    this.recordingDocument.type = doc
                    this.$refs.modalDocument.click();
                }
                return;
            },
            clearInfo(data){
                    for(let i=0; i<this.results.docrows.length; i++){
                        if(this.results.docrows[i].fieldname === data && data === 'ФИО работника'){
                            this.results.docrows[i].value_name = ''
                            this.results.docrows[i].value = ''
                            this.worker.fullName = ''
                            this.worker.isn = ''
                        } else if(this.results.docrows[i].fieldname === data && data === 'Обходной лист'){
                            this.results.docrows[i].value_name = ''
                            this.results.docrows[i].value = ''
                            this.bypassSheet.fullName = ''
                            this.bypassSheet.isn = ''
                        }
                    }
            },
            preloader(show){
                if(show){
                    document.getElementById('preloader').style.display = 'flex'
                }else{
                    document.getElementById('preloader').style.display = 'none'
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
            CounterpartyJournalModal,
            DocumentModal,
            DatePicker,
            MaskedInput,
            DocumentJournalModal,
        },
    }
</script>
<style scoped>
    .vdp-datepicker input {
        background: none;
    }
</style>
