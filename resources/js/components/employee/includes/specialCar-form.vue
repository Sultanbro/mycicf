<template>
    <div class="specialCar-form">
        <form id="specialCar-form" @submit.prevent="setInspection">
            <input type="hidden" name="typeObject" value="car">
            <input type="hidden" name="docIsn" :value="details.ISN">
            <input type="text"
                   name="urlStorage"
                   v-for="(attachLink, key) in details.AttachLink"
                   :value="key"
                   id="urlStorage">
            <div class="row">
                <div class="col-md-4" v-for="detail in details.details.row">
                    <div :class="detail.type == '3' ? 'none' : 'form-group'">
                        <label>{{ detail.detail }}</label>
                        <input type="hidden" :name="'detail[' + detail.detailisn + '][isn]'" :value="detail.isn">
                        <input type="hidden" :name="'detail[' + detail.detailisn + '][detailIsn]'"
                               :value="detail.detailisn">
                        <input type="hidden" :name="'detail[' + detail.detailisn + '][type]'" :value="detail.type">
                        <select class="form-control"
                                :name="'detail[' + detail.detailisn + '][damage]'"
                                v-if="detail.dicti != ''"
                        >
                            <option v-for="child in detail.child"
                                    :value="child.child_isn +','+ child.child_name"
                                    :selected="detail.damageisn == child.child_isn ? true : false">
                                {{ child.child_name }}
                            </option>
                        </select>
                        <input v-if="detail.dicti == ''"
                               type="text"
                               class="form-control"
                               :name="'detail[' + detail.detailisn + '][remark]'" :value="detail.remark">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="dremark">Имеющиеся повреждения (иная значимая информация)</label>
                        <textarea class="min-width-50"
                                  name="dremark"
                                  id="dremark" rows="5">{{textTrimed}}</textarea>
                    </div>
                </div>
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
                <!--                        <label for="typeControl">Тип управления</label>-->
                <!--                        <select class="form-control" id="typeControl" name="typeControl">-->
                <!--                            <option>1</option>-->
                <!--                            <option>2</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="appointment">Назначение</label>-->
                <!--                        <select class="form-control" id="appointment" name="appointment">-->
                <!--                            <option>1</option>-->
                <!--                            <option>2</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="enginePower">Мощность двигателя, кВт/л.с</label>-->
                <!--                        <input type="text" class="form-control" name="enginePower" id="enginePower">-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="loadCapacity">Грузоподъемность, кг</label>-->
                <!--                        <input type="text" class="form-control" name="loadCapacity" id="loadCapacity">-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="bucketCapacity">Объем ковша, куб.м</label>-->
                <!--                        <input type="text" class="form-control" name="bucketCapacity" id="bucketCapacity">-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="shovelWidth">Ширина лопаты, мм</label>-->
                <!--                        <input type="text" class="form-control" name="shovelWidth" id="shovelWidth">-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-4">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="numberMoto">Количество мото/часов</label>-->
                <!--                        <input type="text" class="form-control" name="numberMoto" id="numberMoto">-->
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
                <!--                        <label for="recommendation">Рекомендация</label>-->
                <!--                        <select class="form-control" id="recommendation" name="recommendation">-->
                <!--                            <option>1</option>-->
                <!--                            <option>2</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-md-8">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="damage">Имеющиеся повреждения (иная значимая информация)</label>-->
                <!--                        <textarea class="min-width-50" name="damage" id="damage" rows="5"></textarea>-->
                <!--                    </div>-->
                <!--                </div>-->
                <div class="col-md-12 col-sm-6 flex-row pl-3 pb-4 pr-4 pointer">
                    <button title="Сохранить" type="submit" class="btn btn-primary" id="saveDocument"
                            :disabled="details.AttachLink == '' ? true : false">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "specialCar-form",
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
            setInspection: function (e) {
                var form = document.getElementById('specialCar-form');
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
                                    document.getElementById("inspection-execute").setAttribute('disabled', false);
                                }
                            }
                        })
                        .catch(function (error) {
                            alert(error.response);
                        });
                }
            },
        },
        computed: {
            textTrimed () {
                if (this.details.dremark != '') {
                    return this.details.dremark
                } else {
                    return '';
                }
            },
        }
    }
</script>

<style scoped>

</style>
