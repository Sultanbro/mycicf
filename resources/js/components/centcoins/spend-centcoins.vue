<template>
    <div class="box-shadow radius-4px mt-3 pb-2">
        <div class="d-flex justify-content-center pt-4 pb-4">
            <select v-model="itemIndex" class="custom-select w-25">
                <option :value="null" selected disabled hidden>Выберите товар</option>
                <option :value="index" v-for="(item, index) in itemsStorage" :disabled="getCentcoins < item.price">{{item.name}} - {{item.price}}₵</option>
            </select>
        </div>

        <div v-if="price !== 0">
            <div class="font-size-4rem d-flex justify-content-center">
                <span>{{this.price}}₵</span>
            </div>
            <div class="d-flex justify-content-center mt-4 mb-4">
                <button type="button"
                        class="buy-btn"
                        @click="successforapply"
                        :disabled="getCentcoins < price || isSuccessShow">Купить</button>
            </div>
        </div>
<div class="row" v-if="isSuccessShow">
    <div class="col-md-6 offset-md-3">
        <div class="p-3 bg-info text-white text-center mt-4 mb-5" ><h5>Ваша заявка принята!<br>Ожидайте чуда :)</h5></div>
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
                // centcoins: null,
                itemId: null,
                isSuccessShow: false,
            }
        },

        props: {
            getCentcoins: Number,
        },

        mounted() {
            this.getOperations();
            this.getItemsStorage();
            // this.getCentcoins();
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
                let data = {
                    isn: window.userIsn.user_isn,
                    itemId: this.itemId,
                };

                if(this.getCentcoins < this.price){
                    this.flashMessage.error({
                        title: "Ошибка",
                        message: "Сорри у вас денюжек не хватает",
                        time: 5000
                    });
                } else {
                    this.axios.post('/buyItem', data).then(response => {
                        this.fetchBuyItem(response.data);

                    }).catch(error => {

                    })
                }
            },

            fetchBuyItem: function(response) {
                if(response.success){
                    this.flashMessage.success({
                        title : 'Успешно',
                        message : 'Спасибо за покупку',
                        time : 5000
                    });

                    // this.$root.centcoins = this.$root.centcoins - this.price;
                }else{
                    this.flashMessage.error({
                        title: "Ошибка",
                        message: response.error,
                        time: 5000
                    });
                }

                // location.replace('/centcoins')
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
            successforapply() {
                //this.resultCentcoins = this.centcoins - this.price;
                this.isSuccessShow = !this.isSuccessShow;
                this.buyItem();
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
    .adoption{
        background: lightseagreen;
    }

</style>
