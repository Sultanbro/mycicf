<template>
    <div class="box-shadow radius-4px mt-3 pb-2">
        <div>
            <span>
                <h4 class="ml-2">
                    <strong>Категория {{category}}</strong>
                </h4>
            </span>
        </div>
        <div class="pt-4">
            <div class="border-radius15 box-shadow bg-white ml-2 mr-2 pl-3 pr-3 pt-4 pb-3">
                <div class="flex-row jc-sb">
                    <div>
                        <input v-model="dateBeg" type="date" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                    </div>
                    <div>
                        <input v-model="dateEnd" type="date" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                    </div>
                    <div>
                        <input type="number" v-model="ISN">
                    </div>
                    <div>
                        <div class="flex-row date-color pl-4 pr-2">
                            <div class="flex-row border-gray pl-4 width-min-content pr-4 pt-1 pb-1">
                                <div><i class="far fa-eye"></i></div>
                                <div class="ml-2" @click="getMotivation()">Показать</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mr-2 ml-2 mt-2">
            <div class="table-responsive-sm">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Мотивация</th>
                            <th scope="col">Критерии</th>
                            <th scope="col">Выполнение</th>
                        </tr>
                        <tr v-for="(motivation, index) in motivations">
                            <td>{{index + 1}}</td>
                            <td>{{motivation.types}}</td>
                            <td>{{motivation.sum}}</td>
                            <td><i class="fa fa-lg fa-circle motivation" :style="{color : motivation.color}" aria-hidden="true"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "motivation",
        data() {
            return {
                ISN: '',
                category: 1,
                motivations: [],
                dateBeg: new Date(new Date().getFullYear(), new Date().getMonth(),  1, 6).toJSON().slice(0, 10),
                dateEnd: new Date(new Date().getFullYear(), new Date().getMonth() + 1, 1).toJSON().slice(0, 10),
            }
        },
        props : {
            isn : Number
        },
        mounted () {
            this.ISN = this.isn;
            this.getMotivation()
        },
        methods : {
            getMotivation(){
                this.preloader(true)
                this.axios.post('/getMotivationList', {
                        isn: this.ISN,
                        begin : this.dateBeg,
                        end: this.dateEnd,
                    })
                    .then(response => {
                        if(response.data.success){
                            this.motivations = response.data.list
                            this.category = response.data.cat
                        }else{
                            alert(response.data.error)
                        }
                    })
                    .catch(error => {
                        alert(error)
                    })
                    .finally(() => {
                        this.preloader(false)
                    });
            },
            preloader(show){
                if(show)
                {
                    document.getElementById('preloader').style.display = 'flex';
                }
                else
                {
                    document.getElementById('preloader').style.display = 'none';
                }
            }
        }
    }
</script>

<style scoped>

</style>