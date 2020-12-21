<template>
    <div>
        <div>
            <div class="d-flex justify-content-between p-3 pointer border-bottom"
                 data-toggle="collapse"
                 data-target="#collapse-el-1"
                 aria-expanded="false"
                 @click="isApiOpened = !isApiOpened">
                <div>
                    <strong class="text-uppercase">api</strong>
                </div>
                <div>
                    <i :class="isApiOpened ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                </div>
            </div>
            <div class="collapse" id="collapse-el-1">
                <ul>
                    <li class="">
                        <a href="" class="d-flex pl-3 pr-3 pt-2 pb-2">Bestsender</a>
                    </li>
                    <li class="border-top">
                        <a href="" class="d-flex pl-3 pr-3 pt-2 pb-2">Oktell</a>
                    </li>
                    <li class="border-top">
                        <a href="" class="d-flex pl-3 pr-3 pt-2 pb-2">Aviata</a>
                    </li>
                    <li class="border-top border-bottom">
                        <a href="" class="d-flex pl-3 pr-3 pt-2 pb-2">Choco</a>
                    </li>
                </ul>
            </div>
        </div>

        <div>
            <div class="d-flex justify-content-between p-3 pointer"
                 data-toggle="collapse"
                 data-target="#collapse-el-2"
                 aria-expanded="false"
                 @click="isKiasOpened = !isKiasOpened">
                <div>
                    <strong class="text-uppercase">kias</strong>
                </div>
                <div>
                    <i :class="isKiasOpened ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                </div>
            </div>
            <div class="collapse" id="collapse-el-2">
                <ul>
                    <li class="pl-3 pr-3 pt-2 pb-2 border-top">
                        <a href="">Test 1</a>
                    </li>
                    <li class="pl-3 pr-3 pt-2 pb-2 border-top">
                        <a href="">Test 1</a>
                    </li>
                    <li class="pl-3 pr-3 pt-2 pb-2 border-top">
                        <a href="">Test 1</a>
                    </li>
                    <li class="pl-3 pr-3 pt-2 pb-2 border-top">
                        <a href="">Test 1</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "sidebar-component",
        data() {
            return {
                isApiOpened: false,
                isKiasOpened: false,
            }
        }
    }
</script>

<style scoped>

</style>
