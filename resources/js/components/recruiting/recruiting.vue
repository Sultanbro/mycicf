<template>
    <div>
        <div class="bg-gray pt-5">
<!--            v-if="showToTopBtn"-->
            <a
               href="javascript:"
               class="to-top-btn"
               @click="goToTop()"><i class="fas fa-chevron-up fa-3x"></i></a>
            <div class="tripplebar">
                <div class="tripplebar-btn col-md-3"
                     @click="firstTabClick"
                     v-on:click="recruitingTabs = 1"
                     v-bind:class="{tripplebar_btn_active: recruitingTabs == 1}">
                    <div>
                        <i class="fas fa-search"></i>
                    </div>
                    <div>
                        Заявка на поиск кандидата (ГО и Регионы)
                    </div>
                </div>
                <div class="tripplebar-btn col-md-3"
                     @click="secondTabClick"
                     v-on:click="recruitingTabs = 2"
                     v-bind:class="{tripplebar_btn_active: recruitingTabs == 2}">
                    <div>
                        <i class="far fa-comments"></i>
                    </div>
                    <div>
                        Интервью руководителей с кандидатами
                    </div>
                </div>
                <div class="tripplebar-btn col-md-3"
                     @click="thirdTabClick"
                     v-on:click="recruitingTabs = 3"
                     v-bind:class="{tripplebar_btn_active: recruitingTabs == 3}">
                    <div>
                        <i class="far fa-address-book"></i>
                    </div>
                    <div>
                        Результат проделанной работы
                    </div>
                </div>
            </div>
            <div v-if="recruitingTabs == 1" class="recruiting-container">
<!--                <input type="search"-->
<!--                       class="colleagues-section__search-input pl-2"-->
<!--                       placeholder="Поиск"-->
<!--                       v-model="searchText">-->
<!--                <treeselect class='w-50' :multiple="false" :options="options" v-model="candidat.cityAdressSelect" />-->
<!--                <button @click="searchUser()"-->
<!--                        class="colleagues-section__btn border-0 bg-color-blue color-white pl-3 pr-3 pt-1 pb-1"><i class="fas fa-search"></i></button>-->
                <div class="recruiting-header">
                    <div class="recruiting-header-tab">
                        <div class="recruiting-header-tab-inner rec-active">
                            Головной офис
                        </div>
                    </div>
                </div>
<!--                <div class="p-4">-->
<!--                    <div class="colleagues-section__body">-->
<!--                        <colleagues-info-->
<!--                            v-for="(user, index) in usersList"-->
<!--                            :key="index"-->
<!--                            :info="user"-->
<!--                        ></colleagues-info>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="recruiting-body">
                    <div>
