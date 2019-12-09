<template>
    <div class="">
        <div class="modal fade bd-example-modal-lg" id="mainModal" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true"
            ref="mainModal"
        >
            <div class="modal-dialog modal-lg">
                <div class="modal-content products-margin modal-custom-border-top">
                    <div class="bg-blue-standart pt-3">
                        <div class="bg-white">
                            <div class="relative container-fluid flex-row pt-1 pb-1 color-blue">
                                <div class="absolute" @click="close"><i class="far fs-1_5 fa-arrow-alt-circle-left"></i></div>
                                <a class="jc-center flex-row width100 color-blue">
                                    <div class="fs-1_1">{{coordination.Fullname}}</div>
                                </a>
                            </div>
                        </div>
                        <div class="flex-column">
                            <div class="bg-blue-standart matching-border pt-3">
                                <div class="container-fluid jc-sb flex-row color-white pb-2">
                                    <div class="width50">
                                        <strong>Номер</strong>
                                    </div>
                                    <div class="width50">
                                        {{coordination.ID}}
                                    </div>
                                </div>
                            </div>
                            <div class="bg-blue-standart matching-border pt-2">
                                <div class="container-fluid jc-sb flex-row color-white pb-2">
                                    <div class="width50">
                                        <strong>Дата</strong>
                                    </div>
                                    <div class="width50">
                                        {{coordination.Docdate}}
                                    </div>
                                </div>
                            </div>
                            <div class="bg-blue-standart matching-border pt-2 mb-4">
                                <div class="container-fluid jc-sb flex-row color-white pb-2">
                                    <div class="width50">
                                        <strong>Инициатор</strong>
                                    </div>
                                    <div class="width50">
                                        {{coordination.Curator}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white">
                        <div>
                            <div class="table-responsive width100">
                                <table class="table table-striped-white-blue mobile-coordination-table mobile-matching-active-table-contain table-striped text-align-center">
                                    <thead>
                                    <tr class="color-blue bg-white">
                                        <th colspan="2">Дополнительные сведения</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="attribute in coordination.Attributes" :class="[{ModalColorfulText: attribute.Value.length > 200}, {cursor : attribute.Value.length > 200}]" class="coordinationModalTr">
                                        <td>{{attribute.Name}}</td>
                                        <td v-if="attribute.Value.length > 200" @click="openLongText(attribute.Name, attribute.Value)">{{attribute.Value.substring(0,200)}}...</td>
                                        <td v-else>{{attribute.Value}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <div class="ml-4 mr-4">
                                <textarea class="resize modal-textarea-comment width100" rows="3"
                                          disabled="disabled" v-model="coordination.Remark" ></textarea>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="bg-blue-standart">
                                <div class="container-fluid pt-2 pb-2 jc-center fs-1_2">
                                    <span class="color-white">Документы</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="jc-center flex-column vertical-middle pt-3 pb-3">
                                <div class="flex-row attachment-bg mt-2 mb-2 width100" v-for="attachment in attachments">
                                    <div class="attachment-border pt-2 pr-4 pb-2 pl-4 jc-center flex-column">
                                        <i class="fas fa-paperclip color-blue-standart fs-1_4 rotate-45"></i>
                                    </div>
                                    <div class="pl-5 pr-5 text-dec-underline pointer pt-2 pb-2">
                                        <a :href="attachment.URL" target="_blank" class="color-dimgray">{{attachment.FileName}}</a>
                                    </div>
                                </div>
                                <div class="flex-row attachment-bg mt-2 mb-2 width100" v-if="coordination.Limit !== null">
                                    <div class="attachment-border pt-2 pr-4 pb-2 pl-4 jc-center flex-column">
                                        <i class="fas fa-paperclip color-blue-standart fs-1_4 rotate-45"></i>
                                    </div>
                                    <div class="pl-5 pr-5 text-dec-underline pointer pt-2 pb-2">
                                        <a :href="`/getPrintableDocument/${coordination.Limit}/3015/3`" target="_blank" class="color-dimgray">Изменение лимитов на подписание ДС</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="bg-blue-standart">
                                <div class="container-fluid pt-2 pb-2 jc-center fs-1_2">
                                    <span class="color-white">Примечание</span>
                                </div>
                            </div>
                        </div>
                        <div class="matching-note-border">
                            <div>
                                <div>
                                    <div class="ml-4 mr-4 mt-4">
                                        <textarea class="resize modal-textarea-comment-solid width100"
                                                  rows="3" v-model="Remark"></textarea>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <div class="flex-row pb-4 pr-4 pointer">
                                        <div title="Согласовать"
                                             class="vertical-middle button-accept color-white-standart matching-buttons width100 jc-center pl-4 pr-4 pt-1 pb-1" @click="sendSolution(1)">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                    </div>
                                    <div class="flex-row pb-4 pr-4 pointer">
                                        <div title="Согласовать"
                                             class="vertical-middle button-cancel color-white-standart matching-buttons width100 jc-center pl-4 pr-4 pt-1 pb-1" @click="sendSolution(0)">
                                            <i class="far fa-times-circle"></i>
                                        </div>
                                    </div>
                                    <div class="flex-row pb-4 pr-4 pointer"  v-if='coordination.DocClass === "883011"'>
                                        <div title="Согласовать"
                                             class="vertical-middle button-neutral matching-buttons width100 jc-center pl-4 pr-4 pt-1 pb-1" @click="sendSolution(2)">
                                            <i class="far fa-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-4 mr-4 mt-3">

                            <div>
                                <div class="mobile-matching-second-table-contain box-shadow" v-for="(users, index) in coordination.Coordinations">
                                    <div class="flex-row pl-3 pr-3 color-blue jc-sb table-striped-custom pt-2 pb-2" data-toggle="collapse" :data-target="'#visa-date-unit_'+index" aria-expanded="true">
                                        <div>{{users.FullName}}</div>
                                        <div>
                                            <i v-if="users.Solution === '-1'" class="far fa-question-circle blue-button"></i>
                                            <i v-if="users.Solution === '0'" class="far fa-times-circle red-button"></i>
                                            <i v-if="users.Solution === '1'" class="far fa-check-circle green-button"></i>
                                            <i v-if="users.Solution === '2'" class="far fa-dot-circle yellow-button"></i>
                                        </div>
                                        <!--                                        <div><i class="fas fa-chevron-up"></i></div>-->
                                    </div>
                                    <div class="mb-2 collapse" :id="'visa-date-unit_'+index">
                                        <div class="table-responsive width100">
                                            <table class="dosier-table color-blue mobile-matching-second-table-contain box-shadow table text-align-center mb-0">
                                                <tbody>
                                                <!--<tr>-->
                                                    <!--<td>Виза</td>-->
                                                    <!--<td>-->
                                                        <!--<i v-if="users.Solution === '-1'" class="far fa-question-circle blue-button"></i>-->
                                                        <!--<i v-if="users.Solution === '0'" class="far fa-times-circle red-button"></i>-->
                                                        <!--<i v-if="users.Solution === '1'" class="far fa-check-circle green-button"></i>-->
                                                        <!--<i v-if="users.Solution === '2'" class="far fa-dot-circle yellow-button"></i>-->
                                                    <!--</td>-->
                                                <!--</tr>-->
                                                <tr>
                                                    <td>Дата</td>
                                                    <td>{{users.Date}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Подразделение</td>
                                                    <td>{{users.Dept}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Примечание</td>
                                                    <td>{{users.Remark}}</td>
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
        <button type="button" class="btn btn-primary" style="display: none;" ref="longTextButton" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button>

        <div class="modal fade bd-example-modal-sm" id="qwe" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-margin">
                <div class="modal-content border-rad-20">
                    <div>
                        <div class="flex-row border-top-rad-20 bg-blue-standart jc-center vertical-middle">
                            <span class="color-white mt-2 mb-2">{{longTitle}}</span>
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="color-dimgray mt-4 ml-5 mr-5 mb-2">{{longText}}</div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn color-white width100 bg-notification-center ml-4 mr-4" data-dismiss="modal">Закрыть</button>
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
                longText: "",
                longTitle: ""
            }
        },
        props: {
            coordination: Object,
            isn: Number,
            attachments: Array || Object,
        },
        methods: {
            sendSolution: function (Solution) {
                if (confirm("Проверьте правильность введенных данных\nОтменить действие будет невозможно")) {
                    this.axios.post("/setCoordination", {
                        DocISN: this.coordination.ISN,
                        ISN: this.isn,
                        Solution: Solution,
                        Remark: this.Remark
                    }).then((response) => {
                        if (!response.data.success) {
                            alert(response.data.error);
                        } else {
                            location.reload();
                        }
                    });
                }
            },
            close() {
                this.$parent.$refs.modalButton.click();
            },
            openLongText (title, longText) {
                this.longTitle = title;
                this.longText = longText;
                this.$refs.longTextButton.click();
            },
            preloader: function(show) {
                if(show)
                {
                    document.getElementById('preloader').style.display = 'flex';
                }
                else
                {
                    document.getElementById('preloader').style.display = 'none';
                }
            },
        },
    }
</script>

<style scoped>

</style>
