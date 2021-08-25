<template>
        <div class="modal fade bd-example-modal-lg" :style="modalHide" id="listDoc" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content products-margin modal-lg-custom modal-custom-border-top">
                    <div>
                        <div>
                            <div class="bg-blue-standart modal-custom-border-top">
                                <div class="border-bottom-white">
                                    <div class="pl-5 pt-4 pb-4 pr-5">
                                        <div @click="close"
                                             class="color-white-standart vertical-middle pt-3 pb-3 inline pointer">
                                            <i class="fas fa-chevron-circle-left"></i>
                                            <span class="pl-1">НАЗАД</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row jc-sb flex-wrap pt-4 pb-4">
                                    <div class="row pl-5 pr-5">
                                        <div class="color-white min-width50 pl-2 pr-4">
                                            <div class="border-bottom-white bold">
                                                <i class="far fa-file-alt"></i>
                                                <span class="ml-2">Тип документа</span>
                                            </div>
                                            <div class="pt-2 pb-2">
                                                <span>{{coordination.Fullname}}</span>
                                            </div>
                                        </div>
                                        <div class="color-white min-width50 pl-1 pr-4">
                                            <div class="border-bottom-white bold">
                                                <span class="border-white pl-1 pr-1">№</span>
                                                <span class="ml-2">Номер</span>
                                            </div>
                                            <div class="pt-2 pb-2">
                                                <span>{{coordination.ID}}</span>
                                            </div>
                                        </div>
                                        <div class="color-white min-width50 pl-1 pr-4">
                                            <div class="border-bottom-white bold">
                                                <i class="far fa-calendar-alt"></i>
                                                <span class="ml-2">Дата</span>
                                            </div>
                                            <div class="pt-2 pb-2">
                                                <span>{{coordination.Docdate}}</span>
                                            </div>
                                        </div>
