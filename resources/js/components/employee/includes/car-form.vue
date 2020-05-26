<template>
    <div class="car-form">
        <form id="car-form" @submit.prevent="saveToDraft">
            <input type="hidden" name="typeObject" value="car">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="engineType">Тип двигателя</label>
                        <select class="form-control" id="engineType" name="engineType">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="numberKey">Количество ключей</label>
                        <select class="form-control" id="numberKey" name="numberKey">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="typeKpp">Тип КПП</label>
                        <select class="form-control" id="typeKpp" name="typeKpp">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="typeDrive">Тип привода</label>
                        <select class="form-control" id="typeDrive" name="typeDrive">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="headlamp">Фары</label>
                        <select class="form-control" id="headlamp" name="headlamp">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tires">Шины</label>
                        <select class="form-control" id="tires" name="tires">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="storageCondition">Условия хранения</label>
                        <select class="form-control" id="storageCondition" name="storageCondition">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="operationMode">Режим эксплуатации</label>
                        <select class="form-control" id="operationMode" name="operationMode">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="conditionTC">Состояние ТС</label>
                        <select class="form-control" id="conditionTC" name="conditionTC">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="numberDamagedItems">Количество поврежденных элементов</label>
                        <select class="form-control" id="numberDamagedItems" name="numberDamagedItems">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="recommendation">Рекомендация</label>
                        <select class="form-control" id="recommendation" name="recommendation">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="mileageTC">Пробег ТС</label>
                        <input type="text" class="form-control" name="mileageTC" id="mileageTC">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="damage">Имеющиеся повреждения (иная значимая информация)</label>
                        <textarea class="min-width-50" name="damage" id="damage" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-sm-6 flex-row pl-3 pb-4 pr-4 pointer">
                    <button title="Сохранить" type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </form>
        <upload-image></upload-image>
    </div>
</template>

<script>
    import ImageUploader from '../../common/upload-image'

    export default {
        name: "car-form",
        data() {
            return {}
        },
        components: {
            ImageUploader
        },
        props: {},
        methods: {
            saveToDraft: function (e) {
                var form = document.getElementById('car-form');
                var formData = new FormData(form);
                if (confirm("Проверьте правильность введенных данных\nОтменить действие будет невозможно")) {
                    axios.post('/setInspection', formData)
                        .then((response) => {
                            if (!response.data.success) {
                                alert(response.data.error);
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

