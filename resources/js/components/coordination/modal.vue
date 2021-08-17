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
                                                    <span>{{response.Fullname ? response.Fullname :coordination.Fullname}}</span>
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
                                            <tr v-for="attribute in coordination.Attributes">
                                                <td>{{attribute.Name}}</td>
                                                <td>{{attribute.Value}}</td>
                                            </tr>
                                            <tr v-if="coordination.DocClass === '1010031'">
                                                <td>Куратор документа</td>
                                                <td>{{coordination.Curator}}</td>
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
                                    <textarea name="comment-modal" rows="3" v-model="coordination.Remark"
                                              class="resize modal-textarea-comment width100" maxlength="2000" disabled></textarea>
                                </div>
                                <div class="mt-4">
                                    <div class="table-responsive-sm overflow-auto">
<!--                                        <table class="table table-bordered table-striped">-->
<!--                                            <thead>-->
<!--                                            <tr>-->
<!--                                                <td v-for="list in doc_row_list">-->
<!--                                                    <b>{{list.fieldname}}</b>-->
<!--                                                </td>-->
<!--                                            </tr>-->
<!--                                            </thead>-->
<!--                                            <tbody>-->
<!--                                            <tr v-for="(list,index) in doc_row_inner[1]">-->
<!--                                                <td v-for="(list,key) in doc_row_list">-->
<!--                                                    {{ doc_row_inner[key][index] }}-->
<!--                                                </td>-->
<!--                                            </tr>-->
<!--                                            </tbody>-->
<!--                                        </table>-->

                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                            <tr v-for="(list, index) in doc_row_list" v-if="doc_row_inner[index][0] !== ''">
                                                <td>
                                                    <b>{{list.fieldname}}</b>
                                                </td>
                                                <td>
                                                    {{doc_row_inner[index][0]}}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="table-responsive-sm overflow-auto">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <td v-for="list in doc_row_list_other">
                                                    <b>{{list.fieldname}}</b>
                                                </td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="(list,index) in doc_row_list_inner_other[1]">
                                                <td v-for="(list,key) in doc_row_list_other">
                                                    <span v-if="doc_row_list_inner_other[key][index]['ID'] != undefined">{{ doc_row_list_inner_other[key][index]['ID'] }}</span>
                                                    <span v-else>{{ doc_row_list_inner_other[key][index] }}</span>
                                                    <a href="#" role="button" v-if="parseInt(doc_row_list_inner_other[1][0].ClassISN) == 1920831 && key == 1" @click="getOrderDocumentContent(doc_row_list_inner_other[key][index]['ISN'])">
                                                        (подробнее)
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
                                    <div v-if="coordination.Limit !== null"
                                         class="col-md-4 col-lg-4 flex-row vertical-middle mt-3">
                                        <div class="attachment-bg flex-row vertical-middle ">
                                            <div class="attachment-border pt-2 pr-4 pb-2 pl-4">
                                                <i class="fas fa-paperclip rotate-45"></i>
                                            </div>
                                            <div class="pl-5 pr-5 text-dec-underline pointer pt-2 pb-2">
                                                <a :href="`/getPrintableDocument/${coordination.Limit}/3015/3`"
                                                   target="_blank">Изменение лимитов на подписание ДС</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div v-for="attachment in attachments"
                                         class="col-md-4 col-lg-4 flex-row vertical-middle mt-3">
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
                                    <div class="pl-5 pt-4 pb-4 pr-5 "
                                        v-if="coordination.DocClass === '804911' && checkIsDir()">
                                        <span>Резолюция председателя :</span>
                                        <br>

                                        <select class="custom-select w-25" v-model="resolution">
                                            <option value="0">Не выбрано</option>
                                            <option value="815971">В приказ</option>
                                            <option value="815981">Вынести вопрос на Совет директоров</option>
                                            <option value="815991">Вынести вопрос в правление</option>
                                        </select>
                                    </div>
                                    <div class="pl-5 pt-4 pb-4 pr-5">
                                        <textarea rows="4" v-model="Remark"
                                                  class="resize modal-note width100" maxlength="2000"></textarea>
                                    </div>

                                    <div v-if="Object.keys(doc_row_list_inner_other).length > 0">
                                        <div v-if="parseInt(doc_row_list_inner_other[1][0].ClassISN) == 1920831 || doc_row_list_inner_other[1][0].ClassISN == '1920831'">
                                            <eds-order-document
                                                    v-if="coordination.DocClass === 1784781 || coordination.DocClass === '1784781'"
                                                    ref="eds"
                                                    :authorized-user-iin="authorizedUserIin"
                                                    :sendSolution="sendSolution"
                                                    :coordination="coordination"
                                                    :doc_row_list_inner_other="doc_row_list_inner_other"
                                                    :preloader="preloader"
                                                    :doc_row_error="doc_row_error"
                                                    show-view="sign">
                                            </eds-order-document>
                                        </div>
                                        <div v-else>
                                            <edslogin
                                                    v-if="coordination.DocClass === 1784781 || coordination.DocClass === '1784781' || coordination.sz_class_isn == 800711 && coordination.sz_type == 'СЗ.Выдача доверенности' || coordination.sz_class_isn == '800711' && coordination.sz_type == 'СЗ.Выдача доверенности'"
                                                    ref="eds"
                                                    :sendSolution="sendSolution"
                                                    :coordination="coordination"
                                                    :doc_row_list_inner_other="doc_row_list_inner_other"
                                                    :doc_row_error="doc_row_error"
                                                    show-view="sign">
                                            </edslogin>
                                        </div>
                                    </div>
                                    <div v-else>
                                        <edslogin
                                                v-if="coordination.DocClass === 1784781 || coordination.DocClass === '1784781' || coordination.sz_class_isn == 800711 && coordination.sz_type == 'СЗ.Выдача доверенности' || coordination.sz_class_isn == '800711' && coordination.sz_type == 'СЗ.Выдача доверенности'"
                                                ref="eds"
                                                :sendSolution="sendSolution"
                                                :coordination="coordination"
                                                :doc_row_list_inner_other="doc_row_list_inner_other"
                                                :doc_row_error="doc_row_error"
                                                show-view="sign">
                                        </edslogin>
                                    </div>

                                    <div class="flex-row">
                                        <div class="flex-row pl-5 pb-4 pr-4 pointer">
                                            <div title="Согласовать"
                                                 v-if="coordination.DocClass === 1784781 || coordination.DocClass === '1784781'"
                                                 class="vertical-middle button-accept color-white-standart matching-buttons pl-4 pr-4 pt-1 pb-1"
                                                 @click="sendEdsSolution()">
                                                <i class="far fa-check-circle"></i>
                                            </div>
                                            <div title="Согласовать"
                                                 v-if="coordination.DocClass !== 1784781 && coordination.DocClass !== '1784781'"
                                                 class="vertical-middle button-accept color-white-standart matching-buttons pl-4 pr-4 pt-1 pb-1"
                                                 @click="sendSolution(1)">
                                                <i class="far fa-check-circle"></i>
                                            </div>
                                        </div>
                                        <div class="flex-row pl-4 pb-4 pr-4 pointer">
                                            <div title="Отказать"
                                                 class="vertical-middle button-cancel color-white-standart matching-buttons pl-4 pr-4 pt-1 pb-1"
                                                 @click="sendSolution(0)">
                                                <i class="far fa-times-circle"></i>
                                            </div>
                                        </div>
                                        <div class="flex-row pl-4 pb-4 pr-4 pointer"
                                             v-if='coordination.DocClass === "883011" || coordination.DocClass === "1256401" || coordination.DocClass === "1797771"'>
                                            <div title="Воздержаться"
                                                 class="vertical-middle button-neutral matching-buttons pl-4 pr-4 pt-1 pb-1"
                                                 @click="sendSolution(2)">
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
                                                        <i v-if="users.Solution === '-1'"
                                                           class="far fa-question-circle blue-button"></i>
                                                        <i v-if="users.Solution === '0'"
                                                           class="far fa-times-circle red-button"></i>
                                                        <i v-if="users.Solution === '1'"
                                                           class="far fa-check-circle green-button"></i>
                                                        <i v-if="users.Solution === '2'"
                                                           class="far fa-dot-circle yellow-button"></i>
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
        <button v-show="false" ref="informationModal" type="button" data-toggle="modal" data-target="#information-modal">Large modal</button>
        <information-modal
                :content-inner-information = "contentInnerInformation"
                v-if="Object.keys(doc_row_list_inner_other).length > 0 && parseInt(doc_row_list_inner_other[1][0].ClassISN) == 1920831">
        </information-modal>
    </div>
