<template>
    <div class="col-12 row mt-2 mb-2 ml-0 agreement-block">
        <h4>Объект</h4>
        <div class="row col-12">
            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12">
                <label class="bold">Класс объекта : </label>
                <!--div class="attr-text">
                    {{agrobject.ObjName}}
                </div-->
                <select class="custom-select" v-model="agrobject.Value">
                    <option v-for="dicti in agrobject.obj" :value="dicti.SubClassISN">{{dicti.ObjName}}</option>
                </select>
            </div>
            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12 mb-3">
                <label class="bold">Тип объекта : </label>
                <div class="attr-text">
                    {{agrobject.classobjname}}
                </div>
            </div>

            <div class="col-12"
                 v-if="Object.keys(agrobject.AGRCOND).length > 0 && index == selectedObject"
                 v-for="(agrCond,index) in agrobject.AGRCOND"
                 :key="index">
                <div class="col-12 row mt-2 mb-2 ml-0 agreement-block">
                    <h4>Риски</h4>
                    <div class="row col-12">
                        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12">
                            <label class="bold">Значение : </label>
                            <select class="custom-select">
                                <option v-for="dicti in agrCond" :value="dicti.RiskPackisn">{{dicti.RiskPackname}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div v-for="(agrobjectAddatr,index) in agrobject.AGROBJECT_ADDATTR" v-if="index == selectedObject" class="col-12">
                <agr-attributes v-for="(agrobj,index) in agrobjectAddatr" :attribute="agrobj" :key="index"></agr-attributes>
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
            }
        },
        props: {
            agrobject : Object,
        },
        watch: {
            'agrobject.Value': function(val,oldVal){
                this.selectedObject = val;
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