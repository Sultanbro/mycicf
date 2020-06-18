<template>
    <div>
        <table class="table table-responsive-sm table-stripper table-data table-bordered">
            <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Продукт</th>
                <th>ISN</th>
                <th>Конструктор</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in list">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.isn}}</td>
                <td>
                    <div class="d-flex justify-content-end">
                        <a :href="constructor(item.id)" target="_blank">
                            <button class="btn btn-success">Открыть конструктор</button>
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
        name: "full-list",
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
                this.axios.post('/calc/full/list', {})
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
            constructor(id){
                return '/calc/full-constructor/'+id;
            }
        }
    }
</script>

<style scoped>

</style>