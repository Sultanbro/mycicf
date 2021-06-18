<template>
    <div>
        <div v-if="!editMode">
            <table class="table table-responsive-sm table-stripper table-data table-bordered">
                <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Текст</th>
                    <th>Родительский элемент</th>
                    <!--                <th>URL</th>-->
                    <th>URL иконки</th>
                    <th>Операции</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in list">
                    <td>{{item.id}}</td>
                    <td>{{item.label}}</td>
                    <td>{{item.parent}}</td>
                    <!--                <td>{{item.url}}</td>-->
                    <td>{{item.icon_url}}</td>
                    <td>
                        <button v-if="item.child_count === 0" @click="getEditMode(item.id, item.label)" class="btn btn-primary btn-sm">
                            Изменить
                            <i class="fas fa-pen"></i>
                        </button>
<!--                        <button  v-if="item.child_count === 0" @click="deleteItem(item.id)" class="btn btn-danger btn-sm">-->
<!--                            Удалить-->
<!--                            <i class="fas fa-trash"></i>-->
<!--                        </button>-->

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div v-if="editMode">
            <div>
                <button class="btn btn-secondary" @click="getBack">Назад</button>
            </div>
            <table class="table table-responsive-sm table-stripper table-data table-bordered">
                <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Имя документа</th>
                    <th>Родительский элемент</th>
                    <th>URL</th>
                    <th>Операции</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="doc in docFile">
                    <td>{{ doc.id }}</td>
                    <td><input v-model="doc.docfile"></td>
                    <td>{{ editLabel }}</td>
                    <td>{{ doc.profile }}</td>
                    <td>
                        <button @click="deleteItem(doc)" class="btn btn-danger btn-sm">
                            Удалить
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr v-if="addDocumentItem" v-for="(doc, index) in docFileNew" >
                    <td></td>
                    <td><input v-model="doc.docfile"></td>
                    <td>{{ editLabel }}</td>
                    <td>
<!--                        <form :id="index">-->
                            <label class="btn btn-default btn-file" for="file"></label>
                            <input id="file && index" type="file" @change="fileUploaded" @click="fileUpload(index)" :data-index="index">
