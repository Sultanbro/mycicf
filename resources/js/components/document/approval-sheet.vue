<template>
    <div class="approval-sheet">
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
                                    <div class="col-md-8 input-group">
                                        <input v-model="results.contragent.value ? results.contragent.value : contragent.fullName" @click="OpenModal('Контрагент')" type="text" class="form-control">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn-light" @click="OpenModal('Контрагент')">
                                                <i class="fa fa-search"></i>
                                            </button>
                                            <button type="submit" class="btn-light" @click="clearInfo('Контрагент')">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4" v-for="result in results.result1">
                                <div v-if="!isLoading && result.fullname == 'Адресат'" class="form-group row">
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
                                            id="executor" :multiple="false" :options="userList" :disable-branch-nodes="true"/>
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
                                        @select="changeSelected($event)"
                                        :disable-branch-nodes="true"/>
                                </div>
                                <div class="col-md-6" v-if="docrow.fieldname === 'Возложить полномочия на:'">
                                    <treeselect
                                        v-model="docrow.value" :disabled="addChange"
                                        :multiple="false"
                                        :options="userList"
                                        @select="changeSelected($event)"
                                        :disable-branch-nodes="true"/>
                                </div>
                                <div v-if="docrow.fieldname === 'Делегировать полномочия в части:'">
                                    <treeselect
                                        v-model="docrow.value" :disabled="addChange"
                                        :multiple="false"
                                        :options="userList"
                                        @select="changeSelected($event)"
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
                                <!--                                                :key="`${index}-${docrow.value}-${3}`"-->
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
                    </div>
                    <div class="col-md-5 text-align-center">
                        <i v-if="loading" class="fas fa-spinner fa-spin"></i>
<!--                        <button v-if="sendOutForm" class="btn btn-primary btn-block2" @click="sendOut()">-->
<!--                            Разослать на согласование-->
<!--                        </button>-->
                        <button v-show="(results.docParam.button1caption === 'Сформировать лист согласования' && results.docParam.showbutton1 === 'Y') || (results.docParam.button2caption === 'Сформировать лист согласования' && results.docParam.showbutton2 === 'Y')"
                                v-if="!agrList && toForm" class="btn btn-primary btn-block2" :disabled="!addChange" @click="buttonClick()">
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
                                <div v-else-if="result.fullname === 'Куратор агента (предыдущий, при перезакреплении)'">
                                    <div class="input-group">
                                        <input v-model="previousCuratorAgent.fullName" @click="OpenModal('Куратор агента (предыдущий, при перезакреплении)')" type="text" class="form-control">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn-light" @click="OpenModal('Куратор агента (предыдущий, при перезакреплении)')">
                                                <i class="fa fa-search"></i>
                                            </button>
                                            <button type="submit" class="btn-light" @click="clearInfo('Куратор агента (предыдущий, при перезакреплении)')">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div v-else-if="result.fullname === 'Список командируемых' || result.fullname === 'Список командируемых' || result.fullname === 'Куратор агента (новый)'
                                     || result.fullname === 'Председатель комиссии' || result.fullname === 'Член комиссии 1' || result.fullname === 'Член комиссии 2'
                                     || result.fullname === 'Член комиссии 3' || result.fullname === 'Член комиссии 4' || result.fullname === 'Член комиссии 5'
                                    || result.fullname === 'Член комиссии 6' || result.fullname === 'Председатель комиссии (филиал)' || result.fullname === 'Секретарь комиссии'
                                    || result.fullname === 'Подписант за первого руководителя' || result.fullname === 'Подписант за главного бухгалтера' || result.fullname === 'Подписант за главного бухгалтера (ДСП)'">
                                    <treeselect v-model="result.val" placeholder="Не выбрано" :disabled="addChange"
                                                :multiple="false" :options="userList" :disable-branch-nodes="true"/>
                                </div>
                                <div v-else-if="result.fullname === 'Вид доверенности'">
                                    <select v-model="result.val" :disabled="addChange" class="form-control" required>
                                        <option v-for="proxyType in proxyTypes" :value="proxyType[0]">{{ proxyType[1] }}</option>
                                    </select>
                                </div>
                                <div v-else-if="result.fullname === 'Город/Регион'">
                                    <treeselect v-model="result.val" :disabled="addChange"
                                                :multiple="false" :options="regions" :disable-branch-nodes="true"/>
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
                                        <div v-model="result.val" class="pointer" scope="col" @click="OpenModal(result.val)">{{result.val}}</div>
                                    </div>
                                </div>
                                <div v-else-if="result.fullname === 'Список договоров  для внесение изменение'">
                                    <div>
                                        <div v-model="result.val" class="pointer" scope="col">{{result.value}}</div>
                                    </div>
                                </div>
                                <div v-else-if="result.fullname === 'Причина аннулирования СЗ'">
                                    <div>
                                        <input type="text" v-model="result.val"
                                               class="form-control" :disabled="addChange">
                                    </div>
                                </div>
                                <div v-else-if="result.fullname === 'Срок исполнения СЗ' || result.fullname === 'Дата заключения договора поручения' ||
                                result.fullname === 'Дата расторжения договора поручения' || result.fullname === 'Дата предписания'">
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
                                    <treeselect v-model="result.val" placeholder="Не выбрано" :disabled="addChange"
                                                :multiple="false" :options="costTypes" :disable-branch-nodes="true"/>
                                </div>
                                <div v-else-if="result.fullname === 'Группа подразделений'">
                                    <treeselect v-model="result.val" :multiple="false" :options="unitGroups" :disabled="addChange"/>
                                </div>
                                <div v-else-if="result.fullname === 'Тема СЗ (списание)'">
                                    <select v-model="result.val" :disabled="addChange" class="form-control">
                                        <option v-for="topic in topicSZ" :value="topic[0]">{{ topic[1] }}</option>
                                    </select>
                                </div>
                                <div v-else-if="result.fullname === 'Необходимо согласование работников АдмУ'">
                                    <input
                                        type="checkbox"
                                        v-model="result.val"
                                        true-value="1"
                                        false-value="0"
                                    >
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
        <button v-show="false" ref="modalCounterparty" type="button" data-toggle="modal" data-target="#counterpartyModal">Large modal</button>
        <counterparty-journal-modal
            :counterparty="counterparty"
            :contragent="contragent"
            :previous-curator-agent="previousCuratorAgent"
            :recordingCounterparty="recordingCounterparty"
            :results="results"
        >
        </counterparty-journal-modal>
    </div>
