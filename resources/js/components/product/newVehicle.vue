<template>
    <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5">
        <div class="col-12 row mt-2 mb-2 ml-0">
            <h4>Укажите данные транспортного средства</h4>
            <div class="row col-12 mt-4">
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Гос. номер авто</label>
                    <input type="text" class="attr-input-text col-12" v-model="newVehicle.PLATE" @keyup="calcChanged">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">ВИН код авто </label>
                    <input type="text" class="attr-input-text col-12" v-model="newVehicle.VIN" @keyup="calcChanged">
                </div>
                <!--div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">СРТС номер </label>
                    <input type="text" class="attr-input-text col-12" v-model="newVehicle.SRTSNUM" @keyup="calcChanged">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Дата СРТС</label>
                    <input type="text" class="attr-input-text col-12" v-model="newVehicle.SRTSDATE" @keyup="calcChanged">
                </div-->
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
                            @change="calcChanged()"
                            v-model="newVehicle.MODELISN">
                        <option v-if="modelsCar.length > 0" v-for="item in modelsCar" :value="item.Value[0]">{{ item.Label[0] }}</option>
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Цвет</label>
                    <select class="attr-input-text col-12 bg-white"
                            @change="calcChanged"
                            v-model="newVehicle.COLORISN">
                        <option v-if="colorsCar.length > 0" v-for="item in colorsCar" :value="item.Value">{{ item.Label }}</option>
                    </select>
                </div>
                <!--div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Регион</label>
                    <select class="attr-input-text col-12 bg-white"
                            v-model="newVehicle.regionIsn"
                            @change="calcChanged();getDictiFromBase('regions')">
                        <option v-if="regions.length > 0"
                                v-for="item in regions"
                                :value="item.Value">
                            {{ item.Label }}
                        </option>
                    </select>
                </div>
                <div v-if="regionChilds.length > 0" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Район</label>
                    <select class="attr-input-text col-12 bg-white"
                            @change="calcChanged();getDictiFromBase('cities')"
                            v-model="newVehicle.regionChild">
                        <option v-if="regionChilds.length > 0" v-for="item in regionChilds" :value="item.Value">{{ item.Label }}</option>
                    </select>
                </div>
                <div v-if="cities.length > 0" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                    <label class="bold">Город</label>
                    <select class="attr-input-text col-12 bg-white"
                            @change="calcChanged"
                            v-model="newVehicle.cityIsn">
                        <option v-if="cities.length > 0" v-for="item in cities" :value="item.Value">{{ item.Label }}</option>
                    </select>
                </div-->
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
                        <option value="1">Праворульная</option>
                        <option value="0">Леворульная</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-outline-info mt-3 mr-3" @click="addToKias()">Сохранить</button>
            <button class="btn btn-outline-info mt-3 mr-3" @click="closeVehicleForm()">Закрыть</button>
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
                    //SRTSNUM: null,
                    //SRTSDATE: null
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
                    //regionIsn: null,
                    //regionChild: null,
                    //cityIsn: null,
                },
                marksCar: [],
                modelsCar: [],
                colorsCar: [],
                typeTS: [],
                //regions: [],
                //regionChilds: [],
                //cities: [],
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
            calcChanged: Function,
            getVehicle: Function
        },
        methods:{
            addToKias: async function(e){
                let error = false;
                for(let index in this.newVehicle){
                    //if(index != 'regionIsn' && index != 'regionChild' && index != 'cityIsn' && index != 'TF_ID') {
                        if (this.newVehicle[index] == null || this.newVehicle[index] == '') {
                            console.log(index+'='+this.newVehicle[index]);
                            error = true;
                        }
                    //}
                }

                if(error) {
                    alert('Укажите пожалуйста все данные');
                } else {
                    this.preloader(true);
                    this.axios.post('/saveVehicle', {
                        data: this.newVehicle
                    })
                        .then(response => {
                            if (response.data.success) {
                                alert('Авто успешно добавлено');
                                this.preloader(false);
                                this.agrobjcar['REGNO'] = null;
                                this.agrobjcar['VIN'] = response.data.result.VIN;
                                this.getVehicle();
                            } else {
                                alert(response.data.error);
                                this.preloader(false);
                            }
                        })
                        .catch(error => {
                            alert(error);
                            this.preloader(false);
                        });
                }
            },
            getDicti:async function(dicti = null){
                let parent = 2118;      // Тип ТС
                switch(dicti){
                    case 'marks':
                        parent = this.newVehicle.CLASSISN;
                        break;
                    case 'models':
                        parent = this.newVehicle.MARKISN;
                        break;
                }
                this.preloader(true);
                this.axios.post('/getDictiList', {
                    parent: parent
                })
                    .then(response => {
                        this.fetchDicti(response,dicti);
                    })
                    .catch(error => {
                        alert(error);
                        this.preloader(false);
                    });
            },
            fetchDicti(response,dicti){
                if (response.data.success) {
                    switch (dicti) {
                        case 'marks':
                            this.marksCar = response.data.result;
                            this.preloader(false);
                            break;
                        case 'models':
                            this.modelsCar = response.data.result;
                            this.preloader(false);
                            break;
                        default:
                            this.typeTS = response.data.result;
                            this.getDictiFromBase('colors');
                            break;
                    }
                } else {
                    alert('К сожалению, данные не найдены в базе данных');
                    this.preloader(false);
                }
            },
            getDictiFromBase:async function(dicti = null){
                let parent = null;
                switch(dicti){
                    case 'colors':
                        parent = 2028;
                        break;
                    // case 'regions':
                    //     if(this.newVehicle.regionIsn == null) {
                    //         parent = 0;
                    //     } else {
                    //         parent = this.newVehicle.regionIsn;
                    //     }
                    //     break;
                    // case 'cities':
                    //     parent = this.newVehicle.regionChild;
                    //     break;
                }
                this.preloader(true);
                this.axios.post('/getDictiListFromBase', {
                    parent: parent,
                    dictiType: dicti
                })
                    .then(response => {
                        this.fetchDictiFromBase(response,dicti);
                    })
                    .catch(error => {
                        alert(error);
                        this.preloader(false);
                    });
            },
            fetchDictiFromBase(response,dicti){
                if (response.data.success) {
                    switch (dicti) {
                        case 'colors':
                            this.colorsCar = response.data.result;
                            this.preloader(false);
                            //this.getDictiFromBase('regions');
                            this.getDicti('marks');
                            break;
                        // case 'regions':
                        //     if(this.newVehicle.regionIsn == null) {
                        //         this.regions = response.data.result;
                        //         this.preloader(false);
                        //         this.getDicti('marks');
                        //     } else {
                        //         this.regionChilds = response.data.result;
                        //         this.preloader(false);
                        //     }
                        //     break;
                        // case 'cities':
                        //     this.cities = response.data.result;
                        //     this.preloader(false);
                        //     break;
                    }
                } else {
                    switch (dicti) {
                        case 'colors':
                            alert('К сожалению, данные по цветам не найдены в базе данных');
                            this.preloader(false);
                            break;
                        // case 'regions':
                        //     alert('К сожалению, данные по регионам не найдены в базе данных');
                        //     this.preloader(false);
                        //     break;
                        // case 'cities':
                        //     alert('К сожалению, данные по городам не найдены в базе данных');
                        //     this.preloader(false);
                        //     break;
                    }
                }
            },
            closeVehicleForm(){
                this.$modal.hide('create-vehicle-'+this.cIndex);
            },
        },
        computed:{
            computedType(){
                if(this.agrobjects[this.aIndex].SubClassISN != '' && this.agrobjects[this.aIndex].SubClassISN != null){
                    return true;
                }
            },
            computedDate(){
                this.currentYear = parseInt(new Date().getFullYear()+1);
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