<template>
    <div class="service-sheet">
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
                                <div v-if="results.docParam.showSubject === 'Y'" class="form-group row">
                                    <label class="col-md-4 col-form-label">{{results.contragent.fullname}}:</label>
                                    <div class="col-8" v-if="results['classisn'] !== '1287701'">
                                            <treeselect v-model="results.contragent.subjIsn" placeholder="Не выбрано" :disabled="addChange" :multiple="false"
                                                        :options="userList" :disable-branch-nodes="true"/>
                                    </div>
                                    <div class="col-8" v-if="results['classisn'] === '1287701'">
                                        <div class="col-md-12 input-group">
                                            <input v-model="contragent.fullName ? contragent.fullName : results.contragent.value" @click="OpenModal('КонтрагентАхд')" type="text" class="form-control">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn-light" @click="OpenModal('КонтрагентАхд')">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                                <button type="submit" class="btn-light" @click="clearInfo('КонтрагентАхд')">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
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
                                <div class="col-md-2" v-if="results.classisn === '2000751' || results.classisn === '1747041' || results.classisn === '800731'">
                                    <label>Дата начала</label>
                                    <div>
                                        <input class="form-control"
                                               type="tel"
                                               v-model="results.dateBeg" :disabled="addChange"
                                               v-mask="'##.##.####'"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-2" v-if="results.classisn === '2000751' || results.classisn === '1747041' || results.classisn === '800731'">
                                    <label>Дата оконч.</label>
                                    <div>
                                        <input class="form-control"
                                               type="tel"
                                               v-model="results.dateEnd" :disabled="addChange"
                                               v-mask="'##.##.####'"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-2" v-if="results.classisn === '800731'">
                                    <label>Доср.прекр.</label>
                                    <div>
                                        <input class="form-control"
                                               type="tel"
                                               v-model="results.earlyTerminationDate" :disabled="addChange"
                                               v-mask="'##.##.####'"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-2" v-if="results.classisn === '1287701'">
                                    <label>Сумма</label>
                                    <div>
                                        <input @keypress="onlyNumber" type="text" v-model="results.amount" :disabled="addChange" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2" v-if="results.classisn === '1287701'">
                                    <label>Валюта</label>
                                    <div>
                                        <select v-model="results.currIsn" :disabled="addChange" class="form-control">
                                            <option value="9813" selected>Тенге</option>
                                            <option value="9716">Доллар США</option>
                                            <option value="9721">Евро</option>
                                            <option value="9788">Российский рубль</option>
                                            <option value="9832">Фунт стерлингов</option>
                                            <option value="9838">Швейцарский франк</option>
                                        </select>
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
                                <div v-if="docrow.fieldname === 'Проживание'">
                                    <select v-model="docrow.value"  :disabled="addChange" class="form-control" required>
                                        <option value="1042661" selected>Да</option>
                                        <option value="1042671">Нет</option>
                                    </select>
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
                                <div v-if="docrow.fieldname === 'ФИО работника' || docrow.fieldname === 'ФИО работника ' || docrow.fieldname === 'ФИО Сотрудника' || docrow.fieldname === 'ФИО сотрудника'">
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
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Подразделение' || docrow.fieldname === 'Подразделение / Филиал'">
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
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Дата последнего рабочего дня'">
                                    <input class="form-control"
                                           type="tel"
                                           v-model="docrow.value" :disabled="addChange"
                                           v-mask="'##.##.####'"
                                    />
                                </div>
                                <div v-if="docrow.fieldname === 'Должность'">
                                    <select v-model="docrow.value" :disabled="addChange" class="form-control" required>
                                        <option v-for="dut in duties" :value="dut[0]">{{ dut[1] }}</option>
                                    </select>
                                </div>
                                <div v-if="docrow.fieldname === 'В связи'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
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
                                <div v-if="docrow.fieldname === 'Суточные (МРП)' || docrow.fieldname === 'ДСИ (в т.ч. СМР)' || docrow.fieldname === 'НС Заемщика' || docrow.fieldname === 'ДС Грузы'
                                    || docrow.fieldname === 'ДС Водного ТС' || docrow.fieldname === 'ГПО Проф.ответсвенности' || docrow.fieldname === 'ГПО Авто'
                                    || docrow.fieldname === 'ДС гарантий и поручительств (убытки фин.орг.)' || docrow.fieldname === 'ДМС юр.лиц' || docrow.fieldname === 'ГПО водного ТС'
                                    || docrow.fieldname === 'ДС от прочих фин. убытков' || docrow.fieldname === 'Входящее перестрахование' || docrow.fieldname === 'ДС Авто Каско'
                                    || docrow.fieldname === 'ПреИмущество' || docrow.fieldname === 'ДМС физ.лиц' || docrow.fieldname === 'ДГПО по договору'
                                    || docrow.fieldname === 'ДС ЖД' || docrow.fieldname === 'ДС Займов' || docrow.fieldname === 'ГПО Проф. ответ. (ЧСИ)'
                                    || docrow.fieldname === 'Двухсторонка' || docrow.fieldname === 'ДС от НС' || docrow.fieldname === 'МСТ'
                                    || docrow.fieldname === 'ДС Мини Каско' || docrow.fieldname === 'ДС Воздушного ТС' || docrow.fieldname === 'ДС судебных расходов'
                                    || docrow.fieldname === 'ДС Сакта' || docrow.fieldname === 'ДСИ в залоге' || docrow.fieldname === 'ГПО воздушного ТС'
                                    || docrow.fieldname === 'ДС Авто в залоге' || docrow.fieldname === 'ДГПО (за исключ. по договору)' || docrow.fieldname === 'Титульное страхование'">
                                    <input @keypress="onlyNumber" type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Город назначения' || docrow.fieldname === 'Город отправления'">
                                    <input type="text"
                                           v-model="docrow.value" :disabled="addChange" class="form-control">
                                </div>
                                <div v-if="docrow.fieldname === 'Виды родственных отношений'">
                                    <input type="text" v-model="docrow.value" :disabled="addChange" placeholder="...Родственник" class="form-control">
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
                        <button v-show="(results.docParam.button1caption === 'Список должностей' && results.docParam.showbutton1 === 'Y') || (results.docParam.button2caption === 'Список должностей' && results.docParam.showbutton2 === 'Y')"
                                v-if="fillIn" class="btn btn-primary btn-block2" @click="fillInSz()">
                            Список должностей
                        </button>
                    </div>
                    <div class="col-md-5 text-align-center">
                        <i v-if="loading" class="fas fa-spinner fa-spin"></i>
                        <button v-show="(results.docParam.button1caption === 'Сформировать лист согласования' && results.docParam.showbutton1 === 'Y') || (results.docParam.button2caption === 'Сформировать лист согласования' && results.docParam.showbutton2 === 'Y')
                                        || (results.docParam.button3caption === 'Сформировать лист согласования' && results.docParam.showbutton3 === 'Y')"
                                v-if="toForm" class="btn btn-primary btn-block2" @click="buttonClick()">
                            Сформировать лист согласования
                        </button>
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
                        <td scope="row">{{index + 1}}</td>
                        <td>{{result.fullname}}</td>
                        <td>
                            <div v-if="result.fullname === 'Согласующий 1' || result.fullname === 'Согласующий 2'
                                || result.fullname === 'Согласующий 3'">
                                <treeselect v-model="result.val" placeholder="Не выбрано" :disabled="addChange"
                                            :multiple="false" :options="userList" :disable-branch-nodes="true"/>
                            </div>
                            <div v-else-if="result.fullname === 'Список командируемых' || result.fullname === 'Список командируемых' || result.fullname === 'Куратор агента (новый)' || result.fullname === 'Куратор агента (предыдущий, при перезакреплении)'
                                     || result.fullname === 'Председатель комиссии' || result.fullname === 'Член комиссии 1' || result.fullname === 'Член комиссии 2'
                                     || result.fullname === 'Член комиссии 3' || result.fullname === 'Член комиссии 4' || result.fullname === 'Член комиссии 5'
                                    || result.fullname === 'Член комиссии 6' || result.fullname === 'Председатель комиссии (филиал)' || result.fullname === 'Секретарь комиссии'
                                    || result.fullname === 'Подписант за первого руководителя' || result.fullname === 'Подписант за главного бухгалтера' || result.fullname === 'Подписант за главного бухгалтера (ДСП)'
                                    || result.fullname === 'Член комиссии 1(филиалы)' || result.fullname === 'Член комиссии 2(филиалы)' || result.fullname === 'Член комиссии 3(филиалы)'">
                                <treeselect v-model="result.val" placeholder="Не выбрано" :disabled="addChange"
                                            :multiple="false" :options="userList" :disable-branch-nodes="true"/>
                            </div>
                            <div v-else-if="result.fullname === 'Вид доверенности'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option v-for="proxyType in proxyTypes" :value="proxyType[0]">{{ proxyType[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Тема СЗ (аренда/АХД)'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option v-for="ahd in typeAhd" :value="ahd[0]">{{ ahd[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Тема СЗ (хозяйственной деятельности)'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option v-for="economic in economicActivity" :value="economic[0]">{{ economic[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Тема СЗ (основной деятельности)'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option v-for="main in typeMain" :value="main[0]">{{ main[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Марка и Модель ТС'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option v-for="model in vehicleModel" :value="model[0]">{{ model[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Гос.номер авто'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option v-for="stateNumber in stateNumbers" :value="stateNumber[0]">{{ stateNumber[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Состав нарушении'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option v-for="violation in violationComposition" :value="violation[0]">{{ violation[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Цвет Авто'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option v-for="autoColor in autoColors" :value="autoColor[0]">{{ autoColor[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Лист согласования'">
                                <div>
                                    <div v-model="result.val" class="pointer" scope="col" @click="OpenModal(result.value)">{{result.value}}</div>
                                </div>
                            </div>
                            <div v-else-if="result.fullname === 'Документ'">
                                <div class="input-group">
                                    <input v-model="result.value ? result.value : documentName.id" @click="OpenModal('Документ')" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn-light" @click="OpenModal('Документ')">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="submit" class="btn-light" @click="clearInfo('Документ')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="result.fullname === 'Наименование суда'">
                                <div class="input-group">
                                    <input v-model="result.value ? result.value : courtName.fullName" @click="OpenModal('Наименование суда')" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn-light" @click="OpenModal('Наименование суда')">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="submit" class="btn-light" @click="clearInfo('Наименование суда')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="result.fullname === 'Бенефициар'">
                                <div class="input-group">
                                    <input v-model="result.value ? result.value : beneficiary.fullName" @click="OpenModal('Бенефициар')" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn-light" @click="OpenModal('Бенефициар')">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="submit" class="btn-light" @click="clearInfo('Бенефициар')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="result.fullname === 'Договор АХД'">
                                <div class="input-group">
                                    <input v-model="contractAhd.fullName ? result.value : contractAhd.fullName" @click="OpenModal('Договор АХД')" type="text" class="form-control"  :disabled="addChange">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn-light" @click="OpenModal('Договор АХД')" :disabled="addChange">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="submit" class="btn-light" @click="clearInfo('Договор АХД')" :disabled="addChange">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="result.fullname === 'Документ основание'">
                                <div class="input-group">
                                    <input v-model="result.value ? result.value : documentBase.fullName" @click="OpenModal('Документ основание')" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn-light" @click="OpenModal('Документ основание')">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="submit" class="btn-light" @click="clearInfo('Документ основание')">
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
                            <div v-else-if="result.fullname === 'Срок исполнения СЗ' || result.fullname === 'Дата заключения договора поручения' ||
                                result.fullname === 'Дата расторжения договора поручения' || result.fullname === 'Дата предписания' || result.fullname === 'Дата оплаты'">
                                <input class="form-control"
                                       type="tel"
                                       v-model="result.val" :disabled="addChange"
                                       v-mask="'##.##.####'"
                                />
                            </div>
                            <div v-else-if="result.fullname === 'Количество бланков' || result.fullname === 'ГСМ (Горюче-смазочные материалы)' || result.fullname === 'Совокупная сумма оказания услуг (за весь период)'
                                    || result.fullname === 'Предоплата' || result.fullname === 'Площадь' || result.fullname === 'Сумма' || result.fullname === 'Сумма штрафа'">
                                <input type="text"  @keypress="onlyNumber" v-model="result.val" :disabled="addChange" placeholder="..." class="form-control">
                            </div>
                            <div v-else-if="result.fullname === 'Тема СЗ (ДП)'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option value="804881">Заключение договора поручения со страховым агентом</option>
                                    <option value="804891">Перезакрепление агента</option>
                                    <option value="804901">Расторжение договора поручения</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'НДС'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option value="804651">без учета НДС</option>
                                    <option value="804661">с учетом НДС</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Период аренды'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option value="804681">в день</option>
                                    <option value="804691">в месяц</option>
                                    <option value="804701">в сутки</option>
                                    <option value="804711">всего</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Валюта'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option value="9813">Тенге</option>
                                    <option value="9716">Доллар США</option>
                                    <option value="9721">Евро</option>
                                    <option value="9788">Российский рубль</option>
                                    <option value="9832">Фунт стерлингов</option>
                                    <option value="9838">Швейцарский франк</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Порядок расчетов'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option value="222462">Авансовый платеж</option>
                                    <option value="222461">По факту</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Типовой договор'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option value="482291">Да</option>
                                    <option value="482301">Нет</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Тема СЗ (гос.пошлина)'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option value="812871">Оплата государственной пошлины</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Тип расчета'">
                                <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                    <option v-for="calculationType in calculationTypes" :value="calculationType[0]">{{ calculationType[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Форма оплаты'">
                                <select v-model="result.val" :disabled="addChange" class="form-control">
                                    <option v-for="paymentForm in paymentForms" :value="paymentForm[0]">{{ paymentForm[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Порядок оплаты'">
                                <select v-model="result.val" :disabled="addChange" class="form-control">
                                    <option v-for="paymentOrder in paymentOrders" :value="paymentOrder[0]">{{ paymentOrder[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Услуги по ДОУ'">
                                <select v-model="result.val" :disabled="addChange" class="form-control">
                                    <option v-for="service in servicesFor" :value="service[0]">{{ service[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Вид затрат' || result.fullname === 'Вид доходов/затрат'">
                                <treeselect v-model="result.val" :disabled="addChange"
                                            :multiple="false" :options="costTypes" :disable-branch-nodes="true"/>
                            </div>
                            <div v-else-if="result.fullname === 'Группа подразделений'">
                                <treeselect v-model="result.val" :multiple="false" :options="unitGroups" :disabled="addChange"/>
                            </div>
                            <div v-else-if="result.fullname === 'Подразделение'">
                                <treeselect
                                    :multiple="false" :options="options" :placeholder="'Выберите'" v-model="result.val"
                                    :disabled="addChange"/>
                            </div>
                            <div v-else-if="result.fullname === 'Тема СЗ (списание)'">
                                <select v-model="result.val" :disabled="addChange" class="form-control">
                                    <option v-for="topic in topicSZ" :value="topic[0]">{{ topic[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'КНП'">
                                <select v-model="result.val" :disabled="addChange" class="form-control">
                                    <option v-for="knp in knps" :value="knp[0]">{{ knp[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Код налогового органа'">
                                <treeselect
                                    :multiple="false" :options="taxAuthorityCode" :placeholder="'Выберите'" v-model="result.val"
                                    :disabled="addChange"/>
                            </div>
                            <div v-else-if="result.fullname === 'КБК'">
                                <select v-model="result.val" :disabled="addChange" class="form-control">
                                    <option v-for="kbk in kbks" :value="kbk[0]">{{ kbk[1] }}</option>
                                </select>
                            </div>
                            <div v-else-if="result.fullname === 'Согласованная котировка ДА'">
                                <div class="input-group">
                                    <input v-model="result.value ? result.value : agreedQuotation.fullName" @click="OpenModal('Согласованная котировка ДА')" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn-light" @click="OpenModal('Согласованная котировка ДА')">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="submit" class="btn-light" @click="clearInfo('Согласованная котировка ДА')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="result.fullname === 'Приложение'">
                                <div class="input-group">
                                    <input v-model="result.value ? result.value : application.fullName" @click="OpenModal('Приложение')" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn-light" @click="OpenModal('Приложение')">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="submit" class="btn-light" @click="clearInfo('Приложение')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="result.fullname === 'Номер договора'">
                                <div class="input-group">
                                    <input v-model="contractName.fullName ? contractName.fullName : result.val" @click="OpenModal('Номер договора')" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn-light" @click="OpenModal('Номер договора')">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="submit" class="btn-light" @click="clearInfo('Номер договора')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="result.fullname === 'Распоряжение на выплату'">
                                <div class="input-group">
                                    <input v-model="result.val" @click="OpenModal('Распоряжение на выплату')" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn-light" @click="OpenModal('Распоряжение на выплату')">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="submit" class="btn-light" @click="clearInfo('Распоряжение на выплату')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="result.fullname === 'Необходимо согласование работников АдмУ'">
                                <input
                                    type="checkbox" :disabled="addChange"
                                    v-model="result.val"
                                    true-value="1"
                                    false-value="0"
                                >
                            </div>
                            <div v-else-if="result.fullname === 'Тема СЗ (бланки)'">
                                {{ result.value }}
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
            :listDocId="listDocId"
            :changeMatch="changeMatch"
        >
        </document-modal>
        <button v-show="false" ref="modalQuotes" type="button" data-toggle="modal" data-target="#quotesJournal">Large modal</button>
        <full-quotes-journal
            :results="results"
            :agreedQuotation="agreedQuotation"
            :recordingCounterparty="recordingCounterparty"
        >
        </full-quotes-journal>
        <button v-show="false" ref="modalDocument" type="button" data-toggle="modal" data-target="#docJournal"></button>
        <document-journal-modal
            :results="results"
            :documentName="documentName"
            :recordingDocument="recordingDocument"
            :application="application"
            :contractAhd="contractAhd"
            :documentBase="documentBase"
        >
        </document-journal-modal>
        <button v-show="false" ref="modalContract" type="button" data-toggle="modal" data-target="#contractJournal"></button>
        <contract-journal-modal
            :results="results"
            :recordingCounterparty="recordingCounterparty"
            :contractName="contractName"
        >
        </contract-journal-modal>
        <button v-show="false" ref="modalCounterparty" type="button" data-toggle="modal" data-target="#counterpartyModal">Large modal</button>
        <div v-if="recordingCounterparty.type === 'КонтрагентАхд'">
            <counterparty-journal-modal
                :counterparty="counterparty"
                :recordingCounterparty="recordingCounterparty"
                :contragentAhd="contragentAhd"
                :results="results"
            >
            </counterparty-journal-modal>
        </div>
        <div v-if="recordingCounterparty.type !== 'КонтрагентАхд'">
            <button v-show="false" ref="modalCounterparty" type="button" data-toggle="modal" data-target="#counterpartyModal">Large modal</button>
            <counterparty-journal-modal
                :counterparty="counterparty"
                :recordingCounterparty="recordingCounterparty"
                :contragentAhd="contragentAhd"
                :results="results"
                :courtName="courtName"
                :beneficiary="beneficiary"
            >
            </counterparty-journal-modal>
        </div>
        <button v-show="false" ref="modalPaymentCommand" type="button" data-toggle="modal" data-target="#paymentModal">Large modal</button>
        <payment-journal-modal>

        </payment-journal-modal>
    </div>
</template>

<script>
import DatePicker from "vue2-datepicker";
import 'vue2-datepicker/index.css';
import MaskedInput from 'vue-text-mask';
import 'vue2-datepicker/locale/ru';
import moment from 'moment'
import DocumentModal from "./document-modal";
import FullQuotesJournal from "./full-quotes-journal";
import DocumentJournalModal from "./document-journal-modal";
import ContractJournalModal from "./contract-journal-modal";
import CounterpartyJournalModal from "./counterparty-journal-modal";
export default {
    name: "service-sheet",
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
            listDocId: '',
            coordination: {},
            saveDoc: true,
            required: false,
            type: 1,
            toForm: false,
            fillIn: false,
            index: '',
            dailyMC: [],
            calculationTypes: [],
            paymentForms: [],
            costTypes: [],
            unitGroups: [],
            duties: [],
            topicSZ: [],
            wallRows: 2,
            typeAhd: [],
            typeMain: [],
            paymentOrders: [],
            paymentCommand: {
                fullName: '',
                isn: '',
            },
            servicesFor: [],
            economicActivity: [],
            vehicleModel: [],
            stateNumbers: [],
            violationComposition: [],
            autoColors: [],
            knps: [],
            kbks: [],
            recordingCounterparty: {type: this.results.classisn == '1287701' ? 'КонтрагентАхд' : ''},
            recordingDocument: {type: ''},
            idShow: false,
            contragent: {
                fullName: '',
                isn: '',
                type: '',
            },
            contragentAhd: {
                fullName: '',
                isn: '',
            },
            isn: '0',
            delete: '0',
            documentName: {
                isn: '',
                id: '',
            },
            application: {
                isn: '',
                id: '',
            },
            contractAhd: {
                isn: '',
                fullName: '',
            },
            agreedQuotation: {
                isn: '',
                fullName: '',
            },
            contractName: {
                isn: '',
                fullName: '',
            },
            courtName: {
                fullName: '',
                isn: ''
            },
            beneficiary: {
                fullName: '',
                isn: ''
            },
            documentBase: {
                fullName: '',
                isn: ''
            },
            counterparty: {
                isn: '',
                iin: '',
                fullName: '',
                classISN: '',
            },
            notSelected: "Не выбрано",
            taxAuthorityCode: [],
            openCounterpartyAhd: false,
        }
    },
    created() {
        this.getUserList();
        this.getUsersInfo();
        this.getBranchData();
        this.getProxyTypes();
        this.getCostType();
        this.getPaymentForm();
        this.getCalculationType();
        this.getUnitGroup();
        this.getDuty();
        this.getSzTopic();
        this.getTypeSzAhd();
        this.getTypeSzMain();
        this.getPaymentOrder();
        this.getServicesFor();
        this.getTopicEconomicActivity();
        this.getVehicleModel();
        this.getCarStateNumber();
        this.getViolationComposition();
        this.getAutoColor();
        this.getKNP();
        this.getKBK();
        this.getTaxAuthorityCode();
        Vue.filter('splitNumber', function (value) {
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        })
    },
    methods: {
        getDatePicker() {
            const vm = this;
            vm.results.docdate = vm.docDate.getDate() +'.'+ ("0" + (vm.docDate.getMonth() + 1)).slice(-2) +'.'+ vm.docDate.getFullYear();
        },
        disabledDates(date) {
            const today = moment(new Date()).add(-1,'days').toDate();
            today.setHours(0, 0, 0, 0);
            return date <= today;
        },
        changeSelected(index,e){
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
        getKNP(){
            this.axios.post('/document/getKNP', {}).then((response) => {
                this.knps = response.data.knps;
            });
        },
        getKBK(){
            this.axios.post('/document/getKBK', {}).then((response) => {
                this.kbks = response.data.kbks;
            });
        },
        getTaxAuthorityCode(){
            this.axios.post('/document/getTaxAuthorityCode', {}).then((response) => {
                this.taxAuthorityCode = response.data.result;
            });
        },
        getServicesFor(){
            this.axios.post('/document/getServicesFor', {}).then((response) => {
                this.servicesFor = response.data.servicesFor;
            });
        },
        getTopicEconomicActivity(){
            this.axios.post('/document/getTopicEconomicActivity', {}).then((response) => {
                this.economicActivity = response.data.economicActivity;
            });
        },
        getVehicleModel(){
            this.axios.post('/document/getVehicleModel', {}).then((response) => {
                this.vehicleModel = response.data.vehicleModel;
            });
        },
        getCarStateNumber(){
            this.axios.post('/document/getCarStateNumber', {}).then((response) => {
                this.stateNumbers = response.data.stateNumbers;
            });
        },
        getViolationComposition(){
            this.axios.post('/document/getViolationComposition', {}).then((response) => {
                this.violationComposition = response.data.violationComposition;
            });
        },
        getAutoColor(){
            this.axios.post('/document/getAutoColor', {}).then((response) => {
                this.autoColors = response.data.autoColors;
            });
        },
        getTypeSzAhd(){
            this.axios.post('/document/getTypeSzAhd', {}).then((response) => {
                this.typeAhd = response.data.typeAhd;
            });
        },
        getTypeSzMain(){
            this.axios.post('/document/getTypeSzMain', {}).then((response) => {
                this.typeMain = response.data.typeMain;
            });
        },
        getSzTopic(){
            this.axios.post('/document/getSzTopic', {}).then((response) => {
                this.topicSZ = response.data.topicSZ
            });
        },
        getPaymentForm(){
            this.axios.post('/document/getPaymentForm', {}).then((response) => {
                this.paymentForms = response.data.paymentForms;
            });
        },
        getPaymentOrder(){
            this.axios.post('/document/getPaymentOrder', {}).then((response) => {
                this.paymentOrders = response.data.paymentOrders;
            });
        },
        getCostType(){
            this.axios.post('/document/getCostType', {}).then((response) => {
                this.costTypes = response.data.result;
            });
        },
        getDuty(){
            this.axios.post('/document/getDuty', {}).then((response) => {
                this.duties = response.data.duties;
            });
        },
        getCalculationType(){
            this.axios.post('/document/getCalculationType', {}).then((response) => {
                this.calculationTypes = response.data.calculationTypes;
            });
        },
        getUserList() {
            let data = {sz:true}
            this.axios.post('/full/getFullBranch', data).then((response) => {
                this.userList = response.data.result;
                this.isLoading = false;
            });
        },
        getUnitGroup(){
            this.axios.post('/document/getUnitGroup', {}).then((response) => {
                if (response.data.success) {
                    this.unitGroups = response.data.result;
                } else {
                    alert(response.data.error)
                }
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
            this.results.status = 'Аннулирован';
            let data = {
                results: this.results,
                docIsn: this.docIsn,
            }
            this.axios.post('/document/saveDocument', data)
                .then((response) => {
                    if(response.data.success) {
                        this.results.status = response.data.status
                        this.results.stage = response.data.stage
                        this.annul = false
                        this.toForm = false
                        this.fillIn = false
                        this.saveDoc = false
                    } else {
                        this.annul = true
                    }
                    this.addChange = false
                    this.extraLoading = false
                });
            this.addChange = false;
            this.extraLoading = false;
        },
        saveDocument(){
            if(this.duty.length > 0){
                for(let i=0; i<this.results.docrows.length; i++){
                    if(this.results.docrows[i].fieldname === 'Должность'){
                        this.results.docrows[i].value_name = this.duty
                    }
                }
            }
            this.loading = true;
            let data = {
                results: this.results,
                docIsn: this.docIsn ? this.docIsn : this.results.docIsn,
            }
            this.axios.post('/document/saveDocument', data)
                .then((response) => {
                    if(response.data.success) {
                        this.docIsn = this.docIsn ? this.docIsn : response.data.docIsn
                        this.results.docIsn = this.docIsn ? this.docIsn : response.data.docIsn
                        this.results.stage = response.data.stage
                        this.addChange = true
                        this.toForm = true
                        this.fillIn =true
                        this.saveDoc = false
                        this.annul = false
                    } else {
                        this.addChange = false
                        alert(response.data.error);
                    }
                    this.loading = false
                })
                .catch(function (error) {
                });
        },
        addChangeForm() {
            this.extraLoading = true
            if(this.results.docParam.button2caption === 'Внести изменения в СЗ' && this.results.docParam.showbutton2 === 'Y'){ this.button = 'BUTTON2' }
            else if(this.results.docParam.button2caption === 'Внести изменения' && this.results.docParam.showbutton2 === 'Y'){ this.button = 'BUTTON2' }
            else if(this.results.docParam.button3caption === 'Внести изменения в СЗ' && this.results.docParam.showbutton3 === 'Y'){ this.button = 'BUTTON3' }
            let data = {
                docIsn: this.docIsn ? this.docIsn: this.results.docIsn,
                button: this.button,
            }
            this.axios.post('/document/buttonClick', data)
                .then((response) => {
                    if(response.data.success) {
                        this.results.status = response.data.status
                        this.results.stage = response.data.stage
                        this.listDocIsn = response.data.DOCISN
                        this.listDocId = response.data.listDocId;
                        for(let i=0; i<this.results.resDop.length; i++){
                            if(this.results.resDop[i].fullname === 'Лист согласования'){
                                this.results.resDop[i].val = response.data.DOCISN
                                this.results.resDop[i].value = response.data.listDocId ? response.data.listDocId : ''
                            }
                        }
                        this.extraLoading = false
                        this.addChange = false
                        this.toForm = false
                        this.annul = true
                        this.saveDoc = true
                    } else {
                        this.addChange = true
                        this.extraLoading = false
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
            if(this.results.docParam.button1caption === 'Заполнить СЗ' && this.results.docParam.showbutton1 === 'Y'){ this.button = 'BUTTON1' }
            else if(this.results.docParam.button2caption === 'Заполнить СЗ' && this.results.docParam.showbutton2 === 'Y'){ this.button = 'BUTTON2' }
            let data = {
                docIsn: this.docIsn ? this.docIsn: this.results.docIsn,
                button: this.button,
            }
            this.axios.post('/document/buttonClick', data)
                .then((response) => {
                    if(response.data.error){
                        alert(response.data.error)
                        this.addChange = false
                        this.loading = false
                    }
                    else if(response.data.success) {
                        if((this.results.docParam.button1caption === 'Заполнить СЗ' && this.results.docParam.showbutton1 === 'Y') || (this.results.docParam.button2caption === 'Заполнить СЗ' && this.results.docParam.showbutton2 === 'Y')){
                            let dat = {
                                docisn: this.docIsn,
                                isn: this.results.classisn,
                                button: this.button,
                            }
                            this.axios.get('/document/'+this.results.classisn+'/'+this.docIsn, dat).then((response) => {
                                this.results.showRemark = response.data.results.showRemark ? response.data.results.showRemark :response.data.results.showRemark[0]
                                this.results.showRemark2 = response.data.results.showRemark2 ? response.data.results.showRemark2 : response.data.results.showRemark2[0]
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
                        this.loading = false;
                    }
                    this.loading = false;
                    this.addChange = true;
                })
                .catch(function (error) {
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
            } else if(doc === 'Согласованная котировка ДА'){
                this.preloader(false);
                this.recordingCounterparty.type = doc
                this.$refs.modalQuotes.click();
            } else if(doc === 'Приложение'){
                this.preloader(false);
                this.recordingDocument.type = doc
                this.$refs.modalDocument.click();
            } else if(doc === 'Номер договора'){
                this.preloader(false);
                this.recordingCounterparty.type = doc
                this.$refs.modalContract.click();
            } else if(doc === 'Документ'){
                this.preloader(false);
                this.recordingDocument.type = doc
                this.$refs.modalDocument.click();
            } else if(doc === 'Договор АХД'){
                this.preloader(false);
                this.recordingDocument.type = doc
                this.$refs.modalDocument.click();
            } else if(doc === 'Документ основание'){
                this.preloader(false);
                this.recordingDocument.type = doc
                this.$refs.modalDocument.click();
            }else if(doc === 'Распоряжение на выплату'){
                this.preloader(false);
                this.recordingDocument.type = doc
                this.$refs.modalPaymentCommand.click();
            }else if(doc === 'Наименование суда'){
                this.preloader(false);
                this.recordingCounterparty.type = doc
                this.$refs.modalCounterparty.click();
            } else if(doc === 'Бенефициар'){
                this.preloader(false);
                this.recordingCounterparty.type = doc
                this.$refs.modalCounterparty.click();
            } else if(doc === 'КонтрагентАхд'){
                this.preloader(false);
                this.recordingCounterparty.type = doc
                this.$refs.modalCounterparty.click();
            }
        },
        clearInfo(data){
            if(data === 'КонтрагентАхд'){
                this.contragentAhd.fullName = ''
                this.contragentAhd.isn = ''
                this.results.contragent.value = ''
                this.results.contragent.subjIsn = ''
            }else{
                for(let i=0; i<this.results.resDop.length; i++){
                    if(data === 'Договор АХД' && this.results.resDop[i].fullname === 'Договор АХД'){
                        this.contractAhd.fullName = ''
                        this.contractAhd.isn = ''
                        this.results.resDop[i].value = ''
                        this.results.resDop[i].val = ''
                    } else if(data === 'Согласованная котировка ДА' && this.results.resDop[i].fullname === 'Согласованная котировка ДА'){
                        this.results.resDop[i].value = ''
                        this.results.resDop[i].val = ''
                        this.agreedQuotation.fullName = ''
                        this.agreedQuotation.isn = ''
                    } else if(data === 'Приложение' && this.results.resDop[i].fullname === 'Приложение'){
                        this.results.resDop[i].value = ''
                        this.results.resDop[i].val = ''
                        this.application.fullName = ''
                        this.application.isn = ''
                    } else if(data === 'Номер договора' && this.results.resDop[i].fullname === 'Номер договора'){
                        this.results.resDop[i].value = ''
                        this.results.resDop[i].val = ''
                        this.contractName.fullName = ''
                        this.contractName.isn = ''
                    } else if(data === 'Наименование суда' && this.results.resDop[i].fullname === 'Наименование суда'){
                        this.results.resDop[i].value = ''
                        this.results.resDop[i].val = ''
                        this.application.fullName = ''
                        this.application.isn = ''
                    } else if(data === 'Бенефициар' && this.results.resDop[i].fullname === 'Бенефициар'){
                        this.results.resDop[i].value = ''
                        this.results.resDop[i].val = ''
                        this.application.fullName = ''
                        this.application.isn = ''
                    } else if(data === 'Документ основание' && this.results.resDop[i].fullname === 'Документ основание'){
                        this.results.resDop[i].value = ''
                        this.results.resDop[i].val = ''
                        this.documentBase.fullName = ''
                        this.documentBase.isn = ''
                    }
                }
            }
        },
        preloader(show){
            if(show){
                document.getElementById('preloader').style.display = 'flex';
            }else{
                document.getElementById('preloader').style.display = 'none';
            }
        },
    },
    computed: {
        orderedDocrows: function () {
            return _.orderBy(this.results.docrows, 'orderno')
        },
    },
    components: {
        ContractJournalModal,
        FullQuotesJournal,
        DocumentModal,
        DocumentJournalModal,
        DatePicker,
        MaskedInput,
        CounterpartyJournalModal,
    },
}
</script>
<style scoped>
</style>
