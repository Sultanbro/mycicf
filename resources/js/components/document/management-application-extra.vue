<template xmlns="http://www.w3.org/1999/html">
    <div class="management-application-extra">
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
                                            :disabled="addChange">
                                            <template #input="slotProps">
                                                <masked-input
                                                    type="text"
                                                    class="mx-input"
                                                    :mask="maskDate"
                                                    v-bind="slotProps.props"
                                                    v-on="slotProps.events">
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
                                <div v-if="docrow.fieldname === 'Стоимость семинара'">
                                    <input @keypress="onlyNumber" type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
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
                                <div v-if="docrow.fieldname === 'Срок по ДОУ, с' || docrow.fieldname === 'Дата (день рождения)'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
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
                                <div v-if="docrow.fieldname === 'ФИО работника' || docrow.fieldname === 'ФИО работника ' || docrow.fieldname === 'ФИО Сотрудника'">
                                    <treeselect
                                        v-model="docrow.value" :disabled="addChange" required
                                        :multiple="false"
                                        :options="userList"
                                        @select="changeSelected($event)"
                                        :disable-branch-nodes="true"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Возложить полномочия на:' || docrow.fieldname === 'Агент'">
                                    <treeselect
                                        v-model="docrow.value" :disabled="addChange"
                                        :multiple="false"
                                        :options="userList"
                                        @select="changeSelected($event)"
                                        :disable-branch-nodes="true"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Делегировать полномочия в части:'">
                                    <select v-model="docrow.value" :disabled="addChange" class="form-control" required>
                                        <option v-for="authority in authorities" :value="authority[0]">{{ authority[1] }}</option>
                                    </select>
                                </div>
                                <div v-if="docrow.fieldname === 'Номер свидетельства о рождении'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Подразделение' || docrow.fieldname === 'Новое подразделение' || docrow.fieldname === 'Штатное расписание подразделение'">
                                    <treeselect
                                        :multiple="false" :options="options" :placeholder="'Выберите'" v-model="docrow.value"
                                        :disabled="addChange"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Ввести подразделение'">
                                    <treeselect
                                        :multiple="false" :options="options" :placeholder="'Выберите'" v-model="docrow.value"
                                        :disabled="addChange"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Вывести из подразделение'">
                                    <treeselect
                                        :multiple="false" :options="options" :placeholder="'Выберите'" v-model="docrow.value"
                                        :disabled="addChange"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Дата изменения' || docrow.fieldname === 'Дата, С'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Дата выхода С'">
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
<!--                                <div v-if="docrow.fieldname === 'Должность'">-->
<!--                                    <label><input type="text" v-model="duty" class="form-control"-->
<!--                                                  :disabled="addChange">-->
<!--                                    </label>-->
<!--                                </div>-->
                                <div v-if="docrow.fieldname === 'Должность' ||docrow.fieldname === 'ввести должность' || docrow.fieldname === 'Новая должность' || docrow.fieldname === 'Вывести из должность'">
                                    <select v-model="docrow.value" :disabled="addChange" class="form-control" required>
                                        <option v-for="dut in duties" :value="dut[0]">{{ dut[1] }}</option>
                                    </select>
                                </div>
                                <div v-if="docrow.fieldname === 'Старая должность'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Старое подразделение'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>

                                <div v-if="docrow.fieldname === 'Помощь в связи'">
                                    <select v-model="docrow.value" :disabled="addChange" class="form-control" required>
                                        <option v-for="help in helpTo" :value="help[0]">{{ help[1] }}</option>
                                    </select>
                                </div>
                                <div v-if="docrow.fieldname === 'Родственные связи'">
                                    <select v-model="docrow.value" :disabled="addChange" class="form-control" required>
                                        <option v-for="relation in relationTo" :value="relation[0]">{{ relation[1] }}</option>
                                    </select>
                                </div>
                                <div v-if="docrow.fieldname === 'Отсутствующий продукт в ДП'">
                                    <treeselect v-model="docrow.value" placeholder="Не выбрано" :disabled="addChange"
                                                :multiple="false" :options="missingProducts" :disable-branch-nodes="true"/>

                                </div>

                                <div v-if="docrow.fieldname === 'В связи'">
                                    <select v-model="docrow.value"  :disabled="addChange" class="form-control" required>
                                        <option value="1777751" selected>с изменением штатного расписания</option>
                                        <option value="1777741">с производственной необходимостью</option>
                                        <option value="1777761">с увеличением объема работ</option>
                                    </select>
                                </div>
                                <div v-if="docrow.fieldname === 'Дата установление ЗП'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="results['classisn'] === '1440581' && docrow.fieldname === 'Причина'">
                                    <select v-model="docrow.value" :disabled="addChange" class="form-control" required>
                                        <option v-for="reason in reasons" :value="reason[0]">{{ reason[1] }}</option>
                                    </select>
                                </div>
                                <div v-if="results['classisn'] === '1747351' && docrow.fieldname === 'Причина'">
                                    <input type="text" v-model="docrow.value"  :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Причина выдачи премии' || docrow.fieldname === 'Причина перевода'">
                                    <input type="text" v-model="docrow.value"  :disabled="addChange" placeholder="..." class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Оклад' || docrow.fieldname === 'оклад'">
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
                                <div v-if="docrow.fieldname === 'Период С' || docrow.fieldname === 'Период, с' || docrow.fieldname === 'Период ПО' || docrow.fieldname === 'Период, по' || docrow.fieldname === 'Дата ПО'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Вид транспорта' || docrow.fieldname === 'Страна'">
                                    <input type="text" v-model="docrow.value" :disabled="addChange" placeholder="..." class="form-control">
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
                                <div v-if="docrow.fieldname === 'Проработанный период С' || docrow.fieldname === 'Дата отмены'">
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
                        <button v-show="(results.docParam.button1caption === 'Заполнить СЗ' && results.docParam.showbutton1 === 'Y') ||
                        (results.docParam.button2caption === 'Заполнить СЗ' && results.docParam.showbutton2 === 'Y') ||
                        (results.docParam.button3caption === 'Заполнить СЗ' && results.docParam.showbutton3 === 'Y')"
                                v-if="fillIn" class="btn btn-primary btn-block2" @click="fillInSz()">
                            Заполнить СЗ
                        </button>
                    </div>
                    <div class="col-md-5 text-align-center">
                        <i v-if="loading" class="fas fa-spinner fa-spin"></i>
