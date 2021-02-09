<template>
    <div>
        <table class="table table-responsive-sm table-stripper table-data table-bordered">
            <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Дата отправки</th>
                <th>Потраченные centcoins</th>
                <th>Остаток на счету</th>
                <th>Требуемая услуга/товар</th>
                <th>Статус заявки</th>
                <th>Дата исполнения</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in list">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.updated}}</td>
                <td>{{item.coins}}</td>
                <td>{{item.coins}}</td>
                <td>book</td>
                <td>accepted</td>
                <td>{{item.updated}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "newrequest",
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
