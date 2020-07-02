<template>
    <div class="col-md-6 mt-4  childs-not-bold">
        <h6 class="font-shif <!--text-hw--> "><label :for="attribute.AttrISN" :class="isBold">{{attribute.Label+ ':'}}</label></h6>
        <div >
            <div v-if="attribute.Type === 'TEXT'" class="d-flex align-items-center mb-2 " style="heidth: 50px;" >
                <!--label class="mb-0 mr-2" :class="isBold">Значение: </label-->
                <input v-if="attribute.AttrISN != 831381" type="text" class="attr-input-text w-70" v-model="attribute.Value" @keyup="calcChanged" :readonly="readOnly">
                <input v-if="attribute.AttrISN == 831381" type="tel" v-model="attribute.Value" v-mask="'+###########'"  @keyup="calcChanged" class="attr-input-text w-70">
            </div>
            <!--<div v-else-if="attribute.Type === 'CHECKBOX'" class="d-flex align-items-center mb-2">
                <input type="checkbox" class="attr-input-text width-checkbox"  v-model="attribute.Value"  @change="calcChanged">
            </div>-->
            <div v-else-if="attribute.Type === 'CHECKBOX'" class="d-flex align-items-center mb-2">
                <!--label class="mb-0 mr-2" :class="isBold">Значение: </label-->
                <input type="checkbox" class=""  v-model="attribute.Value"  @change="calcChanged" :readonly="readOnly" :id="attribute.AttrISN">
            </div>
            <div v-else-if="attribute.Type === 'DICTI'" class="d-flex align-items-center mb-2" >
                <!--label class="mb-0 mr-2" :class="isBold">Значение: </label-->
                <select class="custom-select select-size" v-model="attribute.Value" @change="calcChanged" :readonly="readOnly">
                    <option v-for="dicti in attribute.Childs" :value="dicti.Value">{{dicti.Label}}</option>
                </select>
            </div>
            <div v-else-if="attribute.Type === 'DATE'" class="d-flex align-items-center mb-2">
                <!--label class="mb-0 mr-2" :class="isBold">Значение: </label-->
                <input type="date" class="attr-input-text w-70"  v-model="attribute.Value" @change="calcChanged" :readonly="readOnly">
            </div>
            <div v-else-if="attribute.Type === 'SUBJECT'" class="d-flex align-items-center mb-2">
                <!--label class="mb-0 mr-2" :class="isBold">Значение: </label-->
                <input type="number" class="attr-input-text w-70"  v-model="attribute.Value" @change="calcChanged" :readonly="readOnly">
            </div>
            <div v-else class="d-flex align-items-center mb-2">
                <!--label class="mb-0 mr-2" :class="isBold">Значение: </label-->
                <input type="text" class="attr-input-text w-70"  v-model="attribute.Value" @keyup="calcChanged" :readonly="readOnly">
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
                isBold: null,
                readOnly: false
            }
        },
        directives: {mask},
        props: {
            attribute : Object,
            expressAttr: Object,
            calcChanged: Function
        },
        created(){
            if(this.attribute.AttrISN == 1422011){  // НШБ
                this.attribute.Label = 'Нестандартный шаблон Договора';
            }
            if(this.attribute.AttrISN == 822261){  // Полная котировка
                this.attribute.Label = 'Номер полной котировки';
            }

            if(this.expressAttr[this.attribute.AttrISN] && this.expressAttr[this.attribute.AttrISN] != null){
                this.attribute.Value = this.expressAttr[this.attribute.AttrISN];
            }
            if(this.attribute.Type == 'DOCS' || this.attribute.Type == 'AGREEMENTCALC'){
                this.attribute.Type = 'NUMBER';
            }
              // Это то что в конструкторе ставится                     это возвращается из метода
            this.isBold = this.attribute.required ? 'bold' : this.attribute.Required && this.attribute.Required == 'Y' ? 'bold' : '';
            this.readOnly = this.attribute.ReadOnly && this.attribute.ReadOnly == 'Y' ? true : false;
        }
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>
