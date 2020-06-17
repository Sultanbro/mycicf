<template>
    <div class="news-tape-bg radius-4px mt-3 pb-2">
        <div class="ml-2 mr-2" v-if="none">
            <div class="coordination-none-text">
                Нет заявок
            </div>
        </div>
        <div class="ml-2 mr-2" v-show="countData()">
            <div class="border-radius15 bg-white mt-2">
                <div>
                    <table class="dosier-table table text-align-center">
                        <thead>
                        <tr class="header color-white">
                            <th scope="col">Собственник (Страхователь)</th>
                            <th scope="col" class="thead-border">Контактное лицо</th>
                            <th scope="col" class="thead-border">Контактные данные</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">
                        <tr v-if="countData()">
                            <td class="pointer" scope="col">{{inspections_data.Contact.FIO}}</td>
                            <td scope="col" class="thead-border">{{inspections_data.Contact.Adress}}</td>
                            <td scope="col" class="thead-border">{{inspections_data.Contact.Contact}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="">
                <strong>Акт предстрахового осмотра</strong>
                <div class="row">
                    <div class="dis-block w-100" v-for="info in inspections_data.row">
                        <input type="hidden" :name="'doc_ids[]'" :value="info.ISN">
                        <span class="ml-3 pointer" data-key="info.DocID" @click="toggleShowDescription(info.DocID)">{{info.DocID}}</span>
                        <div class="col-md-12" :class="showDescription?'show':'hide'"
                             v-if="songsDisplayingDescription.indexOf(info.DocID) !== -1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Марка и Модель ТС</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{info.marka}} {{info.model}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Гос.номер ТС</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{info.RegNo}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Год выпуска ТС</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{info.marka}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <label>Объем двигателя</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{info.volume}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Номер кузова ТС</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{info.VIN}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Свид. о регистрации ТС: №, дата выдачи (при наличии)</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{info.SRTS}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <ObjectForm
                                        :details="info"
                                        :countArray="inspections_data.row.length">
                                    </ObjectForm>
                                    <ImageUploader :info="info"></ImageUploader>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 mt-2">
                        <div class="pull-right mb-3">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#cancelModal">Отказано
                            </button>
                        </div>
                        <div class="pull-right">
                            <button data-toggle="modal" data-target="#executeModal"
                                    id="inspection-execute"
                                    v-if="countData()"
                                    class="btn btn-success mr-2"
                                    :disabled="inspections_data.isDisabled == 'on' ? true : false">
                                Исполнено
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="executeModal" tabindex="-1" role="dialog" aria-labelledby="executeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="executeModalLabel">Примечание</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea class="w-100" id="executed" v-model="reason" rows="4"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button @click="updateStatus(1270)" type="button" class="btn btn-primary">Отправить
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- CANCEL -->
        <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cancelModalLabel">Причина отказа</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea class="w-100" id="cancelInspection" v-model="reason" rows="4"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button @click="updateStatus(1272)" type="button" class="btn btn-primary">Отправить
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </div>
</template>

<script>
    import ObjectForm from './includes/object-form'
    import ImageUploader from '../common/upload-image'

    export default {
        name: "inspection-info",
        components: {
            ObjectForm,
            ImageUploader,
        },
        data() {
            return {
                inspections_data: {},
                none: false,
                inspection: {},
                showDescription: false,
                songsDisplayingDescription: [],
                reason: this.$slots.default ? this.$slots.default[0].text : '',
                isJoin: false,
            }
        },
        mounted() {
            this.getTables()
        },
        props: {
            isn: Number,
            argcalcisn: Number,
            agrisn: Number,
            docisn: Number,
        },
        methods: {
            toggleShowDescription(song) {
                const songId = song;
                const indexOfSongId = this.songsDisplayingDescription.indexOf(songId);

                if (indexOfSongId !== -1) {
                    this.songsDisplayingDescription.splice(indexOfSongId, 1);
                    return;
                }

                this.songsDisplayingDescription.push(songId);
            },
            getTables: function () {
                this.preloader(true);
                this.axios.post("/getInsuranceInspectionInfo", {
                    isn: this.isn,
                    argcalcisn: this.argcalcisn,
                    agrisn: this.agrisn,
                    docisn: this.docisn,
                }).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            fetchResponse: function (response) {
                if (response.success) {
                    this.inspections_data = response.result;
                } else {
                    alert(response.error)
                }
                if ($.isEmptyObject(response.result)) {
                    this.none = true;
                }
                this.preloader(false);
            },
            updateStatus(statusIsn) {
                let docIsn = $("input[name='doc_ids[]']").map(function () {
                    return $(this).val();
                }).get();
                if (!this.isJoin) {
                    this.axios.post("/updateStatus", {
                            docIsn: docIsn,
                            statusIsn: statusIsn,
                            reason: this.reason
                        }
                    ).then((response) => {
                        if (response.data.success) {
                            this.isJoin = true
                            document.getElementById('executeModal').click();
                            document.getElementById('cancelModal').click();
                        }
                        this.$toastr.s(response.data.message);
                    }).catch(function (error) {
                        alert(error.response);
                    });
                }
            },
            preloader(show) {
                if (show) {
                    document.getElementById('preloader').style.display = 'flex';
                } else {
                    document.getElementById('preloader').style.display = 'none';
                }
            },
            countData() {
                return Object.keys(this.inspections_data).length > 0;
            },
        },
    }
</script>

<style lang="sass" scoped>
    @import '~vue-toastr/src/vue-toastr.scss'
</style>
