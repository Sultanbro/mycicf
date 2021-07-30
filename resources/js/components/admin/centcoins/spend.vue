<template>
    <div>
        <div>
            <div>
                <form action="">
                    <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
                        <label>Пользователь : </label>
                        <treeselect v-model="user" :multiple="false" :options="userList" />
                    </div>
                    <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
                        <label for="count">Количество</label>
                        <input class="form-control" type="number" v-model="count" id="count">
                    </div>
                    <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
                        <label for="description">Описание</label>
                        <input class="form-control" type="text" v-model="description" id="description">
                    </div>
                    <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
                        <button type="button" @click="send" class="btn-info btn-lg btn">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>

        <div>
            <div class="pt-4">
                <div class="border-radius15 box-shadow centcoins-date-indicators bg-white pt-4">
                    <div class="flex-row jc-sb">
                        <div>
                            <input v-model="dateBeg" type="date" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                        </div>
                        <div>
                            <input v-model="dateEnd" type="date" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                        </div>
                        <div class="open-btn" @click="getCentTable()">
                            <span>Показать</span>
                        </div>
                    </div>
                    <div>
                        <div>
                            <table class="dosier-table centcoins-table table text-align-center mt-4">
                                <thead>
                                <tr class="header color-white">
                                    <th scope="col">
                                        <input type='checkbox' @click='checkAll()' v-model='isCheckAll'> Check All
                                    </th>
                                    <th scope="col">#</th>
                                    <th scope="col">ФИО</th>
                                    <th scope="col">Сенткоин</th>
                                    <th scope="col">Дата создания</th>
                                    <th scope="col">Дата обновления</th>
                                </tr>
                                </thead>
                                <tbody class="date-color">
                                <tr v-for="centcoin in centcoins">
                                    <td><input type="checkbox" v-bind:value="centcoin" v-model="selectedCoin"
                                               @change='updateCheckall()'>
                                    </td>
                                    <td>{{centcoin.id}}</td>
                                    <td>{{centcoin.user_name}}</td>
                                    <td>{{centcoin.centcoins}}</td>
                                    <td>{{centcoin.created_at}}</td>
                                    <td>{{centcoin.updated_at}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
                        <button type="button" @click="spendAll" class="btn-info btn-lg btn">Обнулить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "spend",
        data () {
            return {
                userList : null,
                user: null,
                description: null,
                count : null,
                dateBeg: (new Date().getFullYear() - 1) + '-01-01',
                dateEnd: new Date().getFullYear() + '-12-31',
                centcoins: [],
                selectedCoin: [],
                isCheckAll: false,

            }
        },
        mounted() {
            this.getUserList()
        },
        methods : {

            checkAll: function(){
                this.isCheckAll = !this.isCheckAll;
                this.selectedCoin = [];
                if(this.isCheckAll) {
                    for(let key in this.centcoins) {
                        this.selectedCoin.push(this.centcoins[key]);
                    }
                }
            },
            updateCheckall: function(){
                if(this.selectedCoin.length == this.centcoins.length){
                    this.isCheckAll = true;
                }else{
                    this.isCheckAll = false;
                }
            },

            getUserList() {
                this.axios.post('/getFullBranch', {}).then((response) => {
                    this.userList = response.data.result;
                });
            },
            getCentTable: function (){
                this.axios.post('/centcoins/spendCoinData', {
                    dateBeg: this.dateBeg,
                    dateEnd: this.dateEnd,
                }).then((response) => {
                    this.fetchOperations(response.data);
                });
            },

            fetchOperations: function (response) {
                this.centcoins = response;
            },
            spendAll() {
                let data = this.selectedCoin.map((e) => e.isn);
                this.axios.post('/centcoins/spendCoinAll', {
                    selectedCoin: data
                }).then(() => {
                    this.getCentTable();
                })
            },
            send() {
                this.axios.post('/centcoins/spendCoins', {
                    user : this.user,
                    description: this.description,
                    count : this.count,
                })
                    .then(
                        response => {
                            if(response.data.success){
                                this.getCentTable();
                            }else{
                                alert(response.data.error)
                            }
                        }
                    )
                    .catch(
                        error => {
                            alert(error)
                        }
                    )
            },
        }
    }
</script>

<style scoped>

.pt-4, .py-4 {
   padding-top: 1.5rem;
}
.pl-3, .px-3 {
  padding-left: 1rem;
}

.pb-3, .py-3 {
  padding-bottom: 1rem;
}
.pr-3, .px-3 {
  padding-right: 1rem;
}
.ml-2, .mx-2 {
  margin-left: .5rem;
}
.mr-2, .mx-2 {
  margin-right: .5rem;
}
.bg-white {
  background-color: #fff;
}
.border-radius15 {
  border-radius: 15px;
}
.bg-white {
  background: white;
}
.box-shadow {
  box-shadow: 2px 5px 5px #00000012, -2px 0px 5px #00000012, 0px -1px 5px #00000012;
}
.flex-row {
    display: flex;
    flex-flow: row;
}
.jc-sb {
    display: flex;
    margin-bottom: 25px;
    justify-content: space-evenly;
}

.open-btn {
    display: flex;
    padding: 5px 15px;
    cursor: pointer;
    color: cornflowerblue;
    border: 1px solid cornflowerblue;
    transition: 0.4s ease;
}

.open-btn:hover {
    background-color: cornflowerblue;
    box-shadow: 0 0 20px rgb(47 100 187 / 30%);
    color: #FFF;
}
</style>
