<template>
    <div>
        <button type="button" class="add-button width100 mt-2" @click="openParticipantForm">Добавить страхователя</button>
        <div v-for="attribute in attributes">
            <agr-attributes :attribute="attribute"></agr-attributes>
        </div>
        <div class="d-flex justify-content-end col-12 p-0 mb-5">
            <div class="col-12 text-center p-0">
                <button class="btn btn-outline-info" @click="calculate">Рассчитать стоимость</button>
                <div class="fs-2 col-12" v-if="calculated">Сумма премий {{price}} Тенге</div>
                <button class="btn btn-outline-info" v-if="calculated" @click="createFullQuotation">Создать полную котировку</button>
            </div>
        </div>
        <modal name="participant-form"
            :width="width"
            :minHeight="height">
            <div class="participant-form">
                <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5 justify-content-end">
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">ИИН : </label>
                        <input type="text" v-model="iin" class="attr-input-text col-12">
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Фамилия : </label>
                        <input type="text" v-model="lastName" class="attr-input-text col-12">
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Имя : </label>
                        <input type="text" v-model="firstName" class="attr-input-text col-12">
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Отчество : </label>
                        <input type="text" v-model="patronymic" class="attr-input-text col-12">
                    </div>
                </div>
                <div v-if="moreParticipant" class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5 justify-content-end">
                    <select class="custom-select" v-model="isn">
                        <option v-for="participant in participants" :value="participant.ISN">{{participant.Data}}</option>
                    </select>
                </div>
                <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5 justify-content-end">
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="closeParticipantForm">Закрыть</button>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="search">Поиск</button>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="save">Сохранить</button>
                    </div>
                </div>
            </div>
        </modal>
    </div>
</template>

<script>
    export default {
        name: "express",
        data() {
            return {
                attributes: [],
                moreParticipant : false,
                participants: [],
                isn: '',
                subjISN : '',
                iin: '',
                firstName: '',
                lastName: '',
                patronymic: '',
                width : 0,
                height : 0,
                calculated : false,
                price : 0,
            }
        },
        props: {
            id: String
        },
        created(){
            this.width = window.innerWidth;
            this.height = window.innerHeight;
        },
        mounted() {
            this.getExpressAttributes()
        },
        methods: {
            getExpressAttributes() {
                this.axios.post('/getExpressAttributes', {
                    id: this.id
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
            openParticipantForm(){
                this.$modal.show('participant-form');
            },
            closeParticipantForm(){
                this.$modal.hide('participant-form');
            },
            search(){
                this.axios.post('/searchSubject', {
                    firstName : this.firstName,
                    lastName : this.lastName,
                    patronymic : this.patronymic,
                    iin : this.iin,
                })
                .then(response => {
                    this.fetchParticipantSearch(response.data);
                })
                .catch(error => {
                    alert(error);
                });
            },
            fetchParticipantSearch(response){
                if(response.success){
                    if(response.count === 1){
                        this.moreParticipant = false;
                        this.firstName = response.participant.FirstName;
                        this.lastName = response.participant.LastName;
                        this.patronymic = response.participant.Patronymic;
                        this.iin = response.participant.IIN;
                        this.isn = response.participant.ISN;
                    }else{
                        this.moreParticipant = true;
                        this.participants = response.participant;
                    }
                }else{
                    alert(response.error);
                }
            },
            save(){
                this.subjISN = this.isn;
                this.closeParticipantForm();
                alert('Страхователь успешно добавлен!');
            },
            calculate(){
                this.axios.post('/express/calculate', {
                    subjISN : this.subjISN,
                    id : this.id,
                    attributes : this.attributes
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
            },
            createFullQuotation(){
                window.location.href="/full/calc/"+this.id+"/0";
                // this.axios.post('/full/create', {
                //     subjISN : this.subjISN,
                //     id : this.id,
                //     attributes : this.attributes
                // })
                //     .then(response => {
                //         if(response.data.success){
                //             window.location.href="/full/calc/"+this.id+"/0"+response.data.id;
                //         }else{
                //             alert(response.data.error)
                //         }
                //     })
                //     .catch(error => {
                //         alert(error)
                //     });
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