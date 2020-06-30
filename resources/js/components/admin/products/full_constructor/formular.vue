<template>
    <div class="form-group col-md-12 col-lg-12 col-12 text-left row mt-3 box-block ml-0 mr-0" style="border-bottom:1px solid #ced4da;">
        <div class="col-12 mb-3">
            <span class="font-weight-bold">{{ title }}</span>
        </div>
        <div class="form-group col-md-4 col-lg-4 col-6 text-center">
            <label @click="parentChanged.insurant = true">Страхователь</label>
            <div class="row">
                <input type="text"
                       v-model="formular[0].insurant.isn"
                       v-show="parentChanged.insurant" class="attr-input-text custom-input ml-3 mb-2"  size="6">
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-lg-6 col-6">
                    <label>Физ.лицо</label>
                    <input type="checkbox" class="attr-input-text col-12" v-model="formular[0].insurant.phys" @change="insurantChange('phys')">
                </div>
                <div class="form-group col-md-6 col-lg-6 col-6">
                    <label>Юр.лицо</label>
                    <input type="checkbox" class="attr-input-text col-12" v-model="formular[0].insurant.jur" @change="insurantChange('jur')">
                </div>
            </div>
        </div>

        <div class="form-group col-md-4 col-lg-4 col-6 text-center">
            <label @click="parentChanged.status = true">Статус</label>
            <div class="row">
                <input type="text" v-model="parentisns.formular.status" v-show="parentChanged.status" class="attr-input-text custom-input ml-3 mb-2"  size="6">
                <a v-if="parentChanged.status" @click="getDicti()" class="mt-2 ml-2">Обновить</a>
            </div>
            <treeselect v-model="formular[0].status.Value" :options="dictiOptions" />
        </div>

        <div class="form-group col-md-4 col-lg-4 col-6 text-center">
            <label @click="parentChanged.curator = true">Куратор</label>
            <div class="row">
                <input type="text"
                       v-model="parentisns.formular.curator"
                       v-show="parentChanged.curator" class="attr-input-text custom-input ml-3 mb-2"  size="6">
            </div>
            <treeselect v-model="formular[0].curator.Value" :options="curatorOptions" />
        </div>

        <div class="form-group col-md-4 col-lg-4 col-6 text-center">
            <label for="inspection">Осмотр</label>
            <input id="inspection" type="checkbox" class="attr-input-text col-12" v-model="formular[0].inspection">
        </div>
    </div>
</template>

<script>
    export default {
        name: "formular",
        data() {
            return {
                dictiOptions : [],
                curatorOptions : [{ id : 0, label : 'По умолчанию' },{ id : 1, label : 'Выбрать куратора'}],
                parentChanged : { insurant : false, curator : false, status : false }
            }
        },
        props: {
            title : String,
            formular : Array,
            parentisns : Object,
            checkOptions : Object,
            preloader : Function
        },
        created() {
            if(Object.keys(this.formular).length == 0){
                this.formular.push({
                    insurant : {
                        isn : 2103,
                        jur : false,
                        phys : true,
                    },
                    curator:{
                        Value : 0,
                        ISN : 221346,
                        subjISN : null,
                        label : null,
                    },
                    status:{
                        Value : 223368,
                    }
                });
            }
        },
        methods: {
            insurantChange(changed){
                if(changed == 'jur') {
                    this.formular[0].insurant.jur == false ? this.formular[0].insurant.phys = true : '';
                } else {
                    this.formular[0].insurant.phys == false ? this.formular[0].insurant.jur = true : '';
                }
            },
            getDicti(){         // Берем справочник из Киаса
                this.preloader(true);
                this.parentChanged.status = false;
                return this.axios.post('/calc/getDicti', {
                    ISN: this.parentisns.formular.status,    //formular[0].status.ISN,
                    type: '',
                    getFromKias: 1
                })
                    .then(response => {
                        if(response.data.success){
                            this.dictiOptions = response.data.result;
                        }else{
                            alert(response.data.error);
                        }
                        this.preloader(false);
                    })
                    .catch(error => {
                        alert(error);
                        this.preloader(false);
                    });
            },
        },
        watch: {
            dictiOptions(){
                this.checkOptions.formular = true;
            }
            // 'formular.curator.Value': function(){
            //     this.formular.curator.subjISN = null;
            //     this.formular.curator.firstName = null;
            //     this.formular.curator.lastName = null;
            //     this.formular.curator.patronymic = null;
            // }
            // parentisns: {
            //     formular: {
            //         status: function (val, oldVal) {
            //             this.formular[0].status.ISN = val;
            //         }
            //     }
            // }
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