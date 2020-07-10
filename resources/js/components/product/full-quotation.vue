<template>
    <div>
        <div class="text-center" v-if="calc_isn != null">
            <!--h5>Котировка
                <!--span v-if="contract_number == null || contract_number == ''">(статус - {{ status_name }})</span-->
            <!--/h5-->
            <h5 v-if="calc_id != null">Полная котировка №{{ calc_id }}</h5>
        </div>
        <div class="col-md-12 mb-4 mt-4">
            <div class="row">
                <div class="col-md-4" v-for="(participant,index) in participants">
                    <participant :key="index"
                                 :p-index="index"
                                 :participant="participant"
                                 :participants="participants"
                                 :formular="formular"
                                 :preloader="preloader"
                                 :calc-changed="calcChanged"
                                 :attributes="attributes"
                                 :insurant-is="insurantIs"
                                 :participant-is="participantIs"
                                 :participant-docs="participantDocs"
                                 :userList="userList"
                                 :get-user-list="getUserList"
                                 :product-id="id">
                    </participant>
                </div>

                <div v-if="Object.keys(formular).length > 0 && formular.curator.Value == 1"
                     class="form-group offset-0 col-md-12 col-lg-12 col-12 mt-3">
                    <label>Выберите куратора</label>
                    <treeselect v-if="userList.length > 0" v-model="formular.curator.subjISN" :options="userList" @change="calcChanged" />
                </div>

            </div>
        </div>

        <!--<div class="mb-4">
            <period :period="period" :quotationId="quotationId" :calcChanged="calcChanged"></period>
        </div>

        <div class="agr-block mb-4">
            <div v-for="attribute in attributes">
                <agr-attributes :attribute="attribute"
                                :express-attr="expressAttr"
                                :calc-changed="calcChanged"
                                :preloader="preloader"></agr-attributes>
            </div>

            <div v-for="agrclause in agrclauses">
                <agr-clause :agrclause="agrclause" :calc-changed="calcChanged" :express-attr="expressAttr"></agr-clause>
            </div>
        </div>

        <agr-object v-if="agrobjects"
                    v-for="(agrobject,index) in agrobjects"
                    :key="index"
                    :agrobject="agrobject"
                    :aIndex="index"
                    :preloader="preloader"
                    :express-attr="expressAttr"
                    :calc-changed="calcChanged"
                    :new-agrobject="newAgrobject"
                    :agrobjects="agrobjects"
                    :quotationId="quotationId"
                    :product-id="id"
                    :participants="participants"
                    :express_isn="express_isn"
                    :DA="DA">
        </agr-object>

        <upload-docs :docs="docs" :quotationId="quotationId" :calc-changed="calcChanged"></upload-docs>
