<template>
    <div class="col-12 row mt-2 mb-2 ml-0 agreement-block h-auto">
        <h4>Укажите транспортное средство</h4>
        <div class="row col-12">
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">Гос. номер авто</label>
                <input type="text" class="attr-input-text col-12" v-model="agrobjcar.REGNO" @keyup="calcChanged">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">ВИН код авто </label>
                <input type="text" class="attr-input-text col-12" v-model="agrobjcar.VIN" @keyup="calcChanged">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">Дата выпуска авто </label>
                <input type="text" class="attr-input-text col-12 bg-white" v-model="agrobjcar.ReleaseDate" disabled="true" @keyup="calcChanged">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">Марка</label>
                <input type="text" class="attr-input-text col-12 bg-white" v-model="agrobjcar.Mark" disabled="true" @keyup="calcChanged">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">Модель</label>
                <input type="text" class="attr-input-text col-12 bg-white" v-model="agrobjcar.Model" disabled="true" @keyup="calcChanged">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">Территория регистрации</label>
                <input type="text" class="attr-input-text col-12 bg-white" v-model="agrobjcar.TerritoryName" disabled="true" @keyup="calcChanged">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">СРТС номер</label>
                <input type="text" class="attr-input-text col-12" v-model="agrobjcar.SRTSNUM" @keyup="calcChanged">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">СРТС дата</label>
                <input type="text"
                       class="attr-input-text col-12"
                       v-mask="'##.##.####'"
                       v-model="agrobjcar.SRTSDATE"
                       @keyup="calcChanged">
            </div>

            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">Пробег авто </label>
                <input type="text" class="attr-input-text col-12" v-model="agrobjcar.PROBEG" @keyup="calcChanged">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">Действительная стоимость</label>
                <input type="text" class="attr-input-text col-12" v-model="agrobjcar.REALPRICE" @keyup="calcChanged">
            </div>
        </div>
        <button class="btn btn-outline-info mt-3 mr-3" @click="chooseSearch('tNumber')">Поиск по гос. номеру</button>
        <button class="btn btn-outline-info mt-3 mr-3" @click="chooseSearch('vin')">Поиск по ВИН</button>
        <button v-if="notFound" class="btn btn-outline-info mt-3 mr-3" @click="showModal()">Добавить авто</button>


        <modal :name="modalName"
               :width="width"
               :height="height">
            <new-vehicle v-if="notFound"
                         :c-index="cIndex"
                         :aIndex="aIndex"
                         :preloader="preloader"
                         :calc-changed="calcChanged"
                         :agrobject="agrobject"
                         :agrobjects="agrobjects"
                         :get-vehicle="getVehicle"
                         :agrobjcar="agrobjcar">
            </new-vehicle>
        </modal>

    </div>
</template>

<script>
    import {mask} from 'vue-the-mask'
    export default {
        name: "agrobjcar",
        data() {
            return {
                searchType: 'tNumber',
                notFound: false,
            }
        },
        directives: {mask},
        props: {
            agrobjcar : Object,
            agrobject: Object,
            agrobjects: Array,
            cIndex: Number,
            aIndex: Number,
            preloader: Function,
            calcChanged: Function
        },
        methods:{
            getVehicle(searchType){
                this.$modal.hide('create-vehicle-'+this.cIndex)
                if(searchType == 'tNumber' && this.agrobjcar['REGNO'] == ""  || searchType == 'vin' && this.agrobjcar['VIN'] == "") {
                    if(searchType == 'tNumber') {
                        alert('Укажите пожалуйста гос. номер автотранспорта');
                    } else {
                        alert('Укажите пожалуйста ВИН код автотранспорта');
                    }
                } else {
                    this.preloader(true);
                    let vehicle = this.agrobjcar;
                    this.axios.post('/getVehicle', this.agrobjcar)
                        .then(response => {
                            if (response.data.success) {
                                this.clearVehicle();
                                for (var prop in response.data.result) {
                                    this.agrobjcar[prop] = response.data.result[prop];
                                }
                                this.preloader(false);
                                this.notFound = false;
                            } else {
                                this.clearVehicle();
                                let error = response.data.error;
                                if (response.data.error === 'not_found') {
                                    error = 'Транспортное средство не найдено, добавьте пожалуйста транспортное средство';
                                    this.notFound = true;
                                }
                                alert(error);
                                this.preloader(false);
                            }
                        })
                        .catch(error => {
                            alert(error);
                            this.preloader(false);
                        });
                }
            },
            chooseSearch(searchType){
                if(searchType == 'tNumber'){
                    this.agrobjcar.VIN = "";
                } else {
                    this.agrobjcar.REGNO = "";
                }
                this.getVehicle(searchType);
            },
            showModal(){
                this.$modal.show('create-vehicle-'+this.cIndex)
            },
            clearVehicle(){
                for(var index in this.agrobjcar){
                    if(index != 'REGNO' && index != 'VIN' && index != 'ClassISN') {
                        this.agrobjcar[index] = "";
                    }
                }
            }
        },
        computed:{
            modalName(){
                return 'create-vehicle-'+this.cIndex;
            },
        },
        watch: {
            'agrobject.SubClassISN': function(val,oldVal){
                this.agrobjcar.ClassISN = val;
            },
            'agrobjcar.MarkaISN': function(val,oldVal){
                if(val == null){
                    this.agrobjcar.Mark = null;
                    this.agrobjcar.Model = null;
                    this.agrobjcar.ReleaseDate = null;
                    this.agrobjcar.ReleaseDate = null;
                    this.agrobjcar.TerritoryName = null;
                }
            }
        },
        created(){
            this.width = window.innerWidth;
            this.height = 500;  //window.innerHeight;
        },
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>