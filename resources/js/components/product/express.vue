<template>
    <div>
        <participant :key="0"
                     :p-index="0"
                     :participant="participant"
                     :participants="[]"
                     :formular="{insurant : { isn:2103,jur:true,phys:true}}"
                     :preloader="preloader"
                     :calc-changed="calcChanged"
                     :attributes="[]"
                     :insurant-is="{participant:false,receiver:false}"
                     :participant-docs="participantDocs"
                     :product-id="id">
        </participant>
        <!--button type="button" class="add-button width100 mt-2" @click="openParticipantForm">Добавить страхователя</button-->
        <div v-for="attribute in attributes">
            <agr-attributes :attribute="attribute" :express-attr="{}"  :calc-changed="calcChanged" :preloader="preloader"></agr-attributes>
        </div>
        <div class="d-flex justify-content-end col-12 p-0 mb-5">
            <div class="col-12 text-center p-0">
                <button class="btn btn-outline-info" @click="calculate">Рассчитать стоимость</button>
                <div class="fs-2 col-12" v-if="calculated">Сумма премий {{price}} Тенге</div>
                <button class="btn btn-outline-info" v-if="calculated" @click="createFullQuotation">Создать полную котировку</button>
            </div>
        </div>
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
                participant: {
                    Value : null,
                    firstName : null,
                    iin : null,
                    lastName : null,
                    orgName : null,
                    patronymic : null,
                    subjISN : null,
                    ISN:2103,
                    data:null,
                    Label: 'Страхователь',
                    new: true,
                    docType: '',
                    docNumber: '',
                    docDate: '',
                    email: '',
                    phone: '',
                    juridical: '',
                    birthDay: '',
                    okvdName: '',
                    economicName: ''
                },
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
                participantDocs: {
                    types: []
                },
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
                this.preloader(true);
                this.axios.post('/getExpressAttributes', {
                    id: this.id
                })
                .then(response => {
                    if(response.data.success){
                        this.attributes = response.data.attributes;
                        this.preloader(false);
                    }else{
                        alert(response.data.error);
                        this.preloader(false);
                    }
                })
                .catch(error => {
                    alert(error);
                    this.preloader(false);
                });
            },
            preloader(show) {
                if(show){
                    document.getElementById("preloader").style.display = "flex";
                } else {
                    document.getElementById("preloader").style.display = "none";
                }
            },
            // openParticipantForm(){
            //     this.$modal.show('participant-form');
            // },
            // closeParticipantForm(){
            //     this.$modal.hide('participant-form');
            // },
            // search(){
            //     this.axios.post('/searchSubject', {
            //         firstName : this.firstName,
            //         lastName : this.lastName,
            //         patronymic : this.patronymic,
            //         iin : this.iin,
            //     })
            //     .then(response => {
            //         this.fetchParticipantSearch(response.data);
            //     })
            //     .catch(error => {
            //         alert(error);
            //     });
            // },
            // fetchParticipantSearch(response){
            //     if(response.success){
            //         if(response.count === 1){
            //             this.moreParticipant = false;
            //             this.firstName = response.participant.FirstName;
            //             this.lastName = response.participant.LastName;
            //             this.patronymic = response.participant.Patronymic;
            //             this.iin = response.participant.IIN;
            //             this.isn = response.participant.ISN;
            //         }else{
            //             this.moreParticipant = true;
            //             this.participants = response.participant;
            //         }
            //     }else{
            //         alert(response.error);
            //     }
            // },
            // save(){
            //     this.subjISN = this.isn;
            //     this.closeParticipantForm();
            //     this.calcChanged();
            //     alert('Страхователь успешно добавлен!');
            // },
            calculate(){
                this.preloader(true);
                this.axios.post('/express/calculate', {
                    subjISN : this.subjISN,
                    id : this.id,
                    attributes : this.attributes
                })
                .then(response => {
                    if(response.data.success){
                        this.price = response.data.premium;
                        this.calculated = true;
                        this.preloader(false);
                    }else{
                        alert(response.data.error)
                        this.preloader(false);
                    }
                })
                .catch(error => {
                    alert(error)
                    this.preloader(false);
                });
            },
            calcChanged(){
                this.calculated = false;
                this.price = 0;
            },
            createFullQuotation(){
                var full = confirm("Вы точно хотите перейти на страницу полной котировки?");
                if(full) {
                    let attr = '"premium":"'+this.price+'",';
                    let i = 1;
                    for(let index in this.attributes){
                        if(this.attributes[index].Value == null) {
                            attr = attr + '"' + this.attributes[index].AttrISN + '":' + this.attributes[index].Value;
                        } else {
                            attr = attr + '"' + this.attributes[index].AttrISN + '":"' + this.attributes[index].Value + '"';
                        }
                        if(i != Object.keys(this.attributes).length){
                            attr = attr+',';
                        }
                        i++;
                    }
                    window.location.href = "/full/calc/" + this.id + "/0?attributes={"+attr+"}";
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
            preloader(show) {
                if(show){
                    document.getElementById("preloader").style.display = "flex";
                } else {
                    document.getElementById("preloader").style.display = "none";
                }
            },
        },
        watch : {
            attributes(){
                this.calculated = false;
                this.price = 0;
            },
            SubjISN(){
                this.calculated = false;
                this.price = 0;
            },
            'participant.Value': function(val){
                this.subjISN = val;
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