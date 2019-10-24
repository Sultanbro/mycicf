<template>
    <div>
        <table class="table table-responsive-sm table-stripper table-data table-bordered">
            <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Тип операции</th>
                <th>ФИО получаетля</th>
                <th>ФИО администратора</th>
                <th>Кол-во</th>
                <th>Дата</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in list">
                <td>{{item.id}}</td>
                <td>{{item.type}}</td>
                <td>{{item.to}}</td>
                <td>{{item.from}}</td>
                <td>{{item.coins}}</td>
                <td>{{item.updated}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "history",
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
                this.axios.post('/centcoins/historyList', {})
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