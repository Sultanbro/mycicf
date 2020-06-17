<template>
    <div class="object-form">
        <form id="object-form" @submit.prevent="setInspection">
            <input type="hidden" name="docIsn" :value="details.ISN">
            <input type="hidden" name="docID" :value="details.DocID">
            <input type="hidden" name="urlStorage" :value="details.storageLink" id="urlStorage">
            <div class="row" v-if="details.ClassType=='1'">
                <input type="hidden" name="typeObject" value="car">
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
                            <option value="0">Не указано</option>
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
            <div class="row" v-if="details.ClassType=='2'">
                <input type="hidden" name="typeObject" value="special">
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
                            <option value="0">Не указано</option>
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
            <div class="row" v-if="details.ClassType=='3'">
                <input type="hidden" name="typeObject" value="other">
                <div class="col-md-4" v-for="detail in details.details.row">
                    <div :class="detail.type == '3' ? 'none' : 'form-group'">
                        <label>{{ detail.detail }}</label>
                        <input type="hidden" :name="'detail[' + detail.detailisn + '][isn]'" :value="detail.isn">
                        <input type="hidden" :name="'detail[' + detail.detailisn + '][detailIsn]'"
                               :value="detail.detailisn">
                        <input type="hidden" :name="'detail[' + detail.detailisn + '][type]'" :value="detail.type">
                        <div :class="detail.checkbox == '' ? '' : 'form-inline'">
                            <select class="form-control"
                                    :name="'detail[' + detail.detailisn + '][damage]'"
                                    v-if="detail.dicti != ''"
                            >
                                <option value="0">Не указано</option>
                                <option v-for="child in detail.child"
                                        :value="child.child_isn +','+ child.child_name"
                                        :selected="detail.damageisn == child.child_isn ? true : false">
                                    {{ child.child_name }}
                                </option>
                            </select>&nbsp;
                            <div class="form-check" v-if="detail.checkbox == '1'">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input"
                                           :name="'detail[' + detail.detailisn + '][working]'" value="0">Не рабочее
                                </label>
                            </div>
                            <div class="form-check" v-if="detail.checkbox == '2'">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input"
                                           :name="'detail[' + detail.detailisn + '][missing]'" value="0">Отсутствует
                                </label>
                            </div>
                            <select v-if="detail.checkbox == '3'" class="form-control" id="state"
                                    name="state">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
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
                <div class="col-md-12 col-sm-6 flex-row pl-3 pb-4 pr-4 pointer">
                    <button title="Сохранить" type="submit" class="btn btn-primary" id="saveDocument"
                            :disabled="details.storageLink == '' ? true : false">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "object-form",
        data() {
            return {
                countR: 0,
                isJoin: false,
            }
        },
        components: {},
        props: {
            details: Object,
            countArray: Number
        },
        methods: {
            setInspection: function (e) {
                var form = document.getElementById('object-form');
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
                                this.$parent.toggleShowDescription(formData.get('docID'));
                            }
                        })
                        .catch(function (error) {
                            alert(error.response);
                        });
                }
            },
        },
        computed: {
            textTrimed() {
                if (this.details.dremark != '') {
                    return this.details.dremark
                } else {
                    return '';
                }
            },
        }
    }
</script>
