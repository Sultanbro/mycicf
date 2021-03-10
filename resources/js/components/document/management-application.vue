<template> <!-- Без контрагента -->
    <div class="approval-sheet">
        <div class="pt-4">
            <div class="border-radius15 box-shadow centcoins-date-indicators bg-white ml-2 mr-2 pl-5 pr-5 pt-4 pb-3">
                <h4 class="text-center">{{results.className}}</h4>
                <div class="flex-row jc-sb mt-3 mb-3">
                    <div class="row">
                        <div class="offset-md-4 col-md-8">
<!--                            <div class="mb-4">-->
<!--                                <div v-if="!isLoading && results.contragent.value !== 'null' || results.contragent.value !== ''" class="form-group row">-->
<!--                                    <label class="col-md-4 col-form-label">{{results.contragent.fullname}}:</label>-->
<!--                                    <div class="col-md-8">-->
<!--                                        &lt;!&ndash;                                             <treeselect @select="handleInput" v-model="contragent" :multiple="false" :options="userList" disabled="disabled"/>&ndash;&gt;&ndash;&gt;-->
<!--                                        <treeselect v-model="results.contragent.value" placeholder="Не выбрано" :disabled="addChange" :multiple="false"-->
<!--                                                    :options="userList" :disable-branch-nodes="true"/>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
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
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Дата рег.</label>
                                <div class="col-md-8">
                                    <datepicker :bootstrap-styling="false"
                                                v-model="results.docdate" required
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
                            <div v-if="!stage" class="form-group row">
                                <label class="col-md-4 col-form-label">Статус</label>
                                <div class="col-md-8">
                                    <input type="text" v-model="results.statusName"
                                           class="form-control" readonly>
                                </div>
                            </div>
                            <div v-if="stage">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Статус</label>
                                    <div class="col-md-8">
                                        <input type="text" v-model="status"
                                               class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Стадия</label>
                                    <div class="col-md-8">
                                        <input type="text" v-model="stage"
                                               class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <!--                            <div class="form-inline pull-right mb-4">-->
                            <!--                                <label for="addressee" class="left">Адресат:</label>-->
                            <!--                                <input type="text" name="addressee" id="addressee" value="Омаров Б.Т"-->
                            <!--                                       class="form-control"  :readonly="result.value !== ''">-->
                            <!--                            </div>-->
                        </div>

                        <!--                        <div v-if="results.docrows.length !== 0" class="flex-row jc-sb mt-3 mb-3">-->
                        <!--                            <table class="table text-align-center">-->
                        <!--                                <thead>-->
                        <!--                                <tr class="header color-white">-->

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
                    </div>
                </div>

                <!--                !!$show->DocRow->row!! -->
                <div v-if="results.docrows.length !== 0">
                    <div class="row justify-content-between pt-4">
                        <div class="col-4 pt-4" v-for="docrow in orderedDocrows">
                            <div>
                                <label>{{ docrow.fieldname }}</label>
                                <div v-if="docrow.fieldname === 'Стоимость семинара'">
                                    <input type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Наименование'">
                                    <input type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Инвентарный №'">
                                    <input type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Остаточная стоимость'">
                                    <input @keypress="onlyNumber" type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Номенклатурный №'">
                                    <input type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Описание'">
                                    <input type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Итого кол-во дней' || docrow.fieldname === 'ИТОГО кол-во дней'">
                                    <input @keypress="onlyNumber" type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Срок по ДОУ, с'">
                                    <datepicker :bootstrap-styling="false"
                                                v-model="docrow.value"
                                                :disabledDates="disabledDates"
                                                :input-class="'form-control'"
                                                :format="customFormatter"
                                                :wrapper-class="''"
                                                :calendar-button = "true"
                                                :calendar-button-icon="'fa fa-calendar'"
                                                :disabled="addChange">
                                    </datepicker>
                                </div>
                                <div v-if="docrow.fieldname === 'Дата свидетельства о рождении'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Дата проведения семинара, с'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Дата проведения семинара, по'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Тема семинара'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'ФИО работника' || docrow.fieldname === 'ФИО работника '">
                                    <treeselect
                                        v-model="docrow.value" :disabled="addChange" required
                                        :multiple="false"
                                        :options="userList"
                                        @select="changeSelected(index,$event)"
                                        :disable-branch-nodes="true"/>
                                </div>
                                <div class="col-md-6" v-if="docrow.fieldname === 'Возложить полномочия на:'">
                                    <treeselect
                                        v-model="docrow.value" :disabled="addChange"
                                        :multiple="false"
                                        :options="userList"
                                        @select="changeSelected(index,$event)"
                                        :disable-branch-nodes="true"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Делегировать полномочия в части:'">
                                    <treeselect
                                        v-model="docrow.value" :disabled="addChange"
                                        :multiple="false"
                                        :options="userList"
                                        @select="changeSelected(index,$event)"
                                        :disable-branch-nodes="true"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Номер свидетельства о рождении'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Срок по ДОУ, по'">
                                    <datepicker :bootstrap-styling="false"
                                                v-model="docrow.value"
                                                :disabledDates="disabledDates"
                                                :input-class="'form-control'"
                                                :format="customFormatter"
                                                :wrapper-class="''"
                                                :calendar-button = "true"
                                                :calendar-button-icon="'fa fa-calendar'"
                                                :disabled="addChange">
                                    </datepicker>
                                </div>
                                <div v-if="docrow.fieldname === 'Подразделение'">
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
                                <div v-if="docrow.fieldname === 'Дата приема'">
                                    <datepicker :bootstrap-styling="false"
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
                                <!--                                                :key="`${index}-${docrow.value}-${3}`"-->
                                <div v-if="docrow.fieldname === 'Дата последнего рабочего дня'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Должность'">
                                    <label><input type="text" v-model="duty" class="form-control"
                                                  :disabled="addChange">{{ results.duty }}
                                    </label>
                                </div>
                                <div v-if="docrow.fieldname === 'В связи'">
                                    <input type="text"
                                           v-model="docrow.value_name" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Дата установление ЗП'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === '% лишения ЗП'">
                                    <input @keypress="onlyNumber" type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Причина' || docrow.fieldname === 'Причина выдачи премии'">
                                    <input type="text" v-model="docrow.value"  :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Оклад'">
                                    <input @keypress="onlyNumber" type="text" v-model="docrow.value"  :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Месяц'">
                                    <select v-model="docrow.value"  :disabled="addChange" class="form-control" placeholder="Выберите месяц" required>
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
                                <div v-if="docrow.fieldname === 'Сумма'">
                                    <input @keypress="onlyNumber" type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Сумма, тенге'">
                                    <input @keypress="onlyNumber" type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
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
                                <div v-if="docrow.fieldname === 'Вид транспорта'">
                                    <input type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Страна'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Суточные (МРП)'">
                                    <input @keypress="onlyNumber" type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Город назначения'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Виды родственных отношений'">
                                    <input type="text" v-model="docrow.value" :disabled="addChange" placeholder="...Родственние" class="form-control">
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
                                    <input type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'В размере (сумма)'">
                                    <input type="text"  @keypress="onlyNumber" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-3">
                        <button v-if="fillIn" class="btn btn-primary btn-block2" @click="fillInSz()">
                            Заполнить СЗ
                        </button>
                    </div>
                    <div class="col-md-5 text-align-center">
                        <i v-if="loading" class="fas fa-spinner fa-spin"></i>
                        <button v-if="sendOutForm" class="btn btn-primary btn-block2" @click="sendOut()">
                            Разослать на согласование
                        </button>
                        <button v-if="!agrList &&  toForm" class="btn btn-primary btn-block2" :disabled="!addChange" @click="buttonClick()">
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
                        <button v-if="addChange" class="btn btn-danger btn-block2" @click="addChangeForm()">
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
                            <div v-if="result.fullname === 'Список командируемых'">
                                <div v-if="!isLoading">
                                    <!--                                        <label class="col-md-4 col-form-label">{{result.fullname}}:</label>-->
                                    <div>
                                        <treeselect v-model="result.val" placeholder="Не выбрано" :disabled="addChange"
                                                    :multiple="false" :options="userList" :disable-branch-nodes="true"/>
                                    </div>
                                </div>
                            </div>
                            <div v-if="result.fullname === 'Согласующий 1' || result.fullname === 'Согласующий 2'
                                || result.fullname === 'Согласующий 3'">
                                <treeselect v-model="result.val" placeholder="Не выбрано" :disabled="addChange"
                                            :multiple="false" :options="userList" :disable-branch-nodes="true"/>
                            </div>
                            <div v-else-if="result.fullname === 'Лист согласования'">
                                <div>
                                    <div class="pointer" scope="col" @click="OpenModal()">
                                        <!--                                             :readonly="listDocIsn === '' || listDocIsn === null"-->
                                        {{listDocIsn}}</div>
                                    <!--                                        <input type="text" v-model="listDocIsn"-->
                                    <!--                                               class="form-control" :disabled="addChange" :readonly="listDocIsn === '' || listDocIsn === null">-->
                                </div>
                            </div>
                            <div v-else-if="result.fullname === 'Причина аннулирования СЗ'">
                                <div>
                                    <input type="text" v-model="result.val"
                                           class="form-control" :disabled="addChange">
                                </div>
                            </div>
                            <div v-else>
                                <!--                                    <label class="col-md-4 col-form-label">{{result.fullname}}:</label>-->
                                <div>
                                    <input type="text" v-model="result.val"
                                           class="form-control" :disabled="addChange">
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="text" rows="2" v-model="result.value"
                                   class="form-control" :disabled="addChange">{{result.remark}}
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
    </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
