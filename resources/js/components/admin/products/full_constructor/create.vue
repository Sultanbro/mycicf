<template>
    <div class="row">
        <div class="form-group col-md-12 col-lg-12 col-12 text-center font-weight-bold">
            Конструктор продукта - {{ product.name }} (ISN - {{ product.product_isn }})
            <button type="button"
                    @click="updateProductsDicti('attributes',true)"
                    class="btn-info btn-lg btn float-right">Обновить справочник</button>
        </div>

        <formular :checkOptions="checkOptions"
                  :formular="sections.formular"
                  :parentisns="parentisns"
                  :preloader = "preloader"
                  title="Формуляр"
                  type="formular"></formular>
        <!--constructor v-for="(section,key) in sections"
                     v-if="key != 'formular' && key != 'agrobjects' && key != 'id' && key != 'parentisns'&& key != 'product_isn'"
                     :iIndex="key"
                     :key="key"
                     :parentisns="parentisns"
                     :items="section">
        </constructor-->
        <constructor v-if="checkOptions.formular"
                     :checkOptions="checkOptions"
                     iIndex="participants"
                     :parentisns="parentisns"
                     :preloader = "preloader"
                     :items="sections.participants">
        </constructor>
        <constructor v-if="checkOptions.participants"
                     :checkOptions="checkOptions" iIndex="attributes"
                     :parentisns="parentisns"
                     :preloader = "preloader"
                     :items="sections.attributes">
        </constructor>
        <constructor v-if="checkOptions.attributes"
                     :checkOptions="checkOptions" iIndex="agrclauses"
                     :parentisns="parentisns"
                     :preloader = "preloader"
                     :items="sections.agrclauses">
        </constructor>

        <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <button type="button" @click="save" class="btn-info btn-lg btn">Сохранить</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "full-constructor-create",
        data() {
            return {
                ISN : null,
                sections : Object,
                parentisns : {              // Если в базе нету prentIsns то берем вот эти по умолчанию
                    formular : {
                        //insurant : 2103,
                        curator : 221346,
                        status : 223367
                    },
                    participants : 19,
                    attributes : 220169,
                    agrclauses : 2031,
                    objects : 19,
                },
                checkOptions : {
                    formular : false,
                    participants : false,
                    attributes : false,
                    agrclauses : false
                }
            }
        },
        props: {
            product : Object,
            data : Object,       // Конструктор из базы
            parentisn : Object  // Parentisns из базы
        },
        created(){
            this.sections = this.data;                      // Дает возможность манипулировать объектом sections
            if(Object.keys(this.parentisn).length != 0){
                this.parentisns = this.parentisn;           // Дает возможность манипулировать объектом parentisns
            }
        },
        methods: {
            save(){
                this.preloader(true);
                this.sections.product_isn = this.product.product_isn;
                this.sections.id = this.product.id;
                this.sections.parentisns = this.parentisns;
                this.axios.post('/calc/full-constructor', this.sections)
                    .then(response => {
                        if(response.data.success){
                            alert('Данные успешно записаны');
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
            updateProductsDicti(dicti,send){
                this.preloader(true);
                this.axios.post('/updateProductsDicti', {isn: this.parentisns[dicti],type : dicti+'Main'})
                    .then(response => {
                        if (response.data.success) {
                            this.preloader(false);
                            if(send == true) {
                                this.updateProductsDicti('agrclauses', false);
                            }
                        } else {
                            alert(response.data.error);
                            this.preloader(false);
                        }
                    })
                    .catch(error => {
                        alert(error);
                        this.preloader(false);
                    });
            },
            preloader(show){
                if(show) {
                    document.getElementById('preloader').style.display = 'flex';
                } else {
                    document.getElementById('preloader').style.display = 'none';
                }
            }
        },
        mounted(){
            //...
        },

    }
</script>