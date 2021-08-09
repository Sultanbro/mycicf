<template>
    <div>
        <header class="navbar contact_header">
            <a class="navbar-brand" href="/contact-center" style="font-size: 30px">Contact Center</a>
        </header>
        <div class="d-flex mb-5">
            <div class="contact_sidebar col-md-2" style="height: min-content">
                <div @click="getLevelOne(item)"
                     v-for="item in itemsLevelZero">
                    <button class="btn m-1" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                        <b>{{item.name}}</b>
                    </button>
<!--                    <i v-if="showS" class="ml-3 fa fa-trash"></i>-->
                    <div class="collapse" id="collapse1"
                         @click="getLevelTwo(innerItem)"
                         v-for="innerItem in itemsLevelOne"
                         v-if="innerItem.parent_id === item.id">
                        <button class="btn m-1 ml-2" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            <em>{{innerItem.name}}</em>
                        </button>
<!--                        <i v-if="showS" class="ml-3 fa fa-trash"></i>-->
                        <div class="collapse" id="collapse2"
                             @click="getLevelThree(innerItem_1)"
                             v-for="innerItem_1 in itemsLevelTwo"
                             v-if="innerItem_1.parent_id === innerItem.id">
                            <button class="btn m-1 ml-4">{{innerItem_1.name}}</button>
<!--                            <i v-if="showS" class="ml-3 fa fa-trash"></i>-->
                        </div>
                    </div>
                </div>
