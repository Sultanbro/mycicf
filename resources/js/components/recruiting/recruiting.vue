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
                            <select class="recruiting-select" v-model="candidat.cityAdressSelect">
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
                                <select class="recruiting-select" v-model="candidat.nameOfPostSelect">
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
                                <input type="number" onclick="this.select()" v-model="candidat.quantityPeople" class="recruiting-select">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-select-header">
                            Причина возникновения вакансии
                        </div>
                        <div>
                            <select class="recruiting-select" v-model="candidat.ReasonToRecruitingSelect">
                                <option class="none"></option>
                                <option v-for="inner in ReasonToRecruiting" selected>{{inner}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="recruiting-tripple-block-container">
                        <div class="recruiting-tripple-block col-md-4">
                            <div class="flex-basic-recruiting">
                                Желаемый возраст
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="candidat.desiredAgeSelect">
                                    <option v-for="inner in desiredAge">{{inner}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="recruiting-tripple-block col-md-4">
                            <div class="flex-basic-recruiting">
                                Пол
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="candidat.sexSelect">
                                    <option v-for="inner in sex">{{inner}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="recruiting-tripple-block col-md-4">
                            <div class="flex-basic-recruiting">
                                Образование
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="candidat.educationSelect">
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
                            <textarea class="recruiting-textarea" v-model="candidat.functionalResponsobilities">
                            </textarea>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-tripple-block-container">
                            <div class="recruiting-tripple-block col-md-4">
                                <div class="flex-basic-recruiting">
                                    Опыт работы
                                </div>
                                <div>
                                    <select class="recruiting-select" v-model="candidat.workExpirienceSelect">
                                        <option v-for="inner in workExpirience">{{inner}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="recruiting-tripple-block col-md-4">
                                <div class="flex-basic-recruiting">
                                    Наличие подчиненных
                                </div>
                                <div>
                                    <select v-model="candidat.isHeWasBossSelect" class="recruiting-select">
                                        <option v-for="inner in isHeWasBoss">{{inner}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="recruiting-tripple-block col-md-4">
                                <div class="flex-basic-recruiting">
                                    Форма найма
                                </div>
                                <div>
                                    <select v-model="candidat.typeOfHireSelect" class="recruiting-select">
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
                            <textarea class="recruiting-textarea" v-model="candidat.requestToCandidat">
                            </textarea>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-select-header">
                            Возможности и перспективы для кандидата
                        </div>
                        <div>
                            <select v-model="candidat.perspectiveToCandidatSelect" class="recruiting-select">
                                <option v-for="inner in perspectiveToCandidat">{{inner}}</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-select-header">
                            Уровень владения компьютерными программами
                        </div>
                        <div>
                            <select class="recruiting-select" v-model="candidat.computerKnowingSelect">
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


                    <!--Оплата труда-->
                    <div>Оплата труда</div>
                    <div class="recruiting-tripple-block-container">
                        <div class="recruiting-tripple-block-center col-md-7">На испытательный срок и после испытательного срока:</div>
                        <div class="recruiting-tripple-block col-md-5">
                            <input type="number" onclick="this.select()" v-model="candidat.salary" class="recruiting-select">
                        </div>
                    </div>
                    <div class="d-flex jc-sb mt-2">
                        <div class="recruiting-double-block col-md-5">
                            <div>
                                Наличие дополнительной мотивации (бонусов)
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="candidat.motivationSelect">
                                    <option v-for="inner in motivation">{{inner}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="recruiting-double-block col-md-5">
                            <div>
                                График работы
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="candidat.jobChartSelect">
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
                                <select class="recruiting-select" v-model="candidat.haveCarSelect">
                                    <option v-for="inner in haveCar">{{inner}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="recruiting-double-block col-md-5">
                            <div>
                                Категория вод. удостоверения
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="candidat.driverCategorySelect">
                                    <option v-for="inner in driverCategory">{{inner}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
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
                            <textarea v-model="candidat.candidatsTrait" class="recruiting-textarea">Ориентированный на результат, обучаемый, коммуникабельный, ответственный и системный в работе, активный и позитивный (оптимист)
                            </textarea>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-select-header">
                            Этапы интервью с кандидатом в департаменте
                        </div>
                        <div>
                            <textarea v-model="candidat.interviewStage" class="recruiting-textarea">
                            </textarea>
                        </div>
                    </div>
                    <div class="recruiting-btn-container">
                        <div class="recruiting-btn" @click="savedSuccess" v-bind:class="{disabledBtnRecruiting : candidat.cityAdressSelect == '' || candidat.nameOfPostSelect == '' || candidat.quantityPeopleSelect == '' || candidat.ReasonToRecruitingSelect == '' || candidat.desiredAgeSelect == '' || candidat.sexSelect == '' || candidat.educationSelect == '' || candidat.functionalResponsobilities == '' || candidat.workExpirienceSelect == '' || candidat.isHeWasBossSelect == '' || typeOfHire == '' || candidat.requestToCandidat == '' || candidat.perspectiveToCandidatSelect == '' || candidat.computerKnowingSelect == '' || candidat.salary == '' || candidat.motivationSelect == '' || candidat.jobChartSelect == '' || candidat.haveCarSelect == '' || candidat.driverCategorySelect == '' || candidat.candidatsTrait == '' || candidat.interviewStage == '' || newLanguageBlocks[0].language == null || newSocialpacketBlocks[0].packet == null}">
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
                <div class="modal fade show z-9999" id="interviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog recruiting-modal-size" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-header-general">
                                    <div class="color-blue">ФИО кандидата</div>
                                    <strong>{{candidatsFIOModal}}</strong>
                                </div>
                            </div>
                            <div class="modal-margin-general recruiting-modal-borderbot">
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Структурное подразделение:</div>
                                    <div class="col-md-6">{{structuralUnitModal}}</div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">ИИН:</div>
                                    <div class="col-md-6">
                                        <input type="number" onclick="this.select()" class="recruiting-modal-general" v-model="IINModal">
                                    </div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Контактный номер кандидата:</div>
                                    <div class="col-md-6">
                                        <input type="number" onclick="this.select()" class="recruiting-modal-general" v-model="candidatsPhoneNumber">
                                    </div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Резюме кандидата (файл загрузить в Word-e):</div>
                                    <div class="col-md-6">
                                        <div>
                                            <label class="recruiting-upload-general" for="file-upload">
                                                <i class="fas fa-file-upload color-black file-icons recruiting-upload-icon"></i>
                                                Файл
                                            </label>
                                            <input type="file" class="recruiting-upload-general typeFile" id="file-upload" value="Файл 1" @change="fileUpload">
                                        </div>
                                        <div>
                                            <div v-for="(document, index) in documents"
                                                 class="d-flex justify-content-between bg-white pl-3 pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div v-if="document.type === 'application/msword' || document.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'">
                                                        <i class="fas fa-file-word text-primary fs-1_2"></i>
                                                    </div>
                                                    <div v-if="document.type === 'application/pdf'">
                                                        <i class="fas fa-file-pdf text-danger fs-1_2"></i>
                                                    </div>
                                                    <div v-if="document.type === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || document.type === 'application/vnd.ms-excel'">
                                                        <i class="fas fa-file-excel text-success fs-1_2"></i>
                                                    </div>
                                                    <div v-if="document.type === 'application/vnd.ms-powerpoint' || document.type === 'application/vnd.openxmlformats-officedocument.presentationml.presentation'">
                                                        <i class="fas fa-file-powerpoint text-warning fs-1_2"></i>
                                                    </div>
                                                    <div v-if="document.type === 'application/vnd.rar' || document.type === 'application/zip'">
                                                        <i class="fas fa-file-archive text-info fs-1_2"></i>
                                                    </div>
                                                    <div class="p-2">{{document.name}}</div>
                                                </div>
                                                <button class="border-0 bg-transparent button-delete" @click="deleteFile(index)">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-header modal-margin-general pl-0 pr-0 flex-column">
                                <div class="recruiting-modal-borderbot">
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
                                            <input type="date" onclick="this.select()" v-model="interviewDateModal" class="recruiting-modal-general">
                                        </div>
                                    </div>
                                    <div class="modal-cell-general">
                                        <div class="col-md-6 color-blue">Время собеседования:</div>
                                        <div class="col-md-6">
                                            <input type="time" onclick="this.select()" value="09:00" min="09:00" max="18:00" v-model="interviewTimeModal" class="recruiting-modal-general">
                                        </div>
                                    </div>
                                    <div class="modal-cell-general">
                                        <div class="col-md-6 color-blue">Результат итогового интервью кандидата с руководителем(ответ в течение дня):</div>
                                        <div class="col-md-6">
                                            <select v-model="interviewMainResultModalSelect" :class="modalSelectCheckSelect()" @change="interviewResultCheck" class="recruiting-modal-general recruiting-modal-general">
                                                <option :class="modalSelectCheck(inner)" v-for="inner in interviewMainResultModal">{{inner.label}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="resultCheckCounter == 'success'">
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
                                <div class="recruiting-savebtn-container">
                                    <div class="recruiting-btn" @click="sendCandidatsApplication">
                                        Сохранить
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input class="form-control" type="text" placeholder="Поиск" id="interwiewWithCandidatesSearch" @keyup="tableSearch()">
                <table class="table recruiting-striped" id="interwiewWithCandidatesTable">
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
                        <tr v-for="inner in recruitingInterviewCluster">
                            <td scope="row">{{inner.id}}</td>
                            <td>{{inner.name}}</td>
                            <td>{{inner.structureUnit}}</td>
                            <td>{{inner.dateOfInterview}}</td>
                            <td :class="modalSelectCheck(inner)">{{inner.label}}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table recruiting-striped" id="interwiewWithCandidatesTableUnits">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">ФИО Руководителя</th>
                        <th scope="col">Структурное подразделение</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="pointer" data-toggle="modal" data-target="#interviewModalApplicationData" v-for="inner in recruitingInterviewCluster">
                            <td scope="row">{{inner.id}}</td>
                            <td >{{inner.name}}</td>
                            <td>{{inner.structureUnit}}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="modal fade show" id="interviewModalApplicationData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog recruiting-modal-size" role="document">
                        <div class="modal-content">
                            <div class="recruiting-body">
                                <div>
                                    <div class="recruiting-backward-title">
                                        Заявка на поиск кандидата
                                    </div>
                                    <div class="recruiting-select-header">
                                        Наимененование структурного подразделения (укажите город и адрес филиала)
                                    </div>
                                    <div>
                                        <select class="recruiting-select" v-model="candidatBackward.cityAdressSelect" disabled>
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
                                            <select class="recruiting-select" v-model="candidatBackward.nameOfPostSelect" disabled>
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
                                            <input type="number" onclick="this.select()" v-model="candidatBackward.quantityPeople" class="recruiting-select" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="recruiting-select-header">
                                        Причина возникновения вакансии
                                    </div>
                                    <div>
                                        <select class="recruiting-select" v-model="candidatBackward.ReasonToRecruitingSelect" disabled>
                                            <option class="none"></option>
                                            <option v-for="inner in ReasonToRecruiting" selected>{{inner}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="recruiting-tripple-block-container">
                                    <div class="recruiting-tripple-block col-md-4">
                                        <div class="flex-basic-recruiting">
                                            Желаемый возраст
                                        </div>
                                        <div>
                                            <select class="recruiting-select" v-model="candidatBackward.desiredAgeSelect" disabled>
                                                <option v-for="inner in desiredAge">{{inner}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="recruiting-tripple-block col-md-4">
                                        <div class="flex-basic-recruiting">
                                            Пол
                                        </div>
                                        <div>
                                            <select class="recruiting-select" v-model="candidatBackward.sexSelect" disabled>
                                                <option v-for="inner in sex">{{inner}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="recruiting-tripple-block col-md-4">
                                        <div class="flex-basic-recruiting">
                                            Образование
                                        </div>
                                        <div>
                                            <select class="recruiting-select" v-model="candidatBackward.educationSelect" disabled>
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
                            <textarea class="recruiting-textarea" v-model="candidatBackward.functionalResponsobilities" disabled>
                            </textarea>
                                    </div>
                                </div>
                                <div>
                                    <div class="recruiting-tripple-block-container">
                                        <div class="recruiting-tripple-block col-md-4">
                                            <div class="flex-basic-recruiting">
                                                Опыт работы
                                            </div>
                                            <div>
                                                <select class="recruiting-select" v-model="candidatBackward.workExpirienceSelect" disabled>
                                                    <option v-for="inner in workExpirience">{{inner}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="recruiting-tripple-block col-md-4">
                                            <div class="flex-basic-recruiting">
                                                Наличие подчиненных
                                            </div>
                                            <div>
                                                <select v-model="candidatBackward.isHeWasBossSelect" class="recruiting-select" disabled>
                                                    <option v-for="inner in isHeWasBoss">{{inner}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="recruiting-tripple-block col-md-4">
                                            <div class="flex-basic-recruiting">
                                                Форма найма
                                            </div>
                                            <div>
                                                <select v-model="candidatBackward.typeOfHireSelect" class="recruiting-select" disabled>
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
                            <textarea class="recruiting-textarea" v-model="candidatBackward.requestToCandidat" disabled>
                            </textarea>
                                    </div>
                                </div>
                                <div>
                                    <div class="recruiting-select-header">
                                        Возможности и перспективы для кандидата
                                    </div>
                                    <div>
                                        <select v-model="candidatBackward.perspectiveToCandidatSelect" class="recruiting-select" disabled>
                                            <option v-for="inner in perspectiveToCandidat">{{inner}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div class="recruiting-select-header">
                                        Уровень владения компьютерными программами
                                    </div>
                                    <div>
                                        <select class="recruiting-select" v-model="candidatBackward.computerKnowingSelect" disabled>
                                            <option v-for="inner in computerKnowing">{{inner}}</option>
                                        </select>
                                    </div>
                                </div>

                                <!--Язык и уровень владения-->
                                <div>
                                    <div class="recruiting-tripple-block-container" v-for="newLanguageBlockBackward in newLanguageBlocks">
                                        <div class="recruiting-tripple-block-center col-md-4">Язык и уровень владения:</div>
                                        <div class="recruiting-tripple-block col-md-4">
                                            <select class="recruiting-select" v-model="newLanguageBlockBackward.language" disabled>
                                                <option v-for="(language, key) in newLanguageBlockBackward.languages" :value="language" :key="key">
                                                    {{language}}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="recruiting-tripple-block col-md-4">
                                            <select class="recruiting-select" v-model="newLanguageBlockBackward.level" disabled>
                                                <option v-for="(level, key) in languageLevel" :value="level" :key="key">
                                                    {{level}}
                                                </option>
                                            </select>
                                        </div>
                                        <hr>
                                    </div>
                                </div>


                                <!--Оплата труда-->
                                <div>Оплата труда</div>
                                <div class="recruiting-tripple-block-container">
                                    <div class="recruiting-tripple-block-center col-md-7">На испытательный срок и после испытательного срока:</div>
                                    <div class="recruiting-tripple-block col-md-5">
                                        <input type="number" onclick="this.select()" v-model="candidatBackward.salary" class="recruiting-select" disabled>
                                    </div>
                                </div>
                                <div class="d-flex jc-sb mt-2">
                                    <div class="recruiting-double-block col-md-5">
                                        <div>
                                            Наличие дополнительной мотивации (бонусов)
                                        </div>
                                        <div>
                                            <select class="recruiting-select" v-model="candidatBackward.motivationSelect" disabled>
                                                <option v-for="inner in motivation">{{inner}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="recruiting-double-block col-md-5">
                                        <div>
                                            График работы
                                        </div>
                                        <div>
                                            <select class="recruiting-select" v-model="candidatBackward.jobChartSelect" disabled>
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
                                            <select class="recruiting-select" v-model="candidatBackward.haveCarSelect" disabled>
                                                <option v-for="inner in haveCar">{{inner}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="recruiting-double-block col-md-5">
                                        <div>
                                            Категория вод. удостоверения
                                        </div>
                                        <div>
                                            <select class="recruiting-select" v-model="candidatBackward.driverCategorySelect" disabled>
                                                <option v-for="inner in driverCategory">{{inner}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="recruiting-tripple-block-container" v-for="newSocialpacketBlockBackward in newSocialpacketBlocksBackward">
                                        <div class="recruiting-tripple-block-center col-md-4">Социальный пакет</div>
                                        <div class="recruiting-tripple-block col-md-4">
                                            <select class="recruiting-select" v-model="newSocialpacketBlockBackward.packet" disabled>
                                                <option v-for="(packet, key) in newSocialpacketBlockBackward.packets" :value="packet" :key="key">
                                                    {{packet}}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="recruiting-tripple-block col-md-4">
                                            <select class="recruiting-select" v-model="newSocialpacketBlockBackward.level" disabled>
                                                <option v-for="(level, key) in socialPacketLvl" :value="level" :key="key">
                                                    {{level}}
                                                </option>
                                            </select>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <div>
                                    <div class="recruiting-select-header">
                                        Личностные компетенции кандидата
                                    </div>
                                    <div>
                            <textarea v-model="candidatBackward.candidatsTrait" class="recruiting-textarea" disabled>Ориентированный на результат, обучаемый, коммуникабельный, ответственный и системный в работе, активный и позитивный (оптимист)
                            </textarea>
                                    </div>
                                </div>
                                <div>
                                    <div class="recruiting-select-header">
                                        Этапы интервью с кандидатом в департаменте
                                    </div>
                                    <div>
                            <textarea v-model="candidatBackward.interviewStage" class="recruiting-textarea" disabled>
                            </textarea>
                                    </div>
                                </div>
                                <button type="button" class="recruiting-add-btn" data-toggle="modal" data-target="#interviewModal">
                                    <span>Добавить кандидата</span>
                                    <span><i class="fas fa-plus-circle"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
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
                cityAdress: [
                    'Алматы',
                    'Астана',
                    'Талдыкорган'
                ],
                desiredAge: [
                    '19-25',
                    '26-35',
                    '36-45',
                    '46-60'
                ],
                nameOfPost: [
                    'Web-программист',
                    'Ведущий Web-программист'
                ],
                ReasonToRecruiting: [
                    'Нехватка сотрудников',
                    'Открыто вакантное место'
                ],
                // Не в кандидате
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
                sex: [
                    'Мужской',
                    'Женский'
                ],
                education: [
                    'Высшее',
                    'Средне-специальное',
                    'Среднее'
                ],
                workExpirience: [
                    'От 1 года',
                    'От 5 лет',
                ],
                isHeWasBoss: [
                    'Нет',
                    'Да',
                ],
                typeOfHire: [
                    'На испытательный срок',
                    'По договору'
                ],
                perspectiveToCandidat: [
                    'Карьерный рост и внутреннее корпоративное обучение',
                ],
                computerKnowing: [
                    'Уверенное владение ПК',
                ],
                motivation: [
                    'Есть',
                    'Нет'
                ],
                jobChart: [
                    '09:00-18:00, 5/2 рабочая неделя'
                ],
                haveCar: [
                    'Да',
                    'Нет'
                ],
                driverCategory: [
                    'B, C'
                ],
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
                candidat: {
                    cityAdressSelect: '',
                    nameOfPostSelect: '',
                    quantityPeople: 1,
                    ReasonToRecruitingSelect: '',
                    desiredAgeSelect: '',
                    sexSelect: '',
                    educationSelect: '',
                    functionalResponsobilities: '',
                    workExpirienceSelect: '',
                    isHeWasBossSelect: '',
                    typeOfHireSelect: '',
                    requestToCandidat: '',
                    perspectiveToCandidatSelect: '',
                    computerKnowingSelect: '',
                    salary: '120000',
                    motivationSelect: '',
                    jobChartSelect: '',
                    haveCarSelect: '',
                    driverCategorySelect: '',
                    candidatsTrait: 'Ориентированный на результат, обучаемый, коммуникабельный, ответственный и системный в работе, активный и позитивный (оптимист)',
                    interviewStage: '',
                },
                recruitingTabs: 2,
                languagesCounter: 1,
                socialPacketCounter: 1,
                resultCheckCounter: 1,

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
                    {
                        value : 2,
                        label : 'Успешно прошел собеседование'
                    },
                    {
                        value: 1,
                        label: 'В ожидании собеседования'
                    },
                    {
                        value : 0,
                        label : 'Провалил собеседование'
                    }
                ],
                candidatsDateInternshipModal: '02.01.2020',
                dateOfTheDOUContractModal: '12.01.2020',
                dateOfTheStateContractModal: '12.01.2020',
                commentModal: 'Текст',
                recruitingInterviewCluster:[
                    {
                        id: 0,
                        name: 'Иванов Иван Иванович',
                        structureUnit: 'Департамент развития партнерских отношений',
                        dateOfInterview: '02.01.2020',
                        label: 'Провалил собеседование'
                    },
                    {
                        id: 1,
                        name: 'Иванов Иван Иванович',
                        structureUnit: 'Департамент развития партнерских отношений',
                        dateOfInterview: '02.01.2020',
                        label: 'В ожидании собеседования'
                    },
                    {
                        id: 2,
                        name: 'Иванов Иван Иванович',
                        structureUnit: 'Департамент развития партнерских отношений',
                        dateOfInterview: '02.01.2020',
                        label: 'Успешно прошел собеседование'
                    },
                ],
                faq_questions:[

                ],
                testAxios: null,
                error: 'Произошла какая-то ошибка',
                none: false,
                other: null,
                testArray:[],
                docMaxNumber: 5,
                documents: [],
                files: [],
                docExtensions: [
                    "application/msword",
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                    "application/pdf",
                    "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                    "application/vnd.ms-excel",
                    "application/vnd.ms-powerpoint",
                    "application/vnd.openxmlformats-officedocument.presentationml.presentation",
                    "application/vnd.rar",
                    "application/zip",
                ],
            //    Получение данных на 2 вкладке
                candidatBackward: {
                    cityAdressSelect: 'Алматы',
                    nameOfPostSelect: 'Web-программист',
                    quantityPeople: 1,
                    ReasonToRecruitingSelect: 'Нехватка сотрудников',
                    desiredAgeSelect: '19-25',
                    sexSelect: 'Мужской',
                    educationSelect: 'Высшее',
                    functionalResponsobilities: 'Работа с продуктами на kupipolis',
                    workExpirienceSelect: 'От 1 года',
                    isHeWasBossSelect: 'Да',
                    typeOfHireSelect: 'На испытательный срок',
                    requestToCandidat: 'Знание html, css, js, php',
                    perspectiveToCandidatSelect: 'Карьерный рост и внутреннее корпоративное обучение',
                    computerKnowingSelect: 'Уверенное владение пк',
                    salary: '120000',
                    motivationSelect: 'Нет',
                    jobChartSelect: '09:00-18:00, 5/2',
                    haveCarSelect: 'Да',
                    driverCategorySelect: 'B,C',
                    candidatsTrait: 'Ориентированный на результат, обучаемый, коммуникабельный, ответственный и системный в работе, активный и позитивный (оптимист)',
                    interviewStage: '',
                },
                languageAndLvlBackward:
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
                newSocialpacketBlocksBackward: [{
                    packet: null,
                    level: null,
                    packets: [
                        'Первый соц. пакет',
                        'Второй соц. пакет',
                        'Третий соц. пакет',
                    ],
                }],
            }
        },
        mounted() {
            //this.getFaqData();
        },
        computed: {
        },
        methods: {
            interviewResultCheck: function(){
                if (this.interviewMainResultModalSelect == 'Успешно прошел собеседование'){
                    this.resultCheckCounter = 'success';
                    this.numberOfUnitsModal = 0;
                }
                if (this.interviewMainResultModalSelect == 'В ожидании собеседования'){
                    this.resultCheckCounter = 'pending';
                    this.numberOfUnitsModal = 1;
                }
                else if (this.interviewMainResultModalSelect == 'Провалил собеседование'){
                    this.resultCheckCounter = 'failed';
                    this.numberOfUnitsModal = 2;
                }
            },
            fileUpload(e) {
                const documents = e.target.files;
                const vm = this;

                if(documents.length <= this.docMaxNumber) {
                    Array.from(documents).forEach(document => {
                        if(document.size > this.docMaxSize) {
                            alert("Документ превысил ограничение по размеру : " + document.name);
                        }
                        else if(!this.checkExtension(document.type, this.docExtensions)) {
                            alert("Вы загрузили неверный тип документа.\n" +
                                "Доступные типы документов: doc, docx, ppt, pptx, xls, xlsx, pdf, rar");
                        }
                        else {
                            vm.documents.push(document);
                        }
                    })
                }
                else {
                    alert(`Максимальное кол-во файлов: ${this.docMaxNumber}`)
                }
            },

            deleteFile(index) {
                const vm = this;
                vm.documents.splice(index, 1);
            },
            // Поиск в таблице
            tableSearch: function () {
                var phrase = document.getElementById('interwiewWithCandidatesSearch');
                var table = document.getElementById('interwiewWithCandidatesTable');
                var regPhrase = new RegExp(phrase.value, 'i');
                var flag = false;
                for (var i = 1; i < table.rows.length; i++) {
                    flag = false;
                    for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
                        flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
                        if (flag) break;
                    }
                    if (flag) {
                        table.rows[i].style.display = "";
                    } else {
                        table.rows[i].style.display = "none";
                    }
                }
            },
            // Придание цвета в зависимости от статуса
            modalSelectCheck: function (inner) {
                if (inner.label == 'Успешно прошел собеседование'){
                    return 'forestgreen';
                } else if(inner.label == 'Провалил собеседование') {
                    return 'colorRedImportant';
                } else if(inner.label == 'В ожидании собеседования') {
                    return 'colororange';
                }
            },
            modalSelectCheckSelect: function() {
                if (this.interviewMainResultModalSelect == 'Успешно прошел собеседование'){
                    return 'forestgreen';
                }
                else if (this.interviewMainResultModalSelect == 'Провалил собеседование'){
                    return 'colorRedImportant';
                }
                else if(this.interviewMainResultModalSelect == 'В ожидании собеседования') {
                    return 'colororange';
                }
            },
            // Ошибка сохранения
            sendCandidatsApplication(){
                savedSuccess();
            },
            savedSuccess: function(){
                this.axios.post('/recruiting/saveCandidat',{candidat: this.candidat, languages: this.newLanguageBlocks})
                .then(response => {
                    this.afterSavedSuccess(response);
                });
            },
            afterSavedSuccess(response){
                if (response.data.success){
                    this.flashMessage.success({
                        title: "",
                        message: 'Кандидат успешно сохранен',
                        time: 5000
                    });
                } else {
                    this.flashMessage.error({
                        title: "Ошибка",
                        message: 'Не удалось сохранить данные',
                        time: 5000
                    });
                }
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
            // Пример Axios
            // getFaqData() {
            //     this.axios.post('/recruiting', {}).then(response => {
            //         if(response.data.success) {
            //             this.faq_questions = response.data.result;
            //         } else {
            //             alert('Произошла ошибка');
            //         }
            //     })
            // },
            // Данные для отправки в бэк
            getRecruitingData() {
                this.axios.post('/recruiting', { candidat:this.candidat }).then(response => {
                    if (response.data.success){
                        this.testArray = response.data.result;
                    } else {
                        alert('error');
                    }
                })
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
            checkExtension(type, array) {
                if(array.includes(type)) return true
                else return false;
            },
            // Проверка на добавление языка в заявке на поиск
            addLanguage() {

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
            // Проверка на добавление социального пакета в заявке на поиск
            addSocialPacket() {
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
            send() {
                this.axios.post('/recruiting/save', this.candidat)
                .then(response => {this.afterSend(response.data)})
                .catch(error =>
                    console.log(error));
            },
            afterSend(response){

            }
        },
    }
</script>

<style scoped>

</style>
