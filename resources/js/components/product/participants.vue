<template>
    <div>
        <div v-show="participant.subjISN != null && participant.subjISN != ''">
            <div class="col-md-12 text-center">
                <span v-if="participant.lastName != null" >
                    {{ participant.lastName+' '+participant.firstName+' '+participant.patronymic }}
                </span>
                <span v-else>{{ participant.orgName }}</span>
            </div>

            <button type="button" class="add-button width100 mt-2 " @click="openParticipantForm(pIndex)">
                Изменить
                <span v-if="!moreParticipant">
                    <span v-if="participant.Label">({{ participant.Label }})</span>
                    <span v-else>(Страхователь)</span>
                </span>
            </button>
        </div>
        <div class=" flex-center">
            <button v-show="participant.subjISN == null || participant.subjISN == ''"
                    type="button" class="btn btn-outline-info md-7 width100 "
                    @click="openParticipantForm(pIndex)">
                Указать
                <span v-if="participant.Label">({{ participant.Label }})</span>
                <span v-else>(Страхователь)</span>
            </button>
        </div>

        <modal :name="modalName"
               :width="width"
               :height="height">
            <div class="participant-form">
                <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5">
                    <div class="col-12"><label v-if="participant.Label" class="bold">{{ participant.Label }}</label></div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">ИИН/БИН : {{ participant.data }}</label>
                        <input type="text" v-model="participant.iin" class="attr-input-text col-12" maxlength="12">
                    </div>

                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Фамилия : </label>
                        <input type="text" v-model="participant.lastName" @keyup="participantEdited = true" class="attr-input-text col-12 bg-white">
                    </div>
                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Имя : </label>
                        <input type="text" v-model="participant.firstName" @keyup="participantEdited = true" class="attr-input-text col-12 bg-white">
                    </div>
                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Отчество : </label>
                        <input type="text" v-model="participant.patronymic" @keyup="participantEdited = true" class="attr-input-text col-12 bg-white">
                    </div>
                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Дата рождения : </label>
                        <input type="text"
                               v-mask="'##.##.####'"
                               v-model="participant.birthDay"
                               @keyup="participantEdited = true"
                               class="attr-input-text col-12 bg-white">
                    </div>

                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Тип документа : </label>
                        <!--input type="text" v-model="participant.docType" class="attr-input-text col-12 bg-white"-->
                        <select class="custom-select"
                                v-if="Object.keys(participantDocs.types).length > 0"
                                @change="participantEdited = true"
                                v-model="participant.docType">
                            <option v-for="doc in participantDocs.types" :value="doc.Value[0]">{{doc.Label[0]}}</option>
                        </select>
                    </div>
                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Номер документа : </label>
                        <input type="text"
                               v-model="participant.docNumber"
                               @keyup="participantEdited = true"
                               class="attr-input-text col-12 bg-white">
                    </div>
                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Дата документа : </label>
                        <input type="text"
                               v-model="participant.docDate"
                               @keyup="participantEdited = true"
                               class="attr-input-text col-12 bg-white">
                    </div>
                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Email : </label>
                        <input type="text"
                               v-model="participant.email"
                               @keyup="participantEdited = true"
                               class="attr-input-text col-12 bg-white">
                    </div>
                    <div v-if="computedPhysical && !moreParticipant" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Номер телефона : </label>
                        <input type="text"
                               v-mask="'+###########'"
                               @keyup="participantEdited = true"
                               v-model="participant.phone"
                               class="attr-input-text col-12 bg-white">
                    </div>

                    <div v-if="computedJuridical && !moreParticipant" class="col-lg-7 col-xl-7 col-md-6 col-sm-6 col-12">
                        <label class="bold">Наименование организации : </label>
                        <input type="text"
                               v-model="participant.orgName"
                               class="attr-input-text col-12 bg-white"
                               @keyup="participantEdited = true">
                    </div>
                    <div v-if="computedJuridical && !moreParticipant" class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12">
                        <label class="bold">Вид деятельности : </label>
                        <input type="text"
                               v-model="participant.okvdName"
                               class="attr-input-text col-12 bg-white"
                               disabled="true">
                    </div>
                    <div v-if="computedJuridical && !moreParticipant" class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12">
                        <label class="bold">Сектор экономики : </label>
                        <input type="text"
                               v-model="participant.economicName"
                               class="attr-input-text col-12 bg-white"
                               disabled="true">
                    </div>

                    <div v-if="moreParticipant" class="col-lg-12 mt-3">
                        <label class="bold">Выберите из списка</label>
                        <select class="custom-select" v-model="isn">
                            <option v-for="participant in aFewParticipants" :value="participant.ISN">{{participant.Data}}</option>
                        </select>
                    </div>

                    <div class="pl-0 mt-3 mb-3 col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12">
                        <div v-for="part,index in participants"
                             class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12">
                            <label v-if="participant.ISN == formular.insurant.isn && part.ISN == '2082'"
                                   for="yes" class="bold">{{ part.Label }}</label>
                            <input type="checkbox"
                                   @change="calcChanged();insPartIs(part,index,$event)"
                                   v-if="participant.ISN == formular.insurant.isn && part.ISN == '2082'"
                                   class="mt-2 ml-2"
                                   id="yes"
                                   v-model="insurantIs.participant">

                            <label v-if="participant.ISN == formular.insurant.isn && part.ISN == '2081'"
                                   for="yesp" class="bold">{{ part.Label }}</label>
                            <input type="checkbox"
                                   @change="calcChanged();insPartIs(part,index,$event)"
                                   v-if="participant.ISN == formular.insurant.isn && part.ISN == '2081'"
                                   class="mt-2 ml-2"
                                   id="yesp"
                                   v-model="insurantIs.receiver"
                                   value="true">

                            <label v-if="participant.ISN == '2082' && part.ISN == '2081'"
                                   for="yesr" class="bold">{{ part.Label }}</label>
                            <input type="checkbox"
                                   @change="calcChanged();insPartIs(part,index,$event)"
                                   v-if="participant.ISN == '2082' && part.ISN == '2081'"
                                   class="mt-2 ml-2"
                                   id="yesr"
                                   v-model="participantIs.receiver"
                                   value="true">
                        </div>
                    </div>
                </div>

                <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5">
                    <div v-if="search.not_found" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="addParticipantToKias(pIndex)">Добавить {{ participant.Label }}</button>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info marg-btn" @click="closeParticipantForm(pIndex)">Закрыть</button>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info marg-btn" @click="searchParticipant">Поиск</button>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="save()">Сохранить</button>
                    </div>
                    <div v-if="participant.ISN == 2082" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="addParticipant">Добавить еще</button>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button v-if="participant.ISN != 2103"
                                class="width100 btn btn-outline-info"
                                @click="deleteParticipant">Удалить этот раздел</button>
                    </div>
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
    import {mask} from 'vue-the-mask'
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
                },
                participantEdited: false,
            }
        },
        directives: {mask},
        props: {
            productId: String,
            participant: Object,
            pIndex: Number,
            participants: Array,
            preloader: Function,
            formular: Object,
            calcChanged: Function,
            attributes: Array,
            insurantIs: Object,
            participantIs: Object,
            participantDocs: Object
        },
        created(){
            this.width = window.innerWidth;
            this.height = 500;  //window.innerHeight;
        },
        methods: {
            addParticipantToKias(pIndex){
                this.$modal.show('participant-create-'+pIndex);
            },
            openParticipantForm(pIndex){
                this.$modal.show('participant-form-'+pIndex);
                this.axios.post('/getDictiList', {
                    parent : 43                 // docClassISN
                })
                    .then(response => {
                        if(response.data.success){
                            this.participantDocs.types = response.data.result;
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
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
                    this.participantEdited = false; // Ранее сделанное редактирование не активное
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
                        this.participant.extSystemKey = response.participant.extSystemKey;
                        //this.participant.docClassISN = response.participant.docClassISN;
                        this.participant.docNumber = response.participant.docNumber;
                        this.participant.docDate = response.participant.docDate;
                        this.participant.email = response.participant.email;
                        this.participant.phone = response.participant.phone;
                        this.participant.juridical = response.participant.Juridical;
                        this.participant.birthDay = response.participant.birthDay;
                        this.participant.sex = response.participant.sex;
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
            save(ind = null){
                let index = ind == null ? this.pIndex : ind;
                let partName = this.participants.length > 0 && this.participants[index].Label ? this.participants[index].Label : 'Страхователь';
                if(ind == null) {   // Здесь если не поставили галочку страхователь это застрахованный или выгодоприобретатель
                    this.participants[index] = this.participant;
                    if (this.isn != null && this.isn != '') {

                        this.participant.subjISN = this.isn;
                        this.participant.Value = this.isn;

                        if(this.participantEdited) {
                            // Если было изменение то записываем данные в киас (если есть extSystemKey то setSubject, если нету то saveSubject)
                            this.preloader(true);
                            this.axios.post('/setSubject', {
                                participant: this.participant,
                            })
                                .then(response => {
                                    if (response.data.success) {
                                        alert("Данные в киасе успешно обновлены\n"+partName + " успешно добавлен!");
                                        this.preloader(false);
                                    } else {
                                        this.participant.subjISN = null;
                                        this.participant.Value = null;
                                        alert(response.data.error);
                                        this.preloader(false);
                                    }
                                })
                                .catch(error => {
                                    alert(error);
                                    this.participant.subjISN = null;
                                    this.participant.Value = null;
                                    this.preloader(false);
                                });
                            // End Записываем данные в киас по контргенту
                        } else {
                            alert(partName + ' успешно добавлен!');
                        }

                        this.subjISN = this.isn;
                        //this.closeParticipantForm(this.pIndex);
                        if(this.participant.ISN == this.formular.insurant.isn || this.participant.ISN == '2082'){
                            // Если это страхователь или застрахованный
                            for(index in this.participants) {
                                if(this.participant.ISN == this.formular.insurant.isn) {
                                    if (this.insurantIs.participant) {  // Если страхователь это застрахованный (очищаем)
                                        if (this.participants[index].ISN == '2082') {
                                            this.clearParticipant(index);
                                            this.insurantIs.participant = false;
                                        }
                                    }
                                    if (this.insurantIs.receiver) {
                                        if (this.participants[index].ISN == '2081') { // Если страхователь это выгодоприобретатель  (очищаем)
                                            this.clearParticipant(index);
                                            this.insurantIs.receiver = false;
                                        }
                                    }
                                }
                                if(this.participant.ISN == '2082' && this.participantIs.receiver) { // Если застрахованный это выгодо.  (очищаем)
                                    if(this.participants[index].ISN == '2081') {
                                        this.clearParticipant(index);
                                        this.participantIs.receiver = false;
                                    }
                                }
                            }
                        }
                    } else {
                        alert('Не выбран ' + partName);
                    }
                } else {
                    this.participants[index].subjISN = this.participant.subjISN;
                    this.participants[index].Value = this.participant.subjISN;
                    alert(partName + ' успешно добавлен!');

                    if(this.participant.ISN == this.formular.insurant.isn && this.participants[index].ISN === '2081' && this.participantIs.receiver){
                        this.participantIs.receiver = false;
                    }

                    if(this.participant.ISN == '2082' && this.participants[index].ISN === '2081' && this.insurantIs.receiver){
                        this.insurantIs.receiver = false;
                    }
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
                    extSystemKey: '',
                    //docClassISN: '',
                    docNumber: '',
                    docDate: '',
                    email: '',
                    phone: '',
                    juridical: '',
                    birthDay: '',
                    sex: '',
                    okvdName: '',
                    economicName: '',
                });
            },
            clearParticipant(ind = null){
                let index = ind == null ? this.pIndex : ind;
                this.participants[index].firstName = null;
                this.participants[index].lastName = null;
                this.participants[index].patronymic = null;
                this.participants[index].orgName = null;
                this.participants[index].iin = null;
                this.participants[index].Value = '';
                this.participants[index].subjISN = '';
                this.participants[index].docType = null;
                this.participants[index].extSystemKey = null;
                //this.participants[index].docClassISN = null;
                this.participants[index].docNumber = null;
                this.participants[index].docDate = null;
                this.participants[index].email = null;
                this.participants[index].phone = null;
                this.participants[index].juridical = null;
                this.participants[index].birthDay = null;
                this.participants[index].birthDay = sex;
                this.participants[index].okvdName = null;
                this.participants[index].economicName = null;
            },
            deleteParticipant(){
                if(confirm("Вы точно хотите удалить раздел "+this.participant.Label+'?')) {
                    this.participants.splice(this.pIndex, 1);
                    this.closeParticipantForm(this.pIndex);
                    this.calcChanged();
                }
            },
            insPartIs(part,index,e){
                if(e.srcElement.checked == true || e.srcElement.checked == 'true') {
                    if (this.participant.Value == null || this.participant.Value == '') {
                        alert('Сначало сохраните пожалуйста участника ' + this.participant.Label);
                        if(this.participant.ISN == this.formular.insurant.isn) {
                            if(part.ISN == '2082'){
                                if (this.insurantIs.participant == true) {
                                    this.insurantIs.participant = false;
                                    e.target.checked = false;
                                }
                            } else {
                                if (this.insurantIs.receiver == true) {
                                    this.insurantIs.receiver = false;
                                    e.target.checked = false;
                                }
                            }
                        } else {
                            if (this.participantIs.receiver == true) {
                                this.participantIs.receiver = false;
                                e.target.checked = false;
                            }
                        }
                    } else {
                        //if (part.ISN === '2082' && this.insurantIs.participant || part.ISN === '2081' && this.insurantIs.receiver || part.ISN === '2081' && this.participantIs.receiver) {
                            this.participants[index].Value = this.participant.Value;
                            this.participants[index].data = this.participant.data;
                            this.participants[index].iin = this.participant.iin;
                            this.participants[index].subjISN = this.participant.subjISN;
                            this.participants[index].lastName = this.participant.lastName;
                            this.participants[index].firstName = this.participant.firstName;
                            this.participants[index].patronymic = this.participant.patronymic;
                            this.participants[index].orgName = this.participant.orgName;
                            this.participants[index].docType = this.participant.docType;
                            this.participants[index].extSystemKey = this.participant.extSystemKey;
                            //this.participants[index].docClassISN = this.participant.docClassISN;
                            this.participants[index].docNumber = this.participant.docNumber;
                            this.participants[index].docDate = this.participant.docDate;
                            this.participants[index].email = this.participant.email;
                            this.participants[index].phone = this.participant.phone;
                            this.participants[index].juridical = this.participant.juridical;
                            this.participants[index].birthDay = this.participant.birthDay;
                            this.participants[index].sex = this.participant.sex;
                            this.participants[index].okvdName = this.participant.okvdName;
                            this.participants[index].economicName = this.participant.economicName;
                            this.save(index);
                        // } else {
                        //     this.clearParticipant(index);
                        // }
                    }
                }else {
                    this.clearParticipant(index);
                }
            }
        },
        computed: {
            modalName(){
                return 'participant-form-'+this.pIndex;
            },
            computedPhysical(){
                let result = !this.moreParticipant && this.participant.juridical && this.participant.juridical == 'N' ? true : false;
                return result;
            },
            computedJuridical(){
                let result = !this.moreParticipant && this.participant.juridical && this.participant.juridical == 'Y' ? true : false;
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
                if (this.formular.insurant.isn == this.participant.ISN && this.attributes.length > 0) {
                    for(let i = 0;i < this.attributes.length;i++){
                        if (this.attributes[i].AttrISN == 720671) {
                            this.attributes[i].Value = this.participant.email;
                        }
                        if (this.attributes[i].AttrISN == 831381) {
                            this.attributes[i].Value = this.participant.phone;
                        }
                    }
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
