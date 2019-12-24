<template>
    <div>
        <form action="">
            <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
                <label>Пользователь : </label>
                <treeselect v-model="user" :multiple="false" :options="userList" />
            </div>
            <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
                <label for="count">Количество</label>
                <input class="form-control" type="number" v-model="count" id="count">
            </div>
            <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
                <label for="description">Описание</label>
                <input class="form-control" type="text" v-model="description" id="description">
            </div>
            <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
                <button type="button" @click="send" class="btn-info btn-lg btn">Сохранить</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "spend",
        data () {
            return {
                userList : null,
                user: null,
                description: null,
                count : null,
            }
        },
        mounted() {
            this.getUserList()
        },
        methods : {
            getUserList() {
                this.axios.post('/getFullBranch', {}).then((response) => {
                    this.userList = response.data.result;
                });
            },
            send() {
                this.axios.post('/centcoins/spendCoins', {
                    user : this.user,
                    description: this.description,
                    count : this.count,
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