<template>
    <div class="news-tape-bg radius-4px mt-3 pb-2">
        <div class="ml-2 mr-2" v-if="none">
            <div class="coordination-none-text">
                Нет заявок
            </div>
        </div>
        <div class="ml-0 mr-0" v-show="inspections_data !== null" v-for="(inspections, index) in inspections_data"
             :key="index">
            <div class="bg-white mt-2">
                <div class="ml-3 pt-2 pb-2">
                    <strong v-if="index=='considered_or_inprogress'">Заявка на исполнение</strong>
                    <strong v-if="index=='done'">Исполненные заявки</strong>
                </div>
                <div class="table-responsive">
                    <table class="table text-align-center w-100">
                        <thead>
                        <tr class="header color-white font-size-0_8">
                            <th scope="col">Номер заявки</th>
                            <th scope="col" class="thead-border">Дата заявки</th>
                            <th scope="col" class="thead-border">Тип заявки</th>
                            <th scope="col" class="thead-border">Инициатор</th>
                            <th scope="col" class="thead-border">Статус заявки</th>
                            <th scope="col">Исполнитель</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">
                        <tr class="font-size-0_8" v-for="(info, index) in inspections" :key="info.ISN">
                            <td class="pointer" scope="col">
                                <a v-if="info.agrcalcisn.length == 0"
                                   :href="'/insurance/inspection/' + info.ISN + '?argcalcisn=0&agrisn=' +
                                    Math.abs(info.agrisn)">
                                    {{info.ID}}
                                </a>
                                <a v-else-if="info.agrisn.length == 0"
                                   :href="'/insurance/inspection/' + info.ISN + '?argcalcisn=' +
                                   Math.abs(info.agrcalcisn) +
                                   '&agrisn=0'">
                                    {{info.ID}}
                                </a>
                                <a v-else
                                   :href="'/insurance/inspection/' + info.ISN + '?argcalcisn=' +
                                    Math.abs(info.agrcalcisn) + '&agrisn=' +  Math.abs(info.agrisn)">
                                    {{info.ID}}
                                </a>
                            </td>
                            <td scope="col" class="thead-border">{{info.Created}}</td>
                            <td scope="col" class="thead-border">{{info.Type}}</td>
                            <td scope="col" class="thead-border">{{info.EmplName}}</td>
                            <td scope="col">{{info.status}}</td>
                            <td scope="col">{{info.Operator}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        name: "insurance-inspection",
        data() {
            return {
                inspections_data: {},
                none: false,
                inspection: {}
            }
        },
        mounted() {
            this.getTables()
        },
        props: {
            isn: Number,
        },
        methods: {
            getTables: function () {
                this.preloader(true);
                this.axios.post("/getInsuranceInspectionList", {isn: this.isn}).then((response) => {
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
