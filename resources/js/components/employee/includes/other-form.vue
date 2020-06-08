<template>
    <div class="other-form">
        <form id="other-form" @submit.prevent="saveToDraft">
            <input type="hidden" name="typeObject" value="other">
            <input type="text" name="urlStorage" :value="details.AttachLink" id="urlStorage">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="basement">Подвальные помещения</label>
                        <select class="form-control" id="basement" name="basement">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="numberKey">Условия эксплуатации объекта</label>
                        <select class="form-control" id="numberKey" name="operationCondition">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="operationPeriod">Период эксплуатации</label>
                        <select class="form-control" id="operationPeriod" name="operationPeriod">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="adjacentObjects">Прилегающие объекты</label>
                        <select class="form-control" id="adjacentObjects" name="adjacentObjects">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gasSupply">Газоснабжение</label>
                        <select class="form-control" id="gasSupply" name="gasSupply">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="heating">Отопление / состояние</label>
                        <div class="form-inline">
                            <select class="form-control" id="heating" name="heating">
                                <option>1</option>
                                <option>2</option>
                            </select>
                            &nbsp;&nbsp;
                            <div class="form-check">
                                <label class="form-check-label" for="heating-state">
                                    <input type="checkbox" class="form-check-input" id="heating-state"
                                           name="heating-state" value="0">Не рабочее
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="hotColdWater">Горячее/ Холодное водоснабжение</label>
                        <div class="form-inline">
                            <select class="form-control" id="hotColdWater" name="hotColdWater">
                                <option>1</option>
                                <option>2</option>
                            </select>
                            &nbsp;&nbsp;
                            <div class="form-check">
                                <label class="form-check-label" for="hotColdWater-state">
                                    <input type="checkbox" class="form-check-input" id="hotColdWater-state"
                                           name="hotColdWater-state" value="0">Не рабочее
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sewage">Канализация / состояние</label>
                        <div class="form-inline">
                            <select class="form-control" id="sewage" name="sewage">
                                <option>1</option>
                                <option>2</option>
                            </select>
                            &nbsp;&nbsp;
                            <div class="form-check">
                                <label class="form-check-label" for="sewage-state">
                                    <input type="checkbox" class="form-check-input" id="sewage-state"
                                           name="sewage-state" value="0">Не рабочее
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="electricity">Электричество / состояние</label>
                        <div class="form-inline">
                            <select class="form-control" id="electricity" name="electricity">
                                <option>1</option>
                                <option>2</option>
                            </select>
                            &nbsp;&nbsp;
                            <div class="form-check">
                                <label class="form-check-label" for="electricity-state">
                                    <input type="checkbox" class="form-check-input" id="electricity-state"
                                           name="electricity-state" value="0">Не рабочее
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fireSysytem">Система пожаротушения</label>
                        <div class="form-inline">
                            <select class="form-control" id="fireSysytem" name="fireSysytem">
                                <option>1</option>
                                <option>2</option>
                            </select>
                            &nbsp;&nbsp;
                            <div class="form-check">
                                <label class="form-check-label" for="fireSysytem-state">
                                    <input type="checkbox" class="form-check-input" id="fireSysytem-state"
                                           name="fireSysytem-state" value="0">Отсутствует
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="videoMonitoring">Видеонаблюдение</label>
                        <div class="form-inline">
                            <select class="form-control" id="videoMonitoring" name="videoMonitoring">
                                <option>1</option>
                                <option>2</option>
                            </select>
                            &nbsp;&nbsp;
                            <div class="form-check">
                                <label class="form-check-label" for="videoMonitoring-state">
                                    <input type="checkbox" class="form-check-input" id="videoMonitoring-state"
                                           name="videoMonitoring-state" value="0">Не рабочее
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="videoMonitoring">Контрольно-пропускной пункт</label>
                        <div class="form-inline">
                            <div class="form-check">
                                <label class="form-check-label" for="checkpoint-state">
                                    <input type="checkbox" class="form-check-input" id="checkpoint-state"
                                           name="checkpoint-state" value="0">Отсутствует
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="security">Охрана</label>
                        <div class="form-inline">
                            <select class="form-control" id="security" name="security">
                                <option>1</option>
                                <option>2</option>
                            </select>
                            &nbsp;&nbsp;
                            <select class="form-control" id="security-state" name="security-state">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fireAlarm">Охранно-пожарная сигнализация</label>
                        <div class="form-inline">
                            <select class="form-control" id="fireAlarm" name="fireAlarm">
                                <option>1</option>
                                <option>2</option>
                            </select>
                            &nbsp;&nbsp;
                            <div class="form-check">
                                <label class="form-check-label" for="fireAlarm-state">
                                    <input type="checkbox" class="form-check-input" id="fireAlarm-state"
                                           name="fireAlarm-state" value="0">Не рабочее
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="foundation">Фундамент (состояние)</label>
                        <div class="form-inline">
                            <select class="form-control" id="foundation" name="foundation">
                                <option>1</option>
                                <option>2</option>
                            </select>
                            &nbsp;&nbsp;
                            <select class="form-control" id="foundation-state" name="foundation-state">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="walls">Стены (состояние)</label>
                        <div class="form-inline">
                            <select class="form-control" id="walls" name="walls">
                                <option>1</option>
                                <option>2</option>
                            </select>
                            &nbsp;&nbsp;
                            <select class="form-control" id="walls-state" name="walls-state">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exteriorWallDecoration">Внешняя отделка стен (состояние)</label>
                        <div class="form-inline">
                            <select class="form-control" id="exteriorWallDecoration" name="exteriorWallDecoration">
                                <option>1</option>
                                <option>2</option>
                            </select>
                            &nbsp;&nbsp;
                            <select class="form-control" id="exteriorWallDecoration-state"
                                    name="exteriorWallDecoration-state">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="roof">Кровля (состояние)</label>
                        <div class="form-inline">
                            <select class="form-control" id="roof" name="roof">
                                <option>1</option>
                                <option>2</option>
                            </select>
                            &nbsp;&nbsp;
                            <select class="form-control" id="roof-state" name="roof-state">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="entranceDoors">Входные двери</label>
                        <select class="form-control" id="entranceDoors" name="entranceDoors">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="windowOpenings">Оконные проемы (состояние)</label>
                        <div class="form-inline">
                            <select class="form-control" id="windowOpenings" name="windowOpenings">
                                <option>1</option>
                                <option>2</option>
                            </select>
                            &nbsp;&nbsp;
                            <select class="form-control" id="windowOpenings-state" name="windowOpenings-state">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
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
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="damage">Имеющиеся повреждения (иная значимая информация)</label>
                        <textarea class="min-width-50" name="damage" id="damage" rows="5"></textarea>
                    </div>
                </div>
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
        name: "other-form",
        data() {
            return {
                countR: 0,
                isJoin: false,
            }
        },
        props: {
            details: Object,
            countArray: Number
        },
        methods: {
            saveToDraft: function (e) {
                var form = document.getElementById('other-form');
                var formData = new FormData(form);
                if (!this.isJoin) {
                    axios.post('/setInspection', formData)
                        .then((response) => {
                            if (!response.data.success) {
                                alert(response.data.error);
                            } else {
                                this.isJoin = true
                                this.countR++;
                                if (this.countR == this.countArray) {
                                    document.getElementById("inspection-execute").removeAttribute('disabled');
                                }
                            }
                        })
                        .catch(function (error) {
                            alert(error.response);
                        });
                }
            },
        }
    }
</script>

<style scoped>

</style>
