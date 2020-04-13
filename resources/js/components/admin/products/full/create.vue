<template>
    <div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="fullname">Название продукта</label>
            <input class="form-control" type="text" v-model="fullname" id="fullname">
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="ISN">ISN продукта</label>
            <input class="form-control" type="number" v-model="ISN" id="ISN">
        </div>
        <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <button type="button" @click="send" class="btn-info btn-lg btn">Отправить</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "full-create",
        data() {
            return {
                fullname : '',
                ISN : null,
            }
        },
        methods: {
            send(){
                this.axios.post('/calc/full/create', {
                    name: this.fullname, product_isn : this.ISN
                })
                    .then(response => {
                        if(response.data.success){
                            location.href='/';
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
        }
    }
</script>

<style scoped>

</style>