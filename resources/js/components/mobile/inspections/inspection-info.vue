<template>
    <div class="news-tape-bg mt-3">
        <div class="ml-2 mr-2" v-if="none">
            <div class="coordination-none-text">
                Нет заявок
            </div>
        </div>
        <div class="w-100" v-show="inspections_data !== null">
            <div class="bg-white">
                <div>
                    <table class="table table-responsive text-align-center">
                        <thead>
                        <tr class="header color-white font-size-0_7">
                            <th scope="col">Собственник (Страхователь)</th>
                            <th scope="col" class="thead-border">Контактное лицо</th>
                            <th scope="col" class="thead-border">Контактные данные</th>
                        </tr>
                        </thead>
                        <tbody class="date-color font-size-0_7">
                        <tr v-if="inspections_data.length > 0">
                            <td class="pointer" scope="col">{{inspections_data.Contact.FIO}}</td>
                            <td scope="col" class="thead-border">{{inspections_data.Contact.Adress}}</td>
                            <td scope="col" class="thead-border">{{inspections_data.Contact.Contact}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ml-1 mr-1 pb-4">
                <strong>Акт предстрахового осмотра</strong>
                <div class="row">
                    <div class="dis-block w-100" v-for="info in inspections_data.row">
                        <input type="hidden" name="doc_ids[]" :value="info.DocID">
                        <span class="ml-3 pointer" data-key="info.DocID" @click="toggleShowDescription(info.DocID)">
                            {{info.DocID}}</span>
                        <div class="col-md-12"
                             :class="showDescription?'show':'hide'"
                             v-if="songsDisplayingDescription.indexOf(info.DocID) !== -1">
                            <div class="card">
                                <div class="card-body pl-2 pr-2">
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
                                    <CarForm v-if="info.ClassType==1" :details="info"></CarForm>
                                    <SpecialCarForm v-if="info.ClassType==2"></SpecialCarForm>
                                    <OtherForm v-if="info.ClassType==3"></OtherForm>
                                    <ImageUploader :info="info"></ImageUploader>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 mt-4">
                        <div class="pull-right">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Отказано</button>
                        </div>
                        <div class="pull-right">
                            <button @click="updateToCompleted" class="btn btn-success mr-2">Исполнена</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Причина отказа</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea class="w-100" id="cancelInspection" v-model="reason" rows="4"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button @click="updateToCancel" type="button" class="btn btn-primary">Отправить</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </div>
</template>

<script>
    import CarForm from '../../employee/includes/car-form'
    import SpecialCarForm from '../../employee/includes/specialCar-form'
    import OtherForm from '../../employee/includes/other-form'
    import ImageUploader from '../../common/upload-image'

    export default {
        name: "inspection-info",
        components: {
            CarForm,
            SpecialCarForm,
            OtherForm,
            ImageUploader
        },
        data() {
            return {
                inspections_data: {},
                none: false,
                inspection: {},
                showDescription: false,
                songsDisplayingDescription: [],
                reason: this.$slots.default ? this.$slots.default[0].text : '',
            }
        },
        mounted() {
            this.getTables()
        },
        props: {
            isn: Number,
            argcalcisn: Number,
            agrisn: Number,
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
                }).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            fetchResponse: function (response) {
                let isEmpty = $.isEmptyObject(response.result);
                if (response.success) {
                    if (!isEmpty) {
                        this.inspections_data = response.result;
                    }
                } else {
                    alert(response.error)
                }
                if (isEmpty) {
                    this.none = true;
                }
                this.preloader(false);
            },
            updateToCompleted() {
                let values = $("input[name='doc_ids[]']").map(function () {
                    return $(this).val();
                }).get();
                this.axios.post("/updateStatus", {ids: values})
                    .then((response) => {
                        this.$toastr.s(response.data.message);
                    })
                    .catch(function (error) {
                        alert(error.response);
                    });
            },
            updateToCancel() {
                let values = $("input[name='doc_ids[]']").map(function () {
                    return $(this).val();
                }).get();
                this.axios.post("/updateStatus", {ids: values, reason: this.reason})
                    .then((response) => {
                        this.$toastr.s(response.data.message);
                    })
                    .catch(function (error) {
                        alert(error.response);
                    });
            },
            preloader(show) {
                if (show) {
                    document.getElementById('preloader').style.display = 'flex';
                } else {
                    document.getElementById('preloader').style.display = 'none';
                }
            }
        },
    }
</script>

<style scoped>

</style>
