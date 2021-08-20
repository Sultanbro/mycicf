<template>
    <div>
        <div v-if="!editMode">
            <table class="table table-responsive-sm table-stripper table-data table-bordered">
                <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Наименование</th>
                    <th>Описание</th>
                    <th>Документы</th>
                    <th>Франшиза</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in list">
                    <td>{{item.id}}</td>
                    <td>{{item.label}}</td>
                    <td>{{item.description}}</td>
                    <td>{{item.documents}}</td>
                    <td>{{item.franshiza}}</td>
                    <td>
                        <button v-if="item.child_count === 0" @click="editItem(item)" class="btn btn-primary btn-sm">
                            Изменить
                            <i class="fas fa-pen"></i>
                        </button>
                        <!--                        <button @click="deleteItem(item.id)" class="btn btn-danger btn-sm">-->
                        <!--                            Удалить-->
                        <!--                            <i class="fas fa-trash"></i>-->
                        <!--                        </button>-->
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div v-if="editMode">
<!--            <div>-->
<!--                <button class="btn btn-secondary" @click="getBack">Назад</button>-->
<!--            </div>-->
            <table class="table table-responsive-sm table-stripper table-data table-bordered">
                <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Наименование</th>
                    <th>Описание</th>
                    <th>Документы</th>
                    <th>Франшиза</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{product.id}}</td>
                    <td>{{product.label}}</td>
<!--                    <td><input v-model="product.description" :rows="row"></td>-->
                    <td><textarea rows="14" cols="35" v-model="product.description"></textarea></td>
                    <td><textarea rows="14" cols="35" v-model="product.documents"></textarea></td>
                    <td><textarea rows="3" cols="25" v-model="product.franshiza"></textarea></td>
                    <td>
<!--                        <button @click="deleteItem(doc)" class="btn btn-danger btn-sm">-->
<!--                            Удалить-->
<!--                            <i class="fas fa-trash"></i>-->
<!--                        </button>-->
                        <button @click="saveDescription(product)" class="btn btn-primary btn-sm">
                            Сохранить
                            <i class="fas fa-pen"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "description-list",
        data() {
            return {
                list: [],
                editMode: false,
                product: {},
                row: 1,
            }
        },
        mounted() {
            this.getList()
        },
        methods: {
            getList() {
                // this.preloader(false);
                this.axios.post('/productsinfo/get/descriptionList', {})
                    .then(response => {
                        // this.preloader(true);
                        if (response.data.success) {
                            this.list = response.data.list
                        } else {
                            alert(response.data.error)
                        }
                    })
                    .catch(error => {
                        alert(error)
                    });
            },
            countRow(){
                this.row = 6
            },
            saveDescription(product){
                // this.preloader(true);
                this.axios.post('/productsinfo/saveDescription', product).then(response => {
                    // this.preloader(false);
                    if(response.data.error){
                        alert(response.data.error)
                        this.editMode = true
                    }else{
                        alert('Файл успешно сохранено!');
                        this.editMode = false;
                    }
                });

            },
            editItem(item) {
                this.editMode = true
                this.product = item
                this.row = 6
            },
            deleteItem(id) {
                this.axios.post('/productsinfo/delete/word', {id: id})
                    .then(response => {
                        location.reload();
                    })
                    .catch(error => {
                        alert(error)
                    });
            },
            // preloader(show){
            //     if(show)
            //     {
            //         document.getElementById('preloader').style.display = 'flex';
            //     }
            //     else
            //     {
            //         document.getElementById('preloader').style.display = 'none';
            //     }
            // },
        },
    }


</script>
