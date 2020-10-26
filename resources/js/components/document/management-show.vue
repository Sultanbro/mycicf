<template>
    <div class="news-tape-bg radius-4px mt-3 pb-2">
        <ManagementSearch></ManagementSearch>
        <form id="object-form" @submit.prevent="saveDocument">
            <ManagementApplication v-if="id===2"></ManagementApplication>
            <ManagementBusinessTrip v-if="id===3" :id="id"></ManagementBusinessTrip>
            <ApplicationNotAdministrativeDay v-if="id===4"></ApplicationNotAdministrativeDay>
            <ApprovalSheet v-if="id===5"></ApprovalSheet>
            <div class="col-md-12 col-sm-6 flex-row pl-3 pb-4 pr-4 pointer">
                <button title="Сохранить" type="submit" class="btn btn-primary" id="saveDocument">
                    Сохранить
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import ManagementSearch from './management-search'
    import ManagementApplication from './management-application'
    import ManagementBusinessTrip from './management-business-trip'
    import ManagementEmployee from './management-employee'
    import ApplicationNotAdministrativeDay from './application-not-administrative-day'
    import ApprovalSheet from './approval-sheet'

    export default {
        name: "document-management-show",
        data() {
            return {
                isJoin: false,
            }
        },
        components: {
            ManagementSearch,
            ManagementApplication,
            ManagementBusinessTrip,
            ManagementEmployee,
            ApplicationNotAdministrativeDay,
            ApprovalSheet,
        },
        props: {
            isn: Number,
            id: Number,
        },
        methods: {
            saveDocument: function (e) {
                var form = document.getElementById('object-form');
                var formData = new FormData(form);
                if (!this.isJoin) {
                    axios.post('/saveDocument', formData)
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
                }
            },
        },
    }
</script>

<style scoped>

</style>
