<template>
    <div>
        <table class="table table-responsive-sm table-stripper table-data table-bordered">
            <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Кол-во</th>
                <th>Последнее изменение</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in list">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.coins}}</td>
                <td>{{item.updated}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "list",
        data () {
            return {
                list : [],
            }
        },
        mounted() {
            this.getUserList()
        },
        methods : {
            getUserList() {
                this.axios.post('/centcoins/userList', {})
                    .then(
                        response => {
                            if(response.data.success){
                                this.list = response.data.result
                            }else{
                                alert(response.data.error)
                            }
                        }
                    )
                    .catch(
                        error => {
                            alert(error);
                        }
                    )
            }
        }
    }
</script>

<style scoped>

</style>