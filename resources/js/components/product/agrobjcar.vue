<template>
    <div class="col-12 row mt-2 mb-2 ml-0 agreement-block">
        <h4>Укажите транспортное средство</h4>
        <div class="row col-12">
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">Гос. номер авто</label>
                <input type="text" class="attr-input-text col-12" v-model="agrobjcar.REGNO">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">ВИН код авто </label>
                <input type="text" class="attr-input-text col-12" v-model="agrobjcar.VIN">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">Дата выпуска авто </label>
                <input type="text" class="attr-input-text col-12 bg-white" v-model="agrobjcar.ReleaseDate" disabled="true">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">Марка</label>
                <input type="text" class="attr-input-text col-12 bg-white" v-model="agrobjcar.Mark" disabled="true">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">Модель</label>
                <input type="text" class="attr-input-text col-12 bg-white" v-model="agrobjcar.Model" disabled="true">
            </div>

            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">Пробег авто </label>
                <input type="text" class="attr-input-text col-12" v-model="agrobjcar.PROBEG">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12 mt-3">
                <label class="bold">Действительная стоимость</label>
                <input type="text" class="attr-input-text col-12" v-model="agrobjcar.REALPRICE">
            </div>
        </div>
        <button class="btn btn-outline-info mt-3 mr-3" @click="chooseSearch('vin')">Пойск по ВИН</button>
        <button class="btn btn-outline-info mt-3 mr-3" @click="chooseSearch('tNumber')">Пойск по гос. номеру</button>
    </div>
</template>

<script>
    export default {
        name: "agrobjcar",
        data() {
            return {
                searchType: 'tNumber',
            }
        },
        props: {
            agrobjcar : Object,
            agrobject: Object,
            cIndex: Number,
        },
        methods:{
            getVehicle(){
                this.axios.post('/get-vehicle', this.agrobjcar)
                    .then(response => {
                        if(response.data.success){
                            for(var prop in response.data.result){
                                this.agrobjcar[prop] = response.data.result[prop];
                            }
                            //this.agrobjcar = response.data.result;
                            //this.agrobjcar.VIN = response.data.result.VIN;
                            //console.log(this.agrobject.objekt[this.agrobject.ClassISN].AGROBJCAR[this.cIndex]);
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            chooseSearch(searchType){
                if(searchType == 'tNumber'){
                    this.agrobjcar.VIN = '';
                } else {
                    this.agrobjcar.REGNO = '';
                }
                this.getVehicle();
            }
        },
        watch: {
            'agrobject.SubClassISN': function(val,oldVal){
                this.agrobjcar.ClassISN = val;
            }
        }
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>