<template>
    <div class="management-search">
        <div class="pt-4">
            <div class="border-radius15 box-shadow centcoins-date-indicators bg-white ml-2 mr-2 pl-3 pr-3 pt-4 pb-3">
                <div class="col-md-8 col-center-block flex-row jc-sb mt-3 mb-3">
                    <div class="col-md-3">
                        <button class="btn btn-success d-inline-flex align-items-center padding-block"
                                data-toggle="modal" data-target="#createDocument"
                                @click="createDocument()">
                            Создать <i class="fa fa-angle-down down"></i>
                        </button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary d-inline-flex align-items-center padding-block"
                                data-toggle="modal" data-target="#searchMySZ"
                                @click="searchMySZ()">
                            Поиск <i class="fa fa-search search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

<!--        SearchMySZ-->
        <div class="modal fade" id="searchMySZ" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div>
                            <span class="color-blue-standart">Список СЗ и Заявлении</span>
                        </div>
                        <div v-if="documentList.length === 0">
                            <span class="text-warning">...У Вас нет документа для поиска</span>
                        </div>
                        <div class="mt-4">
                            <div class="table-responsive-sm">
                                <table class="table table-bordered table-striped">
                                    <tbody class="date-color">
                                    <tr v-for="(list, index) in documentList" :key="index">
                                        <th scope="row">{{index + 1}}</th>
                                        <td>
                                            <button class="btn-third" @click="showDocument(list.classisn, list.docisn)">{{list.docisn}}</button>
                                        </td>
                                        <td>{{list.classisn}}</td>
                                        <td>{{list.classname}}</td>
                                        <td>{{list.id}}</td>
                                        <td>{{list.docdate}}</td>
                                        <td>{{list.status}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        SearchMySZ-->

        <!-- MODAL -->
        <div class="modal fade" id="createDocument" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="document">
                            <div class="document-type pl-4 pr-4" v-for="(document, index) in documents">
                                <div class="document-title pointer" @click="reverseCaret(index)"
                                     data-toggle="collapse" :data-target="`#document-kind-${index}`"
                                     aria-expanded="true">
                                    <span :class="dataId == index ? caretColor : ''">{{document.fullname}}</span>
                                    <span class="caret">
                                        <i class="fas "
                                           :class="dataId == index ? caretClass+ ' ' +caretColor : 'fa-chevron-down color-black'"
                                           data-toggle="collapse" href="#multiCollapseExample1"></i>
                                    </span>
                                </div>
                                <ul :id="`document-kind-${index}`" class="document-kinds pl-5 pr-5 collapse in">
                                    <li v-for="(item, index) in document.children" :key="index"  v-if="item.isn == '1011961' || item.isn == '1479131' || item.isn == '1479141'
                                        || item.isn == '820621' || item.isn == '1011971' || item.isn == '1007411' || item.isn == '1007391' || item.isn == '1479151'
                                        || item.isn == '1011931' || item.isn == '1011951' || item.isn == '1011941' || item.isn == '1007421' || item.isn == '1007401'">
                                        <button class="btn" @click="isnShow(item.isn, index)">{{ item.fullname }}</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL -->
    </div>
</template>

<script>
    export default {
        name: "management-search",
        data() {
            return {
                dataId: null,
                caretClass: 'fa-chevron-down',
                caretColor: 'color-black',
                documents: {},
                documentList: {},
                none: false,
                list: false,
                index: 0,
            }
        },
        mounted() {
        },
        props: {
            isn: Number,
        },
        methods: {
            isnShow(isn, index) {
                this.preloader(true);
                this.axios.get(`/document/${isn}`).then(response => {
                    location.href = `/document/${isn}`
                    this.preloader(false);
                })
                this.preloader(false);
            },
            showDocument(isn, docisn) {
                this.axios.get(`/document/${isn}/${docisn}`).then(response => {
                        location.href = `/document/${isn}/${docisn}`
                })
            },
            createDocument: function (e) {
                this.axios.post("/getDocument").then((response) => {
                    if (response.data.success) {
                        this.documents = response.data.result;
                    } else {
                        alert(response.data.error)
                    }
                })
            },
            searchMySZ: function(e) {
                this.axios.get("/showMySZ").then((response) => {
                    if (response.data.success) {
                        this.documentList = response.data.itens;
                        this.list = true;
                    } else {
                        alert(response.data.error)
                    }
                })
            },
            reverseCaret: function (id) {
                this.dataId = id;
                this.caretClass = this.caretClass === 'fa-chevron-down' ? 'fa-chevron-up' : 'fa-chevron-down';
                this.caretColor = this.caretColor === 'color-black' ? 'color-blue' : 'color-black';
            },
            preloader(show) {
                if (show) {
                    document.getElementById('preloader').style.display = 'flex';
                } else {
                    document.getElementById('preloader').style.display = 'none';
                }
            }
        },
        computed: {
            isEmpty: function () {
                console.log(this.inspections_data)
            }
        }
    }
</script>

<style>
    .down, .search {
        font-size: 20px;
        padding-top: 5px;
        padding-left: 10px;
    }

    .col-center-block {
        margin: 0 auto;
    }

    .padding-block {
        font-size: 19px;
        padding: 10px 20px !important;
    }

    .document-title {
        font-size: 19px;
    }

    .caret {
        float: right;
    }

    .btn:hover {
        font-size: larger; /* blue */
    }

    .btn-third {
        border: none;
        background-color: inherit;
        padding: 14px 28px;
        font-size: 16px;
        cursor: pointer;
        display: inline-block;
    }

    .color-blue {
        color: #4267b2;
    }

    .color-black {
        color: #212529;
    }
</style>
