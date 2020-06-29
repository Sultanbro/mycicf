<template>
    <div class="news-tape-bg radius-4px mt-3 pb-2">
        <div class="pt-4">
            <div
                class="border-radius15 box-shadow centcoins-date-indicators bg-white ml-2 mr-2 pl-3 pr-3 pt-4 pb-3">
                <div class="flex-row jc-sb">
                    <div>
                        <input type="date"
                               class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1"
                               :value="dateBeg && dateBeg.toISOString().split('T')[0]"
                               @input="dateBeg = $event.target.valueAsDate">
                    </div>
                    <div>
                        <input type="date"
                               class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1"
                               :value="dateEnd && dateEnd.toISOString().split('T')[0]"
                               @input="dateEnd = $event.target.valueAsDate">
                    </div>
                    <div>
                        <div class="flex-row date-color pl-2 pr-2">
                            <div class="flex-row border-gray pl-4 width-min-content pr-4 pt-1 pb-1 pointer"
                                 @click="getTables()">
                                <div><i class="far fa-eye"></i></div>
                                <div class="ml-2">Показать</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ml-2 mr-2" v-if="none">
            <div class="coordination-none-text">
                Нет заявок
            </div>
        </div>
        <div v-else class="ml-2 mr-2" v-show="inspections_data !== null" v-for="(inspections, index) in inspections_data"
             :key="index">
            <div class="border-radius15 bg-white mt-2">
                <div class="ml-3 pt-2 pb-2">
                    <strong v-if="index=='considered_or_inprogress'">Заявка на исполнение</strong>
                    <strong v-if="index=='done'">Исполненные заявки</strong>
                </div>
                <div>
                    <table class="dosier-table table text-align-center">
                        <thead>
                        <tr class="header color-white">
                            <th scope="col">Номер заявки</th>
                            <th scope="col" class="thead-border">Дата заявки</th>
                            <th scope="col" class="thead-border">Тип заявки</th>
                            <th scope="col" class="thead-border">Инициатор</th>
                            <th scope="col" class="thead-border">Статус заявки</th>
                            <th scope="col">Исполнитель</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">
                        <tr v-for="(info, key) in inspections" :key="info.ISN">
                            <td class="pointer" scope="col">
                                <a v-if="info.agrcalcisn.length == 0"
                                   :href="'/insurance/inspection/' + info.ISN + '?docisn='+info.DocISN+'&argcalcisn=0&agrisn=' +
                                    Math.abs(info.agrisn)">
                                    {{info.ID}}
                                </a>
                                <a v-else-if="info.agrisn.length == 0"
                                   :href="'/insurance/inspection/' + info.ISN + '?docisn='+info.DocISN+'&argcalcisn=' +
                                   Math.abs(info.agrcalcisn) +
                                   '&agrisn=0'">
                                    {{info.ID}}
                                </a>
                                <a v-else
                                   :href="'/insurance/inspection/' + info.ISN + '?docisn='+info.DocISN+'&argcalcisn=' +
                                    Math.abs(info.agrcalcisn) + '&agrisn=' +  Math.abs(info.agrisn)">
                                    {{info.ID}}
                                </a>
                            </td>
                            <td scope="col" class="thead-border">{{info.Created}}</td>
                            <td scope="col" class="thead-border">{{info.Type}}</td>
                            <td scope="col" class="thead-border">{{info.EmplName}}</td>
                            <td scope="col">{{info.status}}</td>
                            <td scope="col" v-if="info.Operator == ''">
                                <button class="btn btn-dark"
                                        data-toggle="modal" data-target="#addOperator"
                                        @click="getOperator(info.DeptISN, info.ISN)">
                                    Назначить
                                </button>
                            </td>
                            <td scope="col" v-else>
                                {{info.Operator}}
                                <a href="#" data-toggle="modal" data-target="#addOperator"
                                   @click="getOperator(info.DeptISN, info.ISN)"
                                   v-if="index=='considered_or_inprogress'">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="addOperator" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addOperatorLabel">Назначить исполнителя</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="assign-operator" @submit.prevent="assignOperator">
                        <div class="modal-body">
                            <select name="listOperator" id="listOperator">
                                <option v-for="operator in operators.row"
                                        :value="operator.ISN"
                                        name="operatorIsn">
                                    {{operator.Fullname}}
                                </option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- MODAL -->
    </div>
</template>


<script>
    export default {
        name: "insurance-inspection",
        data() {
            let date = new Date();
            return {
                inspections_data: {},
                none: false,
                inspection: {},
                operators: {},
                requestIsn: null,
                dateBeg: new Date(date.setDate(date.getDate() - 7)),
                dateEnd: new Date(),
            }
        },
        mounted() {
            this.getTables();
        },
        props: {
            isn: Number,
        },
        methods: {
            getTables: function () {
                this.preloader(true);
                this.axios.post("/getInsuranceInspectionList", {
                    isn: this.isn,
                    dateBeg: this.dateBeg,
                    dateEnd: this.dateEnd,
                }).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            fetchResponse: function (response) {
                let isEmpty = $.isEmptyObject(response.result);
                if (response.success) {
                    if (!isEmpty) {
                        this.inspections_data = response.result;
                        this.none = false;
                    }
                } else {
                    console.log(response.error)
                    this.none = true;
                }
                this.preloader(false);
            },
            getOperator(depsIsn, requestIsn) {
                this.axios.post("/getOperator", {
                    deptIsn: depsIsn,
                    requestIsn: requestIsn
                }).then((response) => {
                    let isEmpty = $.isEmptyObject(response.data.result);
                    if (response.data.success) {
                        if (!isEmpty) {
                            this.operators = response.data.result;
                            this.requestIsn = response.data.requestIsn;
                        }
                    } else {
                        alert(response.data.error)
                    }

                })
            },
            assignOperator: function (e) {
                var form = document.getElementById('assign-operator');
                var formData = new FormData(form);
                formData.append('requestIsn', this.requestIsn);
                this.axios.post("/updateStatus", formData).then((response) => {
                    let isEmpty = $.isEmptyObject(response.data.result);
                    document.getElementById('addOperator').click();
                    if (response.data.success) {
                        window.location.reload();
                        if (!isEmpty) {
                            this.operators = response.data.result;
                        }
                    } else {
                        alert(response.data.error)
                    }
                })
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
