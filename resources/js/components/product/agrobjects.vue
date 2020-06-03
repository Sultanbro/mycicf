<template>

    <div class="ml-0 mb-2 ">  <!--class="col-12 row mt-2 mb-2 ml-0  h-auto"-->
        <h5 class="font-shif">Объект</h5>
        <div class="row ">
            <div class="col-lg-3 col-xl-3 col-md-6 ">
                <label class="font-shif">Класс объекта : </label>
                <select class="custom-select width-70" v-model="agrobject.ClassISN" @change="calcChanged">
                    <option v-for="dicti in agrobject.objekt" :value="dicti.ClassISN">{{dicti.classobjname}}</option>
                </select>
            </div>

            <div v-if="agrobject.ClassISN != ''" class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                <label class="bold">Тип объекта : </label>
                <select class="custom-select width-50" v-model="agrobject.SubClassISN" @change="changeSelect($event,'ObjName'),calcChanged()">
                    <option v-for="dicti in agrobject.objekt[agrobject.ClassISN].obj"
                            :data-option="dicti.ObjName"
                            :value="dicti.SubClassISN">{{dicti.ObjName}}</option>
                </select>
            </div>

            <div class="col-lg-3 col-xl-3 col-md-6 ">
                <label class="font-shif">Сумма страхования : </label>
                <input type="number" class="attr-input-text width-70 "  v-model="agrobject.insureSum" @keyup="calcChanged">
            </div>

            <div v-if="DA.calcDA" class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                <label class="bold">Сумма премии : </label>
                <input type="number" class="attr-input-text col-12 width-50"  v-model="agrobject.DAsum" @keyup="calcChanged">
            </div>


            <div class="col-12" v-if="agrobject.ClassISN != ''">
                <div class="col-12 row mt-2 mb-2 ml-0 agreement-block"
                     v-for="(agrcond,index) in agrobject.objekt[agrobject.ClassISN].AGRCOND"
                     v-if="index == agrobject.ClassISN+agrobject.SubClassISN">
                    <h4>Риски</h4>
                    <div class="row col-12">
                        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12">
                            <label class="bold">Значение : </label>
                            <select class="custom-select"
                                    v-model="agrobject.RiskISN" @change="changeSelect($event,'InsClassISN'),calcChanged()">
                                <option v-for="(dicti,index) in agrcond"
                                        :value="dicti.RiskPackisn"
                                        :data-option="dicti.InsClassisn">{{dicti.RiskPackname}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="agrobject.ClassISN != ''" class="col-12">
                <div class="col-12" v-if="Object.keys(agrobject.objekt[agrobject.ClassISN].AGROBJCAR).length > 0">
                    <agrobjcar v-for="(agrobjcar,index) in agrobject.objekt[agrobject.ClassISN].AGROBJCAR"
                            :agrobjcar="agrobjcar"
                           :agrobject="agrobject"
                           :key="index"
                           :preloader="preloader"
                           :calc-changed="calcChanged"
                           :cIndex="index" ></agrobjcar>
                </div>
            </div>

            <div v-if="agrobject.ClassISN != ''" class="col-12"> <!-- Атрибуты объекта -->
                <div class="col-12 agr-block">
                    <agr-attributes
                            v-for="(agrobj,index) in agrobject.objekt[agrobject.ClassISN].AGROBJECT_ADDATTR"
                            :expressAttr="expressAttr"
                            :attribute="agrobj"
                            :calc-changed="calcChanged"
                            :key="index">
                    </agr-attributes>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "agrobject",
        data() {
            return {
                selectedObject: '',
                selectedSubObject: '',
            }
        },
        props: {
            agrobject : Object,
            aIndex: Number,
            preloader: Function,
            DA: Object,
            expressAttr: Object,
            calcChanged: Function
        },
        watch: {
            'agrobject.ClassISN': function(val,oldVal){
                this.selectedObject = val;
            },
            'agrobject.SubClassISN': function(val,oldVal){
                this.selectedSubObject = val;
            },
            'DA.calcDA': function(){
                this.agrobject.DAsum = null;
                this.DA.remark = null;
            }
        },
        methods: {
            changeSelect(e,index) {
                if(e.target.options.selectedIndex > -1) {
                    this.agrobject[index] = e.target.options[e.target.options.selectedIndex].dataset.option;
                }
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
