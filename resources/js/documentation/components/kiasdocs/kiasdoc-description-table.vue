<template>
    <div class="border-bottom border-secondary mb-4">
        <div class="mb-4">
            <h3>{{doc.title}}</h3>
            <p>Наименование метода: <span class="font-weight-bold">{{doc.methodName}}</span></p>
        </div>
        <div>
            <p class="text-center">Входные параметры</p>
            <kiasdoc-param-table :params="doc.params"></kiasdoc-param-table>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-2 mb-md-0">
                <div class="bg-light rounded pt-2 pb-2 pl-3 pr-3">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Возвращает:</span>
                    <span>{{doc.returnValue}}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "kiasdoc-description-table",
        props: {
            doc: Object,
        }
    }
</script>

<style scoped>
</style>
