<template>
    <div class="approval-sheet">
        <div class="pt-4">
            <div class="border-radius15 box-shadow centcoins-date-indicators bg-white ml-2 mr-2 pl-5 pr-5 pt-4 pb-3">
                <h4 class="text-center">{{results.className}}</h4>
                <div class="flex-row jc-sb mt-3 mb-3">
                    <div class="row">

                        <div class="offset-md-4 col-md-8">

                            <div class="mb-4"
                                 v-for="(result, index) in results.result"
                                 :key="index"
                            >
                                 <div v-if="index === 0">
                                     <div v-if="!isLoading" class="form-group row">
                                         <label class="col-md-4 col-form-label">{{result.fullname}}:</label>
                                         <div class="col-md-8" >
<!--                                             <treeselect @select="handleInput" v-model="contragent" :multiple="false" :options="userList" disabled="disabled"/>&ndash;&gt;-->
                                             <treeselect v-model="results.subjISN" placeholder="Не выбрано" :disabled="addChange" :multiple="false"
                                                         :options="userList" :disable-branch-nodes="true"/>
                                         </div>
                                     </div>
                                 </div>
                                <div v-else-if="result.fullname == 'Адресат' || result.fullname == 'Исполнитель' || result.fullname == 'Список командируемых'
                                     || result.fullname == 'Согласующий 1'
                                     || result.fullname == 'Согласующий 2'
                                     || result.fullname == 'Согласующий 3'">
                                    <div v-if="!isLoading" class="form-group row">
                                        <label class="col-md-4 col-form-label">{{result.fullname}}:</label>
                                        <div class="col-md-8" >
                                            <treeselect v-model="result.val" placeholder="Не выбрано" :disabled="addChange"
                                                        :multiple="false" :options="userList" :disable-branch-nodes="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div v-else-if="result.fullname == 'Дата рег.'">
                                    <label class="col-md-4 col-form-label">{{result.fullname}}:</label>
                                    <div class="col-md-8">Дата рег.
                                        <datepicker :bootstrap-styling="false"
                                                    v-model="results.docdate"
                                                    :disabledDates="disabledDates"
                                                    :input-class="'form-control'"
                                                    :format="customFormatter"
                                                    :wrapper-class="''"
                                                    :calendar-button = "true"
                                                    :calendar-button-icon="'fa fa-calendar'"
                                                    :disabled="addChange"
                                        >
                                        </datepicker>
                                    </div>
                                </div>
                                <div v-else class="form-group row">

                                    <label class="col-md-4 col-form-label">{{result.fullname}}:</label>
                                    <div class="col-md-8">
                                        <input type="text" v-model="result.value"
                                               class="form-control" :disabled="addChange">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Дата рег.</label>
                                <div class="col-md-8" >
                                    <datepicker :bootstrap-styling="false"
                                                v-model="results.docdate"
                                                :disabledDates="disabledDates"
                                                :input-class="'form-control'"
                                                :format="customFormatter"
                                                :wrapper-class="''"
                                                :calendar-button = "true"
                                                :calendar-button-icon="'fa fa-calendar'"
                                                :disabled="addChange"
                                    >
                                    </datepicker>
                                </div>
                            </div>

