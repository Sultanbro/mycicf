<template>
    <div>
        <table class="table table-responsive-sm table-stripper table-data table-bordered">
            <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Продукт</th>
                <th>ISN</th>
                <th>Порядок</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in list">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.isn}}</td>
                <td>{{item.ordinal}}</td>
                <td>
                    <div>
                        <a :href="openProduct(item.id)">
                            <button class="btn btn-success">Редактировать</button>
                        </a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "express-list",
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
                this.axios.post('/calc/express/list', {})
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
            },
            openProduct(id){
                return '/calc/express/edit/'+id;
            }
        }
    }
</script>

<style scoped>

</style>