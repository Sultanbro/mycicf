<template>
    <div class="col-md-3  ">
        <h6 class="font-shif">{{attribute.Label+ ':'}}</h6>
        <div >
            <div v-if="attribute.Type === 'TEXT'" class="d-flex align-items-center mb-2">
                <input v-if="attribute.AttrISN != 831381" type="text" class="attr-input-text w-70" v-model="attribute.Value" @keyup="calcChanged">
                <input v-if="attribute.AttrISN == 831381" type="tel" v-model="attribute.Value" v-mask="'+###########'"  @keyup="calcChanged" class="attr-input-text w-70">
            </div>
            <div v-else-if="attribute.Type === 'CHECKBOX'" class="d-flex align-items-center mb-2">
                <input type="checkbox" class="attr-input-text width-checkbox"  v-model="attribute.Value"  @change="calcChanged">
            </div>
            <div v-else-if="attribute.Type === 'DICTI'" class="d-flex align-items-center mb-2">
                <select class="custom-select select-size" v-model="attribute.Value" @change="calcChanged">
                    <option v-for="dicti in attribute.Childs" :value="dicti.Value">{{dicti.Label}}</option>
                </select>
            </div>
            <div v-else-if="attribute.Type === 'DATE'" class="d-flex align-items-center mb-2">
                <input type="date" class="attr-input-text w-70"  v-model="attribute.Value" @change="calcChanged">
            </div>
            <div v-else class="d-flex align-items-center mb-2">
                <input type="text" class="attr-input-text w-70"  v-model="attribute.Value" @keyup="calcChanged">
            </div>
            <!--div class="d-flex align-items-center mb-2">
                <label class="bold mb-0 mr-2">Примечание: </label>
                <input type="text" class="attr-input-text w-100"  v-model="attribute.Remark">
            </div-->
        </div>
    </div>
</template>

<script>
    import {mask} from 'vue-the-mask'
    export default {
        name: "attributes",
        data() {
            return {

            }
        },
        directives: {mask},
        props: {
            attribute : Object,
            expressAttr: Object,
            calcChanged: Function
        },
        created(){
            if(this.expressAttr[this.attribute.AttrISN] && this.expressAttr[this.attribute.AttrISN] != null){
                this.attribute.Value = this.expressAttr[this.attribute.AttrISN];
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
