<template>
    <div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="docType">Наименование продукта</label>
            <select id="docType" class="form-control" v-model="product">
                <option v-for="item in productList" :value="item.id">{{item.label}}</option>
            </select>
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="fullname">Полное наименование</label>
            <input class="form-control" type="text" v-model="fullname" id="fullname">
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="shortname">Наименование для вывода</label>
            <input class="form-control" type="text" v-model="shortname" id="shortname">
        </div>
        <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <button type="button" @click="send" class="btn-info btn-lg btn">Отправить</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "add-product",
        data() {
            return {
                product : 1,
                fullname : '',
                shortname : '',
                productList : [],
            }
        },
        mounted() {
            this.getProductList();
        },
        methods: {
            send(){
                this.axios.post(document.URL, {
                    fullname: this.fullname,
                    shortname : this.shortname,
                    product : this.product
                })
                    .then(response => {
                        if(response.data.success){
                            alert('Данные успешно изменены');
                            location.href='/';
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            getProductList(){
                this.axios.post('/getProductList', {})
                    .then(response => {
                        if(response.data.success){
                            this.productList = response.data.result;
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
