<template>
    <div class="overflow-auto">
        <table class="table" v-if="params.length">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Параметр</th>
                <th scope="col">Тип параметра</th>
                <th scope="col">Описание</th>
                <th scope="col">Формат</th>
                <th scope="col">Обязательный</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(param, index) in params"
                :key="index">
                <th scope="row">{{index + 1}}</th>
                <td>{{param.paramName}}</td>
                <td>{{param.paramType}}</td>
                <td>{{param.description}}</td>
                <td>{{param.format}}</td>
                <td>{{param.required === 'true' ? 'ДА' : 'НЕТ'}}</td>
            </tr>
            </tbody>
        </table>
        <div v-else>
            <p class="text-center font-weight-bold">Нет</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "apidoc-param-table",
        props: {
            params: Array
        }
    }
</script>

<style scoped>

</style>
