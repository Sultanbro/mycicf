<template>
    <div>
        <table class="table table-responsive-sm table-stripper table-data table-bordered">
            <thead class="thead-inverse">
            <tr>
                <th>Номер документа</th>
                <th>Тип документа</th>
                <th>Инициатор</th>
                <th>Подразделение</th>
                <th>Дата</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in result">
                <td>{{item.id}}</td>
                <td><button  @click="getInfo(index)"class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#myModal1" type="button">{{item.items.price + ' C - ' + item.items.name}}</button></td>
                <td>{{item.user.full_name}}</td>
                <td>{{item.department}}</td>
                <td>{{item.created}}</td>
            </tr>
            </tbody>
        </table>
        <div class="modal fade" id="myModal1" tabindex="-1" aria-hidden="true">
             <div class="modal-dialog modal-xl">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button class="backbutton" data-dismiss="modal" aria-label="Close"> <img src="/images/array_left.png" width="30px" height="30px">НАЗАД</button>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body" v-if="typeof(person) !== 'undefined' &&  person">
                         <div class="container">
                             <div class="row">
                                 <div class="col-md-4">
                                     <div class="type_inform">
                                         <img src="/images/docdoc1.png" width="25px" height="25px">
                                         <div class="type_doc">Тип документа</div>
                                     </div>
                                     <div class="text-name">{{person.items.name}}</div>
                                 </div>

                                 <div class="col-md-4">
                                     <div class="type_inform">
                                         <div>Количество</div>
                                     </div>
                                     <div class="text-name">{{person.items.price + ' C'}}</div>
                                 </div>

                                 <div class="col-md-4">
                                     <div class="type_inform">
                                         <img src="/images/doc.png" width="25px" height="25px">
                                         <div class="type_doc">Дата</div>
                                     </div>
                                     <div class="text-name">{{person.created}}</div>
                                 </div>
                             </div>
                         </div>

                         <div class="container">
                             <div class="row">
                                 <div class="col-md-10">
                                     <div class="type_inform">
                                         <img src="/images/person.png" width="25px" height="25px">
                                         <div class="type_doc">Инициатор</div>
                                     </div>
                                     <div class="text-name">{{person.position + ' ' + person.department  + ' ' + person.user.full_name}}</div>
                                 </div>
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="exampleFormControlTextarea1"></label>
                             <textarea v-model="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"> </textarea>
                         </div>

                         <button :disabled="buttonDisabled" class="btn btn-success success_buttton" data-toggle="modal" data-target="#myModal2" @click="sendResponse(1)">
                                 <img src="/images/checkbox.png" width="25px" height="25px">
                         </button>

                         <button :disabled="buttonDisabled" class="btn btn-danger success_buttton" data-toggle="modal" data-target="#myModal3" @click="sendResponse(0)">
                                 <img src="/images/buy.png" width="25px" height="25px">
                         </button>




<!--                             <div class="form-group">-->
<!--                                 <label for="recipient-name" class="col-form-label">Recipient:</label>-->
<!--                                 <input type="text" class="form-control" id="recipient-name">-->
<!--                             </div>-->
<!--                             <div class="form-group">-->
<!--                                 <label for="message-text" class="col-form-label">Message:</label>-->
<!--                                 <textarea class="form-control" id="message-text"></textarea>-->
<!--                                 <p><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"><path d="M306 0C136.992 0 0 136.992 0 306s136.992 306 306 306c168.988 0 306-136.992 306-306S475.008 0 306 0zm86.751 442.189c7.478 7.478 7.478 19.584 0 27.042-7.478 7.459-19.584 7.459-27.043 0l-146.44-146.439c-4.59-4.59-6.005-10.863-4.953-16.811-1.052-5.929.382-12.221 4.953-16.811l146.44-146.44c7.479-7.478 19.584-7.478 27.043 0 7.478 7.458 7.478 19.584 0 27.042L256.543 306l136.208 136.189z"/></svg></p>-->
<!--                             </div>-->

                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="button" class="btn btn-primary">Send message</button>
                     </div>
                 </div>
             </div>

        </div>



        <div class="modal fade" id="myModal2" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="backbutton" data-dismiss="modal" aria-label="Close"> <img src="/images/array_left.png" width="30px" height="30px">НАЗАД</button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Заявка принята</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>

        </div>



<!--        <div class="modal fade" id="myModal3" tabindex="-1" aria-hidden="true">-->
<!--            <div class="modal-dialog modal-xl">-->
<!--                <div class="modal-content">-->
<!--                    <div class="modal-header">-->
<!--                        <button class="backbutton" data-dismiss="modal" aria-label="Close"> <img src="/images/array_left.png" width="30px" height="30px">НАЗАД</button>-->
<!--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                            <span aria-hidden="true">&times;</span>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                    <div class="modal-body">-->
<!--                        <p>Заявка отклонена</p>-->
<!--                    </div>-->
<!--                    <div class="modal-footer">-->
<!--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->

<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--        </div>-->

        <div class="apply" v-if="isApplyMessage">
            <p>Заявка одобрена</p>
            <p>Заяквка отказана</p>
        </div>
    </div>




</template>

<script>
    export default {
        name: "application",
        data () {
            return {
                result : [],
                person: null,
                comment: '',
                isApplyMessage: false,
                storeItemId: null,
            }
        },
        mounted() {
            this.getUserList()
        },
        methods : {
            getUserList() {
                this.axios.post('/centcoins/showAllApplications', {})
                    .then(
                        response => {
                            if(response.data.success){
                                this.result = response.data.result
                            }else{
                                alert(response.data.error)
                            }
                        }
                    )
                    //$("#asdawdswq").modal('show');
                    // .catch(
                    //     error => {
                    //         alert(error);
                    //     }
                    // )
            },
            getInfo(index){
                this.person =  this.result[index];
            },

              sendResponse(solution){
                  this.axios.post('/centcoins/processingApplication', {
                      'comment' : this.comment,
                      'payment' : solution,
                      'store_item_id' : this.person.items.name,
                      'user' : this.person.user.full_name,





                  }).then(
                       response => {
                           if(response.data.success){
                               this.result = response.data.result
                           }else{
                              alert(response.data.error)
                           }
                       }
                   )
              }
        },
        computed: {
            buttonDisabled: function(){
                if(this.comment == ''){
                    return true;
                } else {
                    return false;
                }
            },

            // getTime : function(){
            //     var date = new Date();
            //     var time = date.getHours() + date.getMinutes();
            // }
        }
    }
</script>

<style scoped>
    .type_inform{
        display: inline-block;
        border-bottom: 1px solid #dee2e6;
        padding-bottom: 5px;
    }
    .text-name {
        padding: 5px 0;
    }
    .type_doc{
        display: inline-block;
    }
    .btn{
        border-radius: 0;
    }
    .backbutton{
        border: 0px;
        background: none;
    }
    .backbutton:focus{
        outline: none;
    }
    .success_buttton{
        border-radius: 4px;
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.3);
    }
    .success_buttton:disabled {
        opacity: 0.5;
    }
.apply{
    width: 30%;
    height: 30%;
    position: absolute;
    top: 30px;
    left: 50px;
    padding: 20px;
}
</style>
