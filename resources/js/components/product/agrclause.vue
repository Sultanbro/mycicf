<template>
    <div class="col-md-12 d-flex mb-4 mt-4 "><!--class="col-12 row mt-2 mb-2 ml-0 agreement-block"-->
        <h6 class="font-shif ">{{agrclause.Label + ':'}}</h6>

            <div v-if="agrclause.Type === 'TEXT'" class="d-flex align-items-center mb-2">

                <input type="text" class="attr-input-text w-100" v-model="agrclause.Value" @change="calcChanged">
            </div>
            <div v-else-if="agrclause.Type === 'CHECKBOX'" class="d-flex align-items-center mb-2">

                <input type="checkbox" class="attr-input-text w-100" v-model="agrclause.Value" @change="calcChanged">
            </div>
            <div v-else-if="agrclause.Type === 'DICTI'" class="d-flex align-items-center mb-2 ">

                <select class="custom-select w-100  " v-model="agrclause.Value" @change="calcChanged">
                    <option v-for="dicti in agrclause.Childs" :value="dicti.Value">{{dicti.Label}}</option>
                </select>
            </div>
            <div v-else-if="agrclause.Type === 'DATE'" class="d-flex align-items-center mb-2">

                <input type="date" class="attr-input-text w-100" v-model="agrclause.Value" @change="calcChanged">
            </div>
            <div v-else class="d-flex align-items-center mb-2">

                <input type="number" class="attr-input-text w-100" v-model="agrclause.Value" @change="calcChanged">
            </div>
            <!--div class="d-flex align-items-center mb-2">
                <label class="bold mb-0 mr-2">Примечание: </label>
                <input type="text" class="attr-input-text w-100" v-model="agrclause.Remark" @change="calcChanged">
            </div-->

    </div>
</template>

<script>
    export default {
        name: "agr-clause",
        data() {
            return {

            }
        },
        props: {
            agrclause : Object,
            calcChanged : Function,
            expressAttr : Object
        },
        created(){
            if(this.expressAttr[this.agrclause.ISN] && this.expressAttr[this.agrclause.ISN] != null){
                this.agrclause.Value = this.expressAttr[this.agrclause.ISN];
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