<!--                            <div class="form-inline pull-right mb-4">-->
<!--                                <label for="addressee" class="left">Адресат:</label>-->
<!--                                <input type="text" name="addressee" id="addressee" value="Омаров Б.Т"-->
<!--                                       class="form-control"  :readonly="result.value !== ''">-->
<!--                            </div>-->

                        </div>

                        <div v-if="results.docrows.length !== 0" class="flex-row jc-sb mt-3 mb-3">
                            <table class="table text-align-center">
                                <thead>
                                    <tr class="header color-white">
                                        <th v-for="(docrow) in results.docrows" scope="col" class="thead-border">{{ docrow.fieldname }}</th>
                                    </tr>
                                </thead>
                                <tbody class="date-color">
                                    <tr>
                                        <td style="width: 30%" v-for="(docrow, index) in results.docrows" scope="row">

                                            <div v-if="docrow.fieldname === 'Стоимость семинара'">
                                                <input type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Наименование'">
                                                <input type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Инвентарный №'">
                                                <input type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Остаточная стоимость'">
                                                <input @keypress="onlyNumber" type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Номенклатурный №'">
                                                <input type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Описание'">
                                                <input type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Итого кол-во дней' || docrow.fieldname === 'ИТОГО кол-во дней'">
                                                <input @keypress="onlyNumber" type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Срок по ДОУ, с'">
                                                <datepicker :bootstrap-styling="false"
                                                            :key="`${index}-${docrow.value}-${1}`"
                                                            v-model="docrow.value"
                                                            :disabledDates="disabledDates"
                                                            :input-class="'form-control'"
                                                            :format="customFormatter"
                                                            :wrapper-class="''"
                                                            :calendar-button = "true"
                                                            :calendar-button-icon="'fa fa-calendar'"
                                                            :disabled="addChange"
                                                >
                                                </datepicker>
                                            </div>
                                            <div v-if="docrow.fieldname === 'Дата свидетельства о рождении'">
                                                <input class="form-control"
                                                       type="tel"
                                                       v-model="docrow.value"
                                                       v-mask="'##.##.####'"
                                                />
                                            </div>
                                            <div v-if="docrow.fieldname === 'Дата проведения семинара, с'">
                                                <input class="form-control"
                                                       type="tel"
                                                       v-model="docrow.value"
                                                       v-mask="'##.##.####'"
                                                />
                                            </div>
                                            <div v-if="docrow.fieldname === 'Дата проведения семинара, по'">
                                                <input class="form-control"
                                                       type="tel"
                                                       v-model="docrow.value"
                                                       v-mask="'##.##.####'"
                                                />
                                            </div>
                                            <div v-if="docrow.fieldname === 'Тема семинара'">
                                                <input type="text" :key="`${index}-${docrow.value}`"
                                                       v-model="docrow.value" class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'ФИО работника'">
                                                <treeselect  :key="`${index}-${docrow.value}`"
                                                    v-model="docrow.value" :disabled="addChange"
                                                             :multiple="false"
                                                             :options="userList"
                                                             @select="changeSelected(index,$event)"
                                                             :disable-branch-nodes="true"/>
                                            </div>
                                            <div v-if="docrow.fieldname === 'Номер свидетельства о рождении'">
                                                <input type="text" :key="`${index}-${docrow.value}`"
                                                       v-model="docrow.value_name" class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Срок по ДОУ, по'">
                                                <datepicker :bootstrap-styling="false"
                                                            :key="`${index}-${docrow.value}-${2}`"
                                                            v-model="docrow.value"
                                                            :disabledDates="disabledDates"
                                                            :input-class="'form-control'"
                                                            :format="customFormatter"
                                                            :wrapper-class="''"
                                                            :calendar-button = "true"
                                                            :calendar-button-icon="'fa fa-calendar'"
                                                            :disabled="addChange"
                                                >
                                                </datepicker>
                                            </div>
                                            <div v-if="docrow.fieldname === 'Подразделение'">
                                                <treeselect class='w-100' :key="`${index}-${docrow.value}`"
                                                            :multiple="false" :options="options" v-model="docrow.value" />
                                            </div>
                                            <div v-if="docrow.fieldname === 'Дата выхода С'">
                                                <input class="form-control"
                                                       type="tel"
                                                       v-model="docrow.value"
                                                       v-mask="'##.##.####'"
                                                />
                                            </div>
                                            <div v-if="docrow.fieldname === 'Дата приема'">
                                                <datepicker :bootstrap-styling="false"
                                                            :key="`${index}-${docrow.value}-${3}`"
                                                            v-model="docrow.value"
                                                            :disabledDates="disabledDates"
                                                            :input-class="'form-control'"
                                                            :format="customFormatter"
                                                            :wrapper-class="''"
                                                            :calendar-button = "true"
                                                            :calendar-button-icon="'fa fa-calendar'"
                                                            :disabled="addChange"
                                                >
                                                </datepicker>
                                            </div>
                                            <div v-if="docrow.fieldname === 'Дата последнего рабочего дня'">
                                                <input class="form-control"
                                                       type="tel"
                                                       v-model="docrow.value"
                                                       v-mask="'##.##.####'"
                                                />
                                            </div>
                                            <div v-if="docrow.fieldname === 'Должность'">
                                                <input type="text" :key="`${index}-${docrow.value}`"
                                                       v-model="duty" class="form-control">
                                                {{ results.duty }}
                                            </div>
                                            <div v-if="docrow.fieldname === 'В связи'">
                                                <input type="text" :key="`${index}-${docrow.value}`"
                                                       v-model="docrow.value_name" class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Дата установление ЗП'">
                                                <input class="form-control"
                                                       type="tel"
                                                       v-model="docrow.value"
                                                       v-mask="'##.##.####'"
                                                />
                                            </div>
                                            <div v-if="docrow.fieldname === '% лишения ЗП'">
                                                <input type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Причина' || docrow.fieldname === 'Причина выдачи премии'">
                                                <input type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Оклад'">
                                                <input @keypress="onlyNumber" type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Месяц'">
                                                <input type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Сумма'">
                                                <input @keypress="onlyNumber" type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Сумма, тенге'">
                                                <input @keypress="onlyNumber" type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Дата С'">
                                                <input class="form-control"
                                                       type="tel"
                                                       v-model="docrow.value"
                                                       v-mask="'##.##.####'"
                                                />
                                            </div>
                                            <div v-if="docrow.fieldname === 'Период С'">
                                                <input class="form-control"
                                                       type="tel"
                                                       v-model="docrow.value"
                                                       v-mask="'##.##.####'"
                                                />
                                            </div>
                                            <div v-if="docrow.fieldname === 'Период ПО'">
                                                <input class="form-control"
                                                       type="tel"
                                                       v-model="docrow.value"
                                                       v-mask="'##.##.####'"
                                                />
                                            </div>
                                            <div v-if="docrow.fieldname === 'Дата ПО'">
                                                <input class="form-control"
                                                       type="tel"
                                                       v-model="docrow.value"
                                                       v-mask="'##.##.####'"
                                                />
                                            </div>
                                            <div v-if="docrow.fieldname === 'Вид транспорта'">
                                                <input type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Виды родственных отношений'">
                                                <input type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-if="docrow.fieldname === 'Проработанный период С'">
                                                <input class="form-control"
                                                       type="tel"
                                                       v-model="docrow.value"
                                                       v-mask="'##.##.####'"
                                                />
                                            </div>
                                            <div v-if="docrow.fieldname === 'Проработанный период ПО'">
                                                <input class="form-control"
                                                       type="tel"
                                                       v-model="docrow.value"
                                                       v-mask="'##.##.####'"
                                                />
                                            </div>
                                            <div v-else-if="docrow.fieldname === 'Пострадавших вследствие'">
                                                <input type="text" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                            <div v-else-if="docrow.fieldname === 'В размере (сумма)'">
                                                <input type="text"  @keypress="onlyNumber" :key="`${index}-${docrow.value}`" v-model="docrow.value" placeholder="..." class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

