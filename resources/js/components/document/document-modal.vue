<template>
    <div class="">
        <div class="modal fade bd-example-modal-lg" :style="modalHide" id="test" tabindex="-1" role="dialog"
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
                                <div class="flex-row jc-sb flex-wrap">
                                    <div>
                                        <div class="pl-5 pt-4 pb-4 pr-5">
                                            <div class="flex-column color-white min-width50">
                                                <div class="pt-2 pb-2 flex-row vertical-middle border-bottom-white bold">
                                                    <i class="far fa-file-alt"></i>
                                                    <span class="ml-2">Тип документа</span>
                                                </div>
                                                <div class="pt-2 pb-2">
                                                    <span>{{coordination.Fullname}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="pl-5 pt-4 pb-4 pr-5">
                                            <div class="flex-column color-white min-width50">
                                                <div class="pt-2 pb-2 flex-row vertical-middle border-bottom-white bold">
                                                    <span class="border-white pl-1 pr-1">№</span>
                                                    <span class="ml-2">Номер</span>
                                                </div>
                                                <div class="pt-2 pb-2">
                                                    <span>{{coordination.ID}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="pl-5 pt-4 pb-4 pr-5">
                                            <div class="flex-column color-white min-width50">
                                                <div class="pt-2 pb-2 flex-row vertical-middle border-bottom-white bold">
                                                    <i class="far fa-calendar-alt"></i>
                                                    <span class="ml-2">Дата</span>
                                                </div>
                                                <div class="pt-2 pb-2">
                                                    <span>{{coordination.Docdate}}</span>
                                                </div>
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
                                                    <span class="ml-2">Инициатор</span>
                                                </div>
                                                <div class="pt-2 pb-2" v-if="coordination.DocClass === '1010031'">
                                                    <span>{{coordination.SubjDept}} {{coordination.SubjName}}</span>
                                                </div>
                                                <div class="pt-2 pb-2" v-else>
                                                    <span>{{coordination.Curator}}</span>
                                                </div>
                                                <div class="pt-2 pb-2" v-if="coordination.DocClass == '2011501'">
                                                    <div class="border-bottom pl-1 pr-1">
                                                        <i class="fas fa-link"></i>
                                                    </div>
                                                    <a class="text-white" :href="coordination.link">Ссылка на документ</a>
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
                                <div class="offset-md-4 col-md-4">
                                    <i v-if="loading" class="fas fa-spinner fa-spin"></i>
                                    <button v-if="!changeMatch.status" class="btn btn-warning btn-block2" @click="makeChange()">
                                        Внести изменение
                                    </button>
                                    <button v-if="changeMatch.status" class="btn btn-primary btn-block2" @click="changeMatching()">
                                        Изменить Согласующих
                                    </button>
                                </div>
                            </div>
                        </div>
<!--                        <div>-->
<!--                            <div class="bg-blue-standart">-->
<!--                                <div class="pl-5 pt-4 pb-4 pr-5">-->
<!--                                    <div class="flex-row color-white vertical-middle">-->
<!--                                        <span class="ml-1">Примечание</span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
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
        },
        mounted() {
            //...
        },
        methods: {
            // beforeSendSolution(solution){
            //     this.$refs.eds.getToken('coordination',solution)
            // },
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
                    // console.log(response)
                });
            },
            setCoordinator() {

            },
            makeChange() {
              this.changeMatch.status = true;
              this.loading = false;
              let i = 0;
              for(i=0; i < this.coordination.Coordinations.length; i++){
                  this.coordinator[i] = this.coordination.Coordinations[i].SubjISN;
              }
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
                            this.loading = false;
                            this.changeMatch.status = false;
                            if(alert('Успешно изменено')){
                                preloader(show)
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
            setCoordinationOnChange() {
                //this.coordinator = this.coordination.Coordinations;
                // this.coordinator[index] = this.coordination.Coordinations[index].SubjISN;
                // for((obj, index) in this.coordination.Coordinations) {
                //     this.coordinator[index] = obj.SubjISN;
                // }
            },
            // sendSolution: function (Solution) {
            //     if (confirm("Проверьте правильность введенных данных\nОтменить действие будет невозможно")) {
            //         this.preloader(true);
            //         this.axios.post("/setCoordination", {
            //             DocISN: this.coordination.ISN,
            //             ISN: this.isn,
            //             Solution: Solution,
            //             Remark: this.Remark,
            //             Resolution : this.resolution
            //         }).then((response) => {
            //             if (!response.data.success) {
            //                 this.preloader(false);
            //                 alert(response.data.error);
            //             } else {
            //                 this.preloader(false);
            //                 location.reload();
            //             }
            //         });
            //     }
            // },
            // sendEdsSolution(){
            //     if(this.$refs.eds.edsConfirmed){
            //         this.sendSolution(1);
            //     } else {
            //         alert('Чтобы согласовать сначало надо подписать через ЭЦП');
            //         //$refs.eds.getToken('coordination', 1)
            //     }
            // },
            close() {
                this.$parent.$refs.modalButton.click()
            },
            checkIsDir(){
                return this.$parent.isDirector;
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
        // watch: {
        //     coordination:function(val){
        //         this.coordinator = this.coordination.Coordinations;
        //     }
        // }
        // computed: {
        //     coordination.Coordinations.Fullname.pop();
        // }
    }
</script>

<style scoped>

</style>

