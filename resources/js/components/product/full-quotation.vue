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

        <div class="agr-block">
            <div v-for="attribute in attributes">
                <agr-attributes :attribute="attribute"></agr-attributes>
            </div>

            <div v-for="agrclause in agrclauses">
                <agr-clause :agrclause="agrclause"></agr-clause>
            </div>
        </div>

        <div class="d-flex justify-content-center w-100 mt-3 mb-3">
            <div>
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
                agrclauses: [],
                moreParticipant : false,
                isn: '',
                subjISN : '',
                width : 0,
                height : 0,
                calculated : false,
                price : 0,
                period: {
                    begin : new Date(new Date().getFullYear(), new Date().getMonth(),  new Date().getDate(), 6).toJSON().slice(0, 10),
                    end : new Date(new Date().getFullYear(), new Date().getMonth(),  new Date().getDate(), 6).toJSON().slice(0, 10),
                    period : 12,
                    sig: new Date(new Date().getFullYear(), new Date().getMonth(),  new Date().getDate(), 6).toJSON().slice(0, 10),
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
            // this.getFullAttributes();
            // this.getFullParticipants();
            // this.getFullAgrclause();
            this.getFullData();
        },
        methods: {
            getFullData() {
                this.axios.post('/getFullData', {
                    id: this.id,
                    quotationId: this.quotationId
                })
                    .then(response => {
                        if(response.data.success){
                            this.participants = response.data.participants;
                            this.agrclauses = response.data.agrclauses;
                            this.attributes = response.data.attributes;
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            // getFullAttributes() {
            //     this.axios.post('/getFullAttributes', {
            //         id: this.id,
            //         quotationId: this.quotationId
            //     })
            //         .then(response => {
            //             if(response.data.success){
            //                 this.attributes = response.data.attributes;
            //             }else{
            //                 alert(response.data.error);
            //             }
            //         })
            //         .catch(error => {
            //             alert(error);
            //         });
            // },
            // getFullParticipants() {
            //     this.axios.post('/getFullParticipants', {
            //         id: this.id,
            //         quotationId: this.quotationId
            //     })
            //         .then(response => {
            //             if(response.data.success){
            //                 this.participants = response.data.participants;
            //             }else{
            //                 alert(response.data.error);
            //             }
            //         })
            //         .catch(error => {
            //             alert(error);
            //         });
            // },
            // getFullAgrclause() {
            //     this.axios.post('/getFullAgrclause', {
            //         id: this.id,
            //         quotationId: this.quotationId
            //     })
            //         .then(response => {
            //             if(response.data.success){
            //                 this.agrclauses = response.data.agrclauses;
            //             }else{
            //                 alert(response.data.error);
            //             }
            //         })
            //         .catch(error => {
            //             alert(error);
            //         });
            // },
            calculate(){
                if(this.checkInputs(this.participants) && this.checkInputs(this.attributes)&& this.checkInputs(this.agrclauses)) {
                    this.axios.post('/full/calculate', {
                        subjISN: this.subjISN,
                        id: this.id,
                        participants: this.participants,
                        attributes: this.attributes,
                        agrclauses: this.agrclauses,
                        contractDate: this.period,
                    })
                        .then(response => {
                            if (response.data.success) {
                                this.price = response.data.premium;
                                this.calculated = true;
                            } else {
                                alert(response.data.error)
                            }
                        })
                        .catch(error => {
                            alert(error)
                        });
                } else {
                    alert('Укажите пожалуйста все данные')
                }
            },
            checkInputs(section){
                let result = true;
                for(let item in section){
                    section[item].Value == '' || section[item].Value == null ? result = false : '';
                }
                return result;
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
