<template>
    <div class="form-group col-md-12 col-lg-12 col-12 text-left row mt-3 box-block ml-0 mr-0" style="border-bottom:1px solid #ced4da;">
        <div class="col-12 mb-3">
            <span class="font-weight-bold" @click="parentChanged = true">{{ title[iIndex] }}</span>
            <input type="text" v-model="parentisns[iIndex]" v-show="parentChanged" class="attr-input-text custom-input ml-3"  size="6">
            <button type="button" v-if="parentChanged" @click="getDicti()" class="btn-info btn-lg btn float-right">Обновить</button>
            <button type="button" @click="addItem" class="btn-info btn-lg btn float-right">Добавить</button>
        </div>
        <div v-for="(item,index) in items" class="form-group col-md-4 col-lg-4 col-6 text-center">
            <treeselect v-model="item.ISN" :options="itemsConstructor" @select="onChangeSelect($event,index)" />
            <a @click="deleteItem(index)">Удалить</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "constructor",
        data() {
            return {
                parentChanged: false,
                itemsConstructor: [],
                currentIndex: 0,
                title: {
                    formular:'Формуляр',
                    participants:'Участники',
                    attributes:'Дополнительные атрибуты договора',
                    agrclause:'Оговорки и ограничения',
                    objects:'Объекты',
                },
            }
        },
        props: {
            items: Array,
            iIndex: String,
            parentisns: Object,
        },
        methods: {
            addItem(){
                this.items.push({
                    Label: '',
                    ISN: 0
                });
            },
            deleteItem(id){
                this.items.splice(id,1);
            },
            getDicti(isn = null){         // Берем справочник из Киаса
                let ISN = isn != null ? isn : this.parentisns[this.iIndex];  //this.parent.isn;
                this.parentChanged = false;
                return this.axios.post('/calc/getDicti', {
                    ISN:ISN,
                    type:this.iIndex
                })
                    .then(response => {
                        if(response.data.success){
                            if(isn == null) {
                                this.itemsConstructor = response.data.result;
                            } else {
                                this.items[this.currentIndex].Childs = response.data.result;
                            }
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            onChangeSelect: function(e,index){      // Создаем массив для вывода на фронте
                this.items[index].Childs = null;
                this.currentIndex = index;
                this.items[index].Value = null;
                if(this.iIndex == 'participants'){
                    this.items[index].firstName = '';
                    this.items[index].lastName = '';
                    this.items[index].patronymic = '';
                    this.items[index].subjISN = '';
                } else {
                    this.items[index].Type = e.Type;
                    this.items[index].NumCode = e.NumCode;
                    this.items[index].N_Kids = e.N_Kids;

                    // Begin если справочник, берем данные справочника из киаса
                    if(e.N_Kids == 1){
                        e.NumCode != '' ? this.getDicti(e.NumCode) : this.getDicti(e.id);
                        this.items[index].Type = 'DICTI';
                    } else {
                        if(e.Type == 'DICTI'){
                            e.NumCode != '' ? this.getDicti(e.NumCode) : this.getDicti(e.id);
                        }
                    }
                    // End
                }
                this.items[index].Label = e.Label;

                if(this.iIndex == 'attributes') {
                    this.items[index].AttrISN = e.id;
                }

                if(this.iIndex == 'agrclause') {
                    //this.items[index].Type = 'DICTI';
                }
            },
        },
        mounted(){
            this.getDicti();    // Получаем справочники
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