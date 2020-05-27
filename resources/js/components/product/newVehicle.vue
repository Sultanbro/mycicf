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
                    <input type="text" class="attr-input-text col-12 bg-white" v-model="newVehicle.DATERELEASE" @keyup="calcChanged">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Марка</label>
                    <input type="text" class="attr-input-text col-12 bg-white" v-model="newVehicle.MARKISN" @keyup="calcChanged">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Модель</label>
                    <input type="text" class="attr-input-text col-12 bg-white" v-model="newVehicle.MODELISN" @keyup="calcChanged">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Цвет</label>
                    <input type="text" class="attr-input-text col-12 bg-white" v-model="newVehicle.COLORISN" @keyup="calcChanged">
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
                    <input type="text" class="attr-input-text col-12 bg-white" v-model="newVehicle.RIGHT_HAND_DRIVE_BOOL" @keyup="calcChanged">
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
                    MODELISN: null,
                    COLORISN: null,
                    MARKISN: null,
                    DATERELEASE: null,
                    CLASSISN: 3366,
                    PLATE: null,
                    VIN: null,
                    ENGINE_NUMBER: null,
                    ENGINE_POWER: null,
                    ENGINE_VOLUME: null,
                    RIGHT_HAND_DRIVE_BOOL: null,
                    TF_ID: null,
                }
            }
        },
        props: {
            agrobjcar : Object,
            agrobject : Object,
            cIndex: Number,
            preloader: Function,
            calcChanged: Function
        },
        methods:{
            addToKias(){
                //...
            }
        },
        watch: {
            //...
        },
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>