</template>
<script>
    import DatePicker from "vue2-datepicker";
    import 'vue2-datepicker/index.css';
    import MaskedInput from 'vue-text-mask';
    import 'vue2-datepicker/locale/ru';
    import moment from 'moment'
    import DocumentModal from "./document-modal";
    import CounterpartyJournalModal from "./counterparty-journal-modal";
    export default {
        name: "approval-sheet",
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
                servicesFor: [],
                economicActivity: [],
                vehicleModel: [],
                stateNumbers: [],
                violationComposition: [],
                autoColors: [],
                counterparty: {
                    isn: '',
                    iin: '',
                    fullName: '',
                    classISN: '',
                },
                contragent: {
                    fullName: '',
                    isn: '',
                    type: '',
                },
                previousCuratorAgent: {
                    fullName: '',
                    isn: '',
                    type: '',
                },
                recordingCounterparty: {type: ''},
                idShow: false,
                regions: [],
                isn: '0',
                delete: '0',
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
            this.getRegions();
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
            getRegions(){
                this.axios.post('/document/getRegions', {}).then((response) => {
                    this.regions = response.data.result
                });
            },
            getProxyTypes(){
                this.axios.post('/document/getProxyType', {}).then((response) => {
                    this.proxyTypes = response.data.proxyTypes;
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
                            this.fillIn = true;
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
                                    this.results.resDop[i].val = response.data.DOCISN
                                }
                            }
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
                                    this.results.resDop = response.data.results.resDop;
                                    if(response.data.results.id.length > 0){
                                        this.idShow = true;
                                    }
                                    this.fillIn = true;
                                    this.toForm = true;
                                    this.saveDoc = false;
                                })
                            } else {
                                this.sendOutForm = false;
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
            sendOut(){
                this.loading = true;
                this.results.status = 2522
                let data = {
                    docIsn: this.listDocIsn,
                    type: this.type,
                    results: this.results,
                }
                this.axios.post('/sendOut', data)
                    .then((response) => {
                        if(response.data.success) {
                            this.results.status = response.data.status;
                            this.results.stage = response.data.stage;
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
            OpenModal(doc) {
                if(doc === this.listDocIsn){
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
                            this.preloader(false);
                            this.$refs.modalButton.click();
                        }else{
                            this.attachments = [];
                        }
                    });
                }
                if(doc === this.results.contragent.fullname){
                    this.preloader(false);
                    this.recordingCounterparty.type = doc
                    this.$refs.modalCounterparty.click();
                }
                if (doc === 'Куратор агента (предыдущий, при перезакреплении)') {
                    this.preloader(false);
                    this.recordingCounterparty.type = doc
                    this.$refs.modalCounterparty.click();
                }
            },
            clearInfo(data){
                if(data === this.results.contragent.fullname){
                    this.results.contragent.subjIsn = '';
                    this.results.contragent.value = '';
                    this.contragent.fullName = ''
                    this.contragent.isn = ''
                }
                if(data === 'Куратор агента (предыдущий, при перезакреплении)'){
                    for(let i=0; i<this.results.resDop.length; i++){
                        if(this.results.resDop[i].fullname === 'Куратор агента (предыдущий, при перезакреплении)'){
                            this.results.resDop[i].value = ''
                            this.results.resDop[i].val = ''
                        }
                    }
                    this.previousCuratorAgent.fullName = ''
                    this.previousCuratorAgent.isn = ''
                    this.previousCuratorAgent.type = ''
                }
                this.counterparty.fullName = ''
                this.counterparty.isn = ''
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
            CounterpartyJournalModal,
        },
    }
</script>
<style scoped>
    .vdp-datepicker input {
        background: none;
    }
</style>
