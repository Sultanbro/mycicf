<template>
    <div class="car-form">
        <form id="car-form" @submit.prevent="saveToDraft">
            <input type="hidden" name="typeObject" value="car">
            <input type="hidden" name="docIsn" :value="details.ISN">
            <input type="hidden"
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
        name: "car-form",
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
            saveToDraft: function (e) {
                var form = document.getElementById('car-form');
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
    };
</script>

