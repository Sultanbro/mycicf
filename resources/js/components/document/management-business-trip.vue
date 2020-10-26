<template>
    <div class="management-business-trip">
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
                            <div class="title text-align-center pt-5">СЗ. Командировка</div>
                            <div class="form-group">
                                <label for="country">Страна</label>
                                <input name="country" id="country" class="form-control" value="">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="departureCity">Город отправления</label>
                                        <input type="text" name="departureCity" id="departureCity" value=""
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="offset-md-4 col-md-4">
                                    <div class="form-group">
                                        <label for="destinationCity">Город назначения</label>
                                        <input type="text" name="destinationCity" id="destinationCity" value=""
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dateFrom">Дата С</label>
                                        <input type="date" name="dateFrom" id="dateFrom" value="" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="offset-md-4 col-md-4">
                                    <div class="form-group">
                                        <label for="dateTo">Дата По</label>
                                        <input type="date" name="dateTo" id="dateTo" value=""
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="transport">Вид транспорта</label>
                                        <input type="text" name="transport" id="transport" value=""
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="offset-md-4 col-md-4">
                                    <div class="form-group">
                                        <label for="dailyMCI">Суточные МРП</label>
                                        <input type="text" name="dailyMCI" id="dailyMCI" value=""
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="accommodation">Проживание</label>
                                        <input type="text" name="accommodation" id="accommodation" value=""
                                               class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="offset-md-4 col-md-4">
                                    <div class="form-group">
                                        <label for="accommodationType">Вид проживания</label>
                                        <input type="text" name="accommodationType" id="accommodationType" value=""
                                               class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="remark">Примечание</label>
                                <textarea name="remark" id="remark" cols="30" rows="5" class="form-control"></textarea>
                            </div>
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
                                    <a :href="`/document/${id}/list`" class="btn btn-secondary">
                                        Список командируемых
                                    </a>
                                </div>
                                <div class="col-md-4 text-align-center">
                                    <button class="btn btn-secondary">
                                        Сформировать лист согласования
                                    </button>
                                </div>
                                <div class="col-md-4 text-right">
                                    <button class="btn btn-secondary">
                                        Внести изменения в СЗ
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
                <div class="flex-row jc-sb mt-3 mb-3">
                    <table class="table text-align-center">
                        <thead>
                        <tr class="header color-white">
                            <th scope="col">№</th>
                            <th scope="col" class="thead-border">Атрибут</th>
                            <th scope="col" class="thead-border">Значение</th>
                            <th scope="col" class="thead-border">Примичание</th>
                            <th scope="col" class="thead-border">Изменен</th>
                            <th scope="col">Автор</th>
                        </tr>
                        </thead>
                        <tbody class="date-color">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "management-business-trip",
        props: {
            id: Number,
        },
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
