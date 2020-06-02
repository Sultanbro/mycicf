<template>
    <div class="car-form">
        <form id="car-form" @submit.prevent="saveToDraft">
            <input type="hidden" name="typeObject" value="car">
            <input type="hidden" name="docIsn" :value="details.ISN">
            <div class="row">
                <div class="col-md-4" v-for="detail in details.details.row">
                    <div class="form-group">
                        <label for="engineType0">{{ detail.detail }}</label>
                        <input type="hidden" :name="'detail[' + detail.ISN + '][isn]'" :value="detail.ISN">
                        <input type="hidden" :name="'detail[' + detail.ISN + '][detailIsn]'" :value="detail.Detailisn">
                        <select class="form-control" id="engineType0" :name="'detail[' + detail.ISN + '][damage]'">
                            <option v-for="child in detail.child"
                                    :value="child.child_isn +','+ child.child_name"
                                    :selected="detail.Damageisn == child.child_isn ? true : false">
                                {{ child.child_name }}
                            </option>
                        </select>
                    </div>
                </div>
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="engineType">Тип двигателя</label>-->
                <!--                        <input type="hidden" name="engineType['isn']" value="asd">-->
                <!--                        <input type="hidden" name="engineType['damageIsn']" value="lklkl">-->
                <!--                        <select class="form-control" id="engineType" name="engineType['damage']">-->
                <!--                            <option>1</option>-->
                <!--                            <option>2</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="numberKey">Количество ключей</label>-->
                <!--                        <select class="form-control" id="numberKey" name="numberKey">-->
                <!--                            <option value="эвы">1</option>-->
                <!--                            <option>2</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="typeKpp">Тип КПП</label>-->
                <!--                        <select class="form-control" id="typeKpp" name="typeKpp">-->
                <!--                            <option>1</option>-->
                <!--                            <option>2</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="typeDrive">Тип привода</label>-->
                <!--                        <select class="form-control" id="typeDrive" name="typeDrive">-->
                <!--                            <option>1</option>-->
                <!--                            <option>2</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="headlamp">Фары</label>-->
                <!--                        <select class="form-control" id="headlamp" name="headlamp">-->
                <!--                            <option>1</option>-->
                <!--                            <option>2</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="tires">Шины</label>-->
                <!--                        <select class="form-control" id="tires" name="tires">-->
                <!--                            <option>1</option>-->
                <!--                            <option>2</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="storageCondition">Условия хранения</label>-->
                <!--                        <select class="form-control" id="storageCondition" name="storageCondition">-->
                <!--                            <option>1</option>-->
                <!--                            <option>2</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="operationMode">Режим эксплуатации</label>-->
                <!--                        <select class="form-control" id="operationMode" name="operationMode">-->
                <!--                            <option>1</option>-->
                <!--                            <option>2</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="conditionTC">Состояние ТС</label>-->
                <!--                        <select class="form-control" id="conditionTC" name="conditionTC">-->
                <!--                            <option>1</option>-->
                <!--                            <option>2</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="numberDamagedItems">Количество поврежденных элементов</label>-->
                <!--                        <select class="form-control" id="numberDamagedItems" name="numberDamagedItems">-->
                <!--                            <option>1</option>-->
                <!--                            <option>2</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="recommendation">Рекомендация</label>-->
                <!--                        <select class="form-control" id="recommendation" name="recommendation">-->
                <!--                            <option>1</option>-->
                <!--                            <option>2</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="mileageTC">Пробег ТС</label>-->
                <!--                        <input type="text" class="form-control" name="mileageTC" id="mileageTC">-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-8">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="damage">Имеющиеся повреждения (иная значимая информация)</label>-->
                <!--                        <textarea class="min-width-50" name="damage" id="damage" rows="5"></textarea>-->
                <!--                    </div>-->
                <!--                </div>-->
                <div class="col-md-12 col-sm-6 flex-row pl-3 pb-4 pr-4 pointer">
                    <input type="hidden" name="inspectionCount" :value="count">
                    <button title="Сохранить" type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "car-form",
        data() {
            return {
                count: 0,
            }
        },
        components: {},
        props: {
            details: Object,
        },
        methods: {
            saveToDraft: function (e) {
                var form = document.getElementById('car-form');
                var formData = new FormData(form);
                if (confirm("Проверьте правильность введенных данных\nОтменить действие будет невозможно")) {
                    axios.post('/setInspection', formData)
                        .then((response) => {
                            if (!response.data.success) {
                                alert(response.data.error);
                            } else {
                                if (this.count == 0) {
                                    this.count += 1;
                                }
                            }
                        })
                        .catch(function (error) {
                            alert(error.response);
                        });
                }
            },
        }
    };
</script>

