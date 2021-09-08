<template>
    <div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="description">TITLE</label>
            <input class="form-control" type="text" v-model="title" id="description">
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="description">URL</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://my.cic.kz/productsinfo/</span>
                </div>
                <input type="text" class="form-control" v-model="url">
            </div>
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="description">BODY</label>
            <div class="md-form">
                <textarea v-model="body" class="md-textarea form-control" rows="3"></textarea>
            </div>
        </div>
        <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <button type="button" @click="send" class="btn-info btn-lg btn">Отправить</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "svg-load",
        data() {
            return {
                url: '',
                body: '',
                title: '',
            }
        },
        methods: {
            send() {
                this.axios.post('/wnd/save_svg', {
                    url : this.url,
                    body: this.body,
                    title: this.title,
                })
                    .then(response => {
                        if(response.data.success){
                            location.href = '/'
                        }
                    })
                    .catch(error => {
                        alert(error)
                    });
            }
        },
    }


</script>
