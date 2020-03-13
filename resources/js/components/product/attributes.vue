<template>
    <div class="col-12 row mt-2 mb-2 agreement-block">
        <h4>Дополнительные атрибуты договора</h4>
        <div class="row col-12">
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Атрибут : </label>
                <div class="attr-text">
                    Текст
                </div>
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
            <div class="col-lg-6 col-xl-6 col-12">
                <label class="bold">Примечание : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
        </div>
        <div class="row col-12">
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Атрибут : </label>
                <div class="attr-text">
                    Тру Фолс
                </div>
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <input type="checkbox" class="attr-input-text col-12">
            </div>
            <div class="col-lg-6 col-xl-6 col-12">
                <label class="bold">Примечание : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
        </div>
        <div class="row col-12">
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Атрибут : </label>
                <div class="attr-text">
                    Число
                </div>
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <input type="number" class="attr-input-text col-12">
            </div>
            <div class="col-lg-6 col-xl-6 col-12">
                <label class="bold">Примечание : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
        </div>
        <div class="row col-12">
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Атрибут : </label>
                <div class="attr-text">
                    Справочник
                </div>
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <select class="custom-select">
                    <option value="12">12 месяцев</option>
                    <option value="11">11 месяц</option>
                    <option value="10">10 месяц</option>
                    <option value="9">9 месяц</option>
                    <option value="8">8 месяц</option>
                    <option value="7">7 месяц</option>
                    <option value="6">6 месяц</option>
                    <option value="5">5 месяц</option>
                    <option value="4">4 месяц</option>
                    <option value="3">3 месяц</option>
                    <option value="2">2 месяц</option>
                    <option value="1">1 месяц</option>
                    <option value="150">15 дней</option>
                    <option value="100">10 дней</option>
                    <option value="50">5 дней</option>
                    <option value="0">Произвольная</option>
                </select>
            </div>
            <div class="col-lg-6 col-xl-6 col-12">
                <label class="bold">Примечание : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
        </div>
        <div class="row col-12">
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Атрибут : </label>
                <div class="attr-text">
                    Дата
                </div>
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <input type="date" class="attr-input-text col-12">
            </div>
            <div class="col-lg-6 col-xl-6 col-12">
                <label class="bold">Примечание : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "attributes",
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