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

        <div v-for="agrclause in agrclauses">
            <agr-clause :agrclause="agrclause"></agr-clause>
        </div>

        <div v-for="(agrobject,index) in agrobjects">
            <agr-object :agrobject="agrobject" :aIndex="index"></agr-object>
        </div>

        <upload-docs :docs="docs" :quotationId="quotationId"></upload-docs>

        <div class="d-flex justify-content-end col-12">
            <div class="col-12">
                <button v-if="contract_number === null && quotationId == 0" class="btn btn-outline-info" @click="calculate">
                    Рассчитать стоимость
                </button>
                <span class="fs-2" v-if="calculated">{{price}} Тенге</span>
                <div @click="sendDocs">sendDocs</div>
                <!--button class="btn btn-outline-info" @click="getFullObjects">Отправить в ДА</button>
                <button class="btn btn-outline-info" @click="getFullObjects">Добавить еще</button-->
                <button v-if="contract_number === null && calc_isn != null" class="btn btn-outline-info" @click="createAgr">Выпустить договор</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "full-quotation",
        data() {
            return {
                calc_isn: null,
                contract_number: null,
                docs: {
                    files: []
                },
                participants: [],
                attributes: [],
                agrclauses: [],
                formular: [],
                agrobjects: [],
                moreParticipant : false,
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
            this.quotationId == 0 ? this.calculated = false : this.calculated = true;
        },
        mounted() {
            this.getFullData();

        },
        methods: {
            getFullObjects() {
                this.axios.post('/full/getFullObjects', {
                    id: this.id,
                    quotationId: this.quotationId
                })
                    .then(response => {
                        if(response.data.success){
                            if(this.quotationId != 0){
                                 this.agrobjects = response.data.objects;
                            } else {
                                this.agrobjects.push(response.data.objects);
                            }
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            getFullData() {
                this.axios.post('/full/getFullData', {
                    id: this.id,
                    quotationId: this.quotationId
                })
                    .then(response => {
                        if(response.data.success){
                            this.formular = response.data.formular;
                            this.participants = response.data.participants;
                            this.agrclauses = response.data.agrclauses;
                            this.attributes = response.data.attributes;
                            this.calc_isn = response.data.calc_isn;
                            this.contract_number = response.data.contract_number;
                            this.price = parseInt(response.data.price);
                            this.docs.files = response.data.docs;
                            this.getFullObjects();
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },

            calculate(){
                //if(this.checkInputs(this.participants) && this.checkInputs(this.attributes)&& this.checkInputs(this.agrclauses)) {
                this.axios.post('/full/calculate',
                    {
                        subjISN: this.subjISN,
                        id: this.id,
                        quotationId: this.quotationId,
                        participants: this.participants,
                        attributes: this.attributes,
                        agrclauses: this.agrclauses,
                        formular: this.formular,
                        agrobjects: this.agrobjects,
                        contractDate: this.period,
                    })
                    .then(response => {
                        if (response.data.success) {
                            this.price = response.data.premium;
                            this.calculated = true;
                            this.calc_isn = response.data.calc_isn;
                            if(response.data.calc_isn != '') {
                                this.sendDocs();
                            }
                        } else {
                            alert(response.data.error)
                        }
                    })
                    .catch(error => {
                        alert(error)
                    });
                // } else {
                //     alert('Укажите пожалуйста все данные')
                // }
            },
            createAgr(){        // Выпустить договор
                this.axios.post('/full/create-agr',
                    {
                        calc_isn: this.calc_isn
                    })
                    .then(response => {
                        if (response.data.success) {
                            this.contract_number = response.data.contract_number;
                        } else {
                            alert(response.data.error)
                        }
                    })
                    .catch(error => {
                        alert(error)
                    });
            },
            // calculate(){
            //     //if(this.checkInputs(this.participants) && this.checkInputs(this.attributes)&& this.checkInputs(this.agrclauses)) {
            //     this.axios.post('/full/calculate', this.getFormData(), {
            //         headers: {
            //             'Content-Type': 'multipart/form-data'
            //         }
            //     })
            //         .then(response => {
            //             if (response.data.success) {
            //                 this.price = response.data.premium;
            //                 this.calculated = true;
            //             } else {
            //                 alert(response.data.error)
            //             }
            //         })
            //         .catch(error => {
            //             alert(error)
            //         });
            //     // } else {
            //     //     alert('Укажите пожалуйста все данные')
            //     // }
            // },
            sendDocs(){
                let formData = new FormData();
                formData.append('id', this.id);
                //formData.append('quotationId', this.quotationId);
                formData.append('calc_isn', this.calc_isn);
                if(Object.keys(this.docs.files).length > 0) {
                    for (let i in this.docs.files) {
                        formData.append('files[' + i + ']', this.docs.files[i]);
                    }
                    this.axios.post('/full/send-docs', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                        .then(response => {
                            if (response.data.success) {
                                console.log('Files sended successfull');
                            } else {
                                alert(response.data.error)
                            }
                        })
                        .catch(error => {
                            alert(error)
                        });
                }
            },
            // getFormData() {
            //     let formData = new FormData();
            //     formData.append('subjISN', this.subjISN);
            //     formData.append('id', this.id);
            //     formData.append('quotationId', JSON.stringify(this.quotationId));
            //     formData.append('participants', JSON.stringify(this.participants));
            //     formData.append('attributes', JSON.stringify(this.attributes));
            //     formData.append('agrclauses', JSON.stringify(this.agrclauses));
            //     formData.append('formular', JSON.stringify(this.formular));
            //     formData.append('agrobjects', JSON.stringify(this.agrobjects));
            //     formData.append('contractDate', JSON.stringify(this.period));
            //     if(Object.keys(this.docs.files).length > 0) {
            //         for (let i in this.docs.files) {
            //             formData.append('files[' + i + ']', this.docs.files[i]);
            //         }
            //     }
            //     return formData;
            // },
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
                if(this.quotationId == 0) {
                    this.calculated = false;
                    this.price = 0;
                }
            },
            SubjISN(){
                if(this.quotationId == 0) {
                    this.calculated = false;
                    this.price = 0;
                }
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