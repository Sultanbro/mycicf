<template>
    <modal :name="modalName"
           :width="width"
           :height="height"
           :minHeight="minHeight">
        <div class="participant-create">

            <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5 mb-5">
                <button class="btn btn-outline-info" @click="block.phys = true; block.jur = false;">
                    Физ. лицо
                </button>
                <button class="btn btn-outline-info ml-2" @click="block.jur = true; block.phys = false;">
                    Юр. лицо
                </button>
            </div>

            <div v-if="block.phys" class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5">
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">ИИН {{ participant.data }}</label>
                    <input type="text" v-model="participant.iin" class="attr-input-text col-12" maxlength="12">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Фамилия</label>
                    <input type="text" v-model="newPhysical.LASTNAME" class="attr-input-text col-12 bg-white">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Имя</label>
                    <input type="text" v-model="newPhysical.FIRSTNAME" class="attr-input-text col-12 bg-white">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Отчество</label>
                    <input type="text" v-model="newPhysical.PARENTNAME" class="attr-input-text col-12 bg-white">
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Дата рождения</label>
                    <input type="text"
                           v-model="newPhysical.BIRTHDAY"
                           v-mask="'##.##.####'"
                           class="attr-input-text col-12 bg-white">
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Тип документа</label>
                    <select class="attr-input-text col-12" v-model="newPhysical.DOCCLASSISN">
                        <option
                                v-if="doc_types.length > 0"
                                v-for="type in doc_types"
                                :value="type.Value[0]">{{ type.Label[0] }}</option>
                    </select>
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Пол</label>
                    <select class="attr-input-text col-12" v-model="newPhysical.SEXID">
                        <option value="1">Мужчина</option>
                        <option value="2">Женщина</option>
                    </select>
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Номер документа</label>
                    <input type="text" v-model="newPhysical.DOCNO" class="attr-input-text col-12 bg-white">
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Дата выдачи</label>
                    <input type="text" v-model="newPhysical.DOCDATE" v-mask="'##.##.####'" class="attr-input-text col-12 bg-white">
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Email</label>
                    <input type="text" v-model="newPhysical.EMAIL" class="attr-input-text col-12 bg-white">
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Номер телефона</label>
                    <input type="text" v-model="newPhysical.PHONE" v-mask="'+###########'" class="attr-input-text col-12 bg-white">
                </div>
            </div>

            <div v-if="block.jur" class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5">
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">БИН {{ participant.data }}</label>
                    <input type="text" v-model="participant.iin" class="attr-input-text col-12" maxlength="12">
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Наименование организации</label>
                    <input type="text" v-model="newJuridical.ORGNAME" class="attr-input-text col-12" maxlength="12">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Вид деятельности</label>
                    <select class="attr-input-text col-12" v-model="newJuridical.OKVDISN">
                        <option v-if="okvd.length > 0"
                                v-for="ok in okvd"
                                :value="ok.Value[0]">
                            {{ ok.Label[0] }}
                        </option>
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Сектор экономики</label>
                    <select class="attr-input-text col-12" v-model="newJuridical.ECONOMICISN">
                        <option v-if="economicisn.length > 0"
                                v-for="econom in economicisn"
                                :value="econom.Value[0]">
                            {{ econom.Label[0] }}
                        </option>
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Юридический адрес</label>
                    <input type="text" v-model="newJuridical.ADDR" class="attr-input-text col-12" maxlength="12">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Email</label>
                    <input type="text" v-model="newJuridical.EMAIL" class="attr-input-text col-12" maxlength="12">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Номер телефона</label>
                    <input type="text" v-model="newJuridical.PHONE" class="attr-input-text col-12" maxlength="12">
                </div>
            </div>

            <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5 mb-5">
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <button class="width100 btn btn-outline-info" @click="createParticipant">Сохранить {{ participant.Label }}</button>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <button class="width100 btn btn-outline-info" @click="closeParticipantCreate">Закрыть</button>
                </div>
            </div>
        </div>
    </modal>
</template>

<script>
    import {mask} from 'vue-the-mask'
    export default {
        name: "participant-create",
        data() {
            return {
                newPhysical:{
                    IIN: null,
                    LASTNAME: null,
                    FIRSTNAME: null,
                    PARENTNAME: null,
                    BIRTHDAY: null,
                    DOCCLASSISN: null,
                    DOCNO: null,
                    DOCDATE: null,
                    EMAIL: null,
                    SEXID: null,
                    PHONE: null
                },
                newJuridical: {
                    IIN: null,
                    ORGNAME: null,
                    OKVDISN: null,
                    ECONOMICISN: null,
                    ADDR: null,
                    EMAIL: null,
                    PHONE: null
                },
                width : 0,
                height : 0,
                minHeight : 0,
                doc_types: [],
                block: {
                    phys: true,
                    jur: false
                },
                okvd : [],
                economicisn : [],
            }
        },
        directives: {mask},
        props: {
            participant: Object,
            pIndex: Number,
            preloader: Function,
            searchParticipant: Function,
            search: Object
        },
        created(){
            this.width = window.innerWidth;
            this.height = 'auto';
            this.minHeight = window.innerHeight;
            this.newPhysical.IIN = this.participant.iin;
            this.newJuridical.IIN = this.participant.iin;
        },
        mounted(){
            this.getDicti(43,'docs');
            this.getDicti(225301,'okvd');
            this.getDicti(28,'economic');
        },
        methods: {
            getDicti(isn,type){
                this.axios.post('/getDictiList', {
                    parent : isn
                })
                .then(response => {
                    if(response.data.success){
                        if(type == 'docs') {
                            this.doc_types = response.data.result;
                        } else if(type == 'okvd') {
                            this.okvd = response.data.result;
                        } else if(type == 'economic') {
                            this.economicisn = response.data.result;
                        }
                    }else{
                        alert(response.data.error);
                    }
                })
                .catch(error => {
                    alert(error);
                });
            },
            closeParticipantCreate(){
                this.$modal.hide('participant-create-'+this.pIndex);
            },
            createParticipant(){
                let part = this.block.phys ? this.newPhysical : this.newJuridical;
                for(var index in this.part){
                    if(part[index] == '' || part[index] == null){
                        alert('Заполните пожалуйста все поля');
                        return false;
                    }
                }

                this.preloader(true);
                this.axios.post('/calc/saveSubject', {
                    participant : part,
                    juridical: this.block.phys ? 'N' : 'Y'
                })
                .then(response => {
                    this.fetchParticipantCreate(response.data);
                })
                .catch(error => {
                    alert(error);
                    this.preloader(false);
                });
            },
            fetchParticipantCreate(response){
                if(response.success){
                    this.$modal.hide('participant-create-'+this.pIndex);
                    this.searchParticipant();
                    this.search.not_found = false;
                }else{
                    alert(response.error);
                    this.preloader(false);
                }
            }
        },
        computed: {
            modalName(){
                return 'participant-create-'+this.pIndex;
            }
        },
        watch: {
            'participant.iin': function(val){
                this.newPhysical.IIN = val;
                this.newJuridical.IIN = val;
            }
        }
    }
</script>