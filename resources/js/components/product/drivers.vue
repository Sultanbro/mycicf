<template>
    <div class="col-12 row mt-2 mb-2">
        <h4>Лица допущенные к вождению</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Контрагент</th>
                    <th>КБМ</th>
                    <th>Операции</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Ажимов Жанибек Кайратулы</td>
                    <td>13</td>
                    <td>Удалить / Изменить</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ажимов Жанибек Кайратулы</td>
                    <td>2</td>
                    <td>Удалить / Изменить</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Зинченко Сергей</td>
                    <td>12</td>
                    <td>Удалить / Изменить</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Ажимов Жанибек Кайратулы</td>
                    <td>8</td>
                    <td>Удалить / Изменить</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Ажимов Жанибек Кайратулы</td>
                    <td>3</td>
                    <td>Удалить / Изменить</td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="add-button width100">Добавить</button>
    </div>
</template>

<script>
    export default {
        name: "roles",
        data() {
            return {

            }
        },
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>