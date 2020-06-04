<template>
    <div>
        <participant :key="0"
                     :p-index="0"
                     :participant="participant"
                     :participants="[]"
                     :formular="{insurant : { isn:2103,jur:true,phys:true}}"
                     :preloader="preloader"
                     :calc-changed="calcChanged"
                     :insurant-is="{participant:false,receiver:false}"
                     :participantDocs="participantDocs"
                     :attributes="[]"
                     :product-id="id">
        </participant>
        <!--button type="button" class="add-button width100 mt-2" @click="openParticipantForm">Добавить страхователя</button-->
        <div class="flex-center">
            <div class="col-md-12 agreement-block mg-11 ">
                <div class="row">
                    <!--v-if="Object.keys(attributes).length != 0 && attributes[value] != undefined && attributes[value] != null"-->
                    <agr-attributes
                        v-for="value,key in attributes"
                        :key="key"
                        :attribute="value"
                        :express-attr="{}"
                        :calc-changed="calcChanged">
                    </agr-attributes>

                    <!--agr-attributes :key="key" v-for="attribute,key in attributes" :attribute="attribute" :express-attr="{}"  :calc-changed="calcChanged"></agr-attributes-->

                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end col-12 p-0 mb-5">
            <div class="col-12 text-center p-0 ">
                <button class="btn btn-outline-info mg-11" @click="calculate">Рассчитать стоимость</button>
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
                moreParticipant: false,
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
                width: 0,
                height: 0,
                calculated: false,
                price: 0,
                participantDocs: {
                    types: []
                }
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