<!--                                        <div class="color-white min-width50 pl-1 pr-4">-->
<!--                                            <div class="border-bottom-white bold">-->
<!--                                                <i class="far fa-calendar-alt"></i>-->
<!--                                                <span class="ml-2">Контрагент</span>-->
<!--                                            </div>-->
<!--                                            <treeselect v-model="results.contragent.subjIsn" placeholder="Не выбрано" :multiple="false"-->
<!--                                                        :options="userList" :disable-branch-nodes="true"/>-->
<!--                                        </div>-->
<!--                                        <div class="color-white min-width50 pl-1 pr-4">-->
<!--                                            <div class="border-bottom-white bold">-->
<!--                                                <i class="far fa-calendar-alt"></i>-->
<!--                                                <span class="ml-2">Сумма</span>-->
<!--                                            </div>-->
<!--                                            <div class="pt-2 pb-2">-->
<!--                                                <input type="text"-->
<!--                                                       v-model="coordination.summa" :disabled="!changeMatch.status" class="form-control">-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="color-white min-width50 pl-1 pr-4">-->
<!--                                            <div class="border-bottom-white bold">-->
<!--                                                <i class="far fa-calendar-alt"></i>-->
<!--                                                <span class="ml-2">Валюта</span>-->
<!--                                            </div>-->
<!--                                            <div class="pt-2 pb-2">-->
<!--                                                <select v-model="coordination.currency" :disabled="!changeMatch.status" class="form-control">-->
<!--                                                    <option value="9716">USD Доллар США</option>-->
<!--                                                    <option value="9721">EUR Евро</option>-->
<!--                                                    <option value="9788">RUB Российский рубль</option>-->
<!--                                                    <option value="9813">KZT Тенге</option>-->
<!--                                                    <option value="9832">GBP Фунт стерлингов</option>-->
<!--                                                    <option value="9838">Швейцарский франк</option>-->
<!--                                                </select>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <div v-if="coordination.status" class="color-white min-width50 pl-1 pr-4">
                                            <div class="border-bottom-white bold">
                                                <i class="far fa-calendar-alt"></i>
                                                <span class="ml-2">Статус</span>
                                            </div>
                                            <div class="pt-2 pb-2">
                                                <span>{{coordination.status}}</span>
                                            </div>
                                        </div>
                                        <div v-if="!coordination.status" class="color-white min-width50 pl-1 pr-4">
                                            <div class="border-bottom-white bold">
                                                <i class="far fa-calendar-alt"></i>
                                                <span class="ml-2">Статус</span>
                                            </div>
                                            <div class="pt-2 pb-2">
                                                <span>В работе</span>
                                            </div>
                                        </div>
                                        <div v-if="coordination.stage" class="color-white min-width50 pl-1 pr-4">
                                            <div class="border-bottom-white bold">
                                                <i class="far fa-calendar-alt"></i>
                                                <span class="ml-2">Стадия</span>
                                            </div>
                                            <div class="pt-2 pb-2">
                                                <span>{{coordination.stage}}</span>
                                            </div>
                                        </div>
                                        <div v-if="!coordination.stage" class="color-white min-width50 pl-1 pr-4">
                                            <div class="border-bottom-white bold">
                                                <i class="far fa-calendar-alt"></i>
                                                <span class="ml-2">Стадия</span>
                                            </div>
                                            <div class="pt-2 pb-2">
                                                <span>В работе</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="pl-5 pb-4 pr-5">
                                            <div class="flex-column color-white">
                                                <div class="pt-2 pb-2 flex-row vertical-middle border-bottom-white bold">
                                                    <div class="border-white pl-1 pr-1">
                                                        <i class="far fa-user"></i>
                                                    </div>
                                                    <span class="ml-2">Куратор документа</span>
                                                </div>
                                                <div class="pt-2 pb-2">
                                                    <span>{{coordination.Curator}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="pl-5 pt-4 pb-4 pr-5">
                                <div>
                                    <span class="color-blue-standart">Дополнительные сведения</span>
                                </div>
                                <div class="mt-4">
                                    <div class="table-responsive-sm">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr v-for="attribute in coordination.Attributes"
                                                    v-if="attribute.fullname !== 'Согласующий 1' || attribute.fullname !== 'Согласующий 2'
                                                    || attribute.fullname !== 'Согласующий 3'">
                                                    <td>{{attribute.Name}}</td>
                                                    <td>{{attribute.Value}}</td>
                                                </tr>
                                                <tr v-if="coordination.Coordinations.length > 0" v-for="(coordinate, index) in coordination.Coordinations" :key="index"
                                                >
                                                        <td>Согласующий {{ index + 1}} </td>
                                                        <td>
                                                            <treeselect
                                                                v-model="coordinate.SubjISN" :disabled="!changeMatch.status"
                                                                :multiple="false"
                                                                :options="userList"
                                                                :disable-branch-nodes="true"/></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <textarea name="comment-modal" rows="3" v-model="coordination.Remark"
                                              class="resize modal-textarea-comment width100" maxlength="2000" disabled></textarea>
                                </div>
                                <div class="offset-md-2">
                                    <button v-if="!changeMatch.status && sendOut" class="btn btn-success btn-block2 col-md-4" @click="sendOutList()" :disabled="loading">
                                        Разослать на согласование
                                    </button>
                                    <i v-if="loading" class="fas fa-spinner fa-spin"></i>
                                    <button v-if="!changeMatch.status" class="btn btn-warning btn-block2 col-md-4" @click="makeChange()" :disabled="loading">
                                        Внести изменение
                                    </button>
                                    <button v-if="changeMatch.status" class="btn btn-primary btn-block2 col-md-4" @click="changeMatching()" :disabled="loading">
                                        Изменить Согласующих
                                    </button>
                                </div>
                                <div v-show="loading" class="loading-ellipsis">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        name: "document-modal",
        data() {
            return {
                Remark: "",
                resolution: "0",
                modalHide: '',
                loading: false,
                userList : [],
                coordinator: {},
                coordinationSubjISN: [],
                sendOut: true,
            }
        },
        created() {
            this.getUsersInfo();
            this.getUserList();
        },
        props: {
            changeMatch: Object,
            coordination: Object,
            isn: String,
            listDocId: String,
        },
        mounted() {
            //...
        },
        methods: {
            getUsersInfo(){
                this.axios.post('/document/getUserInfo', {}).then((response) => {
                    this.usersInfo = response.data.usersInfo;
                });
            },
            getUserList() {
                let data = {
                    sz:true
                }
                this.axios.post('/full/getFullBranch', data).then((response) => {
                    this.userList = response.data.result;
                    this.isLoading = false;
                });
            },
            makeChange() {
              this.changeMatch.status = true;
              this.sendOut = false;
              this.loading = false;
              let i = 0;
              for(i=0; i < this.coordination.Coordinations.length; i++){
                  this.coordinator[i] = this.coordination.Coordinations[i].SubjISN;
              }
            },
            sendOutList(){//sendOut
                this.loading = true
                let data = {
                    listDocIsn: this.isn,
                    results: this.results
                }
                this.axios.post('/sendOut', data).then((response) => {
                    if(response.data.success) {
                        this.coordination.stage = response.data.stage
                        this.coordination.status = response.data.status
                        this.sendOut = false;
                        this.loading = false
                    } else {
                        this.sendOut = true
                        this.loading = false
                        alert(response.data.error);
                    }
                });
            },
            changeMatching() {
                this.loading = true;
                this.changeMatch.status = false;
                for(let i=0; i< this.coordination.Coordinations.length; i++){
                    this.coordinationSubjISN[i] = this.coordination.Coordinations[i].SubjISN;
                }
                let data = {
                    coordinator: this.coordinator,
                    coordinationSubjISN: this.coordinationSubjISN,
                }
                this.axios.post('/changeDocCoordination', data)
                    .then((response) => {
                        if(response.data.success) {
                            // this.status = response.data.status;
                            this.sendOut = true
                            this.loading = false;
                            this.changeMatch.status = false;
                            if(alert('Успешно изменено')){
                                this.preloader(show)
                            }
                            // alert('Успешно изменено')

                            // if(confirm('Успешно изменено')){
                            //     window.close();
                            // }
                        } else {
                            this.changeMatch.status = false;
                            this.loading = false;
                        }
                    })
            },
            close() {
                this.$parent.$refs.modalButton.click()
            },
            preloader(show){
                if(show){
                    document.getElementById('preloader').style.display = 'flex';
                    this.modalHide = 'z-index:0;';
                } else {
                    document.getElementById('preloader').style.display = 'none';
                    this.modalHide = 'z-index:1050;';
                }
            }
        },
    }
</script>

<style scoped>

</style>

