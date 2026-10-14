<template>
    <div>
        <div v-if="AC !== null">
            <div class="mt-3">
                <div class="bg-blue-standart">
                    <div class="container-fluid pt-2 pb-2">
                        <span class="color-white">Согласование АС</span>
                    </div>
                </div>
            </div>
            <div class="mt-3" v-for="(info, index) in AC">
                <div class="bg-white">
                    <div class="container-fluid flex-row jc-sb pt-2 pl-3 pr-3 pb-2 box-shadow">
                        <span class="blue-button matching-underline" @click="openModal(info.ISN)">{{info.id}}</span>
                        <span>{{info.docdate}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="SZ !== null">
            <div class="mt-3">
                <div class="bg-blue-standart">
                    <div class="container-fluid pt-2 pb-2">
                        <span class="color-white">Служебные записки</span>
                    </div>
                </div>
            </div>
            <div class="mt-3" v-for="(info, index) in SZ">
                <div class="bg-white">
                    <div class="container-fluid flex-row jc-sb pt-2 pl-3 pr-3 pb-2 box-shadow">
                        <span class="blue-button matching-underline" @click="openModal(info.ISN)">{{info.id}}</span>
                        <span>{{info.docdate}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="KV !== null">
            <div class="mt-3">
                <div class="bg-blue-standart">
                    <div class="container-fluid pt-2 pb-2">
                        <span class="color-white">Согласование КВ по ОГПО</span>
                    </div>
                </div>
            </div>
            <div class="mt-3" v-for="(info, index) in KV">
                <div class="bg-white">
                    <div class="container-fluid flex-row jc-sb pt-2 pl-3 pr-3 pb-2 box-shadow">
                        <span class="blue-button matching-underline" @click="openModal(info.ISN)">{{info.id}}</span>
                        <span>{{info.docdate}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="OL !== null">
            <div class="mt-3">
                <div class="bg-blue-standart">
                    <div class="container-fluid pt-2 pb-2">
                        <span class="color-white">Обходной лист</span>
                    </div>
                </div>
            </div>
            <div class="mt-3" v-for="(info, index) in OL">
                <div class="bg-white">
                    <div class="container-fluid flex-row jc-sb pt-2 pl-3 pr-3 pb-2 box-shadow">
                        <span class="blue-button matching-underline" @click="openModal(info.ISN)">{{info.id}}</span>
                        <span>{{info.docdate}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="AD !== null">
            <div class="mt-3">
                <div class="bg-blue-standart">
                    <div class="container-fluid pt-2 pb-2">
                        <span class="color-white">Административные дни</span>
                    </div>
                </div>
            </div>
            <div class="mt-3" v-for="(info, index) in AD">
                <div class="bg-white">
                    <div class="container-fluid flex-row jc-sb pt-2 pl-3 pr-3 pb-2 box-shadow">
                        <span class="blue-button matching-underline" @click="openModal(info.ISN)">{{info.id}}</span>
                        <span>{{info.docdate}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="RV !== null">
            <div class="mt-3">
                <div class="bg-blue-standart">
                    <div class="container-fluid pt-2 pb-2">
                        <span class="color-white">Согласование АС</span>
                    </div>
                </div>
            </div>
            <div class="mt-3" v-for="(info, index) in RV">
                <div class="bg-white">
                    <div class="container-fluid flex-row jc-sb pt-2 pl-3 pr-3 pb-2 box-shadow">
                        <span class="blue-button matching-underline" @click="openModal(info.ISN)">{{info.id}}</span>
                        <span>{{info.PayDate}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="SP !== null">
            <div class="mt-3">
                <div class="bg-blue-standart">
                    <div class="container-fluid pt-2 pb-2">
                        <span class="color-white">Согласование Правления</span>
                    </div>
                </div>
            </div>
            <div class="mt-3" v-for="(info, index) in SP">
                <div class="bg-white">
                    <div class="container-fluid flex-row jc-sb pt-2 pl-3 pr-3 pb-2 box-shadow">
                        <span class="blue-button matching-underline" @click="openModal(info.ISN)">{{info.id}}</span>
                        <span>{{info.docdate}}</span>
                    </div>
                </div>
            </div>
        </div>
        <button v-show="false" ref="modalButton" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>
        <coordination-modal
                :coordination="coordination"
                :isn="isn"
                :attachments="attachments"
        >
        </coordination-modal>

    </div>

<!--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button>-->
<!---->
<!--    <div class="modal fade bd-example-modal-sm" id="qwe" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">-->
<!--        <div class="modal-dialog modal-sm modal-margin">-->
<!--            <div class="modal-content border-rad-20">-->
<!--                <div>-->
<!--                    <div class="flex-row border-top-rad-20 bg-blue-standart jc-center vertical-middle">-->
<!--                        <span class="color-white mt-2 mb-2">Страховые случаи</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div>-->
<!--                    <div>-->
<!--                        <div class="color-dimgray mt-4 ml-5 mr-5 mb-2">Авария при проведении СМР, Затопления водой из водо-, тепло-, отопительных систем, Кража/хищение, Наезд движущейся техники, исключая башенный кран, Ошибки, допущенные при монтаже, Падение пилотируемых летательных аппаратов или их обломков, Пожар, Просадка</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="modal-footer border-top-0">-->
<!--                    <button type="button" class="btn color-white width100 bg-notification-center ml-4 mr-4" data-dismiss="modal">Закрыть</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
</template>

<script>
    export default {
        name: "coordination",
        data() {
            return {
                datebeg: '2018-01-01',
                dateend: '2019-09-10',
                AC: null,
                SP: null,
                SZ: null,
                KV: null,
                OL: null,
                AD: null,
                RV: null,
                other: null,
                coordination: {},
                attachments: [] ,
            }
        },
        mounted: function(){
            this.getTables();
        },
        props: {
            isn: Number,
        },
        methods : {
            getTables: function(){
                this.axios.post("/getCoordinationList", {isn: this.isn}).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            fetchResponse: function(response){
                if(response.success){
                    this.AC = response.result.AC;
                    this.SP = response.result.SP;
                    this.SZ = response.result.SZ;
                    this.KV = response.result.KV;
                    this.OL = response.result.OL;
                    this.AD = response.result.AD;
                    this.RV = response.result.RV;
                    this.other = response.result.other;
                }else{
                    alert(response.error);
                }
            },
            openModal (ISN) {
                this.axios.post("/getCoordinationInfo", {docIsn: ISN}).then((response) => {
                    this.setModalData(response.data)
                });
            },
            setModalData: function (response) {
                if(response.success){
                    this.coordination = response.response;
                    this.getAttachments();
                    this.$refs.modalButton.click();
                }
                else
                {
                    alert('ERROR')
                }
            },
            getAttachments () {
                var vm = this;
                this.axios.post('/getAttachmentList', {
                    docIsn: vm.coordination.ISN
                }).then(response => {
                    if(response.data.success){
                        vm.attachments = response.data.attachments;
                    }else{
                        vm.attachments = [];
                    }
                });
            },
        }
    }
</script>

<style scoped>

</style>