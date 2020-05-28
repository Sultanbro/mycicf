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
                    <label class="bold">Дата выпуска авто </label>
                    <select class="attr-input-text col-12 bg-white"
                            @change="calcChanged"
                            v-model="newVehicle.DATERELEASE">
                        <!--option v-for="item in vehicleProperty.dateCar" :value="item">{{ item }}</option-->
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Марка</label>
                    <input type="text" class="attr-input-text col-12 bg-white" v-model="newVehicle.MARKISN" @keyup="calcChanged">
                    <select class="attr-input-text col-12 bg-white"
                            v-model="newVehicle.MARKISN"
                            @change="searchVehicleModels($event);calcChanged()">
                        <option v-if="marksCar.length > 0" v-for="item in marksCar" :value="item.Value[0]">{{ item.Label[0] }}</option>
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Модель</label>
                    <select class="attr-input-text col-12 bg-white"
                            @change="calcChanged"
                            v-model="newVehicle.MODELISN">
                        <option v-if="modelsCar.length > 0" v-for="item in modelsCar" :value="item.Value[0]">{{ item.Label[0] }}</option>
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Цвет</label>
                    <select class="attr-input-text col-12 bg-white"
                            @keyup="calcChanged"
                            v-model="newVehicle.COLORISN">
                        <option v-if="colorsCar.length > 0" v-for="item in colorsCar" :value="item.Value[0]">{{ item.Label[0] }}</option>
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">CLASSISN</label>
                    <input type="text" class="attr-input-text col-12 bg-white" v-model="newVehicle.CLASSISN" @keyup="calcChanged">
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
                },
                marksCar: [],
                modelsCar: [],
                colorsCar: []
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
            searchVehicleMarks: async function(e){
                this.preloader(true);
                this.axios.post('/getDictiList', {
                    parent: this.newVehicle.CLASSISN
                })
                    .then(response => {
                        console.log(response);
                        if(response.data.success){
                            this.marksCar = response.data.result;
                            this.searchVehicleColors();
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
            },
            searchVehicleModels: async function(e){
                this.preloader(true);
                this.axios.post('/getDictiList', {
                    parent: this.newVehicle.MARKISN
                })
                    .then(response => {
                        if(response.data.success){
                            this.modelsCar = response.data.result;
                            this.preloader(false);
                        } else {
                            alert('К сожалению, данные по моделям не найдены в базе данных');
                            this.preloader(false);
                        }
                    })
                    .catch(error => {
                        alert(error);
                        this.preloader(false);
                    });
            },

            searchVehicleColors: async function(e){
                this.preloader(true);
                this.axios.post('/getDictiList', {
                    parent: 2028
                })
                    .then(response => {
                        if(response.data.success){
                            this.colorsCar = response.data.result;
                            this.preloader(false);
                        } else {
                            alert('К сожалению, данные по моделям не найдены в базе данных');
                            this.preloader(false);
                        }
                    })
                    .catch(error => {
                        alert(error);
                        this.preloader(false);
                    });
            },
        },
        watch: {
            //...
        },
        created(){
            this.newVehicle.PLATE = this.agrobjcar.REGNO;
            this.newVehicle.VIN = this.agrobjcar.VIN;
            this.newVehicle.CLASSISN = this.agrobjects[this.aIndex].SubClassISN ? this.agrobjects[this.aIndex].SubClassISN : 3366;
            this.searchVehicleMarks();
        }
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>