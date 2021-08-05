<template>
    <div class="ga-ViewApp">
        <div class="pointer" data-toggle="collapse" href="#vacation" role="button" aria-expanded="false" aria-controls="collapseExample">
            <strong>Мои заявки</strong>
        </div>
        <div class="collapse table-responsive" id="vacation">
            <table class="table">
                <thead>
                <tr class="header color-white">
                    <th scope="col" class="ga-headerApp">Вид</th>
                    <th scope="col" class="ga-headerApp">Номер</th>
                    <th scope="col" class="ga-headerApp">Продукт</th>
                    <th scope="col" class="ga-headerApp">Контрагент</th>
                    <th scope="col" class="ga-headerApp">Стадия</th>
                </tr>
                </thead>
                <tbody class="date-color">
                <!--                            <tr v-for="(info, index) in vacation">-->
                <!--                                <td>{{info.view}}</td>-->
                <!--                                <td class="table-td-border">{{info.number}}</td>-->
                <!--                                <td class="table-td-border">{{info.product}}</td>-->
                <!--                                <td class="table-td-border">{{info.partner}}</td>-->
                <!--                                <td>{{info.stage}}</td>-->
                <!--                            </tr>-->
                <tr>
                    <td>Ген. заявка</td>
                    <td class="table-td-border">ГЕНЗАЯВ-19/0009852</td>
                    <td class="table-td-border">ОС ГПО ВТС</td>
                    <td class="table-td-border">ТОО "Аманжол"</td>
                    <td>Исполнена</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "ga-ViewApp",
}
</script>

<style scoped lang="scss">
.ga-ViewApp {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}
.ga-headerApp {
    border-right: 1px solid white;
    text-align: center;
}
</style>
