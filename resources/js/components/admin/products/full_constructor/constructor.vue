<template>
    <div class="form-group col-md-12 col-lg-12 col-12 text-left row" style="border-bottom:1px solid #ced4da;">
        <div class="col-12 mb-3">
            {{ title }}
            <input type="text" v-model="parentIsn" @input="parentChanged = true" class="attr-input-text">
            <button type="button" v-if="parentChanged" @click="getDicti" class="btn-info btn-lg btn">Обновить</button>
            <button type="button" @click="addItem" class="btn-info btn-lg btn">Добавить</button>
        </div>
        <div v-for="(item,index) in items" class="form-group col-md-3 col-lg-3 col-6 text-center">
            <select class="custom-select" v-model="item.ISN" @change="showInConsole">
                <option v-for="cons in itemsConstructor" :value="cons.Value" :name="cons.Label">{{cons.Label}} - {{cons.Value}}</option>
            </select>
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
            }
        },
        props: {
            title: String,
            parentIsn: Number,
            items: Array
        },
        methods: {
            showInConsole(e){
                console.log(e);
            },
            addItem(){
                this.items.push({
                    label: '',
                    ISN: ''
                });
            },
            deleteItem(id){
                this.items.splice(id,1);
            },
            getDicti(){
                this.parentChanged = false;
                this.axios.post('/calc/getDicti', {
                    ISN:this.parentIsn
                })
                    .then(response => {
                        if(response.data.success){
                            this.itemsConstructor = response.data.result;
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            }
        },
        mounted(){
            this.getDicti();
        }
    }
</script>

<style scoped>

</style>