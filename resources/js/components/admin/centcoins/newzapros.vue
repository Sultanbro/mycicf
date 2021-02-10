<template>
    <div>
        <table class="table table-responsive-sm table-stripper table-data table-bordered">
            <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Дата отправки</th>
                <th>Потраченные сенткоины</th>
                <th>Остаток на счету</th>
                <th>Требуемая услуга/товар</th>
                <th>Статус заявки</th>
                <th>Дата изменение заявки</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in newzapros">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.updated}}</td>
                <td>{{item.coins}}</td>
                <td>{{item.total}}</td>
                <td>{{item.item}}</td>
                <td>{{item.status}}</td>
                <td>{{item.updated}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "newzapros",
        data () {
            return {
                newzapros : [],
            }
        },
        mounted() {
            this.getNewZapros()
        },
        methods : {
            getNewZapros() {
                this.axios.post('/centcoins/newZapros', {})
                    .then(
                        response => {
                            if(response.data.success){
                                this.newzapros = response.data.result
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
