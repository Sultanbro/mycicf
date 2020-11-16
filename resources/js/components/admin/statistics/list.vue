<template>
    <div>
        <div class="flex justify-content-end mb-3">
            <button class="btn btn-success btn-sm"
                @click="addUser">
                ADD NEW
                <i class="fas fa-plus"></i>
            </button>
        </div>
        <table class="table table-responsive-sm table-stripper table-data table-bordered">
            <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Роль</th>
                <th>Дата</th>
                <th>Изменил</th>
                <th>Операции</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in list">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td> <span v-if="item.role == 'statistics'">Статистика ДА</span></td>
                <td>{{item.date}}</td>
                <td>{{item.changer}}</td>
                <td>
                    <button disabled @click="editItem(item.id)" class="btn btn-primary btn-sm">
                        Изменить
                        <i class="fas fa-pen"></i>
                    </button>
                    <button @click="deleteItem(item.id)" class="btn btn-danger btn-sm">
                        Удалить
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "statistics-list",
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
                this.axios.post('/statistics/getKuratorsList', {})
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
                this.axios.get(`/statistics/delete/${id}`);
                alert('Успешно удалено');
            },
            addUser(){
                location.href = "/statistics/newUser";
            }
        },

    }
</script>

<style>
</style>