<!--                        </form>-->
                    </td>
                    <td>
                        <button @click="deleteItem(doc)" class="btn btn-danger btn-sm">
                            Удалить
                            <i class="fas fa-trash"></i>
                        </button>
                        <div v-if="savedIndex === index && !savedFile">
                            <button @click="savePdf(doc, index)" class="btn btn-primary btn-sm">
                                Сохранить файл
                                <i class="fas fa-pen"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-2" v-if="addDoc">
                    <button @click="addDocument(editId, editLabel)" class="btn btn-primary btn-sm">
                        Добавить документ
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
<!--                <div class="offset col-md-2" v-if="addDoc">-->
<!--                    <button @click="saveDocument()" class="btn btn-primary btn-sm">-->
<!--                        Сохранить-->
<!--                        <i class="fas fa-pen"></i>-->
<!--                    </button>-->
<!--                </div>-->
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "menu-list",
        data() {
            return {
                list : [],
                editMode: false,
                editId: '',
                editLabel: '',
                docFile: [],
                addDocumentItem: false,
                docFileNew: [],
                files: null,
                filename : 'Выберите файл',
                id: '',
                clickedId: '',
                savedFile: false,
                savedIndex: '',
                addDoc: true,
            }
        },
        mounted() {
            this.getList()
        },
        methods: {
            getList() {
                this.axios.post('/productsinfo/get/menuList', {})
                    .then(response => {
                        if(response.data.success){
                            this.list = response.data.list
                        }else{
                            alert(response.data.error)
                        }
                    })
                    .catch(error => {
                        alert(error)
                    });
            },
            getEditMode(id, label){
                this.editMode = true;
                this.editId = id;
                this.editLabel = label;
                this.axios.post('/productsinfo/getEditMenu', {id: id}).then(response => {
                    this.docFile = response.data.result
                });
            },
            addDocument(editId, editLabel){
                this.editMode = false;
                this.editMode = true;
                let i = this.docFileNew.length
                this.docFileNew[i] = {
                    docfile: "",
                    id: '',
                    product_id: editId,
                    profile: "Файл не выбран",
                }
                this.addDocumentItem = true
                this.savedFile = false;
                this.savedIndex = i
                this.addDoc = false;
            },
            fileUploaded(e){
                let data = new FormData();
                var file = e.target.files;
                this.filename = file[0].name;
                this.files = file[0];
                this.docFileNew[this.clickedId].profile = this.filename
                var lastDotPosition = this.filename.lastIndexOf(".");
                var fileNameWithoutExt = this.filename.slice(0, lastDotPosition)
                this.docFileNew[this.clickedId].docfile = fileNameWithoutExt
                this.editMode = false;
                this.editMode = true;
            },
            fileUpload(index){
                this.clickedId = index;
            },
            savePdf(doc, index){
                if(doc.profile === 'Файл не выбран'){
                    alert('Выберите файл!!!');
                    return
                }
                for (let i = 0; i < this.docFile.length; i++) {
                    var splits = this.docFile[i].profile.split('/');
                    if (splits[splits.length-1] === doc.profile) {
                        alert('в '+this.editLabel+' уже есть файл с таким именем');
                        return;
                    }
                }
                this.axios.post('/productsinfo/save_pdf', this.getFormData(), )
                    .then(response => {
                        if(response.data.success == false){
                            alert(response.data.error)
                        } else {
                            // this.url = response.data.url
                            this.savedFile = true
                            this.savedIndex = index
                            this.addDoc = true
                            this.saveDocument(doc, index);
                            alert('Файл успешно сохранено!');
                        }
                    })
            },
            saveDocument(doc, index) {

                this.axios.post('/productsinfo/save_file', {doc})
                    .then(response => {
                        if(response.data.success){
                            doc.id = response.data.id
                            this.docFile.push(doc);
                            if(this.docFileNew.length === 1){
                                this.docFileNew = [];
                            } else if(this.docFileNew.length > 1){
                                for(let i=0; i<this.docFileNew.length; i++){
                                    if(this.docFileNew[i].docfile === doc.docfile){
                                        delete this.docFileNew[i]
                                        this.docFileNew.splice(i, 1)
                                    }
                                }
                            }
                        }
                    })
            },
            getFormData() {
                let formData = new FormData();
                formData.append('file', this.files);
                // let form = [formData, this.docFile, this.docFileNew];
                return formData;
            },
            deleteItem(doc){
                if(!doc.id){
                    for (let i = 0; i < this.docFileNew.length; i++) {
                        if (this.docFileNew[i] === doc) {
                            if(this.docFileNew.length === 1) {
                                this.docFileNew = []
                            }else {
                                delete this.docFileNew[i]
                                this.docFile.splice(i, 1)
                                this.filename = 'Выберите файл'
                                this.files = null
                            }
                            this.savedFile = true;
                            this.addDoc = true
                            this.addDocumentItem = false
                            return
                        }
                    }
                }
                this.axios.post('/productsinfo/deleteItem', {doc})
                    .then(response => {
                        if(response.data.success) {
                            // location.reload();
                            if (doc.id) {
                                for (let i = 0; i < this.docFile.length; i++) {
                                    if (this.docFile[i].id === doc.id) {
                                        delete this.docFileNew[i]
                                        delete this.docFile[i]
                                        this.docFile.splice(i, 1)
                                        this.savedFile = false;
                                    }
                                    this.filename = 'Выберите файл'
                                    this.file = null
                                }
                            } else {
                                for (let i = 0; i < this.docFileNew.length; i++) {
                                    if (this.docFileNew[i].profile === doc.profile) {
                                        delete this.docFileNew[i]
                                        this.docFileNew.splice(i, 1)
                                        this.savedFile = false;
                                    }
                                    if (this.docFileNew[i] === doc) {
                                        delete this.docFileNew[i]
                                        this.docFileNew.splice(i, 1)
                                        this.savedFile = false;
                                        // return;
                                    }
                                }
                            }
                            alert('Файл успешно удалено!');
                        }else{
                            alert(response.data.error);
                            for (let i = 0; i < this.docFile.length; i++) {
                                if (this.docFile[i].profile === doc.profile) {
                                    delete this.docFile[i]
                                    this.docFile.splice(i, 1)
                                    this.savedFile = false;
                                }
                            }
                        }
                    })
                    .catch(error => {
                        alert(error)
                    });
            },
            getBack(){
                location.reload();
            },
        },
    }


</script>
