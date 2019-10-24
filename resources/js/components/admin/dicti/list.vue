<template>
    <table class="table table-responsive table-stripper table-data table-bordered">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Наименование</th>
                <th>Тип</th>
                <th>Дата создания</th>
                <th>Операции</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in list">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>Роль</td>
                <td>{{item.created}}</td>
                <td>
                    <button disabled @click="editItem(item.id)" class="btn btn-primary btn-sm">
                        Изменить
                        <i class="fas fa-pen"></i>
                    </button>
                    <button disabled @click="deleteItem(item.id)" class="btn btn-danger btn-sm">
                        Удалить
                        <i class="fas fa-trash"></i>
                    </button>

                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "dicti-list",
        data() {
            return {
                list: [],
            }
        },
        mounted: function(){
            this.getList()
        },
        methods: {
            getList() {
                this.axios.post('/role/getList', {})
                .then( response => {
                    this.setList(response.data);
                })
                .catch( error => {
                    console.log(error);
                    alert(error);
                })
            },
            setList(response) {
                if(response.success){
                    response.data.forEach( item => {
                        this.list.push(item);
                    });
                }else{
                    alert(response.error)
                }
            },
            editItem(id){
                console.log(id);
            },
            deleteItem(id){
                console.log(id);
            }
        },

    }
</script>

<style>
</style>