-->
        <div class="div-ml">
            <div class="mb-3 agreement-block " style="width:95%;">
                <period :period="period" :quotationId="quotationId" :express_id="express_id" :calcChanged="calcChanged"></period>
            </div>
        </div>
        <div  class="div-ml ">
            <div  v-if="agrobjects" v-for="(agrobject,index) in agrobjects"class="mb-3  agreement-block "style="width:95%;">
                <agr-object :key="index"
                            :agrobject="agrobject"
                            :aIndex="index"
                            :preloader="preloader"
                            :express-attr="expressAttr"
                            :calc-changed="calcChanged"
                            :new-agrobject="newAgrobject"
                            :agrobjects="agrobjects"
                            :quotationId="quotationId"
                            :product-id="id"
                            :participants="participants"
                            :express_isn="express_isn"
                            :express_premium="express_premium"
                            :DA="DA">
                </agr-object>
            </div>
        </div>
        <div  class=" div-ml div-marg div-mr">
            <div class="  agreement-block ">
                <h5 class=" col-md-12">Дополнительные атрибуты</h5>
                <div v-for="attribute in attributes" class=" col-md-12   " style="width:95%;">
                    <agr-attributes :attribute="attribute"
                                    :express-attr="expressAttr"
                                    :calc-changed="calcChanged"
                                    :preloader="preloader"></agr-attributes>
                </div>
            </div>
        </div>
        <div  class="div-marg div-ml div-mr">
            <div class=" agreement-block">
                <h5 class=" col-md-12">Оговорки и ограничения</h5>
                <div class="d-flex">
                    <div v-for="agrclause in agrclauses" style="width:95%;">
                        <agr-clause  :agrclause="agrclause" :calc-changed="calcChanged" :express-attr="expressAttr"></agr-clause>
                    </div>
                </div>
            </div>
        </div>

        <div  class="div-marg div-ml">
            <div class="agreement-block " style="width:95%;">
                <upload-docs :docs="docs" :quotationId="quotationId" :calc-changed="calcChanged"></upload-docs>
            </div>
        </div>
        <div v-if="quotationId == 0 && contract_number == null || quotationId != 0 && contract_number == null && express_id != '' && express_id != null" class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center mb-4">
            <label for="yes" class="bold">Отправить в Департамент андеррайтинга </label>
            <input type="checkbox" class="mt-2 ml-2" id="yes" v-model="DA.calcDA" value="true" @change="calcChanged">
        </div>

        <div v-if="DA.calcDA" class="col-lg-12 col-xl-12 col-md-12 col-sm-12 mb-4">
            <label class="bold">Текст заявки </label>
            <input type="text" class="attr-input-text col-12"  v-model="DA.remark" @keyup="calcChanged">
        </div>

        <online-inspection :inspection="inspection"
                           :quotationId="quotationId"
                           :calcChanged="calcChanged"
                           v-if="formular.inspection_auto || formular.inspection_advantage"
                           :contract_number="contract_number">
        </online-inspection>

        <div class="d-flex justify-content-center w-100 mt-3 mb-3">
            <div class="text-center">
                <div class="fs-2" v-if="calculated && !DA.calcDA">Сумма премий {{price}} Тенге</div>
                <div class="fs-2" v-if="contract_number != null && !DA.calcDA">№ договора {{contract_number}}</div>
                <!--div class="fs-2" v-if="DA.orderCreated">Заявка отправлена в ДА. Исн заявки {{ DA_isn }}</div-->
                <div class="fs-2" v-if="DA.orderCreated && DA_nomer != null">Заявка отправлена в ДА. № заявки {{ DA_nomer }}</div>
                <!--div class="fs-2" v-if="calc_isn != null">Исн котировки {{ calc_isn }}</div-->
                <div class="fs-2" v-if="calc_id != null">№ полной котировки {{ calc_id }}</div>
                <div class="fs-2" v-if="express_id != null">№ экспресс котировки {{ express_id }}</div>

                <button v-if="contract_number === null && quotationId == 0 && !DA.calcDA" class="btn btn-outline-info" @click="calculate()">
                    Рассчитать стоимость
                </button>
                <button v-if="contract_number === null && quotationId != 0 && express_isn != null && !DA.orderCreated" class="btn btn-outline-info" @click="calculate()">
                    Сохранить полную котировку
                </button>
                <button v-if="contract_number === null && quotationId == 0 && DA.calcDA && !DA.orderCreated" class="btn btn-outline-info" @click="calculate()">
                    Отправить в ДА
                </button>
                <button v-if="calculated && contract_number === null && calc_isn != null && !DA.calcDA && status == '223370' || calculated && contract_number === null && calc_isn != null && DA.calcDA && status == '223370'" class="btn btn-outline-info" @click="createAgr">
                    Выпустить договор
                </button>
                <button v-if="docs.sendedFail" class="btn btn-outline-info" @click="sendDocs">
                    Загрузить файлы
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
                insurantIs: {
                    participant: false,
                    receiver: false,
                },
                participantIs: {
                    receiver: false,
                },
                userList: [],
                calc_isn: null,
                calc_id: null,
                DA_isn: null,
                DA_nomer: null,
                express_isn: null,
                express_id: null,
                express_premium: null,
                status_name: 'Оформление',
                status: null,
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
                newAgrobject:{},
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
                participantDocs: {
                    types: []
                },
                inspection: {
                    active: false,
                    type: null,
                    isn: null,
                    date: '',
                    time: '',
                    address: ''
                }
            }
        },
        props: {
            id: String,
            quotationId: String,
            expressAttr: Object
        },
        created(){
            this.width = window.innerWidth;
            this.height = window.innerHeight;
            this.calculated = this.quotationId == 0 ? false : true;
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
                            if(Object.keys(response.data.contractDate).length > 0){
                                for(let index in response.data.contractDate){
                                    if(response.data.contractDate[index] != '' && response.data.contractDate[index] != null){
                                        this.period[index] = response.data.contractDate[index];
                                    }
                                }
                            }
                            this.calc_isn = response.data.calc_isn;
                            this.calc_id = response.data.calc_id;
                            this.express_isn = response.data.express_isn;
                            this.express_id = response.data.express_id;
                            this.express_premium = parseInt(response.data.price);
                            this.status_name = response.data.status_name != 0 ? response.data.status_name : this.status_name;
                            this.status = response.data.status;
                            this.contract_number = response.data.contract_number;
                            this.price = parseInt(response.data.price);
                            this.docs.files = response.data.docs;

                            this.DA.calcDA = response.data.calc_da == 1 ? true : false;
                            this.DA.orderCreated = response.data.calc_da == 1 ? true : false;
                            //this.DA.orderNumber = response.data.calc_isn;
                            this.DA_isn = response.data.DA_isn;
                            this.DA_nomer = response.data.DA_nomer;
                            this.DA.remark = response.data.DAremark;

                            if(response.data.inspection != null){
                                for(let key in response.data.inspection){
                                    this.inspection[key] = response.data.inspection[key];
                                }
                            }

                            this.inspection.type = this.formular.inspection_auto ? 'auto' : this.formular.inspection_advantage ? 'advantage' : null;

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
                                //this.newAgrobject = response.data.objects;
                            }
                            this.preloader(false);
                            if(Object.keys(this.formular).length > 0 && this.formular.curator.Value == 1) { // Если нужно указать куратора
                                this.getUserList(); // Берем сотрудников
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
            getUserList() { // Берем сотрудников
                this.axios.post('/full/getFullBranch', {}).then((response) => {
                    this.userList = response.data.result;
                });
            },

            calculate(){
                if(this.inspection.active){
                    if(this.inspection.date == '' || this.inspection.time == '' || this.inspection.address == ''){
                        alert('Заполните пожалуйста все данные по онлайн осмотру');
                        return false;
                    }
                }

                if(this.DA.calcDA){
                    let checkDA = this.DA.remark == '' || this.DA.remark == null ? 1 : 0;
                    for(let index in this.agrobjects){
                        if(this.agrobjects[index].DAsum == '' || this.agrobjects[index].DAsum == null){
                            checkDA = 1;
                        }
                    }
                    if(checkDA == 1){
                        alert('Заполните пожалуйста текст заявки и сумму премии в разделе Объект');
                        return false;
                    }
                }

                // Проверка количества объектов Человек и количества застрахованных (они должны быть равными, а то расчет неверный будет)
                let countParticipants = 0;
                for(let index in this.participants){
                    if(this.participants[index].ISN == 2082){
                        countParticipants++;
                    }
                    if(this.participants[index].required && this.participants[index].subjISN == '' || this.participants[index].required && this.participants[index].subjISN == null){  // проверяем, если в конструкторе указали как обязательное
                        alert('Укажите пожалуйста участника "'+this.participants[index].Label+'"');
                        return false;
                    }
                }

                let countAgrobjects = 0;
                for(let index in this.agrobjects){
                    if(this.agrobjects[index].ClassISN == 2135){
                        countAgrobjects++;
                    }
                }

                for(let index in this.agrclauses){
                    if(this.agrclauses[index].required && this.agrclauses[index].Value == '' || this.agrclauses[index].required && this.agrclauses[index].Value == null){  // проверяем, если в конструкторе указали как обязательное
                        alert('Укажите пожалуйста обязательное поле "'+this.agrclauses[index].Label+'"');
                        return false;
                    }
                }

                for(let index in this.attributes){
                    if(this.attributes[index].required && this.attributes[index].Value == '' || this.attributes[index].required && this.attributes[index].Value == null){  // проверяем, если в конструкторе указали как обязательное
                        alert('Укажите пожалуйста обязательное поле "'+this.attributes[index].Label+'"');
                        return false;
                    }
                }

                if(countAgrobjects != 0){
                    if(countParticipants != countAgrobjects){
                        let info = "Количество страхуемых: "+countParticipants+"\nКоличество объектов: "+countAgrobjects;
                        alert("Количество объектов c классом объекта 'Человек' и количество застрахованных не совпадают\n"+info);
                        return false;
                    }
                }
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
                        express_isn: this.express_isn,
                        express_id: this.express_id
                    })
                    .then(response => {
                        if (response.data.success) {
                            if(this.DA.calcDA) {
                                alert('Заявка успешно создана.№ заявки '+response.data.DA_nomer);
                                //this.DA.orderNumber = response.data.calc_isn;
                                this.DA_isn = response.data.DA_isn;
                                this.DA.DA_nomer = response.data.DA_nomer;
                                this.DA.orderCreated = true;
                            } else {
                                this.status = response.data.status;
                                this.price = response.data.premium;
                                this.calculated = true;
                            }
                            this.calc_isn = response.data.calc_isn;
                            this.calc_id = response.data.calc_id;
                            this.status_name = response.data.status_name;

                            if(response.data.calc_isn != '') {
                                this.preloader(false);
                                this.sendDocs();            // Загрузка документов
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
                                if(this.inspection.active){     // Онлайн осмотр
                                    this.sendInspection();
                                }
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
                    if(this.inspection.active){     // Онлайн осмотр
                        this.sendInspection();
                    }
                }
            },
            sendInspection(){
                this.preloader(true);
                this.axios.post('/full/sendToInspection',
                    {
                        calc_isn: this.calc_isn,
                        inspection: this.inspection
                    })
                    .then(response => {
                        if (response.data.success) {
                            this.preloader(false);
                        } else {
                            alert(response.data.error)
                            this.preloader(false);
                        }
                    })
                    .catch(error => {
                        alert(error)
                        this.preloader(false);
                    });
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
                    this.calc_id = null;
                    this.calc_isn = null;
                    this.price = 0;
                    this.DA_isn = null;
                    this.DA_nomer = null;
                } else {
                    // if(this.DA.calcDA == true){
                    //     if(this.DAsum == null || this.DAsum == ''){
                    //         this.DAsum = this.express_premium != null ? this.express_premium : null;
                    //     }
                    // }
                }
            }
        },
        watch : {
            subjISN(){
                if(this.quotationId == 0 || this.quotationId != 0 && this.express_isn != null) {
                    this.calculated = false;
                    this.price = 0;
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
