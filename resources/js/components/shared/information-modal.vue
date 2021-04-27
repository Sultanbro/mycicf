<template>
    <div class="">
        <div class="modal fade"  id="information-modal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-blue-standart color-white">
                        <h6 class="modal-title vertical-middle" id="exampleModalLabel">Сведения по документу</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="color-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" v-if="Object.keys(contentInnerInformation).length > 0 ">
                        <div class="col-lg col-md"
                             v-for="(information, key) in contentInnerInformation"
                             v-if="information != 0 && typeof information != 'object'">
                            <span v-if="labels[key] != undefined">{{ labels[key] }}:</span>  {{ information }}
                        </div>
                    </div>
                    <div class="modal-footer text-center justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "information-modal",
        data() {
            return {
                labels: {
                    Docno: 'Номер документа',
                    Doctext: 'Описание',
                    Classname: 'Вид приказа',
                    Thanksname: 'Описание',
                    Datebeg: 'Дата начало',
                    Docdate: 'Дата документа',
                    Dateend: 'Дата окончания'
                }
            }
        },
        props: {
            contentInnerInformation: Object
        },
        methods: {
            //...
        },
    }
</script>

<style scoped>

</style>
