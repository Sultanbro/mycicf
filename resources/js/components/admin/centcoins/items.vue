<template>
    <div>
        <form action="">
            <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
                <label for="name">Наименование</label>
                <input class="form-control" type="text" v-model="name" id="name">
            </div>
            <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
                <label for="price">Цена</label>
                <input class="form-control" type="number" v-model="price" id="price">
            </div>
            <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
                <button type="button" @click="send" class="btn-info btn-lg btn">Отправить</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "items",
        data () {
            return {
                name: null,
                price: 0,
            }
        },
        methods : {
            send() {
                this.axios.post('/centcoins/addItem', {
                    name: this.name,
                    price: this.price,
                })
                    .then(
                        response => {
                            if(response.data.success){
                                location.href = '/'
                            }else{
                                alert(response.data.error)
                            }
                        }
                    )
                    .catch(
                        error => {
                            alert(error)
                        }
                    )
            }
        }
    }
</script>

<style scoped>

</style>