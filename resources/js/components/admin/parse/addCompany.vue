<template>
    <div>
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
        name: "add-company",
        data() {
            return {
                fullname : '',
                shortname : '',
            }
        },
        methods: {
            send(){
                this.axios.post(document.URL, {
                    fullname: this.fullname, shortname : this.shortname
                })
                    .then(response => {
                        if(response.data.success){
                            alert('Данные успешно добавлены');
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
