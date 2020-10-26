<template>
    <div class="approval-sheet">
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
                            <div class="title text-align-center pt-5">Лист согласования</div>
                            <div class="form-group">
                                <label for="remark">Примечание</label>
                                <textarea name="remark" id="remark" cols="30" rows="5"
                                          class="form-control"></textarea>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <button class="btn btn-secondary">
                                        Разослать на согласование
                                    </button>
                                </div>
                                <div class="col-md-4 text-align-center">
                                    <button class="btn btn-primary">
                                        Сохранить
                                    </button>
                                </div>
                                <div class="col-md-4 text-right">
                                    <button class="btn btn-danger">
                                        Назад
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-4">
            <div class="border-radius15 box-shadow centcoins-date-indicators bg-white ml-2 mr-2 pl-2 pr-2 pt-4 pb-3">
                <div class="">Список согласующих</div>
                <div class="flex-row jc-sb mt-3 mb-3">
                    <table class="table text-align-center">
                        <thead>
                        <tr class="header color-white">
                            <th scope="col">№</th>
                            <th scope="col" class="thead-border">Сотрудник</th>
                            <th scope="col" class="thead-border">Телефон</th>
                            <th scope="col" class="thead-border">Должность</th>
                            <th scope="col" class="thead-border">Подразделение</th>
                            <th scope="col" class="thead-border">Отправлено</th>
                            <th scope="col" class="thead-border">Срок</th>
                            <th scope="col">Согласовано</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-primary">
                            Ссогласовать
                        </button>
                    </div>
                    <div class="col-md-4 text-align-center">
                        <button class="btn btn-danger">
                            Отказать
                        </button>
                    </div>
                    <div class="col-md-4 text-right">
                        <button class="btn btn-secondary">
                            Отменить согласование/отказ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "approval-sheet"
    }
</script>

<style scoped>

</style>
