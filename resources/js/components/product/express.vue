<template>
    <div>
        <participant :key="1"
                     :p-index="1"
                     :participant="participant"
                     :participants="[]"
                     :formular="{}"
                     :preloader="preloader"
                     :calc-changed="calcChanged"
                     :product-id="id">
        </participant>
        <!--button type="button" class="add-button width100 mt-2" @click="openParticipantForm">Добавить страхователя</button-->
        <div class="col-md-12 agreement-block mg-9">
            <div class="row">

                <agr-attributes v-if="Object.keys(attributes).length != 0 && attributes[value] != undefined && attributes[value] != null"
                                :key="value"
                                v-for="value,key in ISNS"
                                :attribute="attributes[value]"
                                :express-attr="{}"
                                :calc-changed="calcChanged"></agr-attributes>

                <!--agr-attributes :key="key" v-for="attribute,key in attributes" :attribute="attribute" :express-attr="{}"  :calc-changed="calcChanged"></agr-attributes-->

            </div>
        </div>
        <div class="d-flex justify-content-end col-12 p-0 mb-5">
            <div class="col-12 text-center p-0">
                <button class="btn btn-outline-info mg-9" @click="calculate">Рассчитать стоимость</button>
                <div class="fs-2 col-12" v-if="calculated">Сумма премий {{price}} Тенге</div>
                <button class="btn btn-outline-info" v-if="calculated" @click="createFullQuotation">Создать полную котировку</button>
            </div>
        </div>

        <!--modal name="participant-form"
            :width="width"
            :minHeight="height">
            <div class="participant-form">
                <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5 justify-content-end">
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">ИИН : </label>
                        <input type="text" v-model="iin" class="attr-input-text col-12">
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Фамилия : </label>
                        <input type="text" v-model="lastName" class="attr-input-text col-12">
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Имя : </label>
                        <input type="text" v-model="firstName" class="attr-input-text col-12">
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <label class="bold">Отчество : </label>
                        <input type="text" v-model="patronymic" class="attr-input-text col-12">
                    </div>
                </div>
                <div v-if="moreParticipant" class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5 justify-content-end">
                    <select class="custom-select" v-model="isn">
                        <option v-for="participant in participants" :value="participant.ISN">{{participant.Data}}</option>
                    </select>
                </div>
                <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5 justify-content-end">
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="closeParticipantForm">Закрыть</button>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="search">Поиск</button>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <button class="width100 btn btn-outline-info" @click="save">Сохранить</button>
                    </div>
                </div>
            </div>
        </modal-->
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
                    subjISN : null
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
                ISNS : [
                    1289051, //Пакет рисков
                    708061, //Виды спорта ( НС Спорт)
                    1289111, //Территория страхования
                    860231, //Тип продаж
                    708881, //Время действия страховки (НС Стандарт, НС Grand)
                    709261,
                    501441, //Количество Застрахованных

                    708071, //Профессии и виды деятельности (НС Стандарт, НС Grand)
                    857211, //Страховая сумма

                    798456,
                    863251, //Тип ТС
                    856691, //Пакеты
                    514581, //"% "АВ" к согласованию (гросс)
                    857901, //Срок страхования
                    857691, //Размер франшизы при повреждении"
                    513491, // Вызов ДП
                    861101, //Возрастная категория лиц допущенных к управлению
                    857711, //Размер КВ % гросс
                    513411, //Количество страхуемых ТС
                    513541, //Порядок и форма страхового возмещения
                    1402571, //Количество дней (НС Спорт, НС Дети)
                    866111, //Дата выпуска ТС
                    861091, //Пакет рисков
                    857201, //Тип ТС
                    513581, //Территория страхования



                ]
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
            // getVal(){
            //     let ISN=[
            //         501441, //Количество Застрахованных
            //         514581, //"% "АВ" к согласованию (гросс)
            //         708061, //Виды спорта ( НС Спорт)
            //         708071, //Профессии и виды деятельности (НС Стандарт, НС Grand)
            //         708881, //Время действия страховки (НС Стандарт, НС Grand)
            //         709261,
            //         857211, //Страховая сумма
            //         857901, //Срок страхования
            //         860231, //Тип продаж
            //         1289051, //Пакет рисков
            //         1289111 //Территория страхования
            //     ];
            //     let back=[];
            //     for (this.ISN == 1289051 &&  ){
            //
            //     }
            // },
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
                    let attr = '';
                    let i = 1;
                    for(let index in this.attributes){
                        if(this.attributes[index].Value == null) {
                            attr = attr + '"' + index + '":' + this.attributes[index].Value;
                        } else {
                            attr = attr + '"' + index + '":"' + this.attributes[index].Value + '"';
                        }
                        if(i != Object.keys(this.attributes).length){
                            attr = attr+',';
                        }
                        i++;
                    }
                    window.location.href = "/full/calc/" + this.id + "/0?attributes={"+attr+'}';
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