<!--                        <button @click="mailTest">Click to send mail!</button>-->
                        <div class="recruiting-select-header">
                            Наименование структурного подразделения (укажите город и адрес филиала)
                        </div>
                        <div>
                            <treeselect class='w-100 treeSelectRecruiting' placeholder="qwe" :multiple="false" :options="options" v-model="candidat.cityAdressSelect" />
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
                                    <option v-for="name in dicti.nameOfPost" :value="name.Value[0]">{{name.Label[0]}}</option>
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
                                <option v-for="reason in dicti.reason" :value="reason.Value[0]">{{reason.Label[0]}}</option>
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
                                    <option v-for="age in dicti.desiredAge" :value="age.Value[0]">{{age.Label[0]}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="recruiting-tripple-block col-md-4">
                            <div class="flex-basic-recruiting">
                                Пол
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="candidat.sexSelect">
<!--                                    <option v-for="sex in dicti.sex" :value="sex.Value[0]">{{sex.Label[0]}}</option>-->
                                    <option v-for="sex in sex">{{sex}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="recruiting-tripple-block col-md-4">
                            <div class="flex-basic-recruiting">
                                Образование
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="candidat.educationSelect">
                                    <option v-for="education in dicti.education" :value="education.Value[0]">{{education.Label[0]}}</option>
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
                                        <option v-for="work in dicti.workExpirience" :value="work.Value[0]">{{work.Label[0]}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="recruiting-tripple-block col-md-4">
                                <div class="flex-basic-recruiting">
                                    Наличие подчиненных
                                </div>
                                <div>
                                    <select v-model="candidat.isHeWasBossSelect" class="recruiting-select">
                                        <option v-for="worker in dicti.isHeWasBoss" :value="worker.Value[0]">{{worker.Label[0]}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="recruiting-tripple-block col-md-4">
                                <div class="flex-basic-recruiting">
                                    Форма найма
                                </div>
                                <div>
                                    <select v-model="candidat.typeOfHireSelect" class="recruiting-select">
                                        <option v-for="type in dicti.typeOfHire" :value="type.Value[0]">{{type.Label[0]}}</option>
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
                                <option v-for="perspective in dicti.connect" :value="perspective.Value[0]">{{perspective.Label[0]}}</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-select-header">
                            Уровень владения компьютерными программами
                        </div>
                        <div>
                            <select class="recruiting-select" v-model="candidat.computerKnowingSelect">
                                <option v-for="knowing in dicti.computerKnowing" :value="knowing.Value[0]">{{knowing.Label[0]}}</option>
                            </select>
                        </div>
                    </div>

                    <!--Язык и уровень владения-->
                    <div>
                        <div class="recruiting-tripple-block-container" v-for="newLanguageBlock in newLanguageBlocks">
                            <div class="recruiting-tripple-block-center col-md-4">Язык и уровень владения:</div>
                            <div class="recruiting-tripple-block col-md-4">
                                <select class="recruiting-select" v-model="newLanguageBlock.language">
                                    <option v-for="language in dicti.language" :value="language.Value[0]">
                                        {{language.Label[0]}}
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
<!--                        <button @click="testpush">Push to array</button>-->

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
                                    <option v-for="motivation in dicti.motivation" :value="motivation.Value[0]">{{motivation.Label[0]}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="recruiting-double-block col-md-5">
                            <div>
                                График работы
                            </div>
                            <div>
                                <select class="recruiting-select" v-model="candidat.jobChartSelect">
                                    <option v-for="time in dicti.jobTime" :value="time.Value[0]">{{time.Label[0]}}</option>
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
                                <select class="recruiting-select" @change="havecarChecking()" v-model="candidat.haveCarSelect">
                                    <option @change="havecarChecking()" v-for="havecar in dicti.haveCar" :value="havecar.Value[0]">{{havecar.Label[0]}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="recruiting-double-block col-md-5">
                            <div>
                                Категория вод. удостоверения
                            </div>
                            <div>
                                <select v-if="isDriverCard" class="recruiting-select" v-model="candidat.driverCategorySelect">
                                    <option v-for="card in dicti.driverCard" :value="card.Value[0]">{{card.Label[0]}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="recruiting-tripple-block-container" v-for="newSocialpacketBlock in newSocialpacketBlocks">
                            <div class="recruiting-tripple-block-center col-md-4">Социальный пакет</div>
                            <div class="recruiting-tripple-block col-md-4">
                                <select class="recruiting-select" v-model="newSocialpacketBlock.packet">
                                    <option v-for="packet in dicti.socPacket" :value="packet.Value[0]">
                                        {{packet.Label[0]}}
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
                        <div class="recruiting-btn" @click="savedSuccess" v-bind:class="{
                            disabledBtnRecruiting : candidat.cityAdressSelect == '' ||
                                                    candidat.nameOfPostSelect == '' ||
                                                    candidat.quantityPeople == '' ||
                                                    candidat.ReasonToRecruitingSelect == '' ||
                                                    candidat.desiredAgeSelect == '' ||
                                                    candidat.sexSelect == '' ||
                                                    candidat.educationSelect == '' ||
                                                    candidat.functionalResponsobilities == '' ||
                                                    candidat.workExpirienceSelect == '' ||
                                                    candidat.isHeWasBossSelect == '' ||
                                                    candidat.typeOfHireSelect == '' ||
                                                    candidat.requestToCandidat == '' ||
                                                    candidat.perspectiveToCandidatSelect == '' ||
                                                    candidat.computerKnowingSelect == '' ||
                                                    candidat.salary == '' ||
                                                    candidat.motivationSelect == '' ||
                                                    candidat.jobChartSelect == '' ||
                                                    candidat.haveCarSelect == '' ||
                                                    candidat.driverCategorySelect == '' ||
                                                    candidat.candidatsTrait == '' ||
                                                    candidat.interviewStage == '' ||
                                                    newLanguageBlocks[0].language == null ||
                                                    newSocialpacketBlocks[0].packet == null}">
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

                <div>
<!--                    <table>-->
<!--                        <thead>-->
<!--                            <tr>-->
<!--                                <td>Умения</td>-->
<!--                                <td>Образование</td>-->
<!--                                <td>Наличие авто</td>-->
<!--                                <td>График</td>-->
<!--                                <td>Босс или нет</td>-->
<!--                            </tr>-->
<!--                        </thead>-->
<!--                        <tbody>-->
<!--                            <tr v-for="recs in kek">-->
<!--                                <td>{{ recs.candidats_trait }}</td>-->
<!--                                <td>{{ recs.education }}</td>-->
<!--                                <td>{{ recs.have_car }}</td>-->
<!--                                <td>{{ recs.job_chart }}</td>-->
<!--                                <td>{{ recs.is_he_was_boss }}</td>-->
<!--                            </tr>-->
<!--                        </tbody>-->
<!--                    </table>-->

<!--                    Вывод-->
<!--                    <table>-->
<!--                        <thead>-->
<!--                            <tr>-->
<!--                                <td>Умения</td>-->
<!--                            </tr>-->
<!--                        </thead>-->
<!--                        <tbody>-->
<!--                            <tr v-for="inner in ChiefsData">-->
<!--                                <td>{{inner.candidats_trait}}</td>-->
<!--                            </tr>-->
<!--                        </tbody>-->
<!--                    </table>-->
                </div>

                <div class="modal fade show z-9999" id="interviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog recruiting-modal-size" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-header-general">
                                    <div class="color-blue">ФИО кандидата</div>
<!--                                    <div>{{candidatsData.manualFullname}}</div>-->
<!--                                    <div>{{candidatsData.manualIIN}}</div>-->
<!--                                    <div>{{candidatsData.manualPhoneNumber}}</div>-->
                                    <strong v-if="manualSearchIIN == false && candidatsPersonalData">{{candidatsPersonalData.fullname}}</strong>
                                    <input v-if="manualSearchIIN" type="text" class="recruiting-modal-general" v-model="candidatsData.manualFullname">
                                </div>
                            </div>
                            <div class="modal-margin-general recruiting-modal-borderbot">
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Структурное подразделение:</div>
                                    <div class="col-md-6">{{candidatBackward.cityAdressSelect}}</div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">ИИН:</div>
                                    <div class="col-md-6">
<!--                                        candidatBackward.manualIIN-->

<!--                                        v-if="manualSearchIIN == false && candidatsPersonalData"-->
                                        <input v-if="!manualSearchIIN" type="text" onclick="this.select()" disabled class="recruiting-modal-general" v-model="candidateBase.IIN">
                                        <input v-if="manualSearchIIN" :maxlength="maxlengthIIN" type="text" class="recruiting-modal-general" v-model="candidatsData.manualIIN">
                                        <i v-if="showEditBtn" class="far fa-edit pointer" @click="candidatWithoutIIN"></i>
                                    </div>
                                </div>
                                <div class="modal-cell-general">
                                    <div class="col-md-6 color-blue">Контактный номер кандидата:</div>
                                    <div class="col-md-6">
<!--                                        v-if="manualSearchIIN == false && candidatsPersonalData"-->
                                        <input v-if="!manualSearchIIN" type="text" onclick="this.select()" disabled class="recruiting-modal-general" v-model="candidateBase.phone">
                                        <input v-if="manualSearchIIN" :maxlength="maxlengthPhone" type="text" class="recruiting-modal-general" v-model="candidatsData.manualPhoneNumber">
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
                                            <div v-for="(info, index) in filesInfo" class="d-flex">
                                                <div>
                                                    {{ info }}
                                                </div>
                                                <div class="ml-1">
                                                    <button class="border-0 bg-transparent button-delete" @click="deleteFile(index)">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div v-for="(document, index) in candidateBase.documents"
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
                                                    <div class="p-2"><a target="_blank" :href="document.link">{{document.name}}</a></div>

                                                </div>
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                        <div class="recruiting-savebtn-container">
<!--                                            candidatsResumeModalSend Функция отправки резюме-->
<!--                                            savedSuccess-->
                                            <div class="recruiting-btn"
                                                 @click="sendCandidatsData"
                                                 v-bind:class="{
                                                 disabledBtnRecruiting : isActiveCandidatsBase}"
                                                 :disabled="isActiveCandidatsBase"
                                                >
                                                Сохранить
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-header modal-margin-general pl-0 pr-0 flex-column">
                                <div class="recruiting-modal-borderbot">
                                    <div class="modal-cell-general">
                                        <div class="col-md-6 color-blue">Вакансия:</div>
                                        <div class="col-md-6">{{candidatBackward.nameOfPostSelect}}</div>
                                    </div>
                                    <div class="modal-cell-general">
                                        <div class="col-md-6 color-blue">Количество единиц:</div>
                                        <div class="col-md-6">{{candidatBackward.quantityPeople}}</div>
                                    </div>
                                    <div class="modal-cell-general">
                                        <div class="col-md-6 color-blue">Дата собеседования (ответ в течение 2-х дней после получения резюме):</div>
                                        <div class="col-md-6">
                                            <input type="date" v-model="recruitingData.interviewDate" class="recruiting-modal-general">
                                        </div>
                                    </div>
                                    <!---onclick="this.select()" -->
                                    <div class="modal-cell-general">
                                        <div class="col-md-6 color-blue">Время собеседования:</div>
                                        <div class="col-md-6">
                                            <input type="time" value="09:00" min="09:00" max="18:00" v-model="recruitingData.interviewTime" class="recruiting-modal-general">
                                        </div>
                                    </div>
                                    <div class="modal-cell-general">
                                        <div class="col-md-6 color-blue">Результат итогового интервью кандидата с руководителем(ответ в течение дня):</div>
                                        <div class="col-md-6">
<!--                                            interviewMainResultModalSelect-->
                                            <select v-model="recruitingData.interviewResult" :class="modalSelectCheckSelect()" @change="interviewResultCheck" class="recruiting-modal-general recruiting-modal-general">
                                                <option :class="modalSelectCheck(inner)" v-for="inner in interviewMainResultModal">{{inner.label}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="resultCheckCounter == 'success'">
                                    <div class="modal-cell-general">
                                        <div class="col-md-6 color-blue">Дата выхода кандидата на стажировку (с указанием даты окончания стажировки, но не более 5 дней):</div>
                                        <div class="col-md-6"><input type="date" class="recruiting-modal-general" v-model="recruitingData.dateOfInternship"></div>
                                    </div>
                                    <div class="modal-cell-general">
                                        <div class="col-md-6 color-blue">Результат прохождения стажировки:</div>
                                        <div class="col-md-6">
                                            <!--                                            interviewMainResultModalSelect-->
                                            <select v-model="recruitingData.internshipResult" :class="modalResultInternshipColor()" @change="interviewResultCheck" class="recruiting-modal-general recruiting-modal-general">
                                                <option :class="modalSelectCheck(inner)" v-for="inner in internshipResult">{{inner.label}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-cell-general">
                                        <div class="col-md-6 color-blue">Дата заключения ДОУ (ответ в течение 5 дней (с даты выхода кандидата на стажировку)):</div>
                                        <div class="col-md-6"><input type="date" class="recruiting-modal-general" v-model="recruitingData.dateOfConclusionDOU"></div>
                                    </div>
                                    <div class="modal-cell-general">
                                        <div class="col-md-6 color-blue">Дата заключения ТД (принят в штат):</div>
                                        <div class="col-md-6"><input type="date" class="recruiting-modal-general" v-model="recruitingData.dateOfConclusionTD"></div>
                                    </div>
                                    <div class="modal-cell-general">
                                        <div class="col-md-6 color-blue">Комментарий:</div>
                                        <div class="col-md-6">
                                            <textarea cols="30" rows="4" v-model="recruitingData.commentary" class="recruiting-modal-general">Текст</textarea>
                                        </div>
                                    </div>
                                </div>
<!--                                Кнопка сохранения в разделе ВРЕМЯ-->
                                <div class="recruiting-savebtn-container">
                                    <div class="recruiting-btn" @click="recruitingDataSavedSuccess">
                                        Сохранить
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input class="form-control" type="text" placeholder="Поиск" id="interwiewWithCandidatesSearch" @keyup="tableSearch()">
                <div class="recruiting-max-height-table">
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
    <!--                    Цветные примеры-->
    <!--                        <tr v-for="inner in recruitingInterviewCluster1">-->
    <!--                            <td scope="row">{{inner.id}}</td>-->
    <!--                            <td>{{inner.name}}</td>-->
    <!--                            <td>{{inner.structureUnit}}</td>-->
    <!--                            <td>{{inner.dateOfInterview}}</td>-->
    <!--                            <td :class="modalSelectCheck(inner)">{{inner.label}}</td>-->
    <!--                        </tr>-->


    <!--                        <div>{{candidateInterviewTable}}</div>-->

                            <!--Верхняя таблица-->
                            <tr v-for="(inner, index) in candidateInterviewTable"
                                data-toggle="modal"
                                data-target="#interviewModal"
                                class="pointer"
                                @click="showTopModalMain(index,inner.id)">
                                <td scope="row">{{inner.id}}</td>
                                <td>{{inner.fullname}}</td>
                                <td>{{inner.unit_structural_name_and_city}}</td>
                                <td>{{ inner.interview_date }}</td>
                                <td :class="modalSelectCheck(inner)">{{ inner.interview_result }} </td>
                            </tr>
    <!--Последняя рабочая версия-->
    <!--<tr v-for="(person, index) in candidatDataLocal">-->
    <!--    <td scope="row">{{index + 1}}</td>-->
    <!--    <td>{{person.candidate_fullname}}</td>-->
    <!--    <td></td>-->
    <!--    <td></td>-->
    <!--    <td :class="modalSelectCheck(person)"></td>-->
    <!--</tr>-->

                        </tbody>
                    </table>
                </div>
                <div class="recruiting-max-height-table mb-5">
                    <table class="table recruiting-striped" id="interwiewWithCandidatesTableUnits">
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">ФИО Руководителя</th>
                            <th scope="col">Структурное подразделение</th>
                        </tr>
                        </thead>
                        <tbody>
    <!--                        <tr class="pointer" data-toggle="modal" data-target="#interviewModalApplicationData" v-for="inner in recruitingInterviewCluster1">-->
    <!--                            <td scope="row">{{inner.id}}</td>-->
    <!--                            <td>{{inner.name}}</td>-->
    <!--                            <td>{{inner.structureUnit}}</td>-->
    <!--                        </tr>-->


    <!--                        <tr-->
    <!--                            v-for="(person, index) in recruitingInterviewCluster"-->
    <!--                            class="pointer"-->
    <!--                            data-toggle="modal"-->
    <!--                            data-target="#interviewModalApplicationData"-->
    <!--                            @click="showModal(index)"-->
    <!--                        >-->
    <!--                            <td scope="row">{{ person.id }}</td>-->
    <!--                            <td>{{ person.fullName }}</td>-->
    <!--                            <td>{{ person.department }}</td>-->
    <!--                        </tr>-->
                            <tr
                                v-for="(person, index) in chiefsDataLocal"
                                class="pointer"
                                data-toggle="modal"
                                data-target="#interviewModalApplicationData"
                                @click="showModalMain(index)"
                            >
    <!--                            showModal(index)-->

    <!--                            {{ person.id }}-->
                                <td scope="row">{{ person.id }}</td>
                                <td>{{ person.chiefs_fullname }}</td>
                                <td>{{ person.chiefs_duty }}</td>
                            </tr>
    <!--                        <tr class="pointer" data-toggle="modal" data-target="#interviewModalApplicationData">-->
    <!--                            <td scope="row">{{recruitingInterviewCluster.depProg[0]}}</td>-->
    <!--                            <td>{{recruitingInterviewCluster.depProg[1]}}</td>-->
    <!--                            <td>{{recruitingInterviewCluster.depProg[2]}}</td>-->
    <!--                        </tr>-->
    <!--                        <tr class="pointer mt-2" data-toggle="modal" data-target="#interviewModalApplicationData">-->
    <!--                            <td scope="row">{{recruitingInterviewCluster.depHR[0]}}</td>-->
    <!--                            <td>{{recruitingInterviewCluster.depHR[1]}}</td>-->
    <!--                            <td>{{recruitingInterviewCluster.depHR[2]}}</td>-->
    <!--                        </tr>-->
                        </tbody>
                    </table>
                </div>
                <div class="modal fade show" id="interviewModalApplicationData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog recruiting-modal-size" role="document">
                        <div class="modal-content">
                            <div class="recruiting-body"  v-if="person">
                                <div>
                                    <div class="recruiting-backward-title">
                                        Заявка на поиск кандидата
                                    </div>
<!--                                    <div>{{candidatBackward.chiefMail}}</div>-->
                                    <div class="recruiting-select-header">
                                        Наименование структурного подразделения (укажите город и адрес филиала)
                                    </div>
<!--                                    <button @click="qwer">candidatBackward.nameOfPostSelect</button>-->
<!--                                    <button @click="qwer1">candidatBackward.nameOfPostSelect[0]</button>-->
                                    <div>
                                        <div class="recruiting-div-like-select">{{candidatBackward.cityAdressSelect}}</div>
                                    </div>
                                </div>
                                <div class="d-flex jc-sb mt-2">
                                    <div class="recruiting-double-block col-md-5">
                                        <div>
                                            Наименование вакантной должности
                                        </div>
                                        <div>
                                            <div class="recruiting-div-like-select">{{candidatBackward.nameOfPostSelect}}</div>
                                        </div>
                                    </div>
                                    <div class="recruiting-double-block col-md-5">
                                        <div>
                                            Количество
                                        </div>
                                        <div>
                                            <div class="recruiting-div-like-select">{{candidatBackward.quantityPeople}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="recruiting-select-header">
                                        Причина возникновения вакансии
                                    </div>
                                    <div>
                                        <div class="recruiting-div-like-select">{{candidatBackward.ReasonToRecruitingSelect}}</div>
                                    </div>
                                </div>
                                <div class="recruiting-tripple-block-container">
                                    <div class="recruiting-tripple-block col-md-4">
                                        <div class="flex-basic-recruiting">
                                            Желаемый возраст
                                        </div>
                                        <div>
                                            <div class="recruiting-div-like-select">{{candidatBackward.desiredAgeSelect}}</div>
                                        </div>
                                    </div>
                                    <div class="recruiting-tripple-block col-md-4">
                                        <div class="flex-basic-recruiting">
                                            Пол
                                        </div>
                                        <div>
                                            <div class="recruiting-div-like-select">{{candidatBackward.sexSelect}}</div>
                                        </div>
                                    </div>
                                    <div class="recruiting-tripple-block col-md-4">
                                        <div class="flex-basic-recruiting">
                                            Образование
                                        </div>
                                        <div>
                                            <div class="recruiting-div-like-select">{{candidatBackward.educationSelect}}</div>
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
                                                <div class="recruiting-div-like-select">{{candidatBackward.workExpirienceSelect}}</div>
                                            </div>
                                        </div>
                                        <div class="recruiting-tripple-block col-md-4">
                                            <div class="flex-basic-recruiting">
                                                Наличие подчиненных
                                            </div>
                                            <div>
                                                <div class="recruiting-div-like-select">{{candidatBackward.isHeWasBossSelect}}</div>
                                            </div>
                                        </div>
                                        <div class="recruiting-tripple-block col-md-4">
                                            <div class="flex-basic-recruiting">
                                                Форма найма
                                            </div>
                                            <div>
                                                <div class="recruiting-div-like-select">{{candidatBackward.typeOfHireSelect}}</div>
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
                                        <div class="recruiting-div-like-select">{{candidatBackward.perspectiveToCandidatSelect}}</div>
                                    </div>
                                </div>
                                <div>
                                    <div class="recruiting-select-header">
                                        Уровень владения компьютерными программами
                                    </div>
                                    <div>
                                        <div class="recruiting-div-like-select">{{candidatBackward.computerKnowingSelect}}</div>
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
                                            <div class="recruiting-div-like-select">{{candidatBackward.motivationSelect}}</div>
                                        </div>
                                    </div>
                                    <div class="recruiting-double-block col-md-5">
                                        <div>
                                            График работы
                                        </div>
                                        <div>
                                            <div class="recruiting-div-like-select">{{candidatBackward.jobChartSelect}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex jc-sb mt-2">
                                    <div class="recruiting-double-block col-md-5">
                                        <div>
                                            Наличие автомобиля
                                        </div>
                                        <div>
                                            <div class="recruiting-div-like-select">{{candidatBackward.haveCarSelect}}</div>
                                        </div>
                                    </div>
                                    <div class="recruiting-double-block col-md-5">
                                        <div>
                                            Категория вод. удостоверения
                                        </div>
                                        <div>
                                            <div class="recruiting-div-like-select">{{candidatBackward.driverCategorySelect}}</div>
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
                            <textarea v-model="candidatBackward.candidatsTrait" class="recruiting-textarea" disabled>
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
                                <button @click="addCandidateBtn" type="button" class="recruiting-add-btn" data-toggle="modal" data-target="#interviewModal">
                                    <span>Добавить кандидата</span>
                                    <span><i class="fas fa-plus-circle"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="recruitingTabs == 3">
<!--                Пример фильтрации таблицы-->
<!--                <div>-->
<!--                    <button @click="active = null">Все</button>-->
<!--                    <button v-for="n in types" @click="active = n.id">{{ n.name }}</button>-->
<!--                    <table>-->
<!--                        <tr>-->
<!--                            <th></th>-->
<!--                            <th>id</th>-->
<!--                            <th>country</th>-->
<!--                        </tr>-->
<!--                        <tr v-for="(n, i) in filteredItems" :style="getStyle(n.type)">-->
<!--                            <td>#{{ i + 1 }}</td>-->
<!--                            <td>{{ n.id }}</td>-->
<!--                            <td>{{ n.name }}</td>-->
<!--                        </tr>-->
<!--                    </table>-->
<!--                </div>-->
                <table class="table recruiting-striped" data-filter-control>
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">ФИО Кандидата</th>
                        <th scope="col">Структурное подразделение/ФИО ответственного/Вакансия</th>
                        <th scope="col" class="recruiting-center">Статус</th>
                        <th scope="col" class="recruiting-center">Ответственный рекрутер</th>
                        <th scope="col">Дата выхода кандидата по ДОУ</th>
                    </tr>
                    </thead>
                    <tbody>
<!--                    <tr>-->
<!--                        <td scope="row">1</td>-->
<!--                        <td>Елена</td>-->
<!--                        <td>HR управление / Рекрутер</td>-->
<!--                        <td class="recruiting-center">Открыта</td>-->
<!--                        <td class="recruiting-center">Филимонова Е.</td>-->
<!--                        <td>01.01.2020</td>-->
<!--                    </tr>-->

<!--{{inner.chiefs_duty}}-->
                    <tr v-for="(inner, index) in candidateResultRequest">
<!--                        <td scope="row">{{candidateResultRequest.thirdTableIndex++}}</td>-->
                        <td scope="row">{{index+1}}</td>
                        <td>{{inner.candidate_fullname}}</td>
                        <td>{{inner.unit_structural_name_and_city}} / {{inner.chiefs_fullname}} / {{inner.name_of_post}}</td>
                        <td>{{inner.application_status}}</td>
                        <td>{{inner.fullname}}</td>
                        <td>{{inner.date_of_conclusion_dou}}</td>
<!--                        <td>{{inner.date_of_conclusion_dou}}</td>-->
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
                items: [
                    { type: 1, name: 'Чехия' },
                    { type: 1, name: 'Франция' },
                    { type: 3, name: 'Сомали' },
                    { type: 2, name: 'Вьетнам' },
                    { type: 3, name: 'Сенегал' },
                    { type: 1, name: 'Испания' },
                    { type: 2, name: 'Таиланд' },
                    { type: 2, name: 'Филлипины' },
                    { type: 1, name: 'Норвегия' },
                    { type: 3, name: 'Ангола' },
                ].map((n, i) => ({ ...n, id: i + 1 })),
                types: [
                    { id: 1, name: 'Европа', color: 'red' },
                    { id: 2, name: 'Азия',  color: 'blue' },
                    { id: 3, name: 'Африка', color: 'green' },
                ],
                active: null,
                internshipResultCheckCounter: '',
                filesInfo: [],
                topTableId: {},
                fileNameArr: [],
                maxlengthIIN: 12,
                maxlengthPhone: 11,
                showEditBtn: false,
                dicti: {
                    structuralUnitAndCity: {},
                    nameOfPost: {},
                    reason: {},
                    desiredAge: {},
                    sex: {},
                    education: {},
                    workExpirience: {},
                    isHeWasBoss: {},
                    typeOfHire: {},
                    connect: {},
                    computerKnowing: {},
                    language: {},
                    motivation: {},
                    jobTime: {},
                    haveCar: {},
                    driverCard: {},
                    socPacket: {},
                },
                candidat: {
                    chiefsDuty: '',
                    chiefsFullname: '',
                    userAuthDepartment: '',
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
                    manualFullname: '',
                    manualIIN: '',
                    manualPhoneNumber: '',
                    status: 'Открыта',
                    chief_mail: null,
                },
                recruitingData: {
                    id: '',
                    interviewDate: '',
                    interviewTime: '',
                    interviewResult: '',
                    dateOfInternship: '',
                    internshipResult: '',
                    dateOfConclusionDOU: '',
                    dateOfConclusionTD: '',
                    commentary: '',
                    status: '',
                    recruiterEmail: '',
                },
                showToTopBtn: false,
                bottomOfWindow: 0,
                scrolled: false,
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
                    'Женский',
                    'Не имеет значения'
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
                        value: 1,
                        label: 'В ожидании собеседования'
                    },
                    {
                        value : 2,
                        label : 'Успешно прошел собеседование'
                    },
                    {
                        value : 0,
                        label : 'Провалил собеседование'
                    }
                ],
                internshipResult: [
                    {
                        value: 1,
                        label: 'Успешно прошел стажировку'
                    },
                    {
                        value: 0,
                        label: 'Не прошел стажировку'
                    }
                ],
                candidatsDateInternshipModal: '02.01.2020',
                dateOfTheDOUContractModal: '12.01.2020',
                dateOfTheStateContractModal: '12.01.2020',
                commentModal: 'Текст',
                // },
                recruitingInterviewCluster1:[
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
                //     depProg: [
                //         '0',
                //         'Хамитов Руслан Решатович',
                //         'Департамент программирования'
                //     ],
                //     depHR: [
                //         '1',
                //         'Руководитель департамента',
                //         'Отдел кадров'
                //     ],
                recruitingInterviewCluster: [
                    {
                        id: 0,
                        fullName: 'Хамитов Руслан Решатович',
                        department: 'Департамент программирования'
                    },
                    {
                        id: 1,
                        fullName: 'Джумагулов Дмитрий Романович',
                        department: 'Департамент программирования'
                    },
                    {
                        id: 2,
                        fullName: 'Qwerty qwerty qwerty',
                        department: 'Департамент Непрограммирования'
                    }
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
                    id: '',
                    cityAdressSelect: '',
                    nameOfPostSelect: '',
                    quantityPeople: '',
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
                    salary: '',
                    motivationSelect: '',
                    jobChartSelect: '',
                    haveCarSelect: '',
                    driverCategorySelect: '',
                    candidatsTrait: '',
                    interviewStage: '',
                    manualFullname: '',
                    manualIIN: '',
                    manualPhoneNumber: '',
                    interviewDate: '',
                    interviewTime: '',
                    interviewResult: '',
                    dateOfInternship: '',
                    dateOfConclusionDOU: '',
                    dateOfConclusionTD: '',
                    commentary: '',
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
                chiefsDuty: '',
                person: null,
                candidatsPersonalData: null,
                chiefsDataLocal: this.ChiefsData,
                manualSearchIIN: false,
                candidatsData: {
                    recruiting_id: '',
                    manualFullname: '',
                    manualIIN: '',
                    manualPhoneNumber: '',
                    dateOfInterview: '',
                    timeOfInterview: '',
                    cityAdress: '',
                    recruiterFullname: '',
                },
                candidatDataLocal: this.candidatData,
                candidateInterviewTable: [],
                candidateManualDataLocal: [],
                candidateResultRequest: {
                    candidatName: '',
                },
                candidateResultInterviewDate: '',
                driverCardOptionFirst: [],
                driverCardOptionSecond: [],
                driverCardOptionRewrite: [],
                options: null,
                parentId: 50,
                usersList : [],
                searchText: '',
                candidateBase: {
                    IIN: '',
                    phone: '',
                    documents: [],
                    recruiterEmail: '',
                },
                candidateStorage: {},
                candidatePerson: null,
                isActiveCandidatsBase: false,
                isDriverCard: true,
                testvar: [],
            }
        },
        props: {
            // isn: Number,
            attributes: Array,
            user: Object,
            kek: Array,
            ChiefsData: Array,
            candidatData: Array,
        },
        mounted() {
            //this.getFaqData();
            this.getCandidatsDataRequest();
            this.getResultRequest();
            this.getCandidatsDataManualRequest();
            // this.applicationDataOutput();
            // this.getDictiOnClick();
            this.getDicti();
            this.getChiefsRequest();
            this.getBranchData();
        },
        // this.getRequests();

        // v-for="item in dicti.socPacket"

        // item.Value[0]

        computed: {
            filteredItems() {
                const { items, active } = this;
                return active ? items.filter(n => n.type === active) : items;
            },
        },
        methods: {
            sendMail: function(){
                this.axios.post('/recruiting/testMail', {
                    form: {}
                }).then(response => {
                    // console.log(this.options);
                    // this.options = response.data.result;
                    // console.log(this.options);
                })
            },
            testpush: function(){
                // this.testvar
            },
            havecarChecking: function (){
                if(this.candidat.haveCarSelect == 482301){
                    this.isDriverCard = false;
                    this.candidat.driverCategorySelect = '-';
                } else if(this.candidat.haveCarSelect == 482291){
                    this.isDriverCard = true;
                    this.candidat.driverCategorySelect = '';
                }
            },
            getStyle(type) {
                return {
                    color: this.types.find(n => n.id === type).color,
                };
            },
            qwer: function() {
                // console.log(this.candidatBackward.nameOfPostSelect);
                console.log(this.candidatBackward)
            },
            qwer1: function() {
                console.log(this.candidatBackward.nameOfPostSelect[0]);
            },
            isActiveCandidatsSaveBtn(){
              if (this.candidateBase.IIN && this.candidateBase.phone){
                   this.isActiveCandidatsBase = true;
              }
              else if(this.candidateBase.IIN == false && this.candidateBase.phone == false){
                  this.isActiveCandidatsBase = false;
              }
            },
            showInterviewBlock(){
              if (this.recruitingData.interviewResult == 'Успешно прошел собеседование'){
                  this.resultCheckCounter = 'success';
                  this.numberOfUnitsModal = 0;
              }
            },
            getBranchData() {
                if (this.recruitingTabs == 1){
                    this.axios.post('/getSearchBranch', {}).then(response => {
                        console.log(this.options);
                        this.options = response.data.result;
                        console.log(this.options);
                    })
                }
            },
            getBranchDataClick() {
                if (this.dicti.workExpirience == ''
                    || this.dicti.workExpirience == null
                    || Object.keys(this.dicti.workExpirience).length == 0) {
                    this.axios.post('/getSearchBranch', {}).then(response => {
                        console.log(this.options);
                        this.options = response.data.result;
                        console.log(this.options);
                    })
                }
            },
            searchUser() {
                var vm = this
                this.axios.post('/colleagues/search', {
                    parentId : this.parentId
                }).then(response => {
                    if(response.data.success){
                        vm.usersList = response.data.list
                    }else{
                        alert(response.data.error)
                    }
                }).catch(error => {
                    alert(error)
                })
            },
            mailTest: function(){
                this.axios.post('/recruiting/testMail',{})
            },
            clickertest: function(){
                this.axios.post('/recruiting/test21',{candidatsData: this.candidatsData, index})
            },
            candidatsResumeModalSend: function(){
                    this.preloader(true);
                    this.axios.post("/recruiting/getResumeRecruiting", this.getFormData()).then(response => {
                        this.fetchAddPost(response.data);
                    }).catch(error => {
                        alert("Ошибка на стороне сервера");
                    });
            },
            getFormData() {
                const formData = new FormData;

                this.documents.forEach(document => {
                    formData.append('documents[]', document, document.name);
                });

                return formData;
            },




            recruitingDataSavedSuccess: function(){
                //  Отправка данных на поиск кандидата
                this.recruitingData.id = this.candidatBackward.id;
                // if(this.recruitingData.dateOfConclusionTD !== '' && this.recruitingData.dateOfConclusionTD !== null){
                //     this.recruitingData.status = 'Закрыта';
                //     console.log('Обновлен статус заявки');
                // }
                if (this.recruitingData.internshipResult == 'Успешно прошел стажировку' && this.recruitingData.internshipResult !== null){
                    this.candidatBackward.quantityPeople = 0;
                    this.recruitingData.status = 'Закрыта';
                    console.log('Обновлен статус заявки');
                }
                this.axios.post('/recruiting/saveRecruitingData',{recruitingData: this.recruitingData})
                    .then(response => {
                        this.recruitingDataAfterSavedSuccess(response);
                    });
            },
            recruitingDataAfterSavedSuccess(response){
                if (response.data.success){
                    let timerId = setInterval(() => location.reload(), 3000);
                    this.flashMessage.success({
                        title: "",
                        message: 'Кандидат успешно сохранен. Страница будет перезагружена через 3 секунды',
                        time: 5000
                    });
                } else {
                    this.flashMessage.error({
                        title: "Ошибка",
                        message: 'Не удалось сохранить данные',
                        time: 5000,
                    });
                }
            },

            candidatsDataSavedSuccess: function(){
                //  Отправка данных на поиск кандидата
                this.getFormData();
                this.axios.post('/recruiting/saveCandidatsData',this.getFormData())
                .then(response => {
                    this.candidatsDataAfterSavedSuccess(response);
                });
            },
            candidatsDataAfterSavedSuccess(response){
                if (response.data.success){
                    this.flashMessage.success({
                        title: "",
                        message: 'Кандидат успешно сохранен. Страница будет перезагружена через 3 секунды',
                        time: 5000,
                    });
                    // ***
                    this.axios.post('/recruiting/sendRecruitingNotify',{candidatsData: this.candidatsData})
                        .then(response => {
                            this.candidatsDataAfterSavedSuccess(response);
                        });
                    this.isActiveCandidatsBase = true;
                    let timerId = setInterval(() => location.reload(), 3000);
                } else {
                    this.flashMessage.error({
                        title: "Ошибка",
                        message: 'Не удалось сохранить данные',
                        time: 5000,
                    });
                }
            },
            sendCandidatsData(){
                this.candidatsDataSavedSuccess();
            },
            checkLengthIIN: function(){
                this.manualIIN.length <= 13;
            },
            candidatWithoutIIN: function(){
                if (this.manualSearchIIN == true){
                    this.manualSearchIIN = false;
                }
                else if (this.manualSearchIIN == false){
                    this.manualSearchIIN = true;
                }

            },
            goToTop(){
                window.scroll({
                    top: 0,
                    left: 0,
                    behavior: 'smooth'
                });
            },
            handleScroll() {
                if(document.documentElement.scrollTop > 50){
                    this.showToTopBtn = true;
                }else{
                    this.showToTopBtn = false;
                }
                this.bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;
                if (this.bottomOfWindow && !this.allPostShown) {
                    this.preloader(true);
                    this.axios.post("/getPosts", {lastIndex: this.lastIndex}).then(response => {
                        this.setPosts(response.data)
                    });
                }
            },
            showModalMain: function(index){
              this.candidateBase.IIN = '';
              this.candidateBase.phone = '';
              this.candidateBase.documents = '';
              this.candidateBase.recruiterEmail = '';
              this.recruitingData.interviewResult = '';
              this.recruitingData.internshipResult = '';
              this.candidatsData.manualFullname = '';
              this.candidatsData.manualIIN = '';
              this.candidatsData.manualPhoneNumber = '';
              this.recruitingData.interviewDate = '';
              this.recruitingData.interviewTime = '';
              this.recruitingData.dateOfConclusionDOU = '';
              this.recruitingData.dateOfConclusionTD = '';
              this.recruitingData.recruiterEmail = '';
              this.resultCheckCounter = '';
              this.filesInfo = [];
              // console.log(this.candidateBase.IIN);
              // console.log(this.candidateBase.phone);
              this.showModal(index);
                // console.log(this.candidateBase.IIN);
                // console.log(this.candidateBase.phone);
              this.isActiveCandidatsSaveBtn();
              this.showInterviewBlock();
              console.log(this.resultCheckCounter)
            },
            showTopModalMain: function(index,id){
                this.candidateBase.IIN = '';
                this.candidateBase.phone = '';
                this.candidateBase.documents = '';
                this.recruitingData.interviewResult = '';
                this.recruitingData.internshipResult = '';
                this.candidatsData.manualFullname = '';
                this.candidatsData.manualIIN = '';
                this.candidatsData.manualPhoneNumber = '';
                this.recruitingData.interviewDate = '';
                this.recruitingData.interviewTime = '';
                this.recruitingData.dateOfConclusionDOU = '';
                this.recruitingData.dateOfConclusionTD = '';
                this.candidateBase.recruiterEmail = '';
                this.resultCheckCounter = '';
                this.filesInfo = [];
                this.showTopModal(index,id);
                this.isActiveCandidatsSaveBtn();
                this.showInterviewBlock();
            },
            showTopModal: function(index,id){
                this.candidateBase.IIN = '';
                this.candidateBase.phone = '';
                this.candidateBase.recruiterEmail = '';
                this.candidatePerson = '';
                let vm = this;
                this.person =  this.chiefsDataLocal[index];
                    let self = this;
                    // if (Object.keys(this.candidateStorage).length > 0) {
                    //     this.candidateStorage.map(function (el) {
                    //         console.log(el.recruiting_id + '===' + self.chiefsDataLocal[index].id);
                    //         if (el.recruiting_id == id) {
                    //             self.candidatePerson = el;
                    //             self.candidateBase.IIN = el.candidate_iin == undefined ? '' : el.candidate_iin;
                    //             self.candidateBase.phone = el.candidate_phone_number == undefined ? '' : el.candidate_phone_number;
                    //             self.candidateBase.recruiterEmail = el.recruiter_email == undefined ? '' : el.recruiter_email;
                    //             self.candidateBase.documents = el.documents == undefined ? '' : el.documents;
                    //         }
                    //     });
                    // }

                                if(id == undefined) {
                    this.person =  this.chiefsDataLocal[index];
                    let self = this;
                    if (Object.keys(this.candidateStorage).length > 0) {
                        this.candidateStorage.map(function (el) {
                            console.log(el.recruiting_id + '===' + self.chiefsDataLocal[index].id);
                            if (el.recruiting_id == self.chiefsDataLocal[index].id) {
                                self.candidatePerson = el;
                                self.candidateBase.IIN = el.candidate_iin == undefined ? '' : el.candidate_iin;
                                self.candidateBase.phone = el.candidate_phone_number == undefined ? '' : el.candidate_phone_number;
                                self.candidateBase.documents = el.documents == undefined ? '' : el.documents;
                                self.candidateBase.recruiterEmail = el.recruiter_email == undefined ? '' : el.recruiter_email;
                            }
                        });
                    }
                } else {
                    let vm = this;
                    this.chiefsDataLocal.map(function (element) {
                        if (element.id == id) {
                            vm.person = element;
                        }
                    });
                    let self = this;
                    if (Object.keys(this.candidateStorage).length > 0) {
                        this.candidateStorage.map(function (el) {
                            console.log(el.recruiting_id + '===' + self.chiefsDataLocal[index].id);
                            if (el.recruiting_id == id) {
                                self.candidatePerson = el;
                                self.candidateBase.IIN = el.candidate_iin == undefined ? '' : el.candidate_iin;
                                self.candidateBase.phone = el.candidate_phone_number == undefined ? '' : el.candidate_phone_number;
                                self.candidateBase.documents = el.documents == undefined ? '' : el.documents;
                                self.candidateBase.recruiterEmail = el.recruiter_email == undefined ? '' : el.recruiter_email;
                            }
                        });
                    }
                }
                this.candidatsPersonalData = this.candidatDataLocal[index];
                this.candidatBackward.id =  this.person.id;
                this.candidatBackward.cityAdressSelect = this.person.unit_structural_name_and_city;
                this.candidatBackward.nameOfPostSelect = this.person.name_of_post;
                this.candidatBackward.quantityPeople = this.person.quantity_people;
                this.candidatBackward.ReasonToRecruitingSelect =  this.person.reason_to_recruiting;
                this.candidatBackward.desiredAgeSelect = this.person.desired_age;
                this.candidatBackward.sexSelect = this.person.sex;
                this.candidatBackward.educationSelect = this.person.education;
                this.candidatBackward.functionalResponsobilities = this.person.functional_responsibilities;
                this.candidatBackward.workExpirienceSelect = this.person.work_experience;
                this.candidatBackward.isHeWasBossSelect = this.person.is_he_was_boss;
                this.candidatBackward.typeOfHireSelect = this.person.type_of_hire;
                this.candidatBackward.requestToCandidat = this.person.request_to_candidate;
                this.candidatBackward.perspectiveToCandidatSelect = this.person.perspective_to_candidate;
                this.candidatBackward.computerKnowingSelect = this.person.computer_knowing;
                this.candidatBackward.salary = this.person.salary;
                this.candidatBackward.motivationSelect = this.person.motivation;
                this.candidatBackward.jobChartSelect = this.person.job_chart;
                this.candidatBackward.haveCarSelect = this.person.have_car;
                this.candidatBackward.driverCategorySelect = this.person.driver_category;
                this.candidatBackward.candidatsTrait = this.person.candidates_trait;
                this.candidatBackward.interviewStage = this.person.interview_stage;
                this.candidatBackward.manualFullname = this.candidateManualDataLocal.candidate_fullname;
                this.candidatBackward.manualIIN = this.candidateManualDataLocal.candidate_iin;
                this.candidatBackward.manualPhoneNumber = this.candidateManualDataLocal.candidate_phone_number;
                this.candidatBackward.chiefMail = this.person.email_chief;
                this.recruitingData.interviewDate = this.person.interview_date;
                this.recruitingData.interviewTime = this.person.interview_time;
                this.recruitingData.interviewResult = this.person.interview_result;
                this.recruitingData.dateOfInternship = this.person.date_of_internship;
                this.recruitingData.internshipResult = this.person.staging_internship;
                this.recruitingData.dateOfConclusionDOU = this.person.date_of_conclusion_dou;
                this.recruitingData.dateOfConclusionTD = this.person.date_of_conclusion_td;
                this.recruitingData.commentary = this.person.commentary;
                this.recruitingData.status = this.person.application_status;
                this.recruitingData.recruiterEmail = this.candidateManualDataLocal[index].recruiter_email;
            },
            showModal: function(index,id){
               this.candidateBase.IIN = '';
               this.candidateBase.phone = '';
               this.recruiterEmail = '';
               this.candidatePerson = '';

               if(id == undefined) {
                   this.person =  this.chiefsDataLocal[index];
                   let self = this;
                   if (Object.keys(this.candidateStorage).length > 0) {
                       this.candidateStorage.map(function (el) {
                           console.log(el.recruiting_id + '===' + self.chiefsDataLocal[index].id);
                           if (el.recruiting_id == self.chiefsDataLocal[index].id) {
                               self.candidatePerson = el;
                               self.candidateBase.IIN = el.candidate_iin == undefined ? '' : el.candidate_iin;
                               self.candidateBase.phone = el.candidate_phone_number == undefined ? '' : el.candidate_phone_number;
                               self.candidateBase.documents = el.documents == undefined ? '' : el.documents;
                               self.candidateBase.recruiterEmail = el.recruiter_email == undefined ? '' : el.recruiter_email;
                           }
                       });
                   }
               } else {
                   let vm = this;
                   this.chiefsDataLocal.map(function (element) {
                       if (element.id == id) {
                           vm.person = element;
                       }
                   });
                   let self = this;
                   if (Object.keys(this.candidateStorage).length > 0) {
                       this.candidateStorage.map(function (el) {
                           console.log(el.recruiting_id + '===' + self.chiefsDataLocal[index].id);
                           if (el.recruiting_id == id) {
                               self.candidatePerson = el;
                               self.candidateBase.IIN = el.candidate_iin == undefined ? '' : el.candidate_iin;
                               self.candidateBase.phone = el.candidate_phone_number == undefined ? '' : el.candidate_phone_number;
                               self.candidateBase.documents = el.documents == undefined ? '' : el.documents;
                               self.candidateBase.recruiterEmail = el.recruiter_email == undefined ? '' : el.recruiter_email;
                           }
                       });
                   }
               }
                this.candidatsPersonalData = this.candidatDataLocal.find(el => el.id == this.person.id)
               this.candidatBackward.id =  this.person.id;
               this.candidatBackward.cityAdressSelect = this.person.unit_structural_name_and_city;
               this.candidatBackward.nameOfPostSelect = this.person.name_of_post;
               this.candidatBackward.quantityPeople = this.person.quantity_people;
               this.candidatBackward.ReasonToRecruitingSelect =  this.person.reason_to_recruiting;
               this.candidatBackward.desiredAgeSelect = this.person.desired_age;
               this.candidatBackward.sexSelect = this.person.sex;
               this.candidatBackward.educationSelect = this.person.education;
               this.candidatBackward.functionalResponsobilities = this.person.functional_responsibilities;
               this.candidatBackward.workExpirienceSelect = this.person.work_experience;
               this.candidatBackward.isHeWasBossSelect = this.person.is_he_was_boss;
               this.candidatBackward.typeOfHireSelect = this.person.type_of_hire;
               this.candidatBackward.requestToCandidat = this.person.request_to_candidate;
               this.candidatBackward.perspectiveToCandidatSelect = this.person.perspective_to_candidate;
               this.candidatBackward.computerKnowingSelect = this.person.computer_knowing;
               this.candidatBackward.salary = this.person.salary;
               this.candidatBackward.motivationSelect = this.person.motivation;
               this.candidatBackward.jobChartSelect = this.person.job_chart;
               this.candidatBackward.haveCarSelect = this.person.have_car;
               this.candidatBackward.driverCategorySelect = this.person.driver_category;
               this.candidatBackward.candidatsTrait = this.person.candidates_trait;
               this.candidatBackward.interviewStage = this.person.interview_stage;
               this.candidatBackward.manualFullname = this.candidateManualDataLocal.candidate_fullname;
               this.candidatBackward.manualIIN = this.candidateManualDataLocal.candidate_iin;
               this.candidatBackward.manualPhoneNumber = this.candidateManualDataLocal.candidate_phone_number;
               this.candidatBackward.chiefMail = this.person.email_chief;
               this.recruitingData.interviewDate = this.person.interview_date;
               this.recruitingData.interviewTime = this.person.interview_time;
               this.recruitingData.interviewResult = this.person.interview_result;
               this.recruitingData.dateOfInternship = this.person.date_of_internship;
               this.recruitingData.internshipResult = this.person.staging_internship;
               this.recruitingData.dateOfConclusionDOU = this.person.date_of_conclusion_dou;
               this.recruitingData.dateOfConclusionTD = this.person.date_of_conclusion_td;
               this.recruitingData.commentary = this.person.commentary;

               this.recruitingData.recruiterEmail = this.candidateManualDataLocal.find(e => e.id === this.person.id).recruiter_email;
               this.recruitingData.status = this.person.application_status;
            },
            addCandidateBtn() {
                this.showEditBtn = false;
                // Если еще нет ИИН и номера, заявка только создана, то сразу покажет поля для ввода
                // if(this.candidateBase.phone == null || this.candidateBase.phone == '' || this.candidateBase.IIN == null || this.candidateBase.IIN == ''){
                //     this.manualSearchIIN = true;
                // }
                if(this.candidateBase.phone == null || this.candidateBase.phone == '' || this.candidateBase.IIN == null || this.candidateBase.IIN == ''){
                    this.showEditBtn = true;
                }
                //this.candidatsData.id = this.candidatBackward.id;
            },
            // getRequests: function(){
            //     this.axios.post('/recruiting/getRequests')
            //         .then(response => {
            //             this.aftergetRequests(response.data);
            //         });
            // },
            // aftergetRequests(data){
            //     if(data.success){
            //         this.kek = data.result;
            //     } else {
            //         alert('Сорян, нет данных');
            //     }
            // },
            getDicti(){
                if (this.recruitingTabs == 1) {
                    let dataIsn = {
                        'structuralUnitAndCity': 3994439,
                        // 3994439
                        'nameOfPost': 822411,
                        'reason': 1764941,
                        'desiredAge': 1764881,
                        'sex': 750461,
                        'education': 47,
                        'workExpirience': 1777411,
                        'isHeWasBoss': 482281,
                        'typeOfHire': 1765371,
                        'connect': 1765281,
                        'computerKnowing': 1764851,
                        'language': 67,
                        'motivation': 482281,
                        'jobTime': 815141,
                        'haveCar': 482281,
                        'driverCard': 1765001,
                        'socPacket': 1765311,
                    }

                    this.axios.post("/recruiting/get-recruiting-dicti", dataIsn)
                        .then(response => {
                            if (response.data.success) {
                                this.preloader(true);
                                this.dicti.structuralUnitAndCity = response.data.structuralUnitAndCity;
                                this.dicti.nameOfPost = response.data.nameOfPost;
                                this.dicti.reason = response.data.reason;
                                this.dicti.desiredAge = response.data.desiredAge;
                                this.dicti.sex = response.data.sex;
                                this.dicti.education = response.data.education;
                                this.dicti.workExpirience = response.data.workExpirience;
                                this.dicti.isHeWasBoss = response.data.isHeWasBoss;
                                this.dicti.typeOfHire = response.data.typeOfHire;
                                this.dicti.connect = response.data.connect;
                                this.dicti.computerKnowing = response.data.computerKnowing;
                                this.dicti.language = response.data.language;
                                this.dicti.motivation = response.data.motivation;
                                this.dicti.jobTime = response.data.jobTime;
                                this.dicti.haveCar = response.data.haveCar;
                                this.dicti.driverCard = response.data.driverCard;
                                this.dicti.socPacket = response.data.socPacket;
                                // Сохранение почты шефа
                                this.candidat.chief_mail = response.data.chief_mail[0];
                                // this.candidat.chief_mail = 'qwerty';
                                 //dd(response);
                                //console.log('test=');
                                 //console.log(response);

                                // this.driverCardOption = this.dicti.driverCard[0].Label[0];

                                // this.driverCardOption.push(this.dicti.driverCard[1].Label[0]);
                                // this.driverCardOption.push(this.dicti.driverCard[1].Label[0]);

                                // this.driverCardOptionRewrite = this.driverCardOption;
                                // console.log(this.driverCardOptionRewrite);

                                // Array.prototype.push.apply(this.driverCardOption, this.driverCardOptionRewrite);

                                // console.log(this.driverCardOption); // ['пастернак', 'картошка', 'сельдерей', 'свёкла']

                                // this.driverCardOptionRewrite = this.driverCardOption.push({'this.dicti.driverCard[1].Label[0]'});
                                // console.log(this.driverCardOptionRewrite);

                                // console.log(this.driverCardOption);


                                // Разбивает все элементы массива по 1, не подходит
                                this.driverCardOptionFirst = this.dicti.driverCard[1].Label[0];
                                this.driverCardOptionSecond = this.dicti.driverCard[3].Label[0];

                                this.driverCardOptionRewrite = this.driverCardOptionFirst.concat(this.driverCardOptionSecond);
                                console.log(this.driverCardOptionRewrite);
                                this.cityAdress = this.driverCardOptionRewrite;
                                this.preloader(false);
                            }
                        })
                        .catch(error => {
                            alert("Ошибка на стороне сервера. Не удалось получить данные справочников");
                            this.preloader(false);
                        });
                }
                // else if (this.recruitingthis.fileNameArr.push(event.target.files[0].name); == 2){
                //     let secondDataIsn = {
                //         'structuralUnitAndCity': 3994439,
                //         // 3994439
                //         'nameOfPost': 822411,
                //         'reason': 1764941,
                //         'desiredAge': 1764881,
                //         'sex': 750461,
                //         'education': 47,
                //         'workExpirience': 1777411,
                //         'isHeWasBoss': 482281,
                //         'typeOfHire': 1765371,
                //         'connect': 1765281,
                //         'computerKnowing': 1764851,
                //         'language': 67,
                //         'motivation': 482281,
                //         'jobTime': 815141,
                //         'haveCar': 482281,
                //         'driverCard': 1765001,
                //         'socPacket': 1765311,
                //     }
                // }
                // this.axios.post("/getDictiList", secondDataIsn)
                //     .then(response => {
                //         if (response.data.success) {
                //             this.preloader(true);
                //             this.dicti.structuralUnitAndCity = response.data.structuralUnitAndCity;
                //             this.dicti.nameOfPost = response.data.nameOfPost;
                //             this.dicti.reason = response.data.reason;
                //             this.dicti.desiredAge = response.data.desiredAge;
                //             this.dicti.sex = response.data.sex;
                //             this.dicti.education = response.data.education;
                //             this.dicti.workExpirience = response.data.workExpirience;
                //             this.dicti.isHeWasBoss = response.data.isHeWasBoss;
                //             this.dicti.typeOfHire = response.data.typeOfHire;
                //             this.dicti.connect = response.data.connect;
                //             this.dicti.computerKnowing = response.data.computerKnowing;
                //             this.dicti.language = response.data.language;
                //             this.dicti.motivation = response.data.motivation;
                //             this.dicti.jobTime = response.data.jobTime;
                //             this.dicti.haveCar = response.data.haveCar;
                //             this.dicti.driverCard = response.data.driverCard;
                //             this.dicti.socPacket = response.data.socPacket;
                //             // console.log(this.dicti.driverCard[0].Label[0]);
                //
                //             // this.driverCardOption = this.dicti.driverCard[0].Label[0];
                //
                //             // this.driverCardOption.push(this.dicti.driverCard[1].Label[0]);
                //             // this.driverCardOption.push(this.dicti.driverCard[1].Label[0]);
                //
                //             // this.driverCardOptionRewrite = this.driverCardOption;
                //             // console.log(this.driverCardOptionRewrite);
                //
                //             // Array.prototype.push.apply(this.driverCardOption, this.driverCardOptionRewrite);
                //
                //             // console.log(this.driverCardOption); // ['пастернак', 'картошка', 'сельдерей', 'свёкла']
                //
                //             // this.driverCardOptionRewrite = this.driverCardOption.push({'this.dicti.driverCard[1].Label[0]'});
                //             // console.log(this.driverCardOptionRewrite);
                //
                //             // console.log(this.driverCardOption);
                //
                //
                //             // Разбивает все элементы массива по 1, не подходит
                //             this.driverCardOptionFirst = this.dicti.driverCard[1].Label[0];
                //             this.driverCardOptionSecond = this.dicti.driverCard[3].Label[0];
                //
                //             this.driverCardOptionRewrite = this.driverCardOptionFirst.concat(this.driverCardOptionSecond);
                //             console.log(this.driverCardOptionRewrite);
                //             this.cityAdress = this.driverCardOptionRewrite;
                //             this.preloader(false);
                //         }
                //     })
                //     .catch(error => {
                //         alert("Ошибка на стороне сервера");
                //         this.preloader(false);
                //     });
                // the end
            },
            getDictiOnClick(){
                // Проверка на пустоту объекта, если данных нет, они будут подгружаться
                if (this.dicti.workExpirience == ''
                    || this.dicti.workExpirience == null
                    || Object.keys(this.dicti.workExpirience).length == 0) {
                    this.preloader(true);
                    let dataIsn = {
                        'structuralUnitAndCity': 3994439,
                        // 3994439
                        'nameOfPost': 822411,
                        'reason': 1764941,
                        'desiredAge': 1764881,
                        'sex': 750461,
                        'education': 47,
                        'workExpirience': 1777411,
                        'isHeWasBoss': 482281,
                        'typeOfHire': 1765371,
                        'connect': 1765281,
                        'computerKnowing': 1764851,
                        'language': 67,
                        'motivation': 482281,
                        'jobTime': 815141,
                        'haveCar': 482281,
                        'driverCard': 1765001,
                        'socPacket': 1765311,
                    }

                    this.axios.post("/recruiting/get-recruiting-dicti", dataIsn)
                        .then(response => {

                            console.log('asdasd');
                            if (response.data.success) {
                                this.dicti.structuralUnitAndCity = response.data.structuralUnitAndCity;
                                this.dicti.nameOfPost = response.data.nameOfPost;
                                this.dicti.reason = response.data.reason;
                                this.dicti.desiredAge = response.data.desiredAge;
                                this.dicti.sex = response.data.sex;
                                this.dicti.education = response.data.education;
                                this.dicti.workExpirience = response.data.workExpirience;
                                this.dicti.isHeWasBoss = response.data.isHeWasBoss;
                                this.dicti.typeOfHire = response.data.typeOfHire;
                                this.dicti.connect = response.data.connect;
                                this.dicti.computerKnowing = response.data.computerKnowing;
                                this.dicti.language = response.data.language;
                                this.dicti.motivation = response.data.motivation;
                                this.dicti.jobTime = response.data.jobTime;
                                this.dicti.haveCar = response.data.haveCar;
                                this.dicti.driverCard = response.data.driverCard;
                                this.dicti.socPacket = response.data.socPacket;
                                this.candidat.chief_mail = response.data.chief_mail[0];
                                // console.log(this.dicti.driverCard[0].Label[0]);

                                // this.driverCardOption = this.dicti.driverCard[0].Label[0];

                                // this.driverCardOption.push(this.dicti.driverCard[1].Label[0]);
                                // this.driverCardOption.push(this.dicti.driverCard[1].Label[0]);

                                // this.driverCardOptionRewrite = this.driverCardOption;
                                // console.log(this.driverCardOptionRewrite);

                                // Array.prototype.push.apply(this.driverCardOption, this.driverCardOptionRewrite);

                                // console.log(this.driverCardOption); // ['пастернак', 'картошка', 'сельдерей', 'свёкла']

                                // this.driverCardOptionRewrite = this.driverCardOption.push({'this.dicti.driverCard[1].Label[0]'});
                                // console.log(this.driverCardOptionRewrite);

                                // console.log(this.driverCardOption);


                                // Разбивает все элементы массива по 1, не подходит
                                this.driverCardOptionFirst = this.dicti.driverCard[1].Label[0];
                                this.driverCardOptionSecond = this.dicti.driverCard[3].Label[0];

                                this.driverCardOptionRewrite = this.driverCardOptionFirst.concat(this.driverCardOptionSecond);
                                console.log(this.driverCardOptionRewrite);
                                this.cityAdress = this.driverCardOptionRewrite;
                                this.preloader(false);
                            }
                        })
                        .catch(error => {
                            alert("Ошибка на стороне сервера");
                            this.preloader(false);
                        });
                }
            },
            // getDictiSecondTabOnClick(){
            //     // Проверка на пустоту объекта, если данных нет, они будут подгружаться
            //     if (this.dicti.workExpirience == ''
            //         || this.dicti.workExpirience == null
            //         || Object.keys(this.dicti.workExpirience).length == 0) {
            //         this.preloader(true);
            //         let dataIsn = {
            //             // 3994439
            //             'nameOfPost': 822411,
            //             'reason': 1764941,
            //             'desiredAge': 1764881,
            //             'sex': 750461,
            //             'education': 47,
            //             'workExpirience': 1777411,
            //             'isHeWasBoss': 482281,
            //             'typeOfHire': 1765371,
            //             'connect': 1765281,
            //             'computerKnowing': 1764851,
            //             'language': 67,
            //             'motivation': 482281,
            //             'jobTime': 815141,
            //             'haveCar': 482281,
            //             'driverCard': 1765001,
            //             'socPacket': 1765311,
            //         }
            //
            //         this.axios.post("/getDictiList", dataIsn)
            //             .then(response => {
            //                 if (response.data.success) {
            //                     this.dicti.structuralUnitAndCity = response.data.structuralUnitAndCity;
            //                     this.dicti.nameOfPost = response.data.nameOfPost;
            //                     this.dicti.reason = response.data.reason;
            //                     this.dicti.desiredAge = response.data.desiredAge;
            //                     this.dicti.sex = response.data.sex;
            //                     this.dicti.education = response.data.education;
            //                     this.dicti.workExpirience = response.data.workExpirience;
            //                     this.dicti.isHeWasBoss = response.data.isHeWasBoss;
            //                     this.dicti.typeOfHire = response.data.typeOfHire;
            //                     this.dicti.connect = response.data.connect;
            //                     this.dicti.computerKnowing = response.data.computerKnowing;
            //                     this.dicti.language = response.data.language;
            //                     this.dicti.motivation = response.data.motivation;
            //                     this.dicti.jobTime = response.data.jobTime;
            //                     this.dicti.haveCar = response.data.haveCar;
            //                     this.dicti.driverCard = response.data.driverCard;
            //                     this.dicti.socPacket = response.data.socPacket;
            //                     // console.log(this.dicti.driverCard[0].Label[0]);
            //
            //                     // this.driverCardOption = this.dicti.driverCard[0].Label[0];
            //
            //                     // this.driverCardOption.push(this.dicti.driverCard[1].Label[0]);
            //                     // this.driverCardOption.push(this.dicti.driverCard[1].Label[0]);
            //
            //                     // this.driverCardOptionRewrite = this.driverCardOption;
            //                     // console.log(this.driverCardOptionRewrite);
            //
            //                     // Array.prototype.push.apply(this.driverCardOption, this.driverCardOptionRewrite);
            //
            //                     // console.log(this.driverCardOption); // ['пастернак', 'картошка', 'сельдерей', 'свёкла']
            //
            //                     // this.driverCardOptionRewrite = this.driverCardOption.push({'this.dicti.driverCard[1].Label[0]'});
            //                     // console.log(this.driverCardOptionRewrite);
            //
            //                     // console.log(this.driverCardOption);
            //
            //
            //                     // Разбивает все элементы массива по 1, не подходит
            //                     this.driverCardOptionFirst = this.dicti.driverCard[1].Label[0];
            //                     this.driverCardOptionSecond = this.dicti.driverCard[3].Label[0];
            //
            //                     this.driverCardOptionRewrite = this.driverCardOptionFirst.concat(this.driverCardOptionSecond);
            //                     console.log(this.driverCardOptionRewrite);
            //                     this.cityAdress = this.driverCardOptionRewrite;
            //                     this.preloader(false);
            //                 }
            //             })
            //             .catch(error => {
            //                 alert("Ошибка на стороне сервера");
            //                 this.preloader(false);
            //             });
            //     }
            // },
            // При загрузке вызывает данные на фронт, если Изначально страница загружается на 2 вкладке
            getChiefsRequest(){
                if (this.recruitingTabs == 2){
                    this.preloader(true);
                    this.axios.post('/recruiting/getChiefsRequest')
                        .then(response => {
                            if (response.data.success) {
                                this.afterChiefsRequest(response.data);
                                this.preloader(false);
                            }
                        })
                        .catch(error => {
                            alert("Ошибка на стороне сервера");
                            this.preloader(false);
                        });
                }
            },
            getChiefsRequestOnClick(){
                if (this.chiefsDataLocal == '' || this.chiefsDataLocal == null || this.chiefsDataLocal == undefined){
                    this.preloader(true);
                    this.axios.post('/recruiting/getChiefsRequest')
                        .then(response => {
                            this.afterChiefsRequest(response.data);
                        })
                        .catch(error => {
                            alert("Ошибка на стороне сервера");
                        });
                }
            },
            afterChiefsRequest(data){
                if(data.success){
                    this.chiefsDataLocal = data.result;
                }  else{
                    alert('Ошибка, нет данных');
                }
            },
            getCandidatsDataRequest(){
                if (this.recruitingTabs == 2) {
                    this.axios.post('/recruiting/getCandidatsDataRequest')
                        .then(response => {
                            this.afterCandidatsDataRequest(response.data);
                        });
                }
            },
            getCandidatsDataRequestOnClick(){
                if (this.chiefsDataLocal == ''
                    || this.chiefsDataLocal == null
                    || Object.keys(this.chiefsDataLocal).length == 0) {
                    this.axios.post('/recruiting/getCandidatsDataRequest')
                        .then(response => {
                            this.afterCandidatsDataRequest(response.data);
                            this.preloader(false);
                        });
                }
            },
            afterCandidatsDataRequest(data){
                //console.log(data);
                //this.candidateInterviewTable = data.result;
                //console.log(this.candidateInterviewTable);

                if(data.success){
                    this.candidateInterviewTable = data.result;
                    this.candidatDataLocal = data.result;
                }  else{
                    alert('Ошибка, нет данных');
                }
            },
            afterCandidatsDataRequestOnClick(data){
                if(data.success){
                    this.candidateInterviewTable = data.result;
                    this.candidatDataLocal = data.result;
                }  else{
                    alert('Ошибка, нет данных');
                }
            },
            getCandidatsDataManualRequest(){
                if (this.recruitingTabs == 2) {
                    this.axios.post('/recruiting/getCandidatsDataManualRequest')
                        .then(response => {
                            this.afterCandidatsDataManualRequest(response.data);
                        });
                    //console.log(this.candidateManualDataLocal)
                }
            },
            getCandidatsDataManualRequestOnClick(){
                if (this.chiefsDataLocal == ''
                    || this.chiefsDataLocal == null
                    || this.chiefsDataLocal == undefined
                    || Object.keys(this.chiefsDataLocal).length == 0){
                    this.axios.post('/recruiting/getCandidatsDataManualRequest')
                        .then(response => {
                            this.afterCandidatsDataManualRequest(response.data);
                        });
                    //console.log(this.candidateManualDataLocal)
                }

            },
            afterCandidatsDataManualRequest(data){
                //console.log(data);
                //this.candidateInterviewTable = data.result;
                //console.log(this.candidateInterviewTable);
                    if(data.success){
                        this.candidateManualDataLocal = data.result;
                        this.candidateStorage = data.result;
                        // this.candidatDataLocal = data.result;
                    }  else{
                        alert('Ошибка, нет данных');
                    }
            },
            // this.candidateResultRequest.candidatName = 'qwerty';
            getResultRequest(){
                if (this.recruitingTabs == 3) {
                    this.preloader(true);
                    this.candidateResultRequest.candidatName = 'qwerty';
                    this.axios.post('/recruiting/getResultRequest')
                        .then(response => {
                            this.aftergetResultRequest(response.data);
                            this.preloader(false);
                        });
                    this.axios.post('/recruiting/getCandidatsDataRequest')
                        .then(response => {
                            this.afterCandidatsDataRequest(response.data);
                        });
                    this.candidateResultRequest.candidatName = 'qwerty';
                    // candidateInterviewTable.fullname
                }
            },
            getResultRequestOnClick(){
                if (this.candidateResultRequest.candidatName == ''
                    || this.candidateResultRequest == null
                    || Object.keys(this.candidateResultRequest).length == 0) {
                    this.preloader(true);
                    this.candidateResultRequest.candidatName = 'qwerty';
                    this.axios.post('/recruiting/getResultRequest')
                        .then(response => {
                            this.aftergetResultRequest(response.data);
                            this.preloader(false);
                        });
                    this.axios.post('/recruiting/getCandidatsDataRequest')
                        .then(response => {
                            this.afterCandidatsDataRequest(response.data);
                        });
                    this.candidateResultRequest.candidatName = 'qwerty';
                }
            },
            aftergetResultRequest(data){
                //console.log(data);
                //this.candidateInterviewTable = data.result;
                //console.log(this.candidateInterviewTable);
                if(data.success){
                    this.candidateResultRequest = data.result;
                    console.log(this.candidateResultRequest);
                    // this.candidatDataLocal = data.result;
                }  else{
                    alert('Ошибка, нет данных');
                }
            },
            firstTabClick(){
                this.getDictiOnClick();
                this.getBranchDataClick();
            },
            secondTabClick(){
                this.getChiefsRequestOnClick();
                this.getCandidatsDataRequestOnClick();
                this.getCandidatsDataManualRequestOnClick();
            },
            thirdTabClick(){
                this.getResultRequestOnClick();
            },
            interviewResultCheck: function(){
                if (this.recruitingData.interviewResult == 'Успешно прошел собеседование'){
                    this.resultCheckCounter = 'success';
                }
                else if (this.recruitingData.interviewResult == 'В ожидании собеседования'){
                    this.resultCheckCounter = 'pending';
                    this.numberOfUnitsModal = 1;
                }
                else if (this.recruitingData.interviewResult == 'Провалил собеседование'){
                    this.resultCheckCounter = 'failed';
                    this.numberOfUnitsModal = 2;
                }
                if (this.recruitingData.internshipResult == 'Успешно прошел стажировку'){
                    this.internshipResultCheckCounter = 'success';
                    this.numberOfUnitsModal = 0;
                }
                else if (this.recruitingData.internshipResult == 'Не прошел стажировку'){
                    this.internshipResultCheckCounter = 'failed';
                    this.numberOfUnitsModal = 0;
                }
            },
            fileUpload(e) {
                const documents = e.target.files;
                this.fileNameArr.push(e.target.files.name);
                console.log(e);
                console.log(this.fileNameArr);
                const vm = this;
                if(documents.length <= this.docMaxNumber) {
                    Array.from(documents).forEach(document => {
                        this.filesInfo.push(document.name);
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
                vm.filesInfo.splice(index, 1);
            },

            // uploadFile(candidateId) {
            //     this.preloader(true);
            //     this.axios.post("/upload-recruiting-file", this.getFormData(candidateId)).then(response => {
            //         //...
            //     }).catch(error => {
            //         alert("Ошибка на стороне сервера");
            //     });
            // },

            getFormData() {
                const formData = new FormData;
                this.documents.forEach(document => {
                    formData.append('postDocuments[]', document, document.name);
                });
                this.candidatsData.cityAdress =  this.candidatBackward.cityAdressSelect;
                this.candidatsData.recruitingId =  this.candidatBackward.id;
                this.candidatsData.documents =  this.candidatBackward.documents;
                this.candidatsData.recruiterFullname = this.user.branch.fullname;
                this.candidatsData.chiefMail = this.candidatBackward.chiefMail;
                formData.append("candidatsData", JSON.stringify(this.candidatsData));
                return formData;
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
                if (inner.interview_result == 'Успешно прошел собеседование'){
                    return 'forestgreen';
                } else if(inner.interview_result == 'Провалил собеседование'){
                    return 'colorRedImportant';
                } else if(inner.interview_result == 'В ожидании собеседования'){
                    return 'colororange';
                }
                if (inner.label == 'Успешно прошел стажировку'){
                    return 'forestgreen';
                } else if(inner.label == 'Не прошел стажировку') {
                    return 'colorRedImportant';
                }
            },
            modalSelectCheckSelect: function() {
                if (this.recruitingData.interviewResult == 'Успешно прошел собеседование'){
                    return 'forestgreen';
                }
                else if (this.recruitingData.interviewResult == 'Провалил собеседование'){
                    return 'colorRedImportant';
                }
                else if(this.recruitingData.interviewResult == 'В ожидании собеседования') {
                    return 'colororange';
                }
            },
            modalResultInternshipColor: function(){
                if (this.recruitingData.internshipResult == 'Успешно прошел стажировку'){
                    return 'forestgreen';
                }
                else if (this.recruitingData.internshipResult == 'Не прошел стажировку'){
                    return 'colorRedImportant';
                }
            },
            // Ошибка сохранения
            sendCandidatsApplication(){
                savedSuccess();
            },
            savedSuccess: function(){
                // Добавляем должность и имя руководителя, заполнившего заявку
                this.candidat.chiefsFullname = this.user.branch.fullname;
                this.candidat.chiefsDuty = this.user.branch.duty;
                //  Отправка данных на поиск кандидата
                for (var i = 1;i <= this.candidat.quantityPeople;i++){
                    this.axios.post('/recruiting/saveCandidat',{candidat: this.candidat, languages: this.newLanguageBlocks})
                        .then(response => {
                            this.afterSavedSuccess(response);
                        });
                }
            },
            afterSavedSuccess(response){
                if (response.data.success){
                    this.flashMessage.success({
                        title: "",
                        message: 'Кандидат успешно сохранен. Страница будет перезагружена через 3 секунд',
                        time: 5000
                    });
                    let timerId = setInterval(() => location.reload(), 3000);
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
            // created(){
            //     alert('Димон ты че курить ушел чтоль???');
            // }
    }
</script>

<style scoped>

</style>
