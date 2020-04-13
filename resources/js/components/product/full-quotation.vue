<template>
    <div>

        <div>
            <div class="col-12 row mt-2 mb-2 agreement-block">
                <h4>Дата начала / окончания договора</h4>
                <div class="row col-12">
                    <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                        <label class="bold">Дата начало договора</label>
                        <input type="date" class="attr-input-text col-12"  v-model="contractDate.begin">
                    </div>
                    <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                        <label class="bold">Дата окончания договора</label>
                        <input type="date" class="attr-input-text col-12"  v-model="contractDate.end">
                    </div>
                    <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                        <label class="bold">Дата подписания договора</label>
                        <input type="date" class="attr-input-text col-12"  v-model="contractDate.sign">
                    </div>
                </div>
            </div>
        </div>

        <participant v-for="(participant,index) in participants"
                     :key="index"
                     :p-index="index"
                     :participant="participant"
                     :participants="participants"
                     :product-id="id">
        </participant>
        <div v-for="attribute in attributes">
            <agr-attributes :attribute="attribute"></agr-attributes>
        </div>

        <div class="d-flex justify-content-end col-12">
            <div class="col-12">
                <button class="btn btn-outline-info" @click="calculate">Рассчитать стоимость</button>
                <span class="fs-2" v-if="calculated">{{price}} Тенге</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "full-quotation",
        data() {
            return {
                contractDate: {
                    begin: '', //moment(new Date()).add(15,'days').toDate()
                    end: '',  //moment(new Date()).add(15,'days').toDate()
                    sign: '',
                },
                attributes: [],
                moreParticipant : false,
                participants: [
                    {ISN:1,new: false,data:'insurant',iin: '',subjISN: '',lastName: '',firstName: '',patronymic: ''},
                    {ISN:2,new: false,data:'participant',iin: '',subjISN: '',lastName: '',firstName: '',patronymic: ''},
                    {ISN:3,new: false,data:'agent',iin: '',subjISN: '',lastName: '',firstName: '',patronymic: ''},
                    {ISN:4,new: false,data:'receiver',iin: '',subjISN: '',lastName: '',firstName: '',patronymic: ''},
                    {ISN:5,new: false,data:'person',iin: '',subjISN: '',lastName: '',firstName: '',patronymic: ''},
                ],
                isn: '',
                subjISN : '',
                width : 0,
                height : 0,
                calculated : false,
                price : 0,
            }
        },
        props: {
            id: String,
            quotationId: String,
        },
        created(){
            this.width = window.innerWidth;
            this.height = window.innerHeight;
        },
        mounted() {
            this.getFullQuotationAttributes()
        },
        methods: {
            getFullQuotationAttributes() {
                this.axios.post('/getFullQuotationAttributes', {
                    id: this.id,
                    quotationId: this.quotationId
                })
                .then(response => {
                    if(response.data.success){
                        this.attributes = response.data.attributes;
                    }else{
                        alert(response.data.error);
                    }
                })
                .catch(error => {
                    alert(error);
                });
            },
            calculate(){
                this.axios.post('/full-quotation/calculate', {
                    subjISN : this.subjISN,
                    id : this.id,
                    participants: this.participants,
                    attributes : this.attributes,
                    contractDate: this.contractDate,
                })
                .then(response => {
                    if(response.data.success){
                        this.price = response.data.premium;
                        this.calculated = true;
                    }else{
                        alert(response.data.error)
                    }
                })
                .catch(error => {
                    alert(error)
                });
            }
        },
        watch : {
            attributes(){
                this.calculated = false;
                this.price = 0;
            },
            SubjISN(){
                this.calculated = false;
                this.price = 0;
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