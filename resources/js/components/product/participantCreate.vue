<template>
    <modal :name="modalName"
           :width="width"
           :height="height"
           :minHeight="minHeight">
        <div class="participant-create">

            <!--div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5 mb-5">
                <button class="btn btn-outline-info" @click="block.phys = true; block.jur = false;">Фил. лицо {{ participant.Label }}</button>
                <button class="btn btn-outline-info" @click=""block.jur = true; block.phys = false;">Юр. лицо</button>
            </div-->

            <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5">
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">ИИН/БИН {{ participant.data }}</label>
                    <input type="text" v-model="participant.iin" class="attr-input-text col-12" maxlength="12">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Фамилия</label>
                    <input type="text" v-model="newParticipant.LASTNAME" class="attr-input-text col-12 bg-white">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Имя</label>
                    <input type="text" v-model="newParticipant.FIRSTNAME" class="attr-input-text col-12 bg-white">
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Отчество</label>
                    <input type="text" v-model="newParticipant.PARENTNAME" class="attr-input-text col-12 bg-white">
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Дата рождения</label>
                    <input type="text"
                           v-model="newParticipant.BIRTHDAY"
                           v-mask="'##.##.####'"
                           class="attr-input-text col-12 bg-white">
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Тип документа</label>
                    <select class="attr-input-text col-12" v-model="newParticipant.DOCCLASSISN">
                        <option
                                v-if="doc_types.length > 0"
                                v-for="type in doc_types"
                                :value="type.Value[0]">{{ type.Label[0] }}</option>
                    </select>
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Пол</label>
                    <select class="attr-input-text col-12" v-model="newParticipant.SEXID">
                        <option value="1">Мужчина</option>
                        <option value="2">Женщина</option>
                    </select>
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Номер документа</label>
                    <input type="text" v-model="newParticipant.DOCNO" class="attr-input-text col-12 bg-white">
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Дата выдачи</label>
                    <input type="text" v-model="newParticipant.DOCDATE" v-mask="'##.##.####'" class="attr-input-text col-12 bg-white">
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Email</label>
                    <input type="text" v-model="newParticipant.EMAIL" class="attr-input-text col-12 bg-white">
                </div>

                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">Номер телефона</label>
                    <input type="text" v-model="newParticipant.PHONE" v-mask="'+###########'" class="attr-input-text col-12 bg-white">
                </div>
            </div>

            <!--div v-if="block.jur" class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5">
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                    <label class="bold">БИН {{ participant.data }}</label>
                    <input type="text" v-model="participant.iin" class="attr-input-text col-12" maxlength="12">
                </div>
            </div-->

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
                newParticipant:{
                    LASTNAME: null,
                    IIN: null,
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
                width : 0,
                height : 0,
                minHeight : 0,
                doc_types: [],
                block: {
                    phys: true,
                    jur: false
                }
            }
        },
        directives: {mask},
        props: {
            participant: Object,
            pIndex: Number,
            preloader: Function,
            searchParticipant: Function
        },
        created(){
            this.width = window.innerWidth;
            this.height = 'auto';
            this.minHeight = window.innerHeight;
            this.newParticipant.IIN = this.participant.iin;
        },
        mounted(){
            this.getDocTypes();
        },
        methods: {
            getDocTypes(){
                this.axios.post('/getDictiList', {
                    parent : 43
                })
                .then(response => {
                    if(response.data.success){
                        this.doc_types = response.data.result;
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
                for(var index in this.newParticipant){
                    if(this.newParticipant[index] == '' || this.newParticipant[index] == null){
                        alert('Заполните пожалуйста все поля');
                        return false;
                    }
                }

                this.preloader(true);
                this.axios.post('/calc/saveSubject', {
                    newParticipant : this.newParticipant,
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
                this.newParticipant.IIN = val;
            }
        }
    }
</script>