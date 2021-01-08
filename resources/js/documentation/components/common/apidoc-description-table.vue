<template>
    <div class="border-bottom mb-4">
        <div class="mb-4">
            <h3>{{doc.title}}</h3>
            <p>Наименование метода: <span class="font-weight-bold">{{doc.methodName}}</span></p>
            <div class="d-flex border rounded mb-3"
                 :class="doc.method === 'GET' ? 'border-success' : doc.method === 'POST' ? 'border-primary' : doc.method === 'PUT' ? 'border-warning' : 'border-danger'">
                <div class="d-flex align-items-center text-white pt-2 pb-2 pl-3 pr-3" :class="doc.method === 'GET' ? 'bg-success' : doc.method === 'POST' ? 'bg-primary' : doc.method === 'PUT' ? 'bg-warning' : 'bg-danger'">
                    <span class="text-uppercase font-weight-bold">{{doc.method}}</span>
                </div>
                <div class="p-2 overflow-auto">
                    <span class="">{{doc.baseUrl}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-2 mb-md-0">
                    <div class="bg-light rounded pt-2 pb-2 pl-3 pr-3">
                        <i class="fas fa-shield-alt"></i>
                        <span>Защищен:</span>
                        <span>{{doc.securedBy === null || doc.securedBy === '' ? 'Нет' : doc.securedBy}}</span>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="bg-light rounded pt-2 pb-2 pl-3 pr-3">
                        <i class="fas fa-cog"></i>
                        <span>Версия:</span>
                        <span>{{doc.version === null || doc.version === '' ? 'Нет' : doc.version}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p class="text-center">Входные параметры</p>
            <apidoc-param-table :params="doc.params"></apidoc-param-table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "apidoc-description-table",
        props: {
            doc: Object,
        }
    }
</script>

<style scoped>
</style>
