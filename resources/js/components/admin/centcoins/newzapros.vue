<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" v-if="newzapros.length">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{newzapros[currentIndex].full_name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{newzapros[currentIndex].description}}
                    </div>
                    <div class="modal-footer">
                        <button @click="denied(newzapros[currentIndex].id),newzapros.splice(currentIndex, 1)" data-dismiss="modal" type="button" class="btn btn-danger">Отказать</button>
                        <button @click="accept(newzapros[currentIndex].id),newzapros.splice(currentIndex, 1)"  type="button" class="btn btn-success">Исполнить</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-responsive-sm table-stripper table-data table-bordered table-hover" >
            <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Дата отправки</th>
                <th>Потраченные сенткоины</th>
                <th>Остаток на счету</th>
                <th>Требуемая услуга/товар</th>
                <th>Статус заявки</th>
            </tr>
            </thead>

            <tbody>
            <tr
                @click="handleSetIndexClick(index)"
                v-for="(item, index) in newzapros"
                :key="index" data-toggle="modal" data-target="#exampleModal"
                v-if="item.status === 'Ожидает' && item.type !== 'Поступление' && item.type !=='Списание'"
            >
                <td>{{item.id}}</td>
                <td>{{item.full_name}}</td>
                <td>{{item.created_at}}</td>
                <td>{{item.wasted_centcoins}}</td>
                <td>{{item.balance}}</td>
                <td>{{item.description}}</td>
                <td>{{item.status}}</td>
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
                currentIndex: 0,
            }
        },
        mounted() {
            this.getNewZapros()
        },
        methods : {
            handleSetIndexClick(index){
                this.currentIndex = index
            },
            denied(currentIndex){
              axios.post('/newzapros/denied',{
                  id : currentIndex
              }).then(response => {
                  console.log(response);
              });
            },

            accept(currentIndex){
                axios.post('/newzapros/accept',{
                    id : currentIndex
                }).then(response => {
                    console.log(response);
                });
            },

            getNewZapros() {
                this.axios.post('/centcoins/newzapros', {})
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
