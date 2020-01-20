<template>
    <div class="box-shadow radius-4px mt-3 pb-2">
        <div class="d-flex justify-content-center pt-4 pb-4">
            <select v-model="itemIndex" class="custom-select w-25">
                <option :value="null" selected disabled hidden>Выберите товар</option>
                <option :value="index" v-for="(item, index) in itemsStorage" :disabled="centcoins < item.price">{{item.name}} - {{item.price}}₵</option>
            </select>
        </div>

        <div v-if="price !== 0">
            <div class="font-size-4rem d-flex justify-content-center">
                <span>{{this.price}}₵</span>
            </div>
            <div class="d-flex justify-content-center mt-4 mb-4">
                <button type="button"
                        class="buy-btn"
                        @click="buyItem"
                        :disabled="centcoins < price">Купить</button>
            </div>
        </div>

        <FlashMessage></FlashMessage>
    </div>
</template>

<script>
    export default {
        name: "spend-centcoins",
        data() {
            return {
                operations: [],
                itemsStorage: [],
                itemIndex: null,
                price: 0,
                centcoins: null,
                itemId: null,
            }
        },

        props: {
            isn: Number,
        },

        mounted() {
            this.getOperations();
            this.getItemsStorage();
            this.getCentcoins();
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

            getItemsStorage: function() {
                this.preloader(true);
                this.axios.post('/getItemsStorage', {}).then(response => {
                    this.fetchItemsStorage(response.data);
                }).catch(error => {
                    alert('Ошибка на стороне сервера');
                });
            },

            fetchItemsStorage: function(response) {
                this.itemsStorage = response;
                this.preloader(false);
            },

            buyItem: function() {
                this.axios.post('/buyItem', {isn: this.isn, itemId: this.itemId}).then(response => {
                    this.fetchBuyItem(response.data);
                    this.flashMessage.error({
                        title: "Ошибка",
                        message: "Ошибка на стороне сервера",
                        time: 5000
                    });
                }).catch(error => {

                })
            },

            fetchBuyItem: function() {
                location.replace('/centcoins')
            },

            getCentcoins: function () {
                this.axios.post('/getCentcoins', {isn: this.isn}).then(response => {
                    this.fetchCentcoins(response.data);
                });
            },

            fetchCentcoins(response) {
                this.centcoins = response;
            },

            preloader: function(show) {
                if(show)
                {
                    document.getElementById('preloader').style.display = 'flex';
                }
                else
                {
                    document.getElementById('preloader').style.display = 'none';
                }
            },

        },

        watch: {
            itemIndex: function () {
                this.price = this.itemsStorage[this.itemIndex].price;
                this.itemId = this.itemsStorage[this.itemIndex].id;
            },
        }
    }
</script>

<style scoped>
    .buy-btn {
        color: #FFF;
        background-color: #0051f3;
        transition: 0.4s ease;
        height: 40px;
        width: 25%;
        outline: none;
        border:none;
    }

    .buy-btn:hover {
        box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.2);
    }

    .buy-btn[disabled] {
        opacity: 0.5;
    }

    .buy-btn[disabled]:hover {
        box-shadow: none;
    }

    select:disabled{
        background-color: #c1c1c1;
    }

</style>
