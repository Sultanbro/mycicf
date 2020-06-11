<template>
    <div class="col-12 row mt-2 mb-2 ml-0 agreement-block h-auto">
        <h4>Объект</h4>
        <button v-if="quotationId == 0" @click="addObject()" class="btn btn-outline-info ml-3">Добавить еще</button>
        <button v-if="quotationId == 0 && agrobjects.length > 1" @click="deleteObject()" class="btn btn-outline-info ml-3">Удалить</button>
        <div class="row col-12">
            <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12 mb-3">
                <label class="bold">Класс объекта : </label>
                <select class="custom-select" v-model="agrobject.ClassISN" @change="calcChanged">
                    <option v-for="dicti in agrobject.objekt" :value="dicti.ClassISN">{{dicti.classobjname}}</option>
                </select>
            </div>

            <div v-if="agrobject.ClassISN != ''" class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                <label class="bold">Тип объекта : </label>
                <select class="custom-select" v-model="agrobject.SubClassISN" @change="changeSelect($event,'ObjName'),calcChanged()">
                    <option v-for="dicti in agrobject.objekt[agrobject.ClassISN].obj"
                            :data-option="dicti.ObjName"
                            :value="dicti.SubClassISN">{{dicti.ObjName}}</option>
                </select>
            </div>

            <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                <label class="bold">Сумма страхования : </label>
                <input type="number" class="attr-input-text col-12"  v-model="agrobject.insureSum" @keyup="calcChanged">
            </div>

            <div v-if="DA.calcDA" class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                <label class="bold">Сумма премии : </label>
                <input type="number" class="attr-input-text col-12" v-model="agrobject.DAsum" @keyup="calcChanged">
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
                               :agrobjects="agrobjects"
                               :key="index"
                               :preloader="preloader"
                               :calc-changed="calcChanged"
                               :aIndex="aIndex"
                               :cIndex="index" >
                    </agrobjcar>
                </div>
            </div>

            <div v-if="agrobject.ClassISN != ''" class="col-12"> <!-- Атрибуты объекта -->
                <div class="col-12 agr-block">
                    <agr-attributes
                            v-for="(agrobj,index) in agrobject.objekt[agrobject.ClassISN].AGROBJECT_ADDATTR"
                            :expressAttr="expressAttr"
                            :attribute="agrobj"
                            :calc-changed="calcChanged"
                            :preloader="preloader"
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
            calcChanged: Function,
            newAgrobject: Object,
            agrobjects: Array,
            quotationId: String,
            productId: String
        },
        watch: {
            'agrobject.ClassISN': function(val,oldVal){
                this.selectedObject = val;
            },
            'agrobject.SubClassISN': function(val,oldVal){
                this.selectedSubObject = val;
            },
            'DA.calcDA': function(val){
                this.agrobject.DAsum = null;
                this.DA.remark = null;
                this.agrobject.DAsum = val && this.expressAttr.premium ? this.expressAttr.premium : null;
            }
        },
        methods: {
            changeSelect(e,index) {
                if(e.target.options.selectedIndex > -1) {
                    this.agrobject[index] = e.target.options[e.target.options.selectedIndex].dataset.option;
                }
            },
            addObject(){
                this.preloader(true);
                this.axios.post('/full/getFullObjects', {
                    id: this.productId,
                    quotationId: this.quotationId
                })
                .then(response => {
                    if(response.data.success){
                        this.agrobjects.push(response.data.objects);
                        this.preloader(false);
                    }else{
                        alert(response.data.error);
                        this.preloader(false);
                    }
                })
                .catch(error => {
                    alert(error);
                    this.preloader(false);
                });
            },
            deleteObject(){
                this.agrobjects.splice(this.aIndex,1);
            }
        },
        created(){
            if(this.expressAttr[857211]){
                this.agrobject.insureSum = this.expressAttr[857211];
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