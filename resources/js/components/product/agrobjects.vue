<template>
    <div class=" marg-l  text-hw">  <!--class="col-12 row mt-2 mb-2 ml-0  h-auto"-->
        <h5 class="font-shif ml-l2">Объект</h5>
        <button v-if="quotationId == 0 || quotationId != 0 && express_isn != null" @click="addObject()" class="btn btn-outline-info ml-3">Добавить еще</button>
        <button v-if="quotationId == 0 && agrobjects.length > 1  || quotationId != 0 && express_isn != null && agrobjects.length > 1" @click="deleteObject()" class="btn btn-outline-info ml-3">Удалить</button>
        <div class="col-12 ">
            <div class=" ml-l2 mt-3 col-3 ">
                <label class="font-shif text-w">Класс объекта : </label>
                <select class="custom-select " v-model="agrobject.ClassISN" @change="calcChanged();objectClassChanged()">
                    <option v-for="dicti in agrobject.objekt" :value="dicti.ClassISN">{{dicti.classobjname}}</option>
                </select>
            </div>

            <div v-if="agrobject.ClassISN != '' && Object.keys(agrobject.objekt[agrobject.ClassISN].obj).length > 0" class=" ml-l2 mt-3 col-3">
                <label class=" font-shif text-w">Тип объекта : </label>
                <select class="custom-select " v-model="agrobject.SubClassISN" @change="changeSelect($event,'ObjName'),calcChanged()">
                    <option v-for="dicti in agrobject.objekt[agrobject.ClassISN].obj"
                            :data-option="dicti.ObjName"
                            :value="dicti.SubClassISN">{{dicti.ObjName}}</option>
                </select>
            </div>

            <div class="  ml-l2 mt-3 col-3">
                <label class="font-shif text-hw">Сумма страхования : </label>
                <input type="number" class="attr-input-text  "  v-model="agrobject.insureSum" @keyup="calcChanged">
            </div>

            <div v-if="DA.calcDA" class="mt-3 col-3">
                <label class="font-shif text-w ">Сумма премии : </label>
                <input type="number" class="attr-input-text col-12 width-50" v-model="agrobject.DAsum" @keyup="calcChanged">
            </div>

            <div class=" ml-l2 mt-2 mt-3 col-3">
                <label class="font-shif text-w">Сумма франшизы</label>
                <select class="custom-select"
                        v-model="agrobject.franch">
                    <option v-for="index in franch"
                            :value="index">{{ index }}</option>
                </select>
            </div>

            <div class="ml-l2" v-if="agrobject.ClassISN != ''">
                <div class="col-12 row mt-2 mb-2 ml-0"
                     v-for="(agrcond,index) in agrobject.objekt[agrobject.ClassISN].AGRCOND"
                     v-if="index == agrobject.ClassISN+agrobject.SubClassISN || Object.keys(agrobject.objekt[agrobject.ClassISN].obj).length == 0 && index == agrobject.ClassISN || agrobject.ClassISN == 2118 && index == agrobject.ClassISN"
                >
                    <h5 class="font-shif ml-l2">Риски</h5>
                    <div class="row col-12">
                        <div class="col-3  ml-3">
                            <label class="font-shif text-w ">Значение : </label>
                            <select class="cus-select"
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
                franch: [1,2,3,5,0.5]
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
            express_isn: String,
            productId: String,
            participants: Array
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
                    quotationId: this.quotationId,
                    express_isn: this.express_isn
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
            },
            objectClassChanged(){
                if(this.agrobject.ClassISN == 2118 && Object.keys(this.agrobject.objekt[this.agrobject.ClassISN].obj).length == 0){
                    this.getDictiFromBase(this.agrobject.ClassISN);
                }
            },
            getDictiFromBase:async function(parent){
                this.preloader(true);
                this.axios.post('/getDictiListFromBase', {
                    parent: parent,
                    dictiType: ''
                })
                    .then(response => {
                        if (response.data.success) {

                            if(response.data.result.length > 0){
                                for(let key in response.data.result){
                                    this.agrobject.objekt[this.agrobject.ClassISN].obj.push({
                                        SubClassISN : response.data.result[key].Value,
                                        ObjName : response.data.result[key].Label
                                    });
                                }
                            }

                            //this.agrobject.objekt[this.agrobject.ClassISN].obj = response.data.result;
                            this.preloader(false);
                        } else {
                            alert('Произошла ошибка, попробуйте позже')
                            this.preloader(false);
                        }
                    })
                    .catch(error => {
                        alert(error);
                        this.preloader(false);
                    });
            },
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