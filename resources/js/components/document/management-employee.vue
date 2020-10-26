<template>
    <div class="management-employee">
        <ManagementSearch></ManagementSearch>
        <div class="pt-4">
            <div class="border-radius15 box-shadow centcoins-date-indicators bg-white ml-2 mr-2 pl-5 pr-5 pt-4 pb-3">
                <div class="flex-row jc-sb mt-3 mb-3">
                    <div class="row">
                        <div class="offset-md-7 col-md-5">
                            <div class="form-inline pull-right mb-4">
                                <label for="contractor" class="left">Контрагент:</label>
                                <input type="text" name="contractor" id="contractor" value="Иванов И.В"
                                       class="form-control" readonly>
                            </div>
                            <div class="form-inline pull-right mb-4">
                                <label for="subdivision" class="left">Подразделение:</label>
                                <input type="text" name="subdivision" id="subdivision" value=""
                                       class="form-control" readonly>
                            </div>
                            <div class="form-inline pull-right mb-4">
                                <label for="addressee" class="left">Адресат:</label>
                                <input type="text" name="addressee" id="addressee" value="Омаров Б.Т"
                                       class="form-control" readonly>
                            </div>
                            <div class="form-inline pull-right mb-4">
                                <label for="executor" class="left">Исполнитель:</label>
                                <input type="text" name="executor" id="executor" value="Борисов Б.Т"
                                       class="form-control" readonly>
                            </div>
                            <div class="form-inline pull-right mb-4">
                                <label for="date" class="left">Дата рег.</label>
                                <input type="text" name="date" id="date" value="20.09.2020" class="form-control"
                                       readonly>
                            </div>
                            <div class="form-inline pull-right mb-4">
                                <label for="numberDocument" class="left">Номер:</label>
                                <input type="text" name="numberDocument" id="numberDocument" value="ЗТ-11-13/15"
                                       class="form-control" readonly>
                            </div>
                            <div class="form-inline pull-right mb-4">
                                <label for="status" class="left">Статус:</label>
                                <input type="text" name="status" id="status" value="На подписи" class="form-control"
                                       readonly>
                            </div>
                            <div class="form-inline pull-right mb-4">
                                <label for="stage" class="left">Стадия:</label>
                                <input type="text" name="stage" id="stage" value="На подписи" class="form-control"
                                       readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="title text-align-center pt-5">Список командируемых</div>
                            <div class="form-group" v-for="(row, index) in rows">
                                <label for="fioEmployee">ФИО работника</label>
                                <input name="fioEmployees[]" id="fioEmployee" class="form-control" value="">
                                <div v-if="index!=0" class="col-xs-1">
                                    <button class="btn btn-danger" @click="deleteRow(index)">X</button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mb-3" @click="addRow">Добавить работника</button>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="change">Изменено</label>
                                        <input type="text" name="change" id="change" value=""
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="offset-md-4 col-md-4">
                                    <div class="form-group">
                                        <label for="author">Автор</label>
                                        <input type="text" name="author" id="author" value=""
                                               class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <button class="btn btn-secondary">
                                        Сохранить
                                    </button>
                                </div>
                                <div class="col-md-4 text-align-center">
                                    <a :href="`/document/${id}`" class="btn btn-secondary">
                                        Назад
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ManagementSearch from './management-search'

    export default {
        name: "management-employee",
        components: {
            ManagementSearch,
        },
        props: {
            isn: Number,
            id: Number,
        },
        data() {
            return {
                rows: [
                    {'name': ''}
                ]
            }
        },
        methods: {
            addRow: function() {
                this.rows.push({ 'name': ''});
            },
            deleteRow: function(index) {
                Vue.delete(this.rows, index);
            }
        }
    }
</script>

<style>
    .left {
        font-size: 17px;
        margin-right: 100px;
    }

    .title {
        font-size: 18px;
        font-weight: bold;
    }
</style>
