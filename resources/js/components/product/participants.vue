<template>
    <div>
        <div v-show="participant.subjISN != null && participant.subjISN != ''">
            <div class="col-md-12 text-center">
                <span v-if="participant.lastName != null" >
                    {{ participant.lastName+' '+participant.firstName+' '+participant.patronymic }}
                </span>
                <span v-else>{{ participant.orgName }}</span>
            </div>

            <button type="button" class="add-button width100 mt-2" @click="openParticipantForm(pIndex)">
                Изменить
                <span v-if="!moreParticipant">
                    <span v-if="participant.Label">({{ participant.Label }})</span>
                    <span v-else>(Страхователь)</span>
                </span>
            </button>
        </div>
        <button v-show="participant.subjISN == null || participant.subjISN == ''"
                type="button" class="add-button width100 mt-2"
                @click="openParticipantForm(pIndex)">
            Указать
            <span v-if="participant.Label">({{ participant.Label }})</span>
            <span v-else>(Страхователь)</span>
        </button>
        <modal :name="modalName"
               :width="width"
               :minHeight="height">
            <div class="participant-form">
                <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5">
                    <div class="col-12"><label v-if="participant.Label" class="bold">{{ participant.Label }}</label></div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">ИИН/БИН : {{ participant.data }}</label>
                        <input type="text" v-model="participant.iin" class="attr-input-text col-12" maxlength="12">
                    </div>

                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Фамилия : </label>
                        <input type="text" v-model="participant.lastName" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>
                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Имя : </label>
                        <input type="text" v-model="participant.firstName" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>
                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Отчество : </label>
                        <input type="text" v-model="participant.patronymic" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>
                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Тип документа : </label>
                        <input type="text" v-model="participant.docType" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>
                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Номер документа : </label>
                        <input type="text" v-model="participant.docNumber" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>
                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Дата документа : </label>
                        <input type="text" v-model="participant.docDate" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>
                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Email : </label>
                        <input type="text" v-model="participant.email" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>
                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Номер телефона : </label>
                        <input type="text" v-model="participant.phone" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>

                    <div v-if="computedJuridical && !moreParticipant" class="col-lg-7 col-xl-7 col-md-6 col-sm-6 col-12">
                        <label class="bold">Наименование организации : </label>
                        <input type="text" v-model="participant.orgName" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>
                    <div v-if="computedJuridical && !moreParticipant" class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12">
                        <label class="bold">Вид деятельности : </label>
                        <input type="text" v-model="participant.okvdName" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>
                    <div v-if="computedJuridical && !moreParticipant" class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12">
                        <label class="bold">Сектор экономики : </label>
                        <input type="text" v-model="participant.economicName" class="attr-input-text col-12 bg-white" disabled="true">
                    </div>

                    <div v-if="moreParticipant" class="col-lg-12 mt-3">
                        <label class="bold">Выберите из списка</label>
                        <select class="custom-select" v-model="isn">
                            <option v-for="participant in aFewParticipants" :value="participant.ISN">{{participant.Data}}</option>
                        </select>
                    </div>
                </div>

                <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5">
                    <div v-if="search.not_found" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="addParticipantToKias(pIndex)">Добавить {{ participant.Label }}</button>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="closeParticipantForm(pIndex)">Закрыть</button>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="searchParticipant">Поиск</button>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="save">Сохранить</button>
                    </div>
                    <div v-if="participant.ISN == 2082" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="addParticipant">Добавить еще</button>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="deleteParticipant">Удалить этот раздел</button>
                    </div>
                    <!-- v-if="participant.ISN == 2082 && participant.new"  -->
                </div>
            </div>
        </modal>
        <participant-create
                v-if="search.not_found"
                :pIndex="pIndex"
                :participant="participant"
                :search="search"
                :searchParticipant="searchParticipant"
                :preloader="preloader">
        </participant-create>
    </div>
</template>