import {ru} from 'vuejs-datepicker/dist/locale'
import moment from 'moment'
import DocumentModal from "./document-modal";
export default {
    name: "management-application",
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
            disabledDates: {
                to: moment(new Date()).add(-1,'days').toDate()
            },
            ru: ru,
            formatDate: new Date(this.results.docdate.split('.')),
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
            index: '',
        }
    },
    created() {
        this.getUserList();
        this.getUsersInfo();
        this.getBranchData();
        Vue.filter('splitNumber', function (value) {
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        })
        //this.contragent = this.results.result[].value;
        // if(this.results.result[0].subjISN != 'null'){
        //     this.contragent = this.results.result[0].subjISN;
        // }
        this.docDate = new Date(moment(this.results.docdate)).toLocaleDateString();
    },
    methods: {
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
            if(this.results.resDop[1].val === ''){
                this.flashMessage.warning({
                    title: "!",
                    message: 'Укажите причину аннулирования служебной записки в доп.атрибутах документа',
                    time: 5000
                });
                // setTimeout(() => {
                //     location.reload();
                // }, 5000);
                // return;
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
                    this.extraLoading = false;
        },
        saveDocument(){
            this.loading = false;
            // console.log(this.results.result1[0].val);
            // console.log(this.results.docdate);
            if(this.results.result1[0].val === '' || this.results.result1[1].val === '' || this.results.docdate === ''){
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
            // this.results.docdate = moment(this.results.docDate).format('DD.MM.YYYY');
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
                        this.fillIn = true;
                        this.saveDoc = false;
                        this.annul = false;
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
        setDoc: async function() {
            if(this.results.result1.fullname === 'Адресат' && this.result.result1.value === ''){
                this.errorNotify('Ошибка', 'Укажите Адресата');
                return false;
            }
            if(this.results.result1.fullname === 'Исполнитель' && this.result.result1.value === ''){
                this.errorNotify('Ошибка', 'Укажите Исполнителя');
                return false;
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
                docIsn: this.listDocIsn,
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
        }
    },
    components: {
        DocumentModal,
        Datepicker,
    },
}
</script>
<style scoped>
.vdp-datepicker input {
    background: none;
}
</style>
