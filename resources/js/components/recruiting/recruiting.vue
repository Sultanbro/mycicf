<template>
    <div>
        <div class="bg-gray pt-5">
            <div class="tripplebar">
                <div class="tripplebar-btn col-md-3" v-on:click="recruitingTabs = 1" v-bind:class="{tripplebar_btn_active: recruitingTabs == 1}">
                    <div>
                        <i class="fas fa-search"></i>
                    </div>
                    <div>
                        Заявка на поиск кандидата (ГО и Регионы)
                    </div>
                </div>
                <div class="tripplebar-btn col-md-3" v-on:click="recruitingTabs = 2" v-bind:class="{tripplebar_btn_active: recruitingTabs == 2}">
                    <div>
                        <i class="far fa-comments"></i>
                    </div>
                    <div>
                        Интервью руководителей с кандидатами
                    </div>
                </div>
                <div class="tripplebar-btn col-md-3" v-on:click="recruitingTabs = 3" v-bind:class="{tripplebar_btn_active: recruitingTabs == 3}">
                    <div>
                        <i class="far fa-address-book"></i>
                    </div>
                    <div>
                        Результат проделанной работы
                    </div>
                </div>
            </div>
            <div v-if="recruitingTabs == 1" class="recruiting-container">
                <div class="recruiting-header">
                    <div class="recruiting-header-tab">
                        <div class="recruiting-header-tab-inner rec-active">
                            Головной офис
                        </div>
                    </div>
                </div>
                <div class="recruiting-body">
                    <div>
                        <div class="recruiting-select-header">
                            Наимененование структурного подразделения (укажите город и адрес филиала)
                        </div>
                        <div>
                            <select class="recruiting-select" v-model="cityAdressSelect">
                                <option value="selected" class="none"></option>
                                <option v-for="cities in cityAdress">{{cities}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex jc-sb mt-2">
                        <div class="recruiting-double-block col-md-5">
                            <div>
                                Наименование вакантной должности
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="nameOfPostSelect">
                                    <option value="selected" class="none"></option>
                                    <option v-for="inner in nameOfPost">{{inner}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="recruiting-double-block col-md-5">
                            <div>
                                Количество
                            </div>
                            <div>
                                <input type="number" v-model="quantityPeople" class="recruiting-select">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-select-header">
                            Причина возникновения вакансии
                        </div>
                        <div>
                            <select class="recruiting-select" v-model="ReasonToRecruitingSelect">
                                <option class="none"></option>
                                <option v-for="inner in ReasonToRecruiting" selected>{{inner}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="recruiting-tripple-block-container">
                        <div class="recruiting-tripple-block col-md-4">
                            <div>
                                Желаемый возраст
                            </div>
                            <div>
                                <input type="text" v-model="desiredAge" class="recruiting-select">
                            </div>
                        </div>
                        <div class="recruiting-tripple-block col-md-4">
                            <div>
                                Пол
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="sexSelect">
                                    <option v-for="inner in sex">{{inner}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="recruiting-tripple-block col-md-4">
                            <div>
                                Образование
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="educationSelect">
                                    <option v-for="inner in education">{{inner}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-select-header">
                            Функциональные обязанности
                        </div>
                        <div>
                            <textarea class="recruiting-textarea" v-model="functionalResponsobilities">
                            </textarea>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-tripple-block-container">
                            <div class="recruiting-tripple-block col-md-4">
                                <div>
                                    Опыт работы
                                </div>
                                <div>
                                    <select class="recruiting-select" v-model="workExpirienceSelect">
                                        <option v-for="inner in workExpirience">{{inner}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="recruiting-tripple-block col-md-4">
                                <div>
                                    Наличие подчиненных
                                </div>
                                <div>
                                    <select v-model="isHeWasBossSelect" class="recruiting-select">
                                        <option v-for="inner in isHeWasBoss">{{inner}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="recruiting-tripple-block col-md-4">
                                <div>
                                    Форма найма
                                </div>
                                <div>
                                    <select class="recruiting-select">
                                        <option v-for="inner in typeOfHire">{{inner}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-select-header">
                            Квалификационные требования к кандидату
                        </div>
                        <div>
                            <textarea class="recruiting-textarea" v-model="requestToCandidat">
                            </textarea>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-select-header">
                            Возможности и перспективы для кандидата
                        </div>
                        <div>
                            <select class="recruiting-select">
                                <option v-for="inner in perspectiveToCandidat">{{inner}}</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-select-header">
                            Уровень владения компьютерными программами
                        </div>
                        <div>
                            <select class="recruiting-select" v-model="computerKnowingSelect">
                                <option v-for="inner in computerKnowing">{{inner}}</option>
                            </select>
                        </div>
                    </div>

                    <!--Язык и уровень владения-->
                    <div>
                        <div class="recruiting-tripple-block-container" v-for="newLanguageBlock in newLanguageBlocks">
                            <div class="recruiting-tripple-block-center col-md-4">Язык и уровень владения:</div>
                            <div class="recruiting-tripple-block col-md-4">
                                <select class="recruiting-select" v-model="newLanguageBlock.language">
                                    <option v-for="(language, key) in newLanguageBlock.languages" :value="language" :key="key">
                                        {{language}}
                                    </option>
                                </select>
                            </div>
                            <div class="recruiting-tripple-block col-md-4">
                                <select class="recruiting-select" v-model="newLanguageBlock.level">
                                    <option v-for="(level, key) in languageLevel" :value="level" :key="key">
                                        {{level}}
                                    </option>
                                </select>
                            </div>
                            <hr>
                        </div>

                        <div class="recruiting-simple-block-container">
                            <div class="recruiting-simple-block ml-2 mr-2" @click="addLanguage">
                                <i class="fas fa-plus-circle"></i>
                                <span>Добавить язык</span>
                            </div>
                            <div class="recruiting-simple-block ml-2 mr-2" @click="deleteLanguage" v-if="this.newLanguageBlocks.length > 1">
                                <i class="far fa-times-circle"></i>
                                <span>Удалить язык</span>
                            </div>
<!--                            TEST FUNCTION-->
<!--                            <button @click="testFunc">Click here</button>-->
                        </div>
                    </div>
<!--                    <div>-->
<!--                        <div class="recruiting-tripple-block-container" v-for="language in languages">-->
<!--                            <div class="recruiting-tripple-block-center col-md-4">Язык и уровень владения:</div>-->
<!--                            <div class="recruiting-tripple-block col-md-4">-->
<!--                                <select class="recruiting-select" v-model="language.language" v-if="language.language_sel == null" >-->
<!--                                    <option v-for="inner in languageAndLvl[0].language">{{inner}}</option>-->
<!--                                </select>-->
<!--                                <div v-if="language.language_sel != null" @click="language.language_sel = null">{{ language.language_sel }}</div>-->

<!--                            </div>-->
<!--                            <div class="recruiting-tripple-block col-md-4">-->
<!--                                <select class="recruiting-select" v-model="language.level">-->
<!--                                    <option v-for="inner in languageAndLvl[0].lvl">{{inner}}</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="recruiting-simple-block-container">-->
<!--                            <div class="recruiting-simple-block" @click="addLanguage">-->
<!--                                <i class="fas fa-plus-circle"></i>-->
<!--                                <span>Добавить язык</span>-->
<!--                            </div>-->
<!--                            <div class="recruiting-simple-block" @click="removeAddLanguage" v-if="languages.length !== 1">-->
<!--                                <i class="fas fa-plus-circle"></i>-->
<!--                                <div>Удалить язык</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                    <div class="card-body" v-for="newLanguageBlock in newLanguageBlocks">-->
<!--                        <select class="custom-select mb-2 w-50" v-model="newLanguageBlock.language">-->
<!--                            <option v-for="(language, key) in newLanguageBlock.languages" :value="language" :key="key">-->
<!--                                {{language}}-->
<!--                            </option>-->
<!--                        </select>-->
<!--                        <select class="custom-select mb-2 w-25" v-model="newLanguageBlock.level">-->
<!--                            <option v-for="(level, key) in languageLevel" :value="level" :key="key">-->
<!--                                {{level}}-->
<!--                            </option>-->
<!--                        </select>-->
<!--                        <hr>-->
<!--                    </div>-->

<!--                    <button type="button" class="btn btn-outline-success" @click="addLanguage">Добавить язык</button>-->
<!--                    <button type="button" class="btn btn-danger" @click="deleteLanguage">Удалить язык</button>-->


                    <!--Оплата труда-->
                    <div>Оплата труда</div>
                    <div class="recruiting-tripple-block-container">
                        <div class="recruiting-tripple-block-center col-md-7">На испытательный срок и после испытательного срока:</div>
                        <div class="recruiting-tripple-block col-md-5">
                            <input type="number" v-model="salary" class="recruiting-select">
                        </div>
                    </div>
                    <div class="d-flex jc-sb mt-2">
                        <div class="recruiting-double-block col-md-5">
                            <div>
                                Наличие дополнительной мотивации (бонусов)
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="motivationSelect">
                                    <option v-for="inner in motivation">{{inner}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="recruiting-double-block col-md-5">
                            <div>
                                График работы
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="jobChartSelect">
                                    <option v-for="inner in jobChart">{{inner}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex jc-sb mt-2">
                        <div class="recruiting-double-block col-md-5">
                            <div>
                                Наличие автомобиля
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="haveCarSelect">
                                    <option v-for="inner in haveCar">{{inner}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="recruiting-double-block col-md-5">
                            <div>
                                Категория вод. удостоверения
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="driverCategorySelect">
                                    <option v-for="inner in driverCategory">{{inner}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
<!--                    <div class="recruiting-tripple-block-container">-->
<!--                        <div class="recruiting-tripple-block-center col-md-4">-->
<!--                            <div>-->
<!--                                Социальный пакет-->
<!--                            </div>-->
<!--                        </div>-->
<!--&lt;!&ndash;                        <div class="recruiting-tripple-block col-md-4">&ndash;&gt;-->
<!--&lt;!&ndash;                            <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <select class="recruiting-select" v-model="socialPacket[0].packetSelect">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <option v-for="inner in socialPacket[0].packet">{{inner}}</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                </select>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="recruiting-tripple-block col-md-4">&ndash;&gt;-->
<!--&lt;!&ndash;                            <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <select class="recruiting-select" v-model="socialPacket[0].lvlSelect">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <option v-for="inner in socialPacket[0].lvl">{{inner}}</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                </select>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--                    </div>-->
                    <div>
                        <div class="recruiting-tripple-block-container" v-for="newSocialpacketBlock in newSocialpacketBlocks">
                            <div class="recruiting-tripple-block-center col-md-4">Социальный пакет</div>
                            <div class="recruiting-tripple-block col-md-4">
                                <select class="recruiting-select" v-model="newSocialpacketBlock.packet">
                                    <option v-for="(packet, key) in newSocialpacketBlock.packets" :value="packet" :key="key">
                                        {{packet}}
                                    </option>
                                </select>
                            </div>
                            <div class="recruiting-tripple-block col-md-4">
                                <select class="recruiting-select" v-model="newSocialpacketBlock.level">
                                    <option v-for="(level, key) in socialPacketLvl" :value="level" :key="key">
                                        {{level}}
                                    </option>
                                </select>
                            </div>
                            <hr>
                        </div>
<!--                        <div class="recruiting-tripple-block-container" v-for="newLanguageBlock in newLanguageBlocks">-->
<!--                            <div class="recruiting-tripple-block-center col-md-4">Язык и уровень владения:</div>-->
<!--                            <div class="recruiting-tripple-block col-md-4">-->
<!--                                <select class="recruiting-select" v-model="newLanguageBlock.language">-->
<!--                                    <option v-for="(language, key) in newLanguageBlock.languages" :value="language" :key="key">-->
<!--                                        {{language}}-->
<!--                                    </option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                            <div class="recruiting-tripple-block col-md-4">-->
<!--                                <select class="recruiting-select" v-model="newLanguageBlock.level">-->
<!--                                    <option v-for="(level, key) in languageLevel" :value="level" :key="key">-->
<!--                                        {{level}}-->
<!--                                    </option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                            <hr>-->
<!--                        </div>-->

<!--                        <div class="recruiting-simple-block-container">-->
<!--                            <div class="recruiting-simple-block" @click="addLanguage">-->
<!--                                <i class="fas fa-plus-circle"></i>-->
<!--                                <span>Добавить язык</span>-->
<!--                            </div>-->
<!--                            <div class="recruiting-simple-block" @click="deleteLanguage" v-if="languages.length !== 1">-->
<!--                                <i class="fas fa-plus-circle"></i>-->
<!--                                <div>Удалить язык</div>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                    <div class="recruiting-simple-block-container">
                        <div class="recruiting-simple-block ml-2 mr-2" @click="addSocialPacket">
                            <i class="fas fa-plus-circle"></i>
                            <span>Добавить Соц. пакет</span>
                        </div>
                        <div class="recruiting-simple-block" @click="deleteSocialPacket" v-if="this.newSocialpacketBlocks.length > 1">
                            <i class="far fa-times-circle"></i>
                            <span>Удалить Соц. пакет</span>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-select-header">
                            Личностные компетенции кандидата
                        </div>
                        <div>
                            <textarea value="candidatsTrait" class="recruiting-textarea">Ориентированный на результат, обучаемый, коммуникабельный, ответственный и системный в работе, активный и позитивный (оптимист)
                            </textarea>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-select-header">
                            Этапы интервью с кандидатом в департаменте
                        </div>
                        <div>
                            <textarea v-model="interviewStage" class="recruiting-textarea">
                            </textarea>
                        </div>
                    </div>
                    <div class="recruiting-btn-container">
                        <div class="recruiting-btn" @click="savedSuccess" v-bind:class="{disabledBtnRecruiting : cityAdressSelect == '' || nameOfPostSelect == '' || quantityPeople == '' || ReasonToRecruitingSelect == '' || desiredAge == '' || sexSelect == '' || educationSelect == '' || functionalResponsobilities == '' || workExpirienceSelect == '' || isHeWasBossSelect == '' || typeOfHire == '' || requestToCandidat == '' || perspectiveToCandidat == '' || computerKnowingSelect == '' || salary == '' || motivationSelect == '' || jobChartSelect == '' || haveCarSelect == '' || driverCategorySelect == '' || candidatsTrait == '' || interviewStage == '' || newLanguageBlocks[0].language == null || newSocialpacketBlocks[0].packet == null}">
<!--                            @click="getFaqData"-->
                            Отправить
                        </div>
<!--                        ТЕСТОВЫЙ ЗАПРОС-->
<!--                        <button @click="getTestData">Click here</button>-->
<!--                        {{testArray}}-->
<!--                        {{faq_questions}}-->



<!--                        <div v-if="testArray.length > 0" v-for="answer in testArray">-->
<!--                            Какое-то значение: {{answer.}}-->
<!--                        </div>-->
                        <div v-if="faq_questions.length > 0" v-for="branch in faq_questions">
                            Имя: {{ branch.fullname }}<br>
                            ИСН: {{ branch.id }}<br>
                            Деп: {{ branch.duty }}<br>
                        </div>
                        <br>

                    </div>
                </div>
            </div>
            <div v-if="recruitingTabs == 2">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                    Launch demo modal
                </button>
                <div class="modal fade show" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog recruiting-modal-size" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-header-general">
                                    <div class="color-blue">ФИО кандидата</div>
                                    <strong>{{candidatsFIOModal}}</strong>
                                </div>
                            </div>
                            <div class="modal-margin-general">
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Структурное подразделение:</div>
                                    <div class="col-md-6">{{structuralUnitModal}}</div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">ИИН:</div>
                                    <div class="col-md-6">
                                        <input type="number" class="recruiting-modal-general" v-model="IINModal">
                                    </div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Контактный номер кандидата:</div>
                                    <div class="col-md-6">
                                        <input type="number" class="recruiting-modal-general" v-model="candidatsPhoneNumber">
                                    </div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Резюме кандидата (файл загрузить в Word-e):</div>
                                    <div class="col-md-6">
                                        <button class="recruiting-upload-general">Файл 1</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-header modal-margin-general pl-0 pr-0 flex-column">
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Вакансия:</div>
                                    <div class="col-md-6">{{vacansionModal}}</div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Количество единиц:</div>
                                    <div class="col-md-6">{{numberOfUnitsModal}}</div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Дата собеседования (ответ в течение 2-х дней после получения резюме):</div>
                                    <div class="col-md-6">
                                        <input type="date" v-model="interviewDateModal" class="recruiting-modal-general">
                                    </div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Время собеседования:</div>
                                    <div class="col-md-6">
                                        <input type="text" v-model="interviewTimeModal" class="recruiting-modal-general">
                                    </div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Результат итогового интервью кандидата с руководителем(ответ в течение дня):</div>
                                    <div class="col-md-6">
                                        <select v-model="interviewMainResultModalSelect" class="recruiting-modal-general recruiting-modal-general forestgreen">
                                            <option v-for="inner in interviewMainResultModal">{{inner}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Дата выхода кандидата на стажировку (с указанием даты окончания стажировки, но не более 5 дней):</div>
                                    <div class="col-md-6">{{candidatsDateInternshipModal}}</div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Дата заключения ДОУ (ответ в течение 5 дней (с даты выхода кандидата на стажировку)):</div>
                                    <div class="col-md-6">{{dateOfTheDOUContractModal}}</div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Дата заключения ТД (принят в штат):</div>
                                    <div class="col-md-6">{{dateOfTheStateContractModal}}</div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Комментарий:</div>
                                    <div class="col-md-6">
                                        <textarea cols="30" rows="4" v-model="commentModal" class="recruiting-modal-general">Текст</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table recruiting-striped recruiting-interwiew-table">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">ФИО кандидата</th>
                        <th scope="col">Структурное подразделение</th>
                        <th scope="col">Дата собеседования</th>
                        <th scope="col">Результат итогового интервью</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>Иванов Иван Иванович</td>
                        <td>Департамент развития партнерских отношений</td>
                        <td>01.02.2020</td>
                        <td>Успешно прошел собеседование</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Иванов Иван Иванович</td>
                        <td>Департамент развития партнерских отношений</td>
                        <td>01.02.2020</td>
                        <td>Успешно прошел собеседование</td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>Иванов Иван Иванович</td>
                        <td>Департамент развития партнерских отношений</td>
                        <td>01.02.2020</td>
                        <td>Успешно прошел собеседование</td>
                    </tr>
                    <tr>
                        <td scope="row">4</td>
                        <td>Иванов Иван Иванович</td>
                        <td>Департамент развития партнерских отношений</td>
                        <td>01.02.2020</td>
                        <td>Успешно прошел собеседование</td>
                    </tr>
                    </tbody>
                </table>
                <table class="dosier-table table text-align-center">
                    <thead>
                    <tr class="header color-white">
                        <th scope="col">Номер документа</th>
                        <th scope="col" class="thead-border">Тип документа</th>
                        <th scope="col" class="thead-border">Инициатор</th>
                        <th scope="col" class="thead-border">Подразделение</th>
                        <th scope="col">Дата</th>
                    </tr>
                    </thead>
                    <tbody class="date-color">
                    <tr v-for="(info, index) in other" :key="info.ISN">
                        <td class="pointer" scope="col" @click="openModal(info.ISN)">{{info.id}}</td>
                        <td scope="col" class="thead-border">{{info.type}}</td>
                        <td scope="col" class="thead-border">{{info.curator}}</td>
                        <td scope="col" class="thead-border">{{info.DeptName}}</td>
                        <td scope="col">{{info.docdate}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div v-if="recruitingTabs == 3">
                <table class="table recruiting-striped">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">ФИО Заказчика</th>
                        <th scope="col">Структурное подразделение/ФИО ответственного/Вакансия</th>
                        <th scope="col" class="recruiting-center">Статус</th>
                        <th scope="col" class="recruiting-center">Ответственный рекрутер</th>
                        <th scope="col">Дата выхода кандидата по ДОУ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>Иванов Иван Иванович</td>
                        <td>Департамент развития партнерских отношений/Туленов Ж./Менеджер</td>
                        <td class="recruiting-center">Закрыта</td>
                        <td class="recruiting-center">Казиева А</td>
                        <td>01.02.2020</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Иванов Иван Иванович</td>
                        <td>Департамент развития партнерских отношений/Туленов Ж./Менеджер</td>
                        <td class="recruiting-center">Закрыта</td>
                        <td class="recruiting-center">Казиева А</td>
                        <td>01.02.2020</td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>Иванов Иван Иванович</td>
                        <td>Департамент развития партнерских отношений/Туленов Ж./Менеджер</td>
                        <td class="recruiting-center">Закрыта</td>
                        <td class="recruiting-center">Казиева А</td>
                        <td>01.02.2020</td>
                    </tr>
                    <tr>
                        <td scope="row">4</td>
                        <td>Иванов Иван Иванович</td>
                        <td>Департамент развития партнерских отношений/Туленов Ж./Менеджер</td>
                        <td class="recruiting-center">Закрыта</td>
                        <td class="recruiting-center">Казиева А</td>
                        <td>01.02.2020</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <FlashMessage></FlashMessage>
    </div>
</template>

<script>
    export default {
        name: "recruiting",
        data() {
            return {
                recruitingTabs: 1,
                activeBtnRecruiting: 'activeBtnRecruiting',
                cityAdressSelect: '',
                cityAdress: [
                    'Алматы',
                    'Астана',
                    'Талдыкорган'
                ],
                nameOfPostSelect: '',
                nameOfPost: [
                    'Web-программист',
                    'Ведущий Web-программист'
                ],
                quantityPeople: 1,
                ReasonToRecruitingSelect: '',
                ReasonToRecruiting: [
                    'Нехватка сотрудников',
                    'Открыто вакантное место'
                ],
                desiredAge: '19-25',
                sexSelect: '',
                sex: [
                    'Мужской',
                    'Женский'
                ],
                educationSelect: '',
                education: [
                    'Высшее',
                    'Средне-специальное',
                    'Среднее'
                ],
                functionalResponsobilities: '',
                workExpirienceSelect: '',
                workExpirience: [
                    'От 1 года',
                    'От 5 лет',
                ],
                isHeWasBossSelect: '',
                isHeWasBoss: [
                    'Нет',
                    'Да',
                ],
                typeOfHire: [
                    'На испытательный срок',
                    'По договору'
                ],
                requestToCandidat: '',
                perspectiveToCandidat: [
                    'Карьерный рост и внутреннее корпоративное обучение',
                ],
                computerKnowingSelect: '',
                computerKnowing: [
                    'Уверенное владение ПК',
                ],
                // languages: [
                //     {
                //         language : null,
                //         level : null,
                //         language_sel: null
                //     }
                // ],
                languageAndLvl:
                    [{
                        languageSelect: '',
                        lvlSelect: '',
                        language:
                            [
                                'Казахский',
                                'Русский',
                                'Английский'
                            ],
                        lvl: [
                            'Базовый',
                            'Средний',
                            'Родной',
                        ],
                        languageDublicate: [],
                    }],
                salary: '120000',
                motivationSelect: '',
                motivation: [
                    'Есть',
                    'Нет'
                ],
                jobChartSelect: '',
                jobChart: [
                    '09:00-18:00, 5/2 рабочая неделя'
                ],
                haveCarSelect: '',
                haveCar: [
                    'Да'
                ],
                driverCategorySelect: '',
                driverCategory: [
                    'B, C'
                ],
                socialPacket: [{
                    packet: [
                        'Медицинское страхование',
                    ],
                    lvl: [
                        'Родной',
                    ],
                }],
                candidatsTrait: 'Ориентированный на результат, обучаемый, коммуникабельный, ответственный и системный в работе, активный и позитивный (оптимист)',
                interviewStage: '',
                addLanguageBlockItem: 1,
                languages: [
                    'Казахский',
                    'Русский',
                    'Английский',
                ],
                languageLevel: [
                    'низкий',
                    'средний',
                    'высокий',
                ],
                newLanguageBlocks: [{
                    language: null,
                    level: null,
                    languages: [
                        'Казахский',
                        'Русский',
                        'Английский',
                    ],
                }],
                newSocialpacketBlocks: [{
                    packet: null,
                    level: null,
                    packets: [
                        'Первый соц. пакет',
                        'Второй соц. пакет',
                        'Третий соц. пакет',
                    ],
                }],
                packets: [
                    'Первый соц. пакет',
                    'Второй соц. пакет',
                    'Третий соц. пакет'
                ],
                socialPacketLvl: [
                    'Базовый соц. пакет',
                    'Средний соц.пакет',
                    'Продвинутый соц.пакет',
                ],
                languagesCounter: 1,
                socialPacketCounter: 1,

            //    Переменные для модалки
                candidatsFIOModal: 'Иванов Иван Иванович',
                structuralUnitModal: 'Департамент развития партнерских отношений',
                IINModal: '99999999999',
                candidatsPhoneNumber: '87777777777',
                candidatsResumeModal: '',
                vacansionModal: 'Менеджер по работе с кооперативными клиентами',
                numberOfUnitsModal: 2,
                interviewDateModal: '2020-01-01',
                interviewTimeModal: '15:00',
                interviewMainResultModalSelect: '',
                interviewMainResultModal: [
                    'Успешно прошел собеседование',
                    'Не прошел собеседование'
                ],
                candidatsDateInternshipModal: '02.01.2020',
                dateOfTheDOUContractModal: '12.01.2020',
                dateOfTheStateContractModal: '12.01.2020',
                commentModal: 'Текст',
                faq_questions:[

                ],
                testAxios: null,
                error: 'Произошла какая-то ошибка',
                none: false,
                other: null,
                testArray:[],
            }
        },
        mounted() {
            //this.getFaqData();
            this.getTables();
        },
        methods: {
            savedSuccess: function(){
                this.flashMessage.error({
                    title: "Ошибка",
                    message: 'Не удалось сохранить данные',
                    time: 5000
                });
            },
            testFunc: function(){
              console.log(this.newLanguageBlocks[0].languages.length);
            },
            getTables: function(){
                this.preloader(true);
                this.axios.post("/getCoordinationList", {isn: this.isn}).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            fetchResponse: function(response){
                if(response.success){
                    this.testAxios = response.result.SP;
                }else{
                    alert(response.error);
                }
                if(this.SP === null){
                    this.none = true;
                }
                this.preloader(false);
            },
            getFaqData() {
                this.axios.post('/recruiting', {}).then(response => {
                    if(response.data.success) {
                        this.faq_questions = response.data.result;
                    } else {
                        alert('Произошла ошибка');
                    }
                })
            },
            getTestData() {
                let data = {
                    'recruitingTabs' : this.recruitingTabs,
                    'cityAdressSelect' : this.cityAdressSelect,
                    'cityAdress' : this.cityAdress,
                    'nameOfPostSelect' : this.nameOfPostSelect,
                    'nameOfPost' : this.nameOfPost,
                    'quantityPeople' : this.quantityPeople,
                    'ReasonToRecruitingSelect' : this.ReasonToRecruitingSelect,
                    'ReasonToRecruiting' : this.ReasonToRecruiting,
                    'desiredAge' : this.desiredAge,
                    'sexSelect' : this.sexSelect,
                    'sex' : this.sex,
                    'educationSelect' : this.educationSelect,
                    'education' : this.education,
                    'functionalResponsobilities' : this.functionalResponsobilities,
                    'workExpirienceSelect' : this.workExpirienceSelect,
                    'workExpirience' : this.workExpirience,
                    'isHeWasBoss' : this.isHeWasBoss,
                    'typeOfHire' : this.typeOfHire,
                    'requestToCandidat' : this.requestToCandidat,
                    'perspectiveToCandidat' : this.perspectiveToCandidat,
                    'computerKnowingSelect': this.computerKnowingSelect,
                    'computerKnowing' : this.computerKnowing,
                    'languageAndLvl' : this.languageAndLvl,
                    'salary' : this.salary,
                    'motivationSelect' : this.motivationSelect,
                    'motivation' : this.motivation,
                    'jobChartSelect' : this.jobChartSelect,
                    'jobChart' : this.jobChart,
                    'haveCarSelect' : this.haveCarSelect,
                    'haveCar' : this.haveCar,
                    'driverCategorySelect' : this.driverCategorySelect,
                    'driverCategory' : this.driverCategory,
                    'socialPacket' : this.socialPacket,
                    'candidatsTrait' : this.candidatsTrait,
                    'interviewStage' : this.interviewStage,
                    'addLanguageBlockItem' : this.addLanguageBlockItem,
                    'languages' : this.languages,
                    'languageLevel' : this.languageLevel,
                    'newLanguageBlocks' : this.newLanguageBlocks,
                    'newSocialpacketBlocks' : this.newSocialpacketBlocks,
                    'packets' : this.packets,
                    'socialPacketLvl' : this.socialPacketLvl,
                    'languagesCounter' : this.languagesCounter,
                    'socialPacketCounter' : this.socialPacketCounter,
                    'candidatsFIOModal' : this.candidatsFIOModal,
                    'structuralUnitModal' : this.structuralUnitModal,
                    'IINModal' : this.IINModal,
                    'candidatsPhoneNumber' : this.candidatsPhoneNumber,
                    'candidatsResumeModal' : this.candidatsResumeModal,
                    'vacansionModal' : this.vacansionModal,
                    'numberOfUnitsModal' : this.numberOfUnitsModal,
                    'interviewDateModal' : this.interviewDateModal,
                    'interviewTimeModal' : this.interviewTimeModal,
                    'interviewMainResultModalSelect' : this.interviewMainResultModalSelect,
                    'interviewMainResultModal' : this.interviewMainResultModal,
                    'candidatsDateInternshipModal' : this.candidatsDateInternshipModal,
                    'dateOfTheDOUContractModal' : this.dateOfTheDOUContractModal,
                    'dateOfTheStateContractModal' : this.dateOfTheStateContractModal,
                    'commentModal' : this.commentModal,
                }
                this.axios.post('/recruiting', {}).then(response => {
                    if (response.data.success){
                        this.testArray = response.data.result;
                    } else {
                        alert('error');
                    }
                })
            },
            openModal (ISN) {
                this.preloader(true);
                this.axios.post("/getCoordinationInfo", {docIsn: ISN}).then((response) => {
                    this.setModalData(response.data)
                });
            },
            preloader(show){
                if(show)
                {
                    document.getElementById('preloader').style.display = 'flex';
                }
                else
                {
                    document.getElementById('preloader').style.display = 'none';
                }
            },
            addLanguage() {
                // if (this.newLanguageBlocks[0].language == null){
                //     console.log('Пусто');
                // }

                if (this.newLanguageBlocks[0].language !== null){
                    if (this.languagesCounter == 1){
                        this.languagesCounter++;
                        if(this.newLanguageBlocks.length < this.languages.length) {
                            const lastBlock = this.newLanguageBlocks[this.newLanguageBlocks.length - 1];
                            this.newLanguageBlocks.push({
                                language : null,
                                level : null,
                                languages: lastBlock.languages.filter(lang => lang !== lastBlock.language)
                            });
                        }
                    }
                    else if (this.languagesCounter == 2){
                        if (this.newLanguageBlocks[1].language !== null){
                            console.log(this.newLanguageBlocks[0].language);
                            this.languagesCounter++;
                            if(this.newLanguageBlocks.length < this.languages.length) {
                                const lastBlock = this.newLanguageBlocks[this.newLanguageBlocks.length - 1];
                                this.newLanguageBlocks.push({
                                    language : null,
                                    level : null,
                                    languages: lastBlock.languages.filter((lang) => lang !== lastBlock.language)
                                });
                            }
                        }
                    }
                }

            },
            deleteLanguage() {
                if (this.newLanguageBlocks.length > 1) {
                    this.newLanguageBlocks.pop();
                    this.languagesCounter--;
                }
            },
            addSocialPacket() {
                // if (this.newSocialpacketBlocks[0].packet == null){
                //     console.log('Пусто');
                // }
                if (this.newSocialpacketBlocks[0].packet !== null){
                    if (this.socialPacketCounter == 1){
                        this.socialPacketCounter++;
                        if(this.newSocialpacketBlocks.length < this.packets.length) {
                            const lastPacketBlock = this.newSocialpacketBlocks[this.newSocialpacketBlocks.length - 1];
                            this.newSocialpacketBlocks.push({
                                packet : null,
                                level : null,
                                packets: lastPacketBlock.packets.filter(lang => lang !== lastPacketBlock.packet)
                            });
                        }
                    }
                    else if (this.socialPacketCounter == 2){
                        if (this.newSocialpacketBlocks[1].packet !== null){
                            console.log(this.newSocialpacketBlocks.packet);
                            this.socialPacketCounter++;

                            if(this.newSocialpacketBlocks.length < this.packets.length) {
                                const lastPacketBlock = this.newSocialpacketBlocks[this.newSocialpacketBlocks.length - 1];
                                this.newSocialpacketBlocks.push({
                                    packet : null,
                                    level : null,
                                    packets: lastPacketBlock.packets.filter(lang => lang !== lastPacketBlock.packet)
                                });
                            }
                        }
                    }
                }
            },
            deleteSocialPacket() {
                if (this.newSocialpacketBlocks.length > 1) {
                    this.newSocialpacketBlocks.pop();
                    this.socialPacketCounter--;
                }
            },
        },

        // methods: {
        //     // addLanguage(){
        //     //     if(this.languages.length < 3) {
        //     //         let key1 = this.languages.length-1;
        //     //         this.languages.push({
        //     //             language : null,
        //     //             level : null,
        //     //             language_sel: null
        //     //         });
        //
        //             // if (this.languages[0].language) {
        //             //     let targetIndex = this.languageAndLvl[0].language[1].indexOf(this.languages[0].language);
        //             //     console.log(targetIndex);
        //             //     this.languageAndLvl[0].language[1].splice(targetIndex, 1);
        //             // }
        //
        //             // this.languageAndLvl[0].filter(function(){
        //             //     asdhasj = asghfjhsdaiu
        //             // });
        //
        //             //alert(key1);
        //
        //
        //
        //             // for(let key in this.languageAndLvl[0].language){
        //             //     if(this.languageAndLvl[0].language[key] == this.languages[key1].language){
        //             //         this.languages[key1].language_sel = this.languageAndLvl[0].language[key];
        //             //         //this.languages[key].splice(key, 1);
        //             //         this.languageAndLvl[0].language.splice(key, 1);
        //             //     }
        //             // }
        //         // }
        //     // },
        //     // removeAddLanguage() {
        //     //     let key1 = this.languages.length-1;
        //     //     if(this.languages.length > 1) {
        //     //         this.languageAndLvl[0].language.push(this.languages[key1].language);
        //     //         this.languages.pop();
        //     //     }
        //     // },
        //     addLanguage() {
        //         if(this.newLanguageBlocks.length < this.languages.length) {
        //             const lastBlock = this.newLanguageBlocks[this.newLanguageBlocks.length - 1];
        //             this.newLanguageBlocks.push({
        //                 language : null,
        //                 level : null,
        //                 languages: lastBlock.languages.filter(lang => lang !== lastBlock.language)
        //             });
        //         }
        //     },
        //     deleteLanguage() {
        //         if (this.newLanguageBlocks.length > 1) {
        //             this.newLanguageBlocks.pop();
        //         }
        //     },
        //
        // },
    }
</script>

<style scoped>

</style>
