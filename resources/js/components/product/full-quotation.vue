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

        <div class="d-flex justify-content-end col-12">
            <div class="col-12">
                <button class="btn btn-outline-info" @click="calculate">Рассчитать стоимость</button>
                <span class="fs-2" v-if="calculated">{{price}} Тенге</span>
                <button class="btn btn-outline-info" @click="getFullObjects">Отправить в ДА</button>
                <button class="btn btn-outline-info" @click="getFullObjects">Добавить еще</button>
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
        },
        mounted() {
            this.getFullData();

        },
        methods: {
            getFullObjects() {
                this.axios.post('/getFullObjects', {
                    id: this.id,
                    quotationId: this.quotationId
                })
                    .then(response => {
                        if(response.data.success){
                            // if(Object.keys(this.agrobjects).length == 0){
                            //      this.agrobjects = response.data.objects;
                            // } else {
                                this.agrobjects.push(response.data.objects);
                            //}
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            getFullData() {
                this.axios.post('/getFullData', {
                    id: this.id,
                    quotationId: this.quotationId
                })
                    .then(response => {
                        if(response.data.success){
                            this.formular = response.data.formular;
                            this.participants = response.data.participants;
                            this.agrclauses = response.data.agrclauses;
                            this.attributes = response.data.attributes;
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
                    this.axios.post('/full/calculate', {
                        subjISN: this.subjISN,
                        id: this.id,
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