<template>
    <div>
        <header class="navbar contact_header">
            <a class="navbar-brand" href="/contact-center" style="font-size: 30px">Contact Center</a>
        </header>
        <div class="d-flex mb-5">
            <div class="contact_sidebar col-md-2" style="height: min-content">
                <div class="form-group"
                     v-for="item in itemsLevelZero">
                    <div class="row">
                        <div class="col-10">
                            <button @click="getLevelOne(item)" class="btn m-1" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                <b>{{item.name}}</b>
                            </button>
                        </div>
                        <div v-if="item.child.length && checkIsn" class="col-2">
                            <i @click="editColumn(item)" class="display-5 fa fa-pencil-square-o"></i>
                        </div>
                    </div>

<!--                    <i v-if="showS" class="ml-3 fa fa-trash"></i>-->
                    <div class="collapse" id="collapse1"

                         v-for="innerItem in itemsLevelOne"
                         v-if="innerItem.parent_id === item.id">
                        <div class="row">
                            <div class="col-10">
                                <button @click="getLevelTwo(innerItem)" class="btn m-1 ml-2" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    <em>{{innerItem.name}}</em>
                                </button>
                            </div>
                            <div v-if="checkIsn" class="col-2">
                                <i @click="editColumn(innerItem)" class="display-5 fa fa-pencil-square-o"></i>
                            </div>
                        </div>

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
<!--                <div v-show="approveSideRow">-->
<!--                    <div v-for="result in resultData">-->
<!--                        <div v-if="result.id === ''">-->
<!--                            <textarea v-model="result.name"></textarea>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="offset-10 pt-3">-->
<!--                    <button v-if="!approveSideRow" class="btn-primary"><i @click="addSideRow()" class="fa fa-plus"></i></button>-->
<!--                </div>-->
<!--                <button type="button" class="btn-primary" @click="editSidebar()">Редактировать боковую панель</button>-->
<!--                <button v-if="showS" type="button" class="btn btn-success">Сохранить</button>-->
            </div>

            <div v-if="editColumnMode" class="col-8">
                <div class="col-md-9" style="margin-left: 140px">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                        <h3>{{ parentName }}</h3>
                    </div>
                </div>
                <div class="offset-2 col-5">
                    <table class="table table-responsive-sm table-stripper table-data table-bordered">
                        <tbody>
                            <tr v-for="res in resultData" v-if="listPinned.length && res.id === listPinned[0].parent_id">
                                <td style="width: 4%">{{res.id}}</td>
                                <td class="col-3" v-if="editRowModeId !== res.id">{{res.name}}</td>
                                <td class="col-3" v-if="editRowMode && editRowModeId === res.id"><textarea v-model="res.name" style="width: 100%; height: 60px"></textarea></td>
                                <td class="col-1">
                                    <div class="form-group row">
                                        <button v-if="editRowModeId != res.id" class="btn-primary" style="margin-left: 10px;"><i @click="editRow(res)" class="fa fa-pencil-square-o"></i></button>
                                        <button v-if="editRowMode && editRowModeId == res.id" class="btn-primary" style="margin-left: 10px;"><i @click="approveRow(res)" class="fa fa-check"></i></button>
                                        <button class="btn-danger" style="margin-left: 10px;"><i @click="deleteRow(res)" class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <template v-for="item in listPinned">
                                <tr style="padding-bottom: 2px">
                                    <td style="width: 4%">{{item.parent_id}}.{{item.web_id}}</td>
                                    <td class="col-3" v-if="(!editRowMode && editRowModeId !== item.id) || (!addRowMode || addRowModeIndex !== item.web_id)">{{item.name}}</td>
                                    <td class="col-3" v-if="(editRowMode && editRowModeId === item.id) || (addRowMode && addRowModeIndex === item.web_id)"><textarea v-model="item.name" style="width: 100%; height: 60px"></textarea></td>
                                    <td class="col-1">
                                        <div class="form-group row">
                                            <button v-if="!editRowMode && editRowModeId !== item.id" class="btn-primary" style="margin-left: 10px;"><i @click="editRow(item)" class="fa fa-pencil-square-o"></i></button>
                                            <button v-if="(editRowMode && editRowModeId == item.id) || (addRowMode && addRowModeIndex === item.web_id)" class="btn-primary" style="margin-left: 10px;"><i @click="approveRow(item)" class="fa fa-check"></i></button>
                                            <button class="btn-danger" style="margin-left: 10px;"><i @click="deleteRow(item)" class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                    <div class="offset-10 pt-3">
                        <button class="btn-primary"><i @click="addRow()" class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>

            <div v-if="!editColumnMode">
                <div class="col-md-9" style="margin-left: 140px">
                    <div class="col-md-9" style="margin-left: 140px">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <h3>{{ levelOneName + slash + levelTwoName + slash + levelThreeName }}</h3>
                        </div>
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
<!--                        <h1 v-if="showG">Добро пожаловать!</h1>-->
<!--                        <div v-if="checkIsn">-->
<!--                            <button v-if="showH" type="button" class="btn btn-dark" @click="addField()">Добавить поле</button>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
            <h1 v-if="showG">Добро пожаловать!</h1>
            <div v-if="!editColumnMode && checkIsn">
                <button v-if="showH" type="button" class="btn btn-dark" @click="addField()">Добавить поле</button>
            </div>
        </div>
    </div>

    <!--    </div>-->
