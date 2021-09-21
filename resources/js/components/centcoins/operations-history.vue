<template>
    <div class="box-shadow radius-4px mt-3 pb-2">
        <div class="pt-4">
            <div class="border-radius15 box-shadow centcoins-date-indicators bg-white ml-2 mr-2 pl-3 pr-3 pt-4 pb-3">
                <div class="flex-row jc-sb">
                    <div>
                        <input v-model="dateBeg" min="2015-02-03" max="2022-04-05"type="date" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                    </div>
                    <div>
                        <input v-model="dateEnd" min="2015-02-03" max="2022-04-05" type="date" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                    </div>
                    <div>
                        <div class="flex-row date-color pl-2 pr-2">
                            <div class="flex-row border-gray pl-4 width-min-content pr-4 pt-1 pb-1 show-btn">
                                <div><i class="far fa-eye"></i></div>
                                <div class="ml-2 buy-btn" @click="getOperations()">Показать</div>
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
                    <tr v-for="operation in operations"
                        :style="operation.quantity > 0 ? 'backgroundColor : #dce7ff' : 'backgroundColor : #ffeefc'">
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
                dateBeg: (new Date().getFullYear() - 1) + '-01-01',
                dateEnd: new Date().getFullYear() + '-12-31',
                operations: [],
                centcoins: null,
            }
        },

        props: {
            isn: Number,
        },

        mounted() {
            this.getOperations();
            this.getCentcoins();
        },

        methods: {
            getOperations: function () {
                this.axios.post('/getOperationsList', {
                    dateBeg: this.dateBeg,
                    dateEnd: this.dateEnd,
                    isn: this.isn
                }).then((response) => {
                    this.fetchOperations(response.data);
                });
            },

            fetchOperations: function (response) {
                this.operations = response;
            },

            getCentcoins: function () {
                this.axios.post('/getCentcoins', {isn: this.isn}).then(response => {
                    this.fetchCentcoins(response.data);
                });
            },

            fetchCentcoins(response) {
                this.centcoins = response;
            },

            preloader: function (show) {
                if (show) {
                    document.getElementById('preloader').style.display = 'flex';
                }
                else {
                    document.getElementById('preloader').style.display = 'none';
                }
            },

        },

        watch: {
            itemIndex: function () {
                this.price = this.itemsStorage[this.itemIndex].price;
            },
        }
    }
</script>

<style scoped>
   .show-btn {
    background: transparent !important;
}
     .show-btn:hover {
         background: #00f7a5 !important;
     }

    .buy-btn {
         background: transparent;
        transition: 0.4s ease;
        height: 40px;
        width: 50%;
        outline: none;
        border: none;
    }

    .buy-btn:hover {
        color: #FFF;
        /*box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.2);*/
    }

    .buy-btn[disabled] {
        opacity: 0.5;
    }

    .buy-btn[disabled]:hover {
        box-shadow: none;
    }

</style>
