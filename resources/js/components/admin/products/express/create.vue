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
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="ordinal">Порядковый номер</label>
            <input class="form-control" type="number" v-model="ordinal" id="ordinal">
        </div>
        <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <button type="button" @click="send" class="btn-info btn-lg btn">Отправить</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "express-create",
        data() {
            return {
                fullname : '',
                ISN : null,
                ordinal: 0,
                id: 0,
            }
        },
        props: {
            express: Object
        },
        methods: {
            send(){
                this.axios.post('/calc/express/create', {
                    name: this.fullname, product_isn : this.ISN, ordinal: this.ordinal,id: this.id
                })
                    .then(response => {
                        if(response.data.success){
                            location.href='/calc/express/list';
                        }else{
                            alert(response.data.error);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
        },
        created(){
            if(Object.keys(this.express).length > 0){
                this.fullname = this.express.name;
                this.ISN = this.express.product_isn;
                this.ordinal = this.express.ordinal;
                this.id = this.express.id;
            }
        }
    }
</script>

<style scoped>

</style>