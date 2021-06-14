<template>
    <div>
        <header class="navbar contact_header">
            <a class="navbar-brand" href="#">Contact Center</a>
            <a class="navbar-brand" href="#">Проверка валидности полиса</a>
            <a class="navbar-brand" href="#">Поиск сотрудников в Киасе (выгрузка отчета)</a>
        </header>
        <div class="d-flex">
            <div class="contact_sidebar col-md-2">
                <ul class="list-unstyled">
                    <li>
                        <button class="btn d-inline-flex align-items-center collapsed" data-toggle="collapse"
                            href="#consultation" aria-expanded="false" aria-controls="collapseExample"><strong>Страхование</strong>
                        </button>
                        <ul class="list-unstyled ps-3 collapse" id="consultation">
                            <li>
                                <button class="btn d-inline-flex align-items-center collapsed CC_sidebar_item"
                                        data-toggle="collapse" href="#mustHaveType" aria-expanded="false"
                                        aria-controls="collapseExample">
                                    <em>Обязательные виды</em>
                                </button>
                                <ul class="list-unstyled ps-3 collapse" id="mustHaveType">
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">ОГПО ВТС</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">ОГПО ПП</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">ОГПО владельцев опасных
                                        объектов</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">ОС Экологическое</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">ОГПО Частных нотариусов</a>
                                    </li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">ОГПО аудиторских
                                        организаций </a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">ОС НС</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">ОС МС</a></li>
                                </ul>
                            </li>
                            <li>
                                <button class="btn d-inline-flex align-items-center collapsed CC_sidebar_item"
                                        data-toggle="collapse" href="#notMustHaveTypeMed" aria-expanded="false"
                                        aria-controls="collapseExample"><em>Добровольное медицинское</em>
                                </button>
                                <ul class="list-unstyled ps-3 collapse" id="notMustHaveTypeMed">
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">ДМС физ. лица (Комфорт,
                                        Конструктор долголетия, Премиум)</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">ДМС юр. Лица</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">Программа Малыш</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">Эконом XP</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">МСТ</a></li>
                                </ul>
                            </li>
                            <li>
                                <button class="btn d-inline-flex align-items-center collapsed CC_sidebar_item"
                                        data-toggle="collapse" href="#accident" aria-expanded="false"
                                        aria-controls="collapseExample"><em>Несчастных случаев</em></button>
                                <ul class="list-unstyled ps-3 collapse" id="accident">
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">Авто НС</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">НС заемщика</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">НС водителя</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">НС выбор</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">ДС пассажиров от НС (возд.,
                                        железн.)</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">ДС JUMP</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">Страхование банковских
                                        карт</a></li>
                                </ul>
                            </li>
                            <li>
                                <button class="btn d-inline-flex align-items-center collapsed CC_sidebar_item"
                                        data-toggle="collapse" href="#notMustHaveTypeProperty" aria-expanded="false"
                                        aria-controls="collapseExample"><em>Добровольное имущественное</em>
                                </button>
                                <ul class="list-unstyled ps-3 collapse" id="notMustHaveTypeProperty">
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">Страхование грузов</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">Титульное страхование</a>
                                    </li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">Страхование ГПО</a></li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">Страхование имущества</a>
                                    </li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">Страхование финансовых
                                        рисков</a></li>
                                </ul>
                            </li>
                            <li>
                                <button class="btn d-inline-flex align-items-center collapsed CC_sidebar_item"
                                        data-toggle="collapse" href="#notMustHaveTypeComplex" aria-expanded="false"
                                        aria-controls="collapseExample"><em>Добровольное комплексное</em>
                                </button>
                                <ul class="list-unstyled ps-3 collapse" id="notMustHaveTypeComplex">
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">ДКСП</a>
                                    </li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">ДКСП+ХКБ</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <button class="btn d-inline-flex align-items-center collapsed CC_sidebar_item"
                                        data-toggle="collapse" href="#InsurPledged" aria-expanded="false"
                                        aria-controls="collapseExample"><em>Страхование в залоге</em></button>
                                <ul class="list-unstyled ps-3 collapse" id="InsurPledged">
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">Имущество в залоге</a>
                                    </li>
                                    <li><a href="#" aria-expanded="false"
                                           aria-controls="collapseExample" class="CC_sidebar_item">Авто в залоге</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <button class="btn d-inline-flex align-items-center collapsed" data-toggle="collapse"
                                href="#creatRequest" aria-expanded="false" aria-controls="collapseExample"><strong>Оформление
                            заявки</strong>
                        </button>
                        <ul class="list-unstyled ps-3 collapse" id="creatRequest">
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Оформление заявки по покупке полиса через
                                менеджера</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Оформление заявки по услугам карты
                                ПНД</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Оформление заявки по услугам Авто
                                каско</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Оформление заявки
                                переоформление/расторжение для менеджера</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <button class="btn d-inline-flex align-items-center collapsed" data-toggle="collapse"
                                href="#insuredEvent" aria-expanded="false" aria-controls="collapseExample"><strong>Страховой
                            случай</strong>
                        </button>
                        <ul class="list-unstyled ps-3 collapse" id="insuredEvent">
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Страховой случай для ТС (ОГПО ВТС, ГПО
                                ВТС)</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Страховой случай для ТС (Каско, Мини
                                Каско, Двухсторонка)</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Страховой случай для имущества</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Страховой случай для грузов</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <button class="btn d-inline-flex align-items-center collapsed" data-toggle="collapse"
                                href="#instruction" aria-expanded="false" aria-controls="collapseExample"><strong>Инструкция/скрипты</strong>
                        </button>
                        <ul class="list-unstyled ps-3 collapse" id="instruction">
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Антисловарь</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Как рассчитать переоформление</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Краткая инструкция подачи сообщения о
                                страховом случае через сайт Купиполис</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Памятка от выплатников и аджастеров</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Полезные фразы</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Посмотреть ДТП по всем сотрудникам
                                колл-центра в БД Киас</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Создание заявки на возврат денег «день в
                                день» для УРИП</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Создание заявки. Ошибки по купиполис.</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Скрипты для входящей линии</a>
                            </li>
                            <li><a href="#" aria-expanded="false"
                                   aria-controls="collapseExample" class="CC_sidebar_item">Скрипты для исходящей линии</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-md-9" style="margin-left: 140px">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h2>Страховой случай/Регистрация/ОГПО ВТС</h2>
                </div>
                <div class="mt-3">
                    <div class="pb-2 ct-myMainCont" v-for="(text, parentIndex) in texts">
                        <input v-if="text.editNameMode" type="text" v-model="text.name" style="width: 75%; height: 40px;"/>
                        <button v-else type="button" class="col-md-9 ct-myBtn btn my-btn ct-myBottomSize" data-toggle="collapse" :data-target="`#hiInsIvOgpoVts_${parentIndex}`" @click="editMode1 =! editMode1">{{text.name}}</button>
                        <i v-if="text.editNameMode" @click="text.editNameMode = false" class="ml-3 fa fa-check fa-lg" title="Сохранить"></i>
                        <i v-else @click="text.editNameMode = true" class="ml-3 fa fa-pencil fa-lg" title="Изменить"></i>
                        <i @click="deleteField(parentIndex)" class="ml-3 fa fa-trash fa-lg" title="Удалить"></i>
                        <hr>
                        <div :id="`hiInsIvOgpoVts_${parentIndex}`" class="collapse">
                            <div v-if="editMode === parentIndex">
                                <div v-for="(text1, index) in text.labels" :key="index">
                                    <textarea v-model="text.labels[index]" style="width: 75%; height: 60px"></textarea>
                                    <button @click="deleteText(text, index, parentIndex)" type="button" class="btn btn-danger ml-3">Удалить</button>
                                    <hr>
                                </div>
                                <button v-if="saveDoc" type="button" class="btn btn-success" @click="saveDocument()">Сохранить</button>
                                <button type="button" class="btn btn-primary" @click="addText(parentIndex)">Добавить поле</button>
                            </div>
                            <div v-else>
                                <div v-for="text1 in text.labels">
                                    {{text1}}
                                    <hr>
                                </div>
                            </div>
                            <button v-if="addChange && editMode === -1" type="button" class="btn btn-primary" @click="editDoc(parentIndex)">Редактировать</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-dark" @click="addField()">Добавить</button>
                    <button type="button" class="btn btn-dark" @click="getPosts()">Проверка</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "contact-center",
    data() {
        return {
            wallRows: 1,
            wallCount: 0,
            wallPosts: [],
            wallPost: {
                text: ''
            },
            editText: '',
            texts: [
                {
                    name: "Приветствие",
                    editNameMode : false,
                    deleteText :false,
                    labels: [
                        'Добрый день, Страховая компания Сентрас Иншуранс (имя менеджера).',
                        'Уважаемый клиент, я Вас слушаю/Чем я могу Вам помочь? / в случае, если клиент после приветствия молчит.',
                        'Уважаемый клиент, скажите пож-та, как я могу к Вам обращатся? / Скажите пож-та, как Вас зовут?',
                        'Имя клиента - очень приятно.'
                    ]
                },
            ],
            storedString: '',
            inputString: '',
            prevText: '',
            editMode: -1,
            editMode1: false,
            addChange: true,
            saveDoc: false,
        }
    },
    methods: {
        getPosts() {
            this.preloader(true);
            this.axios.post("contact-center/test", {labels: this.labels})
                .then(response => {
                    if (response.data.success) {
                        return "Yes"
                    }else{
                        let errorText = response.data.error;
                        return "No"
                    }
                });
        },
        saveDocument() {
            let texts = this.texts
            texts.forEach((text, index) => {
                let newText = text.labels.filter(function(value){
                    return value !== ''
                })
                texts[index].labels = newText
            });
            this.texts = texts
            this.addChange = true
            this.saveDoc = false
            this.editMode = -1
        },
        editDoc(index) {
            this.editMode = index
            this.saveDoc = true
        },
        deleteText(text, index, parentIndex) {
            if(confirm('Вы действительно хотите удалить?'))
            this.texts[parentIndex].labels.splice(index, 1)
        },
        addField() {
            this.texts.push({
                name : 'Текст',
                editNameMode : false,
                labels: [
                    'Текст'
                ]
            })
        },
        addText(index) {
            this.texts[index].labels.push('')
            this.editMode = index
            this.saveDoc = true
        },
        deleteField(index) {
            if(confirm('Вы действительно хотите удалить?'))
            this.texts.splice(index, 1)
        },
    }
}
</script>

<style scoped>

/* Contact Center Sidebar */
.contact_sidebar {
    border: 1px double gray;
    position: sticky;
    margin-left: 10px
}

.contact_sidebar ul li {
    padding: 10px 0 10px 0;
}

.CC_sidebar_item{
    cursor: pointer;
    text-decoration: none;
    color: black;
}

/* Contact Center Header */
.contact_header {
    background-color: #4267b2;
    margin: 10px 0;
    display: flex;
    justify-content: center;
}

.contact_header a {
    color: white;
    margin: 0 20px;
}

.ct-myBtn{
    color: #212529;
    background-color: #fafafa;
    border: 1px double black;
}

.ct-myBtn:hover {
    color: #fafafa;
    background-color: #4974cc;
    border:0;
}

.my-btn:focus {
    box-shadow: none;
}

.fa {
    cursor: pointer;
}

hr {
    width: 70%;
}

</style>