</template>

<script>
export default {
    name: "contact-center",
    props: {
        isn: '',
        result: {},
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
            itemsLevelZero: this.result,
            itemsLevelOne: [],
            itemsLevelTwo: [],
            selectedId: '',
            selectedParentId: '0',
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
            listPinned: [],
            editColumnMode: false,
            parentName: '',
            editRowMode: false,
            editRowModeId: '',
            editRowModeParentId: '',
            resultData: this.result,
            addRowMode: false,
            addRowModeIndex: '',
            approveSideRow: false,
        }
    },
    // mounted() {
    //     this.getNames();
    // },
    methods: {
        // getNames(){
        //     let data = {
        //         productName: this.productName
        //     }
        //     this.axios.post('/contact-center/getNames', data).then((response) => {
        //         this.name = response.data
        //         this.itemsLevelZero = response.data
        //     });
        // },
        addSideRow() {
            // var len = this.resultData.length;
            this.checkIsn = false
            this.approveSideRow = true;
            this.resultData[this.resultData.length] = {
                id: '',
                name: '',
                parent_id: 0,
                web_id: '',
            }
            this.checkIsn = this.isn == 3420047 || this.isn == 1287408 ? true : false
        },
        editColumn(item){
            this.editColumnMode = false;
            this.showG = false;
            this.texts = []
            // if(item.id !== this.selectedId || this.selectedId !== ''){
            //     this.listPinned = []
            // }
            this.listPinned = item.child
            this.editRowModeParentId = item.id
            this.parentName = item.name
            this.editRowMode = false
            this.addRowMode = false
            this.editColumnMode = true;
        },
        editRow(row){
            this.editRowMode = true;
            this.editRowModeId = row.id
            this.editColumnMode = true;
        },
        approveRow(row){
            if(row.id !== '' && row.name === ''){
                alert('Вы не можете сохранить без имени!')
            } else if(row.id === '' && row.name === ''){
                for (let i = 0; i < this.listPinned.length; i++) {
                    if (this.listPinned[i] === row) {
                        delete this.listPinned[i]
                        this.listPinned.splice(i, 1)
                    }
                }
            }else{
                let data = {
                    id: row.id,
                    name: row.name,
                    parentId: row.parent_id,
                }
                this.axios.post('/contact-center/approveRow', data)
                    .then(response => {
                        this.resultData = response.data.result
                    });
            }
            this.editColumnMode = false;
            this.editRowModeId = '';
            this.editRowMode = false;
            this.editColumnMode = true;
            this.addRowMode = false
            this.addRowModeIndex = ''
        },
        deleteRow(iten){
            this.editColumnMode = false;
            if (this.editRowModeParentId == iten.id || iten.child.length > 0){
                alert('Сперва удалите внутренние элементы!')
            }else{
                let data = {
                    id: iten.id
                }
                this.axios.post('/contact-center/deleteRow', data)
                    .then(response => {
                        if(response.data.error){
                            alert(response.data().error)
                        }else if(response.data.success){
                            alert('Успешно удалено!')
                        }
                    });
            }
            this.editColumnMode = true;
        },
        addRow(){
            this.editColumnMode = true;
            if (this.listPinned.length && this.listPinned[this.listPinned.length - 1].id=== '' && this.listPinned.length[this.listPinned.length - 1].name=== ''){
                console.log(this.listPinned.length,'1')
                delete this.listPinned[length-1];
                this.listPinned.splice(this.listPinned.length-1, 1);
                this.addRowModeIndex = '';
                this.addRowMode = false;
                this.editColumnMode = false;
                this.editColumnMode = true;
                this.editRowModeId = '';
            }else{
                console.log('2')
                console.log(this.listPinned.length)
                this.listPinned[this.listPinned.length] = {
                    id: '',
                    name: '',
                    parent_id: this.editRowModeParentId,
                    web_id: this.listPinned ? this.listPinned.length + 1 : 1,
                }
                this.editColumnMode = false;
                this.addRowMode = true;
                console.log(this.listPinned[this.listPinned.length])
                console.log('3')
                this.editRowModeId = '';
                this.addRowModeIndex = this.listPinned.length
                console.log(this.listPinned.length)
                this.addRowMode = true
                this.editColumnMode = true;
            }
        },
        getLevelOne: function(item){
            this.editColumnMode = false;
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
            this.editColumnMode = false;
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
            this.editColumnMode = false;
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

.display-5 {
    font-size: 1.5rem;
    font-weight: 100;
    line-height: 0.9;
    /*padding-left: 230px;*/
    /*position: inherit;*/
    margin-top: 12px;
}

ul, ol {
    /*width: 450px;*/
    margin: 30px auto;
}
ul li, ol li {
    width: 100px;
    float: left;
    margin-left: 50px;
}

</style>
