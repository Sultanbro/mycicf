<template>
    <div class="col-md-4">
        <button type="button" class="add-button width100 mt-2" @click="openParticipantForm(pIndex)">
            Добавить ({{ participant.Label }})
        </button>
        <modal :name="modalName"
               :width="width"
               :minHeight="height">
            <div class="participant-form">
                <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5">
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">ИИН/БИН : {{ participant.data }}</label>
                        <input type="text" v-model="participant.iin" class="attr-input-text col-12">
                    </div>

                    <div v-if="computedPhysical" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Фамилия : </label>
                        <input type="text" v-model="participant.lastName" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>
                    <div v-if="computedPhysical" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Имя : </label>
                        <input type="text" v-model="participant.firstName" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>
                    <div v-if="computedPhysical" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Отчество : </label>
                        <input type="text" v-model="participant.patronymic" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>


                    <div v-if="computedJuridical" class="col-lg-7 col-xl-7 col-md-6 col-sm-6 col-12">
                        <label class="bold">Наименование организации : </label>
                        <input type="text" v-model="participant.orgName" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>

                    <div v-if="moreParticipant" class="col-lg-12 mt-3">
                        <label class="bold">Выберите из списка</label>
                        <select class="custom-select" v-model="isn">
                            <option v-for="participant in aFewParticipants" :value="participant.ISN">{{participant.Data}}</option>
                        </select>
                    </div>
                </div>

                <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5">
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
                aFewParticipants: [],
            }
        },
        props: {
            productId: String,
            participant: Object,
            pIndex: Number,
            participants: Array,
            preloader: Function,
            formular: Object
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
                this.preloader(true);
                this.axios.post('/searchSubject', {
                    iin : this.participant.iin,
                })
                .then(response => {
                    this.fetchParticipantSearch(response.data);
                })
                .catch(error => {
                    alert(error);
                    this.preloader(false);
                });
            },
            fetchParticipantSearch(response){
                if(response.success){
                    if(response.count === 1){
                        if(this.formular.insurant.isn == this.participant.ISN && this.formular.insurant.phys && !this.formular.insurant.jur){
                            if(response.participant.FirstName == null || response.participant.FirstName == ''){
                                alert('Физическое лицо не найдено');
                                this.preloader(false);
                                this.participant.iin = '';
                                return false;
                            }
                        }
                        if(this.formular.insurant.isn == this.participant.ISN && this.formular.insurant.jur && !this.formular.insurant.phys){
                            if(response.participant.OrgName == null || response.participant.OrgName == ''){
                                alert('Юридическое лицо не найдено');
                                this.preloader(false);
                                this.participant.iin = '';
                                return false;
                            }
                        }

                        this.moreParticipant = false;
                        this.participant.firstName = response.participant.FirstName;
                        this.participant.lastName = response.participant.LastName;
                        this.participant.patronymic = response.participant.Patronymic;
                        this.participant.orgName = response.participant.OrgName,
                        this.participant.iin = response.participant.IIN;
                        this.isn = response.participant.ISN;
                    }else{
                        this.moreParticipant = true;
                        this.aFewParticipants = response.participant;
                    }
                    this.preloader(false);
                }else{
                    alert(response.error);
                    this.preloader(false);
                }
            },
            save(){
                if(this.isn != null && this.isn != '') {
                    this.participant.subjISN = this.isn;
                    this.participant.Value = this.isn;
                    this.subjISN = this.isn;
                    this.closeParticipantForm(this.pIndex);
                    alert(this.participant.Label+' успешно добавлен!');
                } else {
                    alert('Не выбран страхователь');
                }
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
                    patronymic: '',
                    orgName: ''
                });
            },
            clearParticipant(){
                this.participant.firstName = null;
                this.participant.lastName = null;
                this.participant.patronymic = null;
                this.participant.orgName = null;
                this.participant.iin = null;
                this.participant.Value = '';
            },
            deleteParticipant(){
                this.participants.splice(this.pIndex,1);
            }
        },
        computed: {
            modalName(){
                return 'participant-form-'+this.pIndex;
            },
            computedPhysical(){
                let result = !this.moreParticipant && this.participant.lastName != null && this.participant.lastName != '' ? true : false;
                return result;
            },
            computedJuridical(){
                let result = !this.moreParticipant && this.participant.orgName != null && this.participant.orgName != '' ? true : false;
                return result;
            }
        },
        watch: {
            'participant.Value': function (val, oldVal) {
                if (this.participant.ISN == this.formular.insurant.isn) {
                    this.$parent.subjISN = val;
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