<!--                <button type="button" class="btn btn-primary" @click="editSidebar()">Редактировать боковую панель</button>-->
<!--                <button v-if="showS" type="button" class="btn btn-success">Сохранить</button>-->
            </div>

            <div class="col-md-9" style="margin-left: 140px">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h3>{{ levelOneName + slash + levelTwoName + slash + levelThreeName }}</h3>
                </div>
                <div class="mt-3">
                    <div class="pb-2 ct-myMainCont" v-for="(text, name_id) in texts">
                        <input v-if="text.editNameMode" type="text" v-model="text.name" style="width: 75%; height: 40px"/>
                        <button v-else type="button" class="col-md-9 ct-myBtn btn my-btn ct-myBottomSize" :data-target="`#hiInsIvOgpoVts_${name_id}`" @click="editMode1 =! editMode1">{{text.name}}</button>
                        <i v-if="editMode === name_id" @click="deleteField(text, name_id)" class="ml-3 fa fa-trash fa-lg" title="Удалить"></i>
                        <hr>
                        <div :id="`hiInsIvOgpoVts_${name_id}`">
                            <div v-if="editMode === name_id">
                                <div v-for="(text1, index) in text.labels" :key="index" v-if="!text1.deleted"
                                     style="display: flex; justify-content: flex-start; align-items: center">
                                    <textarea v-model="text.labels[index].text" style="width: 75%; height: 60px"></textarea>
                                    <button @click="deleteText(text, index, name_id)" type="button" class="btn btn-danger ml-3">Удалить</button>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-warning" @click="addText(name_id)">Добавить</button>
                                <button v-if="text.editNameMode && saveDoc" @click="text.editNameMode = false; saveDocument()" class="btn btn-success">Сохранить</button>
                            </div>
                            <div v-else>
                                <div v-for="text1 in text.labels" v-if="!text1.deleted">
                                    {{text1.text}}
                                    <hr>
                                </div>
                            </div>
                            <div v-if="checkIsn">
                                <button v-if="addChange && editMode === -1" type="button" class="btn btn-primary" @click="editDoc(name_id); text.editNameMode = true; changeData(texts)">Редактировать</button>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <h1 v-if="showG">Добро пожаловать!</h1>
                    <div v-if="checkIsn">
                        <button v-if="showH" type="button" class="btn btn-dark" @click="addField()">Добавить поле</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "contact-center",
    props: {
        isn: '',
    },
    data() {
        return {
            checkIsn: this.isn == 3420047 || this.isn == 1287408 ? true : false,
            wallRows: 1,
            wallCount: 0,
            wallPosts: [],
            wallPost: {
                text: ''
            },
            editText: '',
            texts: [],
            storedString: '',
            inputString: '',
            prevText: '',
            editMode: -1,
            editMode1: false,
            addChange: true,
            saveDoc: false,
            productName: '',
            itemsLevelZero: [],
            itemsLevelOne: [],
            itemsLevelTwo: [],
            selectedId: '',
            showH: false,
            showG: true,
            showS: false,
            levelOneName: '',
            levelTwoName: '',
            levelThreeName: '',
            slash: '',
            levelOnePinned: null,
            levelTwoPinned: null,
            loading: false,
        }
    },
    mounted() {
        this.getNames();
    },
    methods: {
        getNames(){
            let data = {
                productName: this.productName
            }
            this.axios.post('/contact-center/getNames', data).then((response) => {
                this.name = response.data
                this.itemsLevelZero = response.data
            });
        },
        getLevelOne: function(item){
            if(item.id !== this.selectedId || this.selectedId !== ''){
                this.texts = []
            }
            this.showG = false
            this.showH = false
            this.selectedId = item.id
            if(this.levelOnePinned === ''){
                this.levelOnePinned = item.id
                this.levelOneName = item.name
                this.itemsLevelOne = item.child
                this.showH = false
            }else if(this.levelOnePinned !== item.id && this.levelOnePinned !== ''){
                this.texts = []
                this.levelOnePinned = item.id
                this.showH = false
                this.itemsLevelOne = item.child
                this.levelOneName = item.name
                this.levelTwoName = ''
                this.levelThreeName = ''
            }
        },
        getLevelTwo: function(innerItem) {
            if(innerItem.id !== this.selectedId || this.selectedId !== ''){
                this.texts = []
            }
            this.selectedId = innerItem.id
            if(this.levelTwoPinned === ''){
                this.levelTwoPinned = innerItem.id
                this.levelTwoName = innerItem.name
                this.itemsLevelTwo = innerItem.child
                this.showH = false
            }else if(this.levelTwoPinned !== innerItem.id && this.levelTwoPinned !== ''){
                this.texts = []
                this.levelTwoPinned = innerItem.id
                this.showH = false
                if(innerItem.child.length === 0){
                    this.getDocuments(innerItem.id)
                    this.levelTwoName = innerItem.name
                    this.showH = true
                }else{
                    this.itemsLevelTwo = innerItem.child
                    this.levelTwoName = innerItem.name
                    this.levelThreeName = ''
                }
            }
            this.slash = '/'
        },
        getLevelThree: function(innerItem_1){
            if(innerItem_1.id !== this.selectedId || this.selectedId !== ''){
                this.texts = []
            }
            this.selectedId = innerItem_1.id
            this.itemsLevelThree = innerItem_1.child
            this.levelThreeName = innerItem_1.name
            this.getDocuments(innerItem_1.id)
            this.showH = true
        },
        changeData(texts){
            this.texts = [];
            this.texts = texts;
        },
        getDocuments(id){
            let data = {
                id: id
            }
            this.loading = true
            this.axios.post("/contact-center/getDocuments", data)
                .then(response => {
                    if (response.data.success) {
                        this.texts = response.data.data;
                        this.showH = true
                        this.selectedId = id
                    }else{
                        alert("No")
                    }
                    this.loading = false
                });
        },
        setDocument() {
            const vm = this
            this.axios.post("contact-center/setDocument", {texts: this.texts})
                .then(response => {
                    if (response.data.success) {
                        vm.texts = response.data.data
                    }else{
                        let errorText = response.data.error;
                        alert("No")
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
            this.setDocument();
        },
        editDoc(index) {
            this.editMode = index
            this.saveDoc = true
        },
        // editSidebar() {
        //     this.showS = true
        // },
        addField() {
            this.texts.push({
                name : 'Текст',
                original : '',
                deleteText : false,
                deleted : false,
                editMode : false,
                labels : [],
                id : null,
                name_id: this.selectedId
            })
        },
        addText(index) {
            this.texts[index].labels.push({
                'text' : '',
                'original' : '',
                'deleted' : false,
                'id' : null
            })
            this.editMode = index
            this.saveDoc = true
        },
        deleteField(text, index) {
            if(confirm('Вы действительно хотите удалить?')) {
                let data = {
                    id: text.id
                }
                this.axios.post('/contact-center/deleteField', data).then(response => {
                    if(response.data.success){
                        // alert('Вы успешно удалили!')
                    } else {
                        this.loading = false
                        alert('Не удалось удалить!')
                    }
                });
                this.texts.splice(index, 1)
            }
            this.editMode = -1
            text.editNameMode = false
        },
        deleteText(text, index, parentIndex) {
            if(confirm('Вы действительно хотите удалить?')) {
                let data = {
                    idLabel: this.texts[parentIndex].labels[index].id
                }
                this.loading = true
                this.axios.post('/contact-center/deleteField', data).then(response => {
                    if (response.data.success) {
                        // alert('Вы успешно удалили!')
                    } else {
                        this.loading = false
                        alert('Не удалось удалить!')
                    }
                });
                text.labels.splice(index, 1)
            }
            this.editMode = -1
            text.editNameMode = false
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
    margin-right: 15%;
}

.contact_sidebar .btn {
    white-space: normal;
    text-align: left;
}

</style>
