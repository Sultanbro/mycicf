<template>
    <div class="management-search">
        <div class="pt-4">
            <div class="border-radius15 box-shadow centcoins-date-indicators bg-white ml-2 mr-2 pl-3 pr-3 pt-4 pb-3">
                <div class="col-md-8 col-center-block flex-row jc-sb mt-3 mb-3">
                    <div>
                        <button class="btn btn-success d-inline-flex align-items-center padding-block"
                                data-toggle="modal" data-target="#createDocument"
                                @click="createDocument()">
                            Создать <i class="fa fa-angle-down down"></i>
                        </button>
                    </div>
                    <div>
                        <button class="btn btn-primary d-inline-flex align-items-center padding-block"
                                @click="searchDocument()">
                            Поиск <i class="fa fa-search search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="createDocument" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="document">
                            <div class="document-type pl-4 pr-4" v-for="(document, index) in documents">
                                <div class="document-title pointer" @click="reverseCaret(index)"
                                     data-toggle="collapse" :data-target="`#document-kind-${index}`"
                                     aria-expanded="true">
                                    <span class="" :class="dataId == index ? caretColor : ''">{{document.fullname}}</span>
                                    <span class="caret">
                                        <i class="fas "
                                           :class="dataId == index ? caretClass+ ' ' +caretColor : 'fa-chevron-down color-black'"
                                           data-toggle="collapse" href="#multiCollapseExample1"></i>
                                    </span>
                                </div>
                                <ul :id="`document-kind-${index}`" class="document-kinds pl-5 pr-5 collapse in">
                                    <li v-for="(item, index) in document.children" :key="index">
                                        <button class="color-black" @click="isnShow(item.isn, index)">{{ item.fullname }}</button>
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
                none: false,
            }
        },
        mounted() {
        },
        props: {
            isn: Number,
        },
        methods: {
            isnShow(isn, id) {
                console.log(isn);
                console.log(id);
                this.axios.get(`/document/${id}/${isn}`).then(response => {
                    location.href = `/document/${id}/${isn}`
                    console.log(response)
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

    .color-blue {
        color: #4267b2;
    }

    .color-black {
        color: #212529;
    }
</style>
