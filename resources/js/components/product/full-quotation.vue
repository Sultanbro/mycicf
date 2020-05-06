<template>
    <div>
        <div class="text-center" v-if="calc_isn != null">
            <h5>Котировка {{ calc_isn }}</h5>
        </div>
        <div class="col-md-12 mb-4">
            <div class="row">
                <participant v-for="(participant,index) in participants"
                             :key="index"
                             :p-index="index"
                             :participant="participant"
                             :participants="participants"
                             :formular="formular"
                             :preloader="preloader"
                             :product-id="id">
                </participant>

                <div v-if="Object.keys(formular).length > 0 && formular.curator.Value == 1" class="form-group offset-0 col-md-12 col-lg-12 col-12 mt-3">
                    <label>Выберите куратора</label>
                    <treeselect v-model="formular.curator.subjISN" :options="userList" />
                </div>
            </div>
        </div>

        <div v-if="quotationId == 0 && contract_number == null && !DA.orderCreated" class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center mb-4">
            <label for="yes" class="bold">Отправить в Департамент андеррайтинга </label>
            <input type="checkbox" class="mt-2 ml-2" id="yes" v-model="DA.calcDA" value="true">
        </div>

        <div v-if="DA.calcDA" class="col-lg-12 col-xl-12 col-md-12 col-sm-12 mb-4">
            <label class="bold">Текст заявки </label>
            <input type="text" class="attr-input-text col-12"  v-model="DA.remark">
        </div>

        <div class="mb-4">
            <period :period="period" :quotationId="quotationId" :calcChanged="calcChanged"></period>
        </div>

        <div class="agr-block mb-4">
            <div v-for="attribute in attributes">
                <agr-attributes :attribute="attribute"></agr-attributes>
            </div>

            <div v-for="agrclause in agrclauses">
                <agr-clause :agrclause="agrclause" :calcChanged="calcChanged"></agr-clause>
            </div>
        </div>

        <div v-for="(agrobject,index) in agrobjects"class="mb-4">
            <agr-object :agrobject="agrobject" :aIndex="index" :preloader="preloader" :DA="DA"></agr-object>
        </div>

        <upload-docs :docs="docs" :quotationId="quotationId"></upload-docs>

        <div class="d-flex justify-content-center w-100 mt-3 mb-3">
            <div class="text-center">
                <div class="fs-2" v-if="calculated && !DA.calcDA">Сумма премий {{price}} Тенге</div>
                <div class="fs-2" v-if="contract_number != null && !DA.calcDA">Номер договора {{contract_number}}</div>
                <div class="fs-2" v-if="DA.orderCreated">Заявка отправлена в ДА. Номер заявки {{ DA.orderNumber }}</div>

                <button v-if="contract_number === null && quotationId == 0 && !DA.calcDA" class="btn btn-outline-info" @click="calculate()">
                    Рассчитать стоимость
                </button>
                <button v-if="contract_number === null && quotationId == 0 && DA.calcDA && !DA.orderCreated" class="btn btn-outline-info" @click="calculate()">
                    Отправить в ДА
                </button>
                <button v-if="contract_number === null && calc_isn != null && !DA.calcDA" class="btn btn-outline-info" @click="createAgr">
                    Выпустить договор
                </button>
                <button v-if="docs.sendedFail" class="btn btn-outline-info" @click="sendDocs">
                    Отправить документы
                </button>
                <printable-form v-if="contract_number != null && contract_number != ''"
                                :preloader="preloader"
                                :contract_number="contract_number">
                </printable-form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "full-quotation",
        data() {
            return {
                userList: null,
                calc_isn: null,
                contract_number: null,
                docs: {
                    files: [],
                    sendedFail: false
                },
                participants: [],
                attributes: [],
                agrclauses: [],
                formular: [],
                agrobjects: [],
                moreParticipant : false,
                subjISN : '',
                DA: {               // Департамент андеррайтинга
                    calcDA: false,
                    orderCreated: false,
                    orderNumber: '',
                    remark: null
                },
                DAsum: null,
                width : 0,
                height : 0,
                calculated : false,
                price : 0,
                period: {
                    begin : new Date(new Date().getFullYear(), new Date().getMonth(),  new Date().getDate(), 6).toJSON().slice(0, 10),
                    end : new Date(new Date().getFullYear(), new Date().getMonth(),  new Date().getDate(), 6).toJSON().slice(0, 10),
                    period : 12,
                    sig: new Date(new Date().getFullYear(), new Date().getMonth(),  new Date().getDate(), 6).toJSON().slice(0, 10),
                },
            }
        },
        props: {
            id: String,
            quotationId: String,
        },
        created(){
            this.width = window.innerWidth;
            this.height = window.innerHeight;
            this.quotationId == 0 ? this.calculated = false : this.calculated = true;
        },
        mounted() {
            this.getFullData();
        },
        methods: {
            getFullData() {
                this.preloader(true);
                this.axios.post('/full/getFullData', {
                    id: this.id,
                    quotationId: this.quotationId
                })
                    .then(response => {
                        if(response.data.success){
                            this.formular = response.data.formular;
                            this.participants = response.data.participants;
                            this.agrclauses = response.data.agrclauses;
                            this.attributes = response.data.attributes;
                            this.calc_isn = response.data.calc_isn;
                            this.contract_number = response.data.contract_number;
                            this.price = parseInt(response.data.price);
                            this.docs.files = response.data.docs;

                            this.DA.calcDA = response.data.calc_da == 1 ? true : false;
                            this.DA.orderCreated = response.data.calc_da == 1 ? true : false;
                            this.DA.orderNumber = response.data.calc_isn;
                            this.DA.remark = response.data.DAremark;
                            this.getFullObjects();
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
            getFullObjects() {
                this.axios.post('/full/getFullObjects', {
                    id: this.id,
                    quotationId: this.quotationId
                })
                    .then(response => {
                        if(response.data.success){
                            if(this.quotationId != 0){
                                this.agrobjects = response.data.objects;
                            } else {
                                this.agrobjects.push(response.data.objects);
                            }
                            this.preloader(false);
                            if(Object.keys(this.formular).length > 0 && this.formular.curator.Value == 1) {
                                this.getUserList();
                            }
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
            getUserList() {
                this.axios.post('/full/getFullBranch', {}).then((response) => {
                    this.userList = response.data.result;
                });
            },

            calculate(){
                //if(this.checkInputs(this.participants) && this.checkInputs(this.attributes)&& this.checkInputs(this.agrclauses)) {
                this.preloader(true);
                this.axios.post('/full/calculate',
                    {
                        subjISN: this.subjISN,
                        id: this.id,
                        quotationId: this.quotationId,
                        participants: this.participants,
                        attributes: this.attributes,
                        agrclauses: this.agrclauses,
                        formular: this.formular,
                        agrobjects: this.agrobjects,
                        contractDate: this.period,
                        calcDA: this.DA.calcDA == true ? 1 : 0,
                        DAremark: this.DA.remark,
                    })
                    .then(response => {
                        if (response.data.success) {
                            if(this.DA.calcDA) {
                                alert('Заявка успешно создана.Номер заявки '+response.data.calc_isn);
                                this.DA.orderNumber = response.data.calc_isn;
                                this.DA.orderCreated = true;
                            } else {
                                this.price = response.data.premium;
                                this.calculated = true;
                            }
                            this.calc_isn = response.data.calc_isn;
                            if(response.data.calc_isn != '') {
                                this.preloader(false);
                                this.sendDocs();
                            } else {
                                this.preloader(false);
                            }
                        } else {
                            alert(response.data.error)
                            this.preloader(false);
                        }
                    })
                    .catch(error => {
                        alert(error)
                        this.preloader(false);
                    });
                // } else {
                //     alert('Укажите пожалуйста все данные')
                // }
            },
            sendDocs(){
                let formData = new FormData();
                formData.append('id', this.id);
                formData.append('calc_isn', this.calc_isn);
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
                }
            },
            createAgr(){        // Выпустить договор
                this.preloader(true);
                this.axios.post('/full/create-agr',
                    {
                        calc_isn: this.calc_isn,
                        subjISN: this.subjISN,
                        contractDate: this.period,
                    })
                    .then(response => {
                        if (response.data.success) {
                            this.contract_number = response.data.contract_number;
                        } else {
                            alert(response.data.error)
                        }
                        this.preloader(false);
                    })
                    .catch(error => {
                        alert(error)
                        this.preloader(false);
                    });
            },
            checkInputs(section){
                let result = true;
                for(let item in section){
                    section[item].Value == '' || section[item].Value == null ? result = false : '';
                }
                return result;
            },
            preloader(show) {
                if(show){
                    document.getElementById("preloader").style.display = "flex";
                } else {
                    document.getElementById("preloader").style.display = "none";
                }
            },
            calcChanged(){
                if(this.quotationId == 0) {
                    this.calculated = false;
                    this.price = 0;
                }
            }
        },
        watch : {
            subjISN(){
                if(this.quotationId == 0) {
                    this.calculated = false;
                    this.price = 0;
                }
            },
            // calcDA(){
            //     this.DAsum
            // }
        }
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>
