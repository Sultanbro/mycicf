<template>
        <div class="box-shadow radius-4px mt-3 pb-2">
            <div>
                <span>
                    <h4 class="ml-2">
                        <strong>История операций</strong>
                    </h4>
                </span>
            </div>
            <div class="pt-4">
                <div class="border-radius15 box-shadow centcoins-date-indicators bg-white ml-2 mr-2 pl-3 pr-3 pt-4 pb-3">
                    <div class="flex-row jc-sb">
                        <div>
                            <input v-model="dateBeg" type="date" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                        </div>
                        <div>
                            <input v-model="dateEnd" type="date" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                        </div>
                        <div>
                            <div class="flex-row date-color pl-2 pr-2">
                                <div class="flex-row border-gray pl-4 width-min-content pr-4 pt-1 pb-1">
                                    <div><i class="far fa-eye"></i></div>
                                    <div class="ml-2" @click="getOperations()">Показать</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <table class="dosier-table centcoins-table table text-align-center mt-4">
                        <thead>
                            <tr class="header color-white">
                                <th scope="col">#</th>
                                <th scope="col">Вид</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Кол-во</th>
                                <th scope="col">Итого</th>
                            </tr>
                        </thead>
                        <tbody class="date-color">
                            <tr v-for="operation in operations" :style="operation.quantity > 0 ? 'backgroundColor : #dce7ff' : 'backgroundColor : #ffeefc'">
                                <td>{{operation.id}}</td>
                                <td>{{operation.type}}</td>
                                <td>{{operation.description}}</td>
                                <td>{{operation.quantity}}</td>
                                <td>{{operation.total}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        name: "operations-history",
        data() {
            return {
                dateBeg: '2019-01-01',
                dateEnd: '2019-12-01',
                operations: [],
            }
        },
        mounted() {
            this.getOperations();
        },
        methods: {
            getOperations: function () {
                this.axios.post('/getOperationsList', {dateBeg: this.dateBeg, dateEnd: this.dateEnd}).then((response) => {
                    this.fetchOperations(response.data);
                });
            },
            fetchOperations: function (response) {
                this.operations = response;
            },
        }
    }
</script>

<style scoped>

</style>
