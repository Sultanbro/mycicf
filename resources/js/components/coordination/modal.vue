<template>
    <div class="">
        <div class="modal fade bd-example-modal-lg" id="test" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content products-margin modal-lg-custom modal-custom-border-top">
                    <div>
                        <div>
                            <div class="bg-blue-standart modal-custom-border-top">
                                <div class="border-bottom-white">
                                    <div class="pl-5 pt-4 pb-4 pr-5">
                                        <div @click="close" class="color-white-standart vertical-middle pt-3 pb-3 inline pointer">
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
                                                <tr v-for="attribute in coordination.Attributes">
                                                    <td>{{attribute.Name}}</td>
                                                    <td>{{attribute.Value}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--<div class="flex-row" v-show="coordination.DocClass === '883011'">-->
                                    <!--<div class="bg-blue-standart pl-4 pr-4 pt-2 pb-2">-->
                                        <!--<span class="color-white" >Повестка АС по вопросу</span>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <div class="mt-4">
                                    <textarea name="comment-modal" rows="3" v-model="coordination.Remark" class="resize modal-textarea-comment width100" disabled></textarea>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="bg-blue-standart">
                                <div class="pl-5 pt-4 pb-4 pr-5">
                                    <div class="flex-row color-white vertical-middle">
                                        <i class="far fa-file-alt"></i>
                                        <span class="ml-1">Документы</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="pl-5 pt-4 pb-4 pr-5 flex-row flex-wrap jc-sb">
                                    <div v-for="attachment in attachments" class="col-md-4 col-lg-4 flex-row vertical-middle mt-3">
                                        <div class="attachment-bg flex-row vertical-middle ">
                                            <div class="attachment-border pt-2 pr-4 pb-2 pl-4">
                                                <i class="fas fa-paperclip rotate-45"></i>
                                            </div>
                                            <div class="pl-5 pr-5 text-dec-underline pointer pt-2 pb-2">
                                                <a :href="attachment.URL" target="_blank">{{attachment.FileName}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="bg-blue-standart">
                                <div class="pl-5 pt-4 pb-4 pr-5">
                                    <div class="flex-row color-white vertical-middle">
                                        <span class="ml-1">Примечание</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div>
                                    <div class="pl-5 pt-4 pb-4 pr-5">
                                        <textarea rows="4" v-model="Remark" class="resize modal-note width100"></textarea>
                                    </div>
                                    <div class="flex-row">
                                        <div class="flex-row pl-5 pb-4 pr-4 pointer">
                                            <div title="Согласовать" class="vertical-middle button-accept color-white-standart matching-buttons pl-4 pr-4 pt-1 pb-1" @click="sendSolution(1)">
                                                <i class="far fa-check-circle"></i>
                                            </div>
                                        </div>
                                        <div class="flex-row pl-4 pb-4 pr-4 pointer">
                                            <div title="Отказать" class="vertical-middle button-cancel color-white-standart matching-buttons pl-4 pr-4 pt-1 pb-1" @click="sendSolution(0)">
                                                <i class="far fa-times-circle"></i>
                                            </div>
                                        </div>
                                        <div class="flex-row pl-4 pb-4 pr-4 pointer" v-if='coordination.DocClass === "883011"'>
                                            <div title="Воздержаться" class="vertical-middle button-neutral matching-buttons pl-4 pr-4 pt-1 pb-1"  @click="sendSolution(2)">
                                                <i class="far fa-dot-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="pl-5 pt-4 pb-4 pr-5">
                                        <div class="table-responsive-sm">
                                            <table class="table table-bordered table-striped matching-table">
                                                <thead>
                                                    <tr>
                                                        <td>ФИО</td>
                                                        <td>Виза</td>
                                                        <td>Примечание</td>
                                                        <td>Подразделение</td>
                                                        <td>Дата</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="none">
                                                        <td></td>
                                                    </tr>
                                                    <tr v-for="users in coordination.Coordinations">
                                                        <td>{{users.FullName}}</td>
                                                        <td>
                                                            <i v-if="users.Solution === '-1'" class="far fa-question-circle blue-button"></i>
                                                            <i v-if="users.Solution === '0'" class="far fa-times-circle red-button"></i>
                                                            <i v-if="users.Solution === '1'" class="far fa-check-circle green-button"></i>
                                                            <i v-if="users.Solution === '2'" class="far fa-dot-circle yellow-button"></i>
                                                        </td>
                                                        <td>{{users.Remark}}</td>
                                                        <td>{{users.Dept}}</td>
                                                        <td>{{users.Date}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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
        name: "coordination-modal",
        data() {
            return {
                Remark: "",
            }
        },
        props: {
            coordination : Object,
            isn : Number,
            attachments : Array || Object,
        },
        methods: {
            sendSolution: function (Solution) {
                if(confirm("Проверьте правильность введенных данных\nОтменить действие будет невозможно")){
                    this.axios.post("/setCoordination", {DocISN: this.coordination.ISN, ISN : this.isn, Solution: Solution, Remark: this.Remark}).then((response) => {
                        if(!response.data.success){
                            alert(response.data.error);
                        }else{
                            location.reload();
                        }
                    });
                }
            },
            close () {
                this.$parent.$refs.modalButton.click()
            }
        },
    }
</script>

<style scoped>

</style>
