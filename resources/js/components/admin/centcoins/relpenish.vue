<template>
    <div>
        <form action="">
            <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
                <label>Пользователь : </label>
                <treeselect v-model="users" :multiple="true" :options="userList" />
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
        name: "replenish",
        data () {
            return {
                userList : null,
                users: null,
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
                this.axios.post('/centcoins/addCoins', {
                    users : this.users,
                    description: this.description,
                    count : this.count,
                })
                    .then(
                        response => {
                            if(response.data.success){
                                location.reload();
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