<template>
    <div class="col-md-6">
        <button type="button" class="add-button width100 mt-2" @click="openParticipantForm(pIndex)">
            Добавить ({{ participant.Label }})
        </button>
        <modal :name="modalName"
               :width="width"
               :minHeight="height">
            <div class="participant-form">
                <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5 justify-content-end">
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">ИИН : {{ participant.data }}</label>
                        <input type="text" v-model="participant.iin" class="attr-input-text col-12">
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Фамилия : </label>
                        <input type="text" v-model="participant.lastName" class="attr-input-text col-12">
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Имя : </label>
                        <input type="text" v-model="participant.firstName" class="attr-input-text col-12">
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Отчество : </label>
                        <input type="text" v-model="participant.patronymic" class="attr-input-text col-12">
                    </div>
                </div>
                <!--div v-if="moreParticipant" class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5 justify-content-end">
                    <select class="custom-select" v-model="isn">
                        <option v-for="participant in participants" :value="participant.ISN">{{participant.Data}}</option>
                    </select>
                </div-->
                <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5 justify-content-end">
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="closeParticipantForm(pIndex)">Закрыть</button>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="search">Поиск</button>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="save">Сохранить</button>
                    </div>
                    <div v-if="participant.ISN == 2082" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="addParticipant">Добавить еще {{ participant.data }}</button>
                    </div>
                    <div v-if="participant.ISN == 2082 && participant.new" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="deleteParticipant">Удалить {{ participant.data }}</button>
                    </div>
                </div>
            </div>
        </modal>
    </div>
</template>

<script>
    export default {
        name: "participant",
        data() {
            return {
                moreParticipant : false,
                isn: '',
                subjISN: '',
                width : 0,
                height : 0,
            }
        },
        props: {
            productId: String,
            participant: Object,
            pIndex: Number,
            participants: Array
        },
        created(){
            this.width = window.innerWidth;
            this.height = window.innerHeight;
        },
        methods: {
            openParticipantForm(pIndex){
                this.$modal.show('participant-form-'+pIndex);
            },
            closeParticipantForm(pIndex){
                this.$modal.hide('participant-form-'+pIndex);
            },
            search(){
                this.axios.post('/searchSubject', {
                    firstName : this.participant.firstName,
                    lastName : this.participant.lastName,
                    patronymic : this.participant.patronymic,
                    iin : this.participant.iin,
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
                        this.participant.firstName = response.participant.FirstName;
                        this.participant.lastName = response.participant.LastName;
                        this.participant.patronymic = response.participant.Patronymic;
                        this.participant.iin = response.participant.IIN;
                        this.isn = response.participant.ISN;
                        //this.participant.subjISN = response.participant.ISN;
                    }else{
                        this.moreParticipant = true;
                        this.participants = response.participant;
                    }
                }else{
                    alert(response.error);
                }
            },
            save(){
                this.participant.subjISN = this.isn;
                this.participant.Value = this.isn;
                this.subjISN = this.isn;
                this.closeParticipantForm(this.pIndex);
                alert('Страхователь успешно добавлен!');
            },
            addParticipant(){
                this.participants.push({
                    ISN:this.participant.ISN,
                    data:this.participant.data,
                    Label:this.participant.Label,
                    new: true,
                    iin: '',
                    subjISN: '',
                    Value: '',
                    lastName: '',
                    firstName: '',
                    patronymic: ''
                });
            },
            deleteParticipant(){
                this.participants.splice(this.pIndex,1);
            }
        },
        computed: {
            modalName(){
                return 'participant-form-'+this.pIndex;
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