</template>

<script>
    export default {
        name: "coordination-modal",
        data() {
            return {
                Remark: "",
                resolution: "0",
                modalHide: '',
                contentInnerInformation: {}
            }
        },
        props: {
            coordination: Object,
            isn: Number,
            attachments: Array || Object,
            doc_row_list: Object,
            doc_row_inner: Object,
            doc_row_list_other: Object,
            doc_row_list_inner_other: Object,
            authorizedUserIin: Number,
            doc_row_error: String
        },
        methods: {
            beforeSendSolution(solution){
                 this.$refs.eds.getToken('coordination',solution)
            },
            sendSolution: function (Solution) {
                if (confirm("Проверьте правильность введенных данных\nОтменить действие будет невозможно")) {
                    this.preloader(true);
                    this.axios.post("/setCoordination", {
                        DocISN: this.coordination.ISN,
                        ISN: this.isn,
                        Solution: Solution,
                        Remark: this.Remark,
                        Resolution : this.resolution
                    }).then((response) => {
                        if (!response.data.success) {
                            this.preloader(false);
                            alert(response.data.error);
                        } else {
                            this.preloader(false);
                            location.reload();
                        }
                    });
                }
            },
            sendEdsSolution(){
                if(this.$refs.eds.edsConfirmed){
                    this.sendSolution(1);
                } else {
                    alert('Чтобы согласовать сначало надо подписать через ЭЦП');
                    //$refs.eds.getToken('coordination', 1)
                }
            },
            close() {
                this.$parent.$refs.modalButton.click()
            },
            checkIsDir(){
                return this.$parent.isDirector;
            },
            getOrderDocumentContent(docIsn){
                this.preloader(true);
                this.axios.post("/getEorderDocs", {
                    DocISN: docIsn
                }).then((response) => {
                    if (!response.data.success) {
                        this.preloader(false);
                        alert(response.data.error);
                    } else {
                        this.contentInnerInformation = response.data.doc_info;
                        this.$refs.informationModal.click();
                        this.modalHide = 'z-index:1050;overflow: scroll;';
                        this.preloader(false);
                    }
                });
            },
            preloader(show){
                if(show){
                    document.getElementById('preloader').style.display = 'flex';
                    this.modalHide = 'z-index:0;overflow: scroll;';
                } else {
                    document.getElementById('preloader').style.display = 'none';
                    this.modalHide = 'z-index:1050;overflow: scroll;';
                }
            }
        },
    }
</script>

<style scoped>

</style>
