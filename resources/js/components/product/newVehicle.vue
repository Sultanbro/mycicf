<template>
    <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5">
        <div class="col-12 row mt-2 mb-2 ml-0">
            <h4>Укажите транспортное средство</h4>
            <div class="row col-12 mt-4">
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Гос. номер авто</label>
                    <input type="text" class="attr-input-text col-12" v-model="newVehicle.PLATE" @keyup="calcChanged">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">ВИН код авто </label>
                    <input type="text" class="attr-input-text col-12" v-model="newVehicle.VIN" @keyup="calcChanged">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">СРТС номер </label>
                    <input type="text" class="attr-input-text col-12" v-model="newVehicle.SRTS" @keyup="calcChanged">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Тип транспортного средства</label>
                    <select class="attr-input-text col-12 bg-white"
                            @change="calcChanged();getDicti('marks')"
                            v-if="typeTS.length > 0"
                            v-model="newVehicle.CLASSISN"
                            :disabled="computedType">
                        <option v-if="typeTS.length > 0" v-for="item in typeTS" :value="item.Value[0]">{{ item.Label[0] }}</option>
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Дата выпуска авто </label>
                    <select class="attr-input-text col-12 bg-white"
                            @change="calcChanged"
                            v-model="newVehicle.DATERELEASE">
                        <option v-for="n in computedDate" :value="currentYear-n">{{ currentYear-n }}</option>
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Марка</label>
                    <select class="attr-input-text col-12 bg-white"
                            v-model="newVehicle.MARKISN"
                            @change="getDicti('models');calcChanged()">
                        <option v-if="marksCar.length > 0" v-for="item in marksCar" :value="item.Value[0]">{{ item.Label[0] }}</option>
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Модель</label>
                    <select class="attr-input-text col-12 bg-white"
                            @change="calcChanged();getDicti('colors')"
                            v-model="newVehicle.MODELISN">
                        <option v-if="modelsCar.length > 0" v-for="item in modelsCar" :value="item.Value[0]">{{ item.Label[0] }}</option>
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Цвет</label>
                    <select class="attr-input-text col-12 bg-white"
                            @change="calcChanged"
                            v-model="newVehicle.COLORISN">
                        <option v-if="colorsCar.length > 0" v-for="item in colorsCar" :value="item.Value[0]">{{ item.Label[0] }}</option>
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Регион регистрации</label>
                    <select class="attr-input-text col-12 bg-white"
                            @change="calcChanged"
                            v-model="newVehicle.regionIsn">
                        <option v-if="regions.length > 0" v-for="item in regions" :value="item.Value[0]">{{ item.Label[0] }}</option>
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Город</label>
                    <select class="attr-input-text col-12 bg-white"
                            @change="calcChanged"
                            v-model="newVehicle.cityIsn">
                        <option v-if="cities.length > 0" v-for="item in cities" :value="item.Value[0]">{{ item.Label[0] }}</option>
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Номер двигателя</label>
                    <input type="text" class="attr-input-text col-12 bg-white" v-model="newVehicle.ENGINE_NUMBER" @keyup="calcChanged">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Мощность двигателя</label>
                    <input type="text" class="attr-input-text col-12 bg-white" v-model="newVehicle.ENGINE_POWER" @keyup="calcChanged">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Объем двигателя</label>
                    <input type="text" class="attr-input-text col-12 bg-white" v-model="newVehicle.ENGINE_VOLUME" @keyup="calcChanged">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Расположение руля</label>
                    <select class="attr-input-text col-12 bg-white"
                            v-model="newVehicle.RIGHT_HAND_DRIVE_BOOL"
                            @change="calcChanged"
                    >
                        <option value="Y">Праворульная</option>
                        <option value="N">Леворульная</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-outline-info mt-3 mr-3" @click="addToKias()">Сохранить</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "agrobjcar",
        data() {
            return {
                newVehicle: {
                    PLATE: null,
                    VIN: null,
                    SRTS: null,
                    CLASSISN: 3366,
                    MARKISN: null,
                    MODELISN: null,
                    COLORISN: null,
                    DATERELEASE: null,
                    ENGINE_NUMBER: null,
                    ENGINE_POWER: null,
                    ENGINE_VOLUME: null,
                    RIGHT_HAND_DRIVE_BOOL: null,
                    TF_ID: null,
                    regionIsn: null,
                    cityIsn: null,
                },
                marksCar: [],
                modelsCar: [],
                colorsCar: [],
                typeTS: [],
                regions: [],
                cities: [],
                startYear: 1980,
                currentYear: null

            }
        },
        props: {
            agrobjcar : Object,
            agrobject : Object,
            agrobjects : Array,
            cIndex: Number,
            aIndex: Number,
            preloader: Function,
            calcChanged: Function
        },
        methods:{
            addToKias: async function(e){
                this.preloader(true);
                this.axios.post('/saveVehicle', {
                    data: this.newVehicle
                })
                    .then(response => {
                        if(response.data.success){
                            alert('Авто успешно добавлено');
                            this.preloader(false);
                        } else {
                            alert(response.data.error);
                            this.preloader(false);
                        }
                    })
                    .catch(error => {
                        alert(error);
                        this.preloader(false);
                    });
            },
            getDicti:async function(dicti = null){
                let parent = 2118;
                switch(dicti){
                    case 'marks':
                        parent = this.newVehicle.CLASSISN;
                        break;
                    case 'models':
                        parent = this.newVehicle.MARKISN;
                        break;
                    case 'colors':
                        parent = 2028;
                        break;
                }
                if(this.colorsCar.length > 0 && dicti == 'colors') {
                    //...
                } else {
                    this.preloader(true);
                    this.axios.post('/getDictiList', {
                        parent: parent
                    })
                        .then(response => {
                            console.log(response);
                            if (response.data.success) {
                                switch (dicti) {
                                    case 'marks':
                                        this.marksCar = response.data.result;
                                        break;
                                    case 'models':
                                        this.modelsCar = response.data.result;
                                        break;
                                    case 'colors':
                                        this.colorsCar = response.data.result;
                                        break;
                                    default:
                                        this.typeTS = response.data.result;
                                        break;
                                }
                                this.preloader(false);
                            } else {
                                alert('К сожалению, данные по маркам не найдены в базе данных');
                                this.preloader(false);
                            }
                        })
                        .catch(error => {
                            alert(error);
                            this.preloader(false);
                        });
                }
                if(this.marksCar.length == 0 && dicti == null) {
                    this.getDicti('marks');
                }
            },
        },
        computed:{
            computedType(){
                if(this.agrobjects[this.aIndex].SubClassISN != '' && this.agrobjects[this.aIndex].SubClassISN != null){
                    return true;
                }
            },
            computedDate(){
                this.currentYear = parseInt(new Date().getFullYear());
                return this.currentYear-parseInt(this.startYear);
            }
        },
        watch: {
            //...
        },
        created(){
            this.newVehicle.PLATE = this.agrobjcar.REGNO;
            this.newVehicle.VIN = this.agrobjcar.VIN;
            this.newVehicle.CLASSISN = this.agrobjects[this.aIndex].SubClassISN ? this.agrobjects[this.aIndex].SubClassISN : 3366;
            this.getDicti();
        }
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>