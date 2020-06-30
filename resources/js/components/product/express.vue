<template>
    <div>
        <div class="text-center" v-if="calc_isn != null && calc_id != null">
            <h5>Котировка №{{ calc_id }}</h5>
            <!--h5>Номер котировки - {{ calc_id }}</h5-->
        </div>
        <participant v-for="(participant,index) in participants"
                           :key="index"
                           :p-index="index"
                           :participant="participant"
                           :participants="participants"
                           :formular="{insurant : { isn:2103,jur:true,phys:true}}"
                           :preloader="preloader"
                           :calc-changed="calcChanged"
                           :attributes="[]"
                           :insurant-is="{participant:false,receiver:false}"
                           :participant-docs="participantDocs"
                           :product-id="id">
        </participant>

        <!--<div v-for="attribute in attributes">
            <agr-attributes :attribute="attribute" :express-attr="{}"  :calc-changed="calcChanged" :preloader="preloader"></agr-attributes>
        </div>-->
        <div class="flex-center">
            <div class="col-md-12 agreement-block div-margin div-downmar " style="width:95%;" >
                <div class="row">
                    <!--v-if="Object.keys(attributes).length != 0 && attributes[value] != undefined && attributes[value] != null"-->
                    <agr-attributes
                        v-for="value, key in attributes"
                        :key="key"
                        :attribute="value"
                        :express-attr="{}"
                        :calc-changed="calcChanged"></agr-attributes>

                    <!--agr-attributes :key="key" v-for="attribute,key in attributes" :attribute="attribute" :express-attr="{}"  :calc-changed="calcChanged"></agr-attributes-->

                </div>
            </div>
        </div>

        <!--div v-if="nshb" class="mt-2 mb-2 ml-0 agreement-block childs-not-bold">
            <h4>Текст заявки</h4>
            <div>
                <div class="d-flex align-items-center mb-2">
                    <input type="text" class="attr-input-text w-100" v-model="nshb_text" @keyup="calcChanged">
                </div>
            </div>
        </div-->

        <upload-docs v-if="nshb" :docs="docs" quotationId="0" :calc-changed="calcChanged"></upload-docs>

        <div class="d-flex justify-content-end col-12 p-0 mb-5">
            <div class="col-12 text-center p-0">
                <div class="fs-2 col-12" v-if="calculated && !nshb|| quotationId != 0 && price != 0 && !nshb || nshb && nshb_status == 2518 || nshb && nshb_status == '2518'">Сумма премий {{price}} Тенге</div>
                <!--div class="fs-2 col-12" v-if="calc_isn != null">ИСН котировки {{calc_isn}}</div>
                <div class="fs-2 col-12" v-if="nshb_request != null && nshb">ИСН заявки {{nshb_request}}</div>
                <div class="fs-2 col-12" v-if="nshb_doc != null && nshb">ИСН НШБ {{nshb_doc}}</div-->
                <div class="fs-2 col-12" v-if="calc_id != null">№ котировки {{calc_id}}</div>
                <div class="fs-2 col-12" v-if="nshb_id != null && nshb">№ {{nshb_id}}</div>
                <div class="fs-2 col-12" v-if="nshb_request_id != null && nshb">№ заявки {{nshb_request}}</div>
                <button v-if="quotationId == 0" class="btn btn-outline-info" @click="calculate" :disabled="nshb == false ? true : false">
                    Отправить НШБ
                </button>
                <button v-if="quotationId == 0" class="btn btn-outline-info" :disabled="nshb" @click="calculate">
                    Рассчитать стоимость
                </button>
                <button v-if="quotationId == 0 && calc_isn != null && !nshb && nshb_doc == null || nshb && nshb_status == 2518" class="btn btn-outline-info" @click="createFullQ()">
                    Перевод в полную котировку
                </button>
                <!--button class="btn btn-outline-info" v-if="calculated" @click="createFullQuotation">Создать полную котировку</button-->
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
                calculated : false,
                calc_isn: null,
                calc_id: null,
                full_isn: null,
                docs: {
                    files: [],
                    sendedFail: false,
                    express: true
                },
                moreParticipant : false,
                isn: '',
                subjISN : '',
                width : 0,
                height : 0,
                price : 0,
                nshb: false,
                nshb_doc: null,
                nshb_request: null,
                nshb_id: null,
                nshb_request_id: null,
                nshb_status: null,
                //nshb_text: null,
                redirect_link: null,
                participantDocs: {
                    types: []
                },
                participants: [
                    {
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
                    }
                ],
                status: null,
            }
        },
        props: {
            id: String,
            quotationId: String
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
                    id: this.id,
                    quotationId: this.quotationId
                })
                .then(response => {
                    if(response.data.success){
                        this.calc_isn = response.data.calc_isn;
                        this.calc_id = response.data.calc_id;
                        this.attributes = response.data.attributes;
                        if(this.quotationId !=0) {
                            this.participants = response.data.participants;
                            //this.nshb_status = response.data.status;
                            this.price = parseInt(response.data.premiumSum);
                            if(response.data.nshb != null){
                                this.nshb = response.data.nshb['nshb'];
                                this.nshb_doc = response.data.nshb['nshb_doc'];
                                this.nshb_request = response.data.nshb['nshb_request'];
                                this.nshb_id = response.data.nshb['nshb_id'];
                                this.nshb_request_id = response.data.nshb['nshb_request_id'];
                                this.nshb_status = response.data.nshb['nshb_status'];

                                for(let key in this.attributes){
                                    if(this.attributes[key].AttrISN == 1422011){    // если есть НШБ номер то присваиваем аттрибуту НШБ
                                        this.attributes[key].Value = this.nshb_id;
                                    }
                                }
                            }
                        }
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
            calculate(){
                if(this.nshb){
                    if(Object.keys(this.docs.files).length == 0){
                        alert('Загрузите пожалуйста файл НШБ');
                        return false;
                    }
                }
                this.preloader(true);
                this.axios.post('/express/calculate', {
                    subjISN : this.subjISN,
                    id : this.id,
                    attributes : this.attributes,
                    nshb: this.nshb,
                    //nshb_text: this.nshb_text,
                    participants: this.participants
                })
                .then(response => {
                    if(response.data.success){
                        this.price = response.data.premium;
                        this.calculated = true;
                        this.calc_isn = response.data.calc_isn;
                        this.calc_id = response.data.calc_id;
                        this.preloader(false);
                        if(this.nshb){
                            this.nshb_doc = response.data.nshb_doc;
                            this.nshb_request = response.data.nshb_request;
                            this.nshb_id = response.data.nshb_id;
                            this.nshb_request_id = response.data.nshb_request_id;
                            this.redirect_link = response.data.redirect_link;
                            this.sendDocs();
                        } else {
                            this.nshb_doc = null;
                            this.nshb_request = null;
                            this.nshb_id = null;
                            this.nshb_request_id = null;
                        }
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
            createFullQ(){
                this.preloader(true);
                this.axios.post('/express/createAgrByAgrcalc', {
                    calc_isn: this.calc_isn,
                    id : this.id
                })
                    .then(response => {
                        if(response.data.success){
                            console.log(response.data.result);
                            this.full_isn = response.data.full_isn;
                            window.location.href = "/full/calc/" + this.id + "/"+response.data.quotation_id;
                            this.preloader(false);
                        }else{
                            alert(response.data.error);
                            this.preloader(false);
                        }
                    })
                    .catch(error => {
                        alert(error)
                        this.preloader(false);
                    });
            },
            sendDocs(){
                let formData = new FormData();
                formData.append('id', this.id);
                formData.append('quotationId', this.quotationId);
                formData.append('calc_isn', this.calc_isn);
                formData.append('quotationType', 'express');
                formData.append('nshb_doc', this.nshb_doc);
                if(Object.keys(this.docs.files).length > 0) {
                    this.preloader(true);
                    for (let i in this.docs.files) {
                        formData.append('files[' + i + ']', this.docs.files[i]);
                    }
                    this.axios.post('/full/send-docs', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                        .then(response => {
                            if (response.data.success) {
                                console.log('Files sended successfull');
                                this.docs.sendedFail = false;
                                if(this.nshb){
                                    alert('НШБ заявка успешно отправлена');
                                    window.location.href = this.redirect_link;
                                }
                                this.preloader(false);
                            } else {
                                alert(response.data.error)
                                this.docs.sendedFail = true;
                                this.preloader(false);
                            }
                        })
                        .catch(error => {
                            alert(error)
                            this.preloader(false);
                        });
                } else {
                    // if(this.nshb){
                    //     alert('НШБ заявка успешно отправлена');
                    //     window.location.href = this.redirect_link;
                    // }
                }

            },
            calcChanged(){
                this.calculated = false;
                this.price = this.quotationId == 0 ? 0 : this.price;
                for(let index in this.attributes){
                    if(this.attributes[index].AttrISN == 499591 || this.attributes[index].AttrISN == '499591'){
                        if(this.attributes[index].Value == 499581 || this.attributes[index].Value == '499581') { //499581 - net  //499571 - da
                            this.nshb = true;
                        } else {
                            this.nshb = false;
                        }
                    }
                }

                if(this.quotationId == 0) {
                    this.calc_isn = null;
                    this.calc_id = null;
                    this.nshb_doc = null;
                    this.nshb_doc = null;
                    this.nshb_doc = null;
                    this.nshb_request = null;
                    this.nshb_status = null;
                }
            },
            // createFullQuotation(){
            //     var full = confirm("Вы точно хотите перейти на страницу полной котировки?");
            //     if(full) {
            //         let attr = '"premium":"'+this.price+'",';
            //         let i = 1;
            //         for(let index in this.attributes){
            //             if(this.attributes[index].Value == null) {
            //                 attr = attr + '"' + this.attributes[index].AttrISN + '":' + this.attributes[index].Value;
            //             } else {
            //                 attr = attr + '"' + this.attributes[index].AttrISN + '":"' + this.attributes[index].Value + '"';
            //             }
            //             if(i != Object.keys(this.attributes).length){
            //                 attr = attr+',';
            //             }
            //             i++;
            //         }
            //         window.location.href = "/full/calc/" + this.id + "/0?attributes={"+attr+"}";
            //     }
            // },
            preloader(show) {
                if(show){
                    document.getElementById("preloader").style.display = "flex";
                } else {
                    document.getElementById("preloader").style.display = "none";
                }
            }
        },
        watch : {
            attributes(){
                this.calculated = false;
                //this.price = 0;
            },
            SubjISN(){
                this.calculated = false;
                //this.price = 0;
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
