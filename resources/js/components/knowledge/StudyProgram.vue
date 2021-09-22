




<template>

    <!--______________________________________________Программа обучения__________________________________________________-->


            <h2 class="text-align-center">Программа обучения</h2>
            <hr>
            <TodoForm @added="addProgram"></TodoForm>
            <table class="table table-primary">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Содержание</th>
                    <th scope="col">Дата</th>
                </tr>
                </thead>
                <tbody>
                <!--                                <tr v-for="item in users">-->
                <!--                                    <th scope="row"></th>-->
                <!--                                    <td>Mark</td>-->
                <!--                                    <td>Otto</td>-->
                <!--                                    <td>@mdo</td>-->
                <!--                                    <td>@mdo</td>-->
                <!--                                </tr>-->
                <tr>
                    <td v-for="user in  this.users" :key="user.id">{{user.name}}</td>
                </tr>


                </tbody>
            </table>



</template>


<script>
import TodoForm from './TodoForm.vue'

export default  {

    components: {
        TodoForm
    },
    methods: {



        addProgram(toDoLabel) {
            this.users.push(  {id: 1, name: toDoLabel, learn: 'Eng', deadline: '2021' },)
        },


        data() {

            return {





                // User
                users: [

                    {id: 1, name: 'Mike', learn: 'Eng', deadline: '2021' },
                    {id: 2,  name: 'David', learn: 'Eng', deadline: '2021' },
                    {id: 3, name: 'FRANK', learn: 'RUS', deadline: '2021' }

                ],
            }


        },

    },

}
</script>