<script>
    export default {
        name: "participant",
        data() {
            return {
                moreParticipant : false,
                isn: null,
                subjISN: '',
                width : 0,
                height : 0,
                aFewParticipants: [],
                search: {
                    not_found: false
                }
            }
        },
        props: {
            productId: String,
            participant: Object,
            pIndex: Number,
            participants: Array,
            preloader: Function,
            formular: Object,
            calcChanged: Function
        },
        created(){
            this.width = window.innerWidth;
            this.height = window.innerHeight;
        },
        methods: {
            addParticipantToKias(pIndex){
                this.$modal.show('participant-create-'+pIndex);
            },
            openParticipantForm(pIndex){
                this.$modal.show('participant-form-'+pIndex);
            },
            closeParticipantForm(pIndex){
                this.$modal.hide('participant-form-'+pIndex);
            },
            searchParticipant(){
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
                    this.moreParticipant = false;
                    if(response.count === 1){
                        if(Object.keys(this.formular).length > 0) {
                            if (this.formular.insurant.isn == this.participant.ISN && this.formular.insurant.phys && !this.formular.insurant.jur) {
                                if (response.participant.FirstName == null || response.participant.FirstName == '') {
                                    alert('Физическое лицо не найдено');
                                    this.preloader(false);
                                    this.participant.iin = '';
                                    return false;
                                }
                            }
                            if (this.formular.insurant.isn == this.participant.ISN && this.formular.insurant.jur && !this.formular.insurant.phys) {
                                if (response.participant.OrgName == null || response.participant.OrgName == '') {
                                    alert('Юридическое лицо не найдено');
                                    this.preloader(false);
                                    this.participant.iin = '';
                                    return false;
                                }
                            }
                        }

                        this.moreParticipant = false;
                        this.participant.firstName = response.participant.FirstName;
                        this.participant.lastName = response.participant.LastName;
                        this.participant.patronymic = response.participant.Patronymic;
                        this.participant.orgName = response.participant.OrgName;
                        this.participant.docType = response.participant.docType;
                        this.participant.docNumber = response.participant.docNumber;
                        this.participant.docDate = response.participant.docDate;
                        this.participant.email = response.participant.email;
                        this.participant.phone = response.participant.phone;
                        this.participant.juridical = response.participant.Juridical;
                        this.participant.birthDay = response.participant.birthDay;
                        this.participant.okvdName = response.participant.okvdName;
                        this.participant.economicName = response.participant.economicName;

                        this.participant.iin = response.participant.IIN;
                        this.isn = response.participant.ISN;
                    }else{
                        this.moreParticipant = true;
                        this.aFewParticipants = response.participant;
                    }
                    this.preloader(false);
                }else{
                    if(response.not_found){
                        this.search.not_found = true;
                    }
                    alert(response.error);
                    this.preloader(false);
                }
            },
            save(){
                let partName = this.participant.Label ? this.participant.Label : 'Страхователь';
                if(this.isn != null && this.isn != '') {
                    this.participant.subjISN = this.isn;
                    this.participant.Value = this.isn;
                    this.subjISN = this.isn;
                    this.closeParticipantForm(this.pIndex);
                    alert(partName+' успешно добавлен!');
                } else {
                    alert('Не выбран '+partName);
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
                    orgName: '',
                    docType: '',
                    docNumber: '',
                    docDate: '',
                    email: '',
                    phone: '',
                    juridical: '',
                    birthDay: '',
                    okvdName: '',
                    economicName: '',
                });
            },
            clearParticipant(){
                this.participant.firstName = null;
                this.participant.lastName = null;
                this.participant.patronymic = null;
                this.participant.orgName = null;
                this.participant.iin = null;
                this.participant.Value = '';
                this.participant.docType = null;
                this.participant.docNumber = null;
                this.participant.docDate = null;
                this.participant.email = null;
                this.participant.phone = null;
                this.participant.juridical = null;
                this.participant.birthDay = null;
                this.participant.okvdName = null;
                this.participant.economicName = null;
            },
            deleteParticipant(){
                if(confirm("Вы точно хотите удалить раздел "+this.participant.Label+'?')) {
                    this.participants.splice(this.pIndex, 1);
                    this.closeParticipantForm(this.pIndex);
                    this.calcChanged();
                }
            }
        },
        computed: {
            modalName(){
                return 'participant-form-'+this.pIndex;
            },
            computedPhysical(){
                //let result = !this.moreParticipant && this.participant.lastName != null && this.participant.lastName != '' ? true : false;
                let result = !this.modeParticipant && this.participant.juridical == 'N' ? true : false;
                return result;
            },
            computedJuridical(){
                //let result = !this.moreParticipant && this.participant.orgName != null && this.participant.orgName != '' ? true : false;
                let result = !this.modeParticipant && this.participant.juridical == 'Y' ? true : false;
                return result;
            }
        },
        watch: {
            'participant.Value': function (val, oldVal) {
                if(Object.keys(this.formular).length > 0) {
                    if (this.participant.ISN == this.formular.insurant.isn) {
                        this.$parent.subjISN = val;
                    }
                }
                this.calcChanged();
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