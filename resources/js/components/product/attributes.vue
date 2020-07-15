<template>
    <div class="col-md-6 mt-4  childs-not-bold">
        <h6 class="font-shif <!--text-hw--> "><label :for="attribute.AttrISN" :class="isBold">{{attribute.Label+ ':'}}</label></h6>
        <div >
            <div v-if="attribute.Type === 'TEXT'" class="d-flex align-items-center mb-2 " style="heidth: 50px;" >
                <input v-if="attribute.AttrISN != 831381" type="text" class="attr-input-text w-70" v-model="attribute.Value" @keyup="calcChanged" :readonly="readOnly">
                <input v-if="attribute.AttrISN == 831381" type="tel" v-model="attribute.Value" v-mask="'+###########'"  @keyup="calcChanged" class="attr-input-text w-70">
            </div>
            <div v-else-if="attribute.Type === 'CHECKBOX'" class="d-flex align-items-center mb-2">
                <input type="checkbox" class=""  v-model="attribute.Value"  @change="calcChanged" :readonly="readOnly" :id="attribute.AttrISN">
            </div>
            <div v-else-if="attribute.Type === 'DICTI'" class="d-flex align-items-center mb-2" >
                <select class="custom-select select-size" v-model="attribute.Value" @change="calcChanged();changeSelect($event)" :readonly="readOnly">
                    <option v-for="dicti in attribute.Childs" :value="dicti.Value" :data-option="dicti.Label">{{dicti.Label}}</option>
                </select>
            </div>
            <div v-else-if="attribute.Type === 'DATE'" class="d-flex align-items-center mb-2">
                <input type="date" class="attr-input-text w-70"  v-model="attribute.Value" @change="calcChanged" :readonly="readOnly">
            </div>
            <div v-else-if="attribute.Type === 'SUBJECT'" class="d-flex align-items-center mb-2">
                <input v-if='attribute.AttrISN != "752071"' type="text" class="attr-input-text w-70"  v-model="attribute.Value" @keyup="calcChanged" :readonly="readOnly">
                <div v-else>
                    <participant v-for="(participant,index) in participants"
                                 :key="index"
                                 :p-index="index"
                                 :participant="participant"
                                 :participants="participants"
                                 :formular="{insurant : { isn:752071,jur:true,phys:true,carrierISN:'',carrierName:''}}"
                                 :preloader="preloader"
                                 :calc-changed="calcChanged"
                                 :attributes="[]"
                                 :insurant-is="{participant:false,receiver:false}"
                                 :participant-docs="participantDocs"
                                 :attribute="attribute"
                                 :product-id="null">
                    </participant>
                </div>
            </div>
            <div v-else class="d-flex align-items-center mb-2">
                <input type="text" class="attr-input-text w-70"  v-model="attribute.Value" @keyup="calcChanged" :readonly="readOnly">
            </div>
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
                readOnly: false,
                carrierISN: '',
                carrierName: '',
                participants: [
                    {
                        Value : null,
                        firstName : null,
                        iin : null,
                        lastName : null,
                        orgName : null,
                        patronymic : null,
                        subjISN : null,
                        ISN:752071,
                        data:null,
                        Label: 'Перевозчик',
                        new: true,
                        docType: '',
                        docNumber: '',
                        docDate: '',
                        email: '',
                        phone: '',
                        juridical: '',
                        birthDay: '',
                        okvdName: '',
                        economicName: ''
                    }
                ],
                participantDocs: {
                    types: []
                },
            }
        },
        directives: {mask},
        props: {
            attribute : Object,
            expressAttr: Object,
            calcChanged: Function,
            preloader: Function
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
        },
        methods: {
            changeSelect(e) {
                // if(this.attribute.AttrISN == 858441 || this.attribute.AttrISN == 861211) {            stremnyi - 863171,857691
                //     if (e.target.options.selectedIndex > -1) {
                //         this.attribute.franch = e.target.options[e.target.options.selectedIndex].dataset.option;
                //     }
                // }
            },
        },
        // watch: {
        //     'participants.Value': function (val, oldVal) {
        //         this.attribute.Value = val;
        //         alert(val);
        //     },
        //     'participant.Value': function (val, oldVal) {
        //         this.attribute.Value = val;
        //         alert(val);
        //     }
        // }
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>
