<template>
    <div class="overflow-auto">
        <div>
            <p class="text-center">Список ошибок</p>
        </div>
        <table class="table table-borderless table-danger text-white">
            <thead>
            <tr>
                <th scope="col">Код ошибки</th>
                <th scope="col">Описание</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(error, index) in errors"
                :key="index"
                class="border-top border-white">
                <td class="border-white">{{error.errorCode}}</td>
                <td>{{error.description}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "kiasdoc-error-table",
        props: {
            errors: Array
        }
    }
</script>

<style scoped>
    .table-danger {
        background-color: #e03c3b;
        border-radius: 5px;
    }
</style>
