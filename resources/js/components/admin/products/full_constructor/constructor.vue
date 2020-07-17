<template>
    <div class="form-group col-md-12 col-lg-12 col-12 text-left row mt-3 box-block ml-0 mr-0" style="border-bottom:1px solid #ced4da;">
        <div class="col-12 mb-3">
            <span class="font-weight-bold" @click="parentChanged = true">{{ title[iIndex] }}</span>
            <input v-if="iIndex == 'participants' || iIndex == 'agrclauses' || iIndex == 'attributes'"
                   type="text"
                   v-model="parentisns[iIndex]"
                   v-show="parentChanged"
                   class="attr-input-text custom-input ml-3"
                   size="6">
            <button  v-if="parentChanged && iIndex == 'participants' || parentChanged && iIndex == 'agrclauses' || parentChanged && iIndex == 'attributes'"
                     type="button"
                     @click="getDicti(null,null,1)"
                     class="btn-info btn-lg btn float-right">Обновить</button>
            <button type="button" @click="addItem" class="btn-info btn-lg btn float-right">Добавить</button>
        </div>
        <div v-for="(item,index) in items" class="form-group col-md-4 col-lg-4 col-6 text-center">
            <treeselect v-model="item.ISN" :options="dictiOptions" @select="onChangeSelect($event,index)" />
            <label v-if="iIndex == 'attributes' && items[index].Childs != null || iIndex == 'agrclauses' && items[index].Childs != null">Поумолчанию</label>
            <treeselect v-if="iIndex == 'attributes' && items[index].Childs != null || iIndex == 'agrclauses' && items[index].Childs != null"
                        v-model="item.Value"
                        class="mt-1"
                        :options="items[index].Childs"
                        @select="onSelectChilds($event,index)" />
            <label v-if="iIndex == 'attributes' && items[index].Childs != null || iIndex == 'agrclauses' && items[index].Childs != null">Показать значения</label>
            <treeselect v-if="iIndex == 'attributes' && items[index].Childs != null || iIndex == 'agrclauses' && items[index].Childs != null"
                        v-model="item.selectedOptions"
                        class="mt-1"
                        :multiple="true"
                        :options="items[index].Childs"
                        :clearable="false"
                        @deselect="shownChilds(index,$event,'delete')"
                        @select="shownChilds(index,$event)"/>
            <div class="col-lg-12 row mt-3">
                <a @click="deleteItem(index)" class="col-lg-6 pl-0 pr-0">Удалить</a>
                <div class="col-lg-6 pl-0 pr-0">
                    <label :for="'required-'+iIndex+'-'+index" class="bold">Обязательное</label> <!--title[iIndex]-->
                    <input v-model="item.required" type="checkbox" :id="'required-'+iIndex+'-'+index">
                </div>
            </div>
            <div class="col-lg-12" v-if="iIndex == 'participants' && item.ISN == 2081 || iIndex == 'participants' && item.ISN == 2082">
                <label :for="'notPartIns-'+iIndex+'-'+index" class="bold">
                    Не является страх<span v-if="item.ISN == 2081">/застр</span>
                </label>
                <input v-model="item.notPartIns" type="checkbox" :id="'notPartIns-'+iIndex+'-'+index" class="mt-2 ml-1">
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name : "constructor",
        data() {
            return {
                parentChanged : false,
                dictiOptions : [],
                currentIndex : 0,
                title: {
                    formular : 'Формуляр',
                    participants : 'Участники',
                    attributes : 'Дополнительные атрибуты договора',
                    agrclauses : 'Оговорки и ограничения',
                    objects : 'Объекты',
                }
            }
        },
        props: {
            items : Array,
            iIndex : String,
            parentisns : Object,
            checkOptions : Object,
            preloader : Function
        },
        methods: {
            addItem(){
                this.items.push({
                    Label : '',
                    ISN : 0,
                    Childs : null,
                    required: false,
                    notPartIns: false
                });
            },
            deleteItem(id){
                this.items.splice(id,1);
            },
            getDicti(isn = null, index = null, getFromKias = null){         // Берем справочник из Киаса
                this.preloader(true);
                let ISN = isn != null ? isn : this.parentisns[this.iIndex];  //this.parent.isn;
                this.parentChanged = false;
                return this.axios.post('/calc/getDicti', {
                    ISN:ISN,
                    type:this.iIndex,
                    getFromKias: getFromKias
                })
                    .then(response => {
                        if(response.data.success){
                            if(isn == null) {
                                this.dictiOptions = response.data.result;
                            } else {
                                this.items[index].Childs = response.data.result;
                            }
                            this.preloader(false);
                        }else{
                            alert(response.data.error);
                            this.preloader(false);
                        }
                    })
                    .catch(error => {
                        alert(error);
                        this.preloader(false);
                    });
            },
            onChangeSelect: function(e,index){      // Создаем массив для вывода на фронте
                this.items[index].Childs = null;
                this.items[index].required = false;
                this.currentIndex = index;
                this.items[index].Value = null;
                if(this.iIndex == 'participants'){
                    this.items[index].extSystemKey = '';
                    this.items[index].firstName = '';
                    this.items[index].lastName = '';
                    this.items[index].patronymic = '';
                    this.items[index].subjISN = '';
                    this.items[index].orgName = '';
                    this.items[index].docType = '';
                    this.items[index].docClassISN = '';
                    this.items[index].docNumber = '';
                    this.items[index].docDate = '';
                    this.items[index].email = '';
                    this.items[index].phone = '';
                    this.items[index].sex = '';
                    this.items[index].juridical = '';
                    this.items[index].birthDay = '';
                    this.items[index].okvdName = '';
                    this.items[index].economicName = '';
                } else {
                    this.items[index].Type = e.Type;
                    this.items[index].NumCode = e.NumCode;
                    this.items[index].N_Kids = e.N_Kids;

                    // Begin если справочник, берем данные справочника из киаса
                    if(e.N_Kids == 1){
                        e.NumCode != '' ? this.getDicti(e.NumCode,index,1) : this.getDicti(e.id,index,1);
                        this.items[index].Type = 'DICTI';
                    } else {
                        if(e.Type == 'DICTI'){
                            e.NumCode != '' ? this.getDicti(e.NumCode,index,1) : this.getDicti(e.id,index,1);
                        }
                    }
                    // End
                }
                this.items[index].Label = e.Label;

                if(this.iIndex == 'attributes') {
                    this.items[index].AttrISN = e.id;
                }

                if(this.iIndex == 'agrclauses') {
                    //this.items[index].Type = 'DICTI';
                }
            },
            onSelectChilds(e,index){
                this.items[index].Value = e.id == 0 ? null : e.id;
            },
            shownChilds(itemIndex, e, remove){
                this.items[itemIndex].selected = this.items[itemIndex].selected ? this.items[itemIndex].selected : {};

                if(remove == undefined){
                    this.items[itemIndex].selected[e.id] = e;
                } else {
                    delete this.items[itemIndex].selected[e.id];
                }
            }
        },
        mounted(){
            if(this.iIndex == 'attributes' || this.iIndex == 'agrclauses') {
                this.getDicti();    // Получаем справочники из базы sql
            } else {
                this.getDicti(null,null,1);    // Получаем справочники из киаса
            }
        },
        watch: {
            dictiOptions(){
                this.checkOptions[this.iIndex] = true;
            }
        }
    }
</script>

<style scoped>
    .box-block {
        box-shadow: 0 0 5px 0.5px #888888;
        padding: 30px;
        border-radius: 10px;
    }

    .custom-input {
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
</style>