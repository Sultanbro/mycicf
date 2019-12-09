<template>
    <div>
        <div v-if="none">
            <div class="mt-3">
                <div>
                    <div class="container-fluid pt-2 pb-2">
                        <span class="coordination-none-text">Нет документов на согласовании</span>
                    </div>
                </div>
            </div>
        </div>
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
                        <span class="color-white">Согласование РВ</span>
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
        <div v-if="other !== null">
            <div class="mt-3">
                <div class="bg-blue-standart">
                    <div class="container-fluid pt-2 pb-2">
                        <span class="color-white">Прочие документы на согласование</span>
                    </div>
                </div>
            </div>
            <div class="mt-3" v-for="(info, index) in other">
                <div class="bg-white">
                    <div class="container-fluid flex-row jc-sb pt-2 pl-3 pr-3 pb-2 box-shadow">
                        <span class="blue-button matching-underline" @click="openModal(info.ISN)">{{info.id}}</span>
                        <span>{{info.docdate}}</span>
                    </div>
                </div>
            </div>
        </div>
        <button v-show="false" ref="modalButton" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
            Large modal
        </button>
        <coordination-modal
                :coordination="coordination"
                :isn="isn"
                :attachments="attachments"
        >
        </coordination-modal>

    </div>
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
                none: false,
                coordination: {},
                attachments: [],
            }
        },
        mounted: function () {
            this.getTables();
        },
        props: {
            isn: Number,
        },
        methods: {
            getTables: function () {
                this.preloader(true);
                this.axios.post("/getCoordinationList", {isn: this.isn}).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            fetchResponse: function (response) {
                if (response.success) {
                    this.AC = response.result.AC;
                    this.SP = response.result.SP;
                    this.SZ = response.result.SZ;
                    this.KV = response.result.KV;
                    this.OL = response.result.OL;
                    this.AD = response.result.AD;
                    this.RV = response.result.RV;
                    this.other = response.result.other;
                } else {
                    alert(response.error);
                }
                if(this.AC === null && this.SP === null && this.SZ === null && this.KV === null && this.OL === null && this.AD === null && this.RV === null && this.other === null){
                    this.none = true;
                }
                this.preloader(false);
            },
            openModal(ISN) {
                this.preloader(true);
                this.axios.post("/getCoordinationInfo", {docIsn: ISN}).then((response) => {
                    this.setModalData(response.data)
                });
            },
            setModalData: function (response) {
                if (response.success) {
                    this.coordination = response.response;
                    this.getAttachments();
                    this.$refs.modalButton.click();
                }
                else {
                    alert('ERROR')
                }
                this.preloader(false);
            },
            getAttachments() {
                var vm = this;
                this.axios.post('/getAttachmentList', {
                    docIsn: vm.coordination.ISN
                }).then(response => {
                    if (response.data.success) {
                        vm.attachments = response.data.attachments;
                    } else {
                        vm.attachments = [];
                    }
                });
            },
            preloader: function (show) {
                if (show) {
                    document.getElementById('preloader').style.display = 'flex';
                }
                else {
                    document.getElementById('preloader').style.display = 'none';
                }
            },
        }
    }
</script>

<style scoped>

</style>