<!--                        <button v-if="sendOutForm" class="btn btn-primary btn-block2" @click="sendOut()">-->
<!--                            Разослать на согласование-->
<!--                        </button>-->
                        <button v-show="(results.docParam.button1caption === 'Сформировать лист согласования' && results.docParam.showbutton1 === 'Y') || (results.docParam.button2caption === 'Сформировать лист согласования' && results.docParam.showbutton2 === 'Y')
                                        || (results.docParam.button3caption === 'Сформировать лист согласования' && results.docParam.showbutton3 === 'Y')"
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
<!--                            <div v-else-if="result.fullname === 'Лист согласования' && results.classisn === '1461771'">-->
<!--                                <div v-if="!result.val" class="input-group">-->
<!--                                    <div v-model="result.val" class="pointer" scope="col" @click="OpenModal(result.val)">{{result.val}}</div>-->
<!--&lt;!&ndash;                                    <input type="text" class="form-control" v-model="result.val" placeholder="Поиск..." :disabled="addChange">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="input-group-append">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <button class="btn btn-secondary" type="button">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <i class="fa fa-search" @click="searchDocumentJournal"></i>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </button>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--                                </div>-->
<!--                                <div v-else-if="result.val" class="input-group">-->
<!--                                    <div v-model="result.val" class="pointer" scope="col" @click="OpenModal(result.val)">{{result.val}}-->
<!--&lt;!&ndash;                                        <i class="fa fa-search" @click="searchDocumentJournal"></i>&ndash;&gt;-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div v-else-if="result.fullname === 'Лист согласования'">
                                <div>
                                    <div v-model="result.val" class="pointer" scope="col" @click="OpenModal(result.value)">{{result.value}}</div>
                                </div>
                            </div>
                            <div v-else-if="result.fullname === 'Причина аннулирования СЗ'">
                                <input type="text" v-model="result.val"
                                       class="form-control" :disabled="addChange">
                            </div>
                            <div v-else-if="result.fullname === 'Срок исполнения' || result.fullname === 'Срок исполнения СЗ'">
                                <input class="form-control"
                                       type="tel"
                                       v-model="result.val" :disabled="addChange"
                                       v-mask="'##.##.####'"
                                />
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
        <button v-show="false" ref="modalButton" type="button" data-toggle="modal" data-target="#listDoc">Large modal</button>
        <document-modal
            :coordination="coordination"
            :isn="listDocIsn"
            :listDocId="listDocId"
            :changeMatch="changeMatch"
        >
        </document-modal>
        <button v-show="false" ref="modalDocument" type="button" data-toggle="modal" data-target="#docJournal">Large modal</button>
        <document-journal-modal
            :results="results"
        >
        </document-journal-modal>
    </div>