<!--                        <div v-if="results.docrows.length !== 0" class="flex-row jc-sb mt-3 mb-3">-->
<!--                            <table class="table text-align-center">-->
<!--                                <thead>-->
<!--                                <tr class="header color-white">-->
<!--                                    <th scope="col">№</th>-->
<!--                                    <th scope="col" class="thead-border">Наименование</th>-->
<!--                                    <th scope="col" class="thead-border">Справочник</th>-->
<!--                                    <th scope="col" class="thead-border">isn вида документа</th>-->
<!--                                    <th scope="col" class="thead-border">Номер в строке</th>-->
<!--                                    <th scope="col" class="thead-border">Табличный val</th>-->
<!--                                    <th scope="col" class="thead-border">Значение в val</th>-->
<!--                                </tr>-->
<!--                                </thead>-->
<!--                                <tbody class="date-color">-->
<!--                                    <tr v-for="(docrow, index) in results.docrows"-->
<!--                                        :key="index">-->
<!--                                        <th scope="row">{{index + 1}}</th>-->
<!--                                        <td>{{docrow.orderno}}</td>-->
<!--                                        <td>{{docrow.fieldname}}</td>-->
<!--                                        <td>{{docrow.code}}</td>-->
<!--                                        <td>{{docrow.classisn}}</td>-->
<!--                                        <td>{{docrow.rowisn}}</td>-->
<!--                                        <td>{{docrow.val}}</td>-->
<!--                                        <td>{{docrow.value}}</td>-->
<!--                                    </tr>-->
<!--                                </tbody>-->
<!--                            </table>-->
<!--                        </div>-->

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="remark">Примечание</label>
                                <textarea name="remark" id="remark" cols="30" rows="5"
                                          class="form-control" :disabled="addChange"></textarea>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <button class="btn btn-secondary" :disabled="!addChange">
                                        Разослать на согласование
                                    </button>
                                </div>
                                <div class="col-md-4 text-align-center">
                                    <button v-if="!addChange" class="btn btn-primary btn-block2" @click="saveDocument()">
                                        Сохранить
                                    </button>
                                    <button v-if="addChange" class="btn btn-primary btn-block2" @click="addChangeForm()">
                                        Внести изменения
                                    </button>
                                    <i v-if="isLoading" class="fas fa-spinner fa-spin"></i>
                                </div>
                                <div class="col-md-4 text-right">
                                    <button class="btn btn-danger btn-block2">
                                        Назад
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-4">
            <div class="border-radius15 box-shadow centcoins-date-indicators bg-white ml-2 mr-2 pl-2 pr-2 pt-4 pb-3">
                <div class="title text-align-center pt-5">Лист согласования</div>
                <div class="">Список согласующих</div>
                <div class="flex-row jc-sb mt-3 mb-3">
                    <table class="table text-align-center">
                        <thead>
                        <tr class="header color-white">
                            <th scope="col">№</th>
                            <th scope="col" class="thead-border">Сотрудник</th>
                            <th scope="col" class="thead-border">Телефон</th>
                            <th scope="col" class="thead-border">Должность</th>
                            <th scope="col" class="thead-border">Подразделение</th>
                            <th scope="col" class="thead-border">Отправлено</th>
                            <th scope="col" class="thead-border">Срок</th>
                            <th scope="col">Согласовано</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-block2">
                            Согласовать
                        </button>
                    </div>
                    <div class="col-md-4 text-align-center">
                        <button class="btn btn-danger btn-block2">
                            Отказать
                        </button>
                    </div>
                    <div class="col-md-4 text-right">
                        <button class="btn btn-secondary btn-block2">
                            Отменить согласование/отказ
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <button @click="checkTest()">checkTest</button>

    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import {ru} from 'vuejs-datepicker/dist/locale'
    import moment from 'moment'
    export default {
        name: "approval-sheet",
        props: {
            results: Object,
            clearSum:Function,
        },
        data() {
            return {
                obj: {},
                docDate: new Date(),
                disabledDates: {
                    to: moment(new Date()).add(-1,'days').toDate()
                },
                ru: ru,
                formatDate: new Date(this.results.docdate.split('.')),
                userList : [],
                contragent: '',
                isLoading: false,
                addChange: false,
                res: {},
                usersInfo: [],
                duty : "",
                dept : "",
                options: null,
                parentId: 50,
            }
        },
        created() {
            this.getUserList();
            this.getUsersInfo();
            this.getBranchData();
            //this.contragent = this.results.result[].value;
            // if(this.results.result[0].subjISN != 'null'){
            //     this.contragent = this.results.result[0].subjISN;
            // }
            //this.results = this.results;
            this.docDate = new Date(moment(this.results.docdate));

        },
        methods: {
            // getTest() {
            //     this.axios.post('/document/test', {}).then((response) => {
            //         console.log(response)
            //     });
            // },
            customFormatter(date) {
                return moment(date).format('DD.MM.YYYY');
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
            getUserList() {
                // if(this.docrow.value) {
                // }
                let data = {
                    sz:true
                }
                this.axios.post('/full/getFullBranch', data).then((response) => {
                    this.userList = response.data.result;
                    this.isLoading = false;
                    console.log(response)
                });
            },
            gol() {
                let list = document.getElementsByTagName('*');
                for (i = 0; i < list.length; i++) {
                    if (list[i].id) arr.push(list[i].id);
                    alert(i + ' --> ' + arr[i])
                }
            },
            getBranchData() {
                this.axios.post('/getSearchBranch', {}).then(response => {
                    this.options = response.data.result;
                })
            },
            saveDocument(){
                this.loading = true;

                this.results.docdate = moment(this.results.docDate).format('DD.MM.YYYY');
                // if(this.checkChange = false){
                    this.axios.post('/document/saveDocument', this.results)
                        .then((response) => {

                            //this.res = response.data.results;
                            if(response.data.success) {


                                // this.checkChange = false;
                            } else {
                                this.addChange = false;
                            }
                            this.loading = false;
                            this.addChange = true;
                        })
                        .catch(function (error) {
                            //alert(error.response);
                        });
                // }


            },
            addChangeForm() {
                this.addChange = false;
            },
            onlyNumber ($event) {
                //console.log($event.keyCode); //keyCodes value
                let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
                if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                    $event.preventDefault();
                }
            }
            // async submitForm() {
            //     let data = {
            //         results: Object,
            //     };
            //
            //     await this.result('post', '/document/saveDocument', data, this.afterSubmitForm);
            // },
            // afterSubmitForm(responseData){
            //     this.loading = false;
            //     if(responseData.success){
            //         this.clearData();
            //         this.successNotify('Ok', 'Заявка Сохранена');
            //     }else{
            //         this.errorNotify('Возникла ошибка при сохранении', responseData.response);
            //     }
            // },
        },
        components: {
            Datepicker,
        },
    }
</script>

<style scoped>
    .vdp-datepicker input {
        background: none;
    }
</style>
