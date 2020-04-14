<template>
    <div>
        <div class="col-md-12 mb-4">
            <div class="row">
                <participant v-for="(participant,index) in participants"
                             :key="index"
                             :p-index="index"
                             :participant="participant"
                             :participants="participants"
                             :product-id="id">
                </participant>
            </div>
        </div>

        <div>
            <period :period="period"></period>
        </div>

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
                participants: [],
                attributes: [],
                moreParticipant : false,
                isn: '',
                subjISN : '',
                width : 0,
                height : 0,
                calculated : false,
                price : 0,
                period: {
                    dateBeg : new Date(new Date().getFullYear(), new Date().getMonth(),  new Date().getDate(), 6).toJSON().slice(0, 10),
                    dateEnd : new Date(new Date().getFullYear(), new Date().getMonth(),  new Date().getDate(), 6).toJSON().slice(0, 10),
                    period : 12,
                    dateSig: new Date(new Date().getFullYear(), new Date().getMonth(),  new Date().getDate(), 6).toJSON().slice(0, 10),
                }
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
            this.getFullQuotationAttributes();
            this.getFullParticipants();
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
            getFullParticipants() {
                this.axios.post('/getFullParticipants', {
                    id: this.id,
                    quotationId: this.quotationId
                })
                    .then(response => {
                        if(response.data.success){
                            this.participants = response.data.participants;
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