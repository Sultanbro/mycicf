<template>
    <div>
        <table class="table table-responsive-sm table-stripper table-data table-bordered">
            <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Текст</th>
                <th>Родительский элемент</th>
                <th>URL</th>
                <th>URL иконки</th>
                <th>Операции</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in list">
                <td>{{item.id}}</td>
                <td>{{item.label}}</td>
                <td>{{item.parent}}</td>
                <td>{{item.url}}</td>
                <td>{{item.icon_url}}</td>
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
        name: "menu-list",
        data() {
            return {
                list : [],
            }
        },
        mounted() {
            this.getList()
        },
        methods: {
            getList() {
                this.axios.post('/wnd/get/menuList', {})
                    .then(response => {
                        if(response.data.success){
                            this.list = response.data.list
                        }else{
                            alert(response.data.error)
                        }
                    })
                    .catch(error => {
                        alert(error)
                    });
            },
            editItem(id){},
            deleteItem(id){
                this.axios.post('/wnd/delete/menu', {id: id})
                    .then(response => {
                        location.reload();
                    })
                    .catch(error => {
                        alert(error)
                    });
            },
        },
    }


</script>