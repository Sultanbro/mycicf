<template>
    <div class="news-tape-bg radius-4px mt-3 pb-2">
        <ManagementSearch :results="results"></ManagementSearch>
<!--        <form id="object-form" @submit.prevent="saveDocument">-->
            <ManagementApplication v-if="results['classisn']==='1448061' || results['classisn']==='1747341'|| results['classisn']==='1440591' || results['classisn']==='1791101'
                                    || results['classisn']==='800791'"
                                   :results="results"></ManagementApplication>
<!--            <ManagementBusinessTrip v-if="results.id==3" :id="results.id"></ManagementBusinessTrip>-->
<!--            <ApplicationNotAdministrativeDay v-else-if="results['classisn']==='1011941'" :results="results"></ApplicationNotAdministrativeDay>-->
            <ApplicationBlank v-else-if="results['classisn']==='1479131' || results['classisn']==='1479141' || results['classisn']==='820621' || results['classisn']==='1011971'
                                    || results['classisn']==='1007411' || results['classisn']==='1479151' || results['classisn']==='1007391'
                                    || results['classisn']==='1011931' || results['classisn']==='1011961' || results['classisn']==='1011951' || results['classisn']==='1011941'"
                              :results="results"></ApplicationBlank> <!-- Заявления -->
            <DisciplinaryAction v-else-if="results['classisn']==='2018171'" :results="results"></DisciplinaryAction>
            <ManagementBusinessTrip v-else-if="results['classisn']==='1042311'" :results="results"></ManagementBusinessTrip>
            <ApprovalSheet v-else-if="results['classisn']==='1791111' || results['classisn']==='1783591'|| results['classisn']==='1799231' || results['classisn']==='2071791'
                                    || results['classisn']==='826591' || results['classisn']==='800781'" :results="results"></ApprovalSheet>
            <div class="col-md-12 col-sm-6 flex-row pl-3 pb-4 pr-4 pointer">
<!--                <button title="Сохранить" type="submit" class="btn btn-primary" id="saveDocument" @click="saveDocument">-->
<!--                    Сохранитьasdasdsa-->
<!--                </button>-->
            </div>
<!--        </form>-->
    </div>
</template>

<script>
    import ManagementSearch from './management-search'
    import ManagementApplication from './management-application'
    import ManagementBusinessTrip from './management-business-trip'
    import ManagementEmployee from './management-employee'
    import ApplicationNotAdministrativeDay from './application-not-administrative-day'
    import ApprovalSheet from './approval-sheet'
    import ApplicationBlank from "./application-blank";
    import DisciplinaryAction from "./disciplinary-action";

    export default {
        name: "document-management-show",
        data() {
            return {
                isJoin: false,
            }
        },
        components: {
            ApplicationBlank,
            ManagementSearch,
            ManagementApplication,
            ManagementBusinessTrip,
            ManagementEmployee,
            ApplicationNotAdministrativeDay,
            ApprovalSheet,
            DisciplinaryAction,
        },
        props: {
            isn: Number,
            results: Object,
        },
        methods: {
            saveDocument: function (e) {
                console.log('main test');
                var form = document.getElementById('object-form');
                var formData = new FormData(form);
                    this.axios.post('/document/saveDocument', formData)
                        .then((response) => {
                            if (!response.data.success) {
                                alert(response.data.error);
                            } else {
                                alert(response.data.success);
                            }
                        })
                        .catch(function (error) {
                            alert(error.response);
                        });
                //console.log(formData);
            },
        },
    }
</script>

<style scoped>

</style>
