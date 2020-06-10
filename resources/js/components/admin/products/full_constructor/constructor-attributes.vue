<template>
    <div class="form-group col-md-12 col-lg-12 col-12 text-left row">
        <div class="col-12 mb-3">
            Атрибуты
            <input type="text" v-model="parentISN" @input="parentChanged = true" class="attr-input-text">
            <button type="button" v-if="parentChanged" @click="getParticipantsDicti" class="btn-info btn-lg btn">Обновить</button>
            <button type="button" @click="addParticipant()" class="btn-info btn-lg btn">Добавить</button>
        </div>
        <div v-for="(participant,index) in participants" class="form-group col-md-3 col-lg-3 col-6 text-center">
            <select class="custom-select" v-model="participant.ISN">
                <option v-for="participant in participantsKias" :value="participant.Value">{{participant.Label}} - {{participant.Value}}</option>
            </select>
            <a @click="deleteParticipant(index)">Удалить</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "constructor-attributes",
        data() {
            return {
                parentISN: 19,
                parentChanged: false,
                participantsKias: [],
            }
        },
        props: {
            participants: Array
        },
        methods: {
            addParticipant(){
                this.participants.push({
                    label: '',
                    ISN: ''
                });
            },
            deleteParticipant(id){
                this.participants.splice(id,1);
            },
            getParticipantsDicti(){
                this.parentChanged = false;
                this.axios.post('/calc/getDicti', {
                    ISN:this.parentISN
                })
                    .then(response => {
                        if(response.data.success){
                            this.participantsKias = response.data.result;
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            }
        },
        mounted(){
            this.getParticipantsDicti();
        }
    }
</script>

<style scoped>

</style>