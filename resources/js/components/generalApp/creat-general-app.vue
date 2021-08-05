<template>
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <h2>Форма Генеральной заявки</h2>
                </div>
                <div class="row g-5">
                    <div class="col-md-12 col-lg-12">
                        <form class="needs-validation" novalidate>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="contractor" class="form-label">Контрагент:</label>
                                    <input type="text" class="form-control" id="contractor" placeholder="" value="" required>
                                </div>

                                <div class="col-12">
                                    <label for="CuratorDoc" class="form-label">Куратор документа:</label>
                                    <input type="text" class="form-control" id="CuratorDoc" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="SignatoryCompany" class="form-label">Подписант от Компании:</label>
                                    <input type="text" class="form-control" id="SignatoryCompany" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="DataReg" class="form-label">Дата рег:</label>
                                    <input type="date" class="form-control" id="DataReg" placeholder="" value="" required="">
                                </div>

                                <div class="col-12">
                                    <label for="number" class="form-label">Номер:</label>
                                    <input type="text" class="form-control" id="number" placeholder="" value="" required="">
                                </div>

                                <div class="col-12">
                                    <label for="status" class="form-label">Статус:</label>
                                    <input type="text" class="form-control" id="status" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="dateBeg" class="form-label">Дата начала:</label>
                                    <input type="date" class="form-control" id="dateBeg" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="dateEnd" class="form-label">Дата окончания:</label>
                                    <input type="date" class="form-control" id="dateEnd" placeholder="" value="" required="">
                                </div>
                            </div><hr class="my-4">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="product" class="form-label">Продукт</label>
                                    <input type="text" class="form-control" id="product" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="projectStatus" class="form-label">Статус проекта</label>
                                    <select class="form-select" id="projectStatus" required="">
                                        <option hidden selected>Выберите...</option>
                                        <option>Доп.соглашение</option>
                                        <option>Крос-продажи</option>
                                        <option>Новый клиент</option>
                                        <option>Пролонгация</option>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label for="insuranceCase" class="form-label">Страховой случай:</label>
                                    <input type="text" class="form-control" id="insuranceCase" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="maxSumOnOneContract" class="form-label">MAX стр. сумма по одному договору</label>
                                    <input type="number" class="form-control" id="maxSumOnOneContract" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="tariff" class="form-label">Тариф, %:</label>
                                    <input type="number" class="form-control" id="tariff" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="planedPremiumsForPeriod" class="form-label">Планируемый сбор премий за период:</label>
                                    <input type="number" class="form-control" id="planedPremiumsForPeriod" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="franchiseFullLose" class="form-label">Франшиза при полной гибели:</label>
                                    <input type="number" class="form-control" id="franchiseFullLose" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="agentCommissionGross" class="form-label">Коммисия агента гросс</label>
                                    <input type="number" class="form-control" id="agentCommissionGross" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="franchiseByDamage" class="form-label">Франшиза по случаю/повреждение:</label>
                                    <input type="number" class="form-control" id="franchiseByDamage" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="minPremium" class="form-label">Минимальная премия</label>
                                    <input type="number" class="form-control" id="minPremium" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="agentType" class="form-label">Тип агента:</label>
                                    <input type="text" class="form-control" id="agentType" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="agentName" class="form-label">Наименование агента</label>
                                    <input type="text" class="form-control" id="agentName" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="rating" class="form-label">Рейтинг:</label>
                                    <input type="number" class="form-control" id="rating" placeholder="" value="" required="">
                                </div>

                                <div class="col-sm-6">
                                    <label for="valuta" class="form-label">Валюта</label>
                                    <select class="form-select" id="valuta" required="">
                                        <option hidden selected>Выберите...</option>
                                        <option>Доллар США</option>
                                        <option>Евро</option>
                                        <option>Российский рубль</option>
                                        <option>Тенге</option>
                                        <option>Фунт стерлингов</option>
                                        <option>Швейцарский франк</option>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label for="procedurePaymentPremium" class="form-label">Порядок оплаты страхового взноса:</label>
                                    <select class="form-select" id="procedurePaymentPremium" required="">
                                        <option hidden selected>Выберите...</option>
                                        <option>В рассрочку</option>
                                        <option>Двенадцатью взносами равными долями (в теч. 12 мес.)</option>
                                        <option>Двумя взносами по 50% (второй взнос в течении 30 дней)</option>
                                        <option>Двумя взносами по 70%/30% (второй взнос в течении 30 дней)</option>
                                        <option>Единовременно до начала действия договора</option>
                                        <option>Единовременно по условиям договора</option>
                                        <option>Ежемесячно</option>
                                        <option>Пять взносов по 20%</option>
                                        <option>Тремя взносами 35/35/30%(в течении 4 мес.)</option>
                                        <option>Четыре взноса 25/25/25/25%(в течении 6 мес.)</option>
                                        <option>Четыре взноса 35/30/20/15% (в течении 6 мес.)</option>
                                        <option>Шестью взносами равными долями (в теч. 6 мес.)</option>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label for="timing" class="form-label">Сроки</label>
                                    <input type="text" class="form-control" id="timing" placeholder="" value="" required="">
                                </div>
                            </div><hr class="my-4">
                            <div class="col-sm-6">
                                <label for="notStandardApp" class="form-label">Нестандартный шаблон договора?</label>
                                <select class="form-select" id="notStandardApp" required="">
                                    <option hidden>Выберите...</option>
                                    <option>Да</option>
                                    <option selected>Нет</option>
                                </select>
                            </div><hr class="my-4">
                            <div class="row gy-3">
                                <div class="col-12">
                                    <label for="comment" class="form-label">Примечание</label>
                                    <textarea class="form-control" id="comment" rows="3" placeholder="" required=""></textarea>
                                </div>
                            </div><hr class="my-4">
                            <div class="my-4">
                                <h4>Дополнительные сведения</h4>
                                <div class="row">
                                    <div class="col-sm-2 d-flex flex-column justify-content-between">
                                        <label for="typeSales" class="form-label">Тип продаж:</label>
                                        <select class="form-select" id="typeSales" required="">
                                            <option hidden selected>Выберите...</option>
                                            <option>Агентские</option>
                                            <option>Прямые</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 d-flex flex-column justify-content-between">
                                        <label for="firstSectionContract" class="form-label">1 раздел ДС:</label>
                                        <input type="text" class="form-control" id="firstSectionContract" placeholder="" value="" required="">
                                    </div>

                                    <div class="col-sm-2 d-flex flex-column justify-content-between">
                                        <label for="notStandardContract" class="form-label">Нестандартный шаблон договора:</label>
                                        <input type="text" class="form-control" id="notStandardContract" placeholder="" value="" required="">
                                    </div>

                                    <div class="col-sm-3 d-flex flex-column justify-content-between">
                                        <label for="territoryCargo" class="form-label">Территория страхования для грузов:</label>
                                        <select class="form-select" id="territoryCargo" required="">
                                            <option hidden selected>Выберите...</option>
                                            <option>Дальнее Зарубежье</option>
                                            <option>Республика Казахстан</option>
                                            <option>СНГ</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-2 d-flex flex-column justify-content-between">
                                        <label for="ageInsured" class="form-label">Возраст страхователя (для Эконом EXP):</label>
                                        <input type="text" class="form-control" id="ageInsured" placeholder="" value="" required="">
                                    </div>
                                </div>
                            </div>
                            <button class=" btn btn-primary btn-lg" type="submit">Отправить</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
</template>

<script>
export default {
    props: {
        username: String,
    },
    name: "creatGeneralApp",
}
</script>

<style scoped>

</style>
