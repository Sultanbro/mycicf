<template>
    <div class="container-fluid">
        <div class="justify-content-center navbar navbar-dark flex-md-nowrap shadow m-2 ct-myHeaderBg" style="background: #4267b2">
            <a class="navbar-brand" href="#">Centras Insurance</a>
            <a class="navbar-brand" href="#">Антисловарь</a>
        </div>
        <div class="row">
            <div class="col-md-3">
                <nav class="col-md-10 d-md-block bg-light sidebar collapse" style="border: 1px double gray;">
                    <div class="position-sticky pt-3">
                        <ul class="list-unstyled">
                            <li>
                                <button class="btn d-inline-flex align-items-center collapsed" data-toggle="collapse" href="#consultation" aria-expanded="false"  aria-controls="collapseExample">Консультация</button>
                                <ul class="list-unstyled ps-3 collapse" id="consultation">
                                    <li>
                                        <button class="btn d-inline-flex align-items-center collapsed pointer" data-toggle="collapse" href="#mustHaveType" aria-expanded="false" aria-controls="collapseExample">
                                            <strong>Обязательные виды</strong>
                                        </button>
                                        <ul class="list-unstyled ps-3 collapse" id="mustHaveType">
                                            <div>
                                                <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">ОГПО ВТС</li>
                                                <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">ОГПО ПП</li>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <button class="btn d-inline-flex align-items-center collapsed pointer" data-toggle="collapse" href="#notMustHaveType" aria-expanded="false" aria-controls="collapseExample"><strong>Добровольные виды</strong></button>
                                        <ul class="list-unstyled ps-3 collapse" id="notMustHaveType">
                                            <div>
                                                 <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">Каско</li>
                                                <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">МСТ</li>
                                            </div>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <button class="btn d-inline-flex align-items-center collapsed" data-toggle="collapse" href="#creatContract" aria-expanded="false" aria-controls="collapseExample">Оформить договор</button>
                                <ul class="list-unstyled ps-3 collapse" id="creatContract">
                                    <li>
                                        <button class="btn d-inline-flex align-items-center collapsed pointer" data-toggle="collapse" href="#creatMustHaveType" aria-expanded="false" aria-controls="collapseExample"><strong>Обязательные виды</strong></button>
                                        <ul class="list-unstyled ps-3 collapse" id="creatMustHaveType">
                                            <div>
                                                <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">ОГПО ВТС</li>
                                                <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">ОГПО ПП</li>
                                            </div>
                                        </ul>

                                    </li>
                                    <li>
                                        <button class="btn d-inline-flex align-items-center collapsed pointer" data-toggle="collapse" href="#creatNotMustHaveType" aria-expanded="false" aria-controls="collapseExample"><strong>Добровольные виды</strong></button>
                                        <ul class="list-unstyled ps-3 collapse" id="creatNotMustHaveType">
                                            <div>
                                                <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">Каско</li>
                                                <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">МСТ</li>
                                                <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">Несчастные случаи</li>
                                            </div>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <button class="btn d-inline-flex align-items-center collapsed" data-toggle="collapse" href="#insuredEvent" aria-expanded="false" aria-controls="collapseExample">Страховой случай</button>
                                <ul class="list-unstyled ps-3 collapse" id="insuredEvent">
                                    <li>
                                        <button class="btn d-inline-flex align-items-center collapsed pointer" data-toggle="collapse" href="#insuredEventType" aria-expanded="false" aria-controls="collapseExample"><strong>Зарегистрировать</strong></button>
                                        <ul class="list-unstyled ps-3 collapse" id="insuredEventType">
                                            <div>
                                                <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">ОГПО ВТС</li>
                                                <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">Каско</li>
                                            </div>
                                        </ul>

                                    </li>
                                    <li>
                                        <button class="btn d-inline-flex align-items-center collapsed pointer" data-toggle="collapse" href="#insuredEventDSV" aria-expanded="false" aria-controls="collapseExample"><strong>Выплата/Оценка</strong></button>
                                        <ul class="list-unstyled ps-3 collapse" id="insuredEventDSV">
                                            <div>
                                                <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">Каско</li>
                                                <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">МСТ</li>
                                                <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">Несчастные случаи</li>
                                            </div>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="col-md-9">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Страховой случай/Регистрация/ОГПО ВТС</h2>
                </div>
                <div class="mt-3">
                    <div class="form-row">
                        <div class="container pb-2 ct-myMainCont" v-for="(text, parentIndex) in texts">
                            <input v-if="text.editNameMode" type="text" v-model="text.name" style="width: 91%; height: 40px;"/>
                            <button v-else type="button" class="col-md-11 ct-myBtn btn my-btn ct-myBottomSize" data-toggle="collapse" :data-target="`#hiInsIvOgpoVts_${parentIndex}`" @click="editMode1 =! editMode1">{{text.name}}</button>
                            <i v-if="text.editNameMode" @click="text.editNameMode = false" class="ml-3 fa fa-check fa-lg" title="Сохранить"></i>
                            <i v-else @click="text.editNameMode = true" class="ml-3 fa fa-pencil fa-lg" title="Изменить"></i>
                            <i @click="deleteField(parentIndex)" class="ml-3 fa fa-trash fa-lg" title="Удалить"></i>
                            <hr>
                            <div :id="`hiInsIvOgpoVts_${parentIndex}`" class="collapse">
                                <div v-if="editMode === parentIndex">
                                    <div v-for="(text1, index) in text.labels" :key="index">
                                        <div>
                                            <textarea v-model="text.labels[index]" style="width: 90%; height: 60px"></textarea>
                                            <button @click="deleteText(text, index, parentIndex)" type="button" class="btn btn-danger mt-2" style="float: right;">Удалить</button>
                                            <hr>
                                        </div>
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
                        <button type="button" class="btn btn-primary" @click="addField()">Добавить</button>
                    </div>
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
        saveDocument() {
            var texts = this.texts
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
.col-md-10 {
    margin-top: 10px;
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

</style>