</template>

<script>
import DatePicker from "vue2-datepicker";
import 'vue2-datepicker/index.css';
import MaskedInput from 'vue-text-mask';
import 'vue2-datepicker/locale/ru';
import moment from 'moment'
import DocumentModal from "./document-modal";
import DocumentJournalModal from "./document-journal-modal";
export default {
    name: "management-application-extra",
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
            docIsn: null,
            button: null,
            result: null,
            listDocIsn: null,
            listDocId: '',
            coordination: {},
            saveDoc: true,
            type: 1,
            toForm: false,
            fillIn: false,
            index: '',
            helpTo: [],
            relationTo: [],
            missingProducts: [],
            duties: [],
            wallRows: 2,
            reasons: [],
            authorities: [],
            reasonDeprivation: [],
            counterJournal: '',
            idShow: false,
            isn: '0',
            delete: '0',
        }
    },
    created() {
        this.getUserList();
        this.getUsersInfo();
        this.getBranchData();
        this.getRelational();
        this.getHelpTo();
        this.getMissingProduct();
        this.getDuty();
        this.getReason();
        this.getReasonDeprivation();
        this.getDelegateAuthority();
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
        getMissingProduct(){
            this.axios.post('/document/getMissingProduct', {}).then((response) => {
                if (response.data.success) {
                    this.missingProducts = response.data.result;
                } else {
                    alert(response.data.error)
                }
            });
        },
        getHelpTo() {
            this.axios.post('/document/getHelpTo', {}).then((response) => {
                this.helpTo = response.data.helpTo;
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
        getReason(){
            this.axios.post('/document/getReason', {}).then((response) => {
                this.reasons = response.data.reasons;
            });
        },
        getReasonDeprivation(){
            this.axios.post('/document/getReasonDeprivation', {}).then((response) => {
                this.reasonDeprivation = response.data.reasonDeprivation;
            });
        },
        getDelegateAuthority(){
            this.axios.post('/document/getDelegateAuthority', {}).then((response) => {
                this.authorities = response.data.authorities;
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
            this.results.status = 'Аннулирован';
            let data = {
                results: this.results,
                docIsn: this.docIsn,
            }
            this.axios.post('/document/saveDocument', data)
                .then((response) => {
                    if(response.data.success) {
                        this.results.status = response.data.status;
                        this.results.stage = response.data.stage;
                        this.annul = false;
                        this.toForm = false;
                        this.fillIn = false;
                        this.saveDoc = false;
                    } else {
                        this.annul = true;
                        if(response.data.error){ alert(response.data.error) }
                    }
                    this.extraLoading = false;
                    this.addChange = false;
                });
            this.addChange = false;
            this.extraLoading = false;
        },
        saveDocument(){
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
                docIsn: this.docIsn ? this.docIsn : this.results.docIsn,
            }
            this.axios.post('/document/saveDocument', data)
                .then((response) => {
                    if(response.data.success) {
                        this.docIsn = this.docIsn ? this.docIsn : response.data.docIsn
                        this.results.docIsn = this.docIsn ? this.docIsn : response.data.docIsn
                        this.results.stage = response.data.stage;
                        this.addChange = true;
                        this.toForm = true;
                        this.fillIn = true;
                        this.saveDoc = false;
                        this.annul = false;
                    } else {
                        this.addChange = false;
                        this.saveDoc = true;
                        alert(response.data.error);
                    }
                    this.loading = false;
                })
                .catch(function (error) {
                });
        },
        addChangeForm() {
            this.extraLoading = true;
            if(this.results.docParam.button2caption === 'Внести изменения в СЗ' && this.results.docParam.showbutton2 === 'Y'){ this.button = 'BUTTON2' }
            else if(this.results.docParam.button3caption === 'Внести изменения в СЗ' && this.results.docParam.showbutton3 === 'Y'){ this.button = 'BUTTON3' }
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
                        this.listDocId = response.data.listDocId;
                        for(let i=0; i<this.results.resDop.length; i++){
                            if(this.results.resDop[i].fullname === 'Лист согласования'){
                                this.results.resDop[i].val = this.listDocIsn
                                this.results.resDop[i].value = response.data.listDocId ? response.data.listDocId : ''
                            }
                        }
                        this.addChange = false;
                        this.toForm = false;
                        this.annul = true;
                        this.saveDoc = true;
                    } else {
                        this.addChange = true;
                    }
                    this.extraLoading = false;
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
            if(this.results.result1.fullname === 'Адресат' && this.result.result1.val === ''){
                this.errorNotify('Ошибка', 'Укажите Адресата');
                return false;
            }
            if(this.results.result1.fullname === 'Исполнитель' && this.result.result1.val === ''){
                this.errorNotify('Ошибка', 'Укажите Исполнителя');
                return false;
            }
        },
        fillInSz(){
            this.loading = true;
            if(this.results.docParam.button1caption === 'Заполнить СЗ' && this.results.docParam.showbutton1 === 'Y'){ this.button = 'BUTTON1' }
            else if(this.results.docParam.button2caption === 'Заполнить СЗ' && this.results.docParam.showbutton2 === 'Y'){ this.button = 'BUTTON2' }
            else if(this.results.docParam.button3caption === 'Заполнить СЗ' && this.results.docParam.showbutton3 === 'Y'){ this.button = 'BUTTON3' }
            let data = {
                docIsn: this.docIsn ? this.docIsn: this.results.docIsn,
                button: this.button,
            }
            this.axios.post('/document/buttonClick', data)
                .then((response) => {
                    if(response.data.success) {
                        if((this.results.docParam.button1caption === 'Заполнить СЗ' && this.results.docParam.showbutton1 === 'Y') || (this.results.docParam.button2caption === 'Заполнить СЗ' && this.results.docParam.showbutton2 === 'Y')
                            || (this.results.docParam.button3caption === 'Заполнить СЗ' && this.results.docParam.showbutton3 === 'Y')){
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
                                this.saveDoc = false;
                            })
                        } else {
                            this.saveDoc = false;
                        }
                        this.fillIn = true;
                        this.toForm = true;
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
            if(this.results.docParam.button1caption === 'Сформировать лист согласования' && this.results.docParam.showbutton1 === 'Y'){ this.button = 'BUTTON1' }
            else if(this.results.docParam.button2caption === 'Сформировать лист согласования' && this.results.docParam.showbutton2 === 'Y'){ this.button = 'BUTTON2' }
            let data = {
                docIsn: this.docIsn ? this.docIsn : this.results.docIsn,
                button: this.button,
            }
            this.axios.post('/document/buttonClick', data)
                .then((response) => {
                    if(response.data.success) {
                        this.results.status = response.data.status
                        this.results.stage = response.data.stage
                        this.fillIn = false;
                        this.listDocIsn = response.data.DOCISN
                        this.listDocId = response.data.listDocId;
                        if(this.listDocIsn.length > 0){
                            for(let i=0; i<this.results.resDop.length; i++){
                                if(this.results.resDop[i].fullname === 'Лист согласования'){
                                    this.results.resDop[i].val = this.listDocIsn
                                    this.results.resDop[i].value = this.listDocId
                                }
                            }
                        }
                        this.result = response.data.error
                        this.saveDoc = false;
                    } else {
                        this.addChange = false;
                        alert(response.data.error)
                        this.saveDoc = true;
                        this.fillIn = true;
                    }
                    this.loading = false
                    this.toForm = false;
                })
                .catch(function (error) {
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
            if(doc === this.listDocId){
                this.preloader(true);
                this.changeMatch.status = false;
                if(this.listDocId === null){
                    for(let i=0; i<this.results.result.length; i++){
                        if(this.results.result[i].fullname === 'Лист согласования'){
                            this.listDocIsn = this.results.result[i].val
                            this.listDocId = this.results.result[i].value
                        }
                    }
                }
                this.axios.post('/getCoordinationInfo', {docIsn: this.listDocIsn}).then(response => {
                    if(response.data.success){
                        this.coordination = response.data.response;
                        this.preloader(false);
                        this.$refs.modalButton.click();
                    }else{
                        this.attachments = [];
                    }
                });
            }
        },
        searchDocumentJournal(){
            this.preloader(true);
            this.$refs.modalDocument.click();
            this.preloader(false);
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
        DocumentJournalModal,
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
