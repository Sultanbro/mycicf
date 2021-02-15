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
                <td>{{item.full_name}}</td>
                <td>{{item.created_at}}</td>
                <td>{{item.wasted_centcoins}}</td>
                <td>{{item.balance}}</td>
                <td>{{item.description}}</td>
                <td>{{item.status}}</td>
                <td>{{item.updated_at}}</td>
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
