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
                    <li class="border-bottom"
                        v-for="(apiCategory, index) in categories.api"
                        :key="index"
                        @click="isLoading = !isLoading"
                        >
                        <a :href="`/main/apidocs/${apiCategory.id}`"
                           class="d-flex pl-3 pr-3 pt-2 pb-2">{{ apiCategory.title }}</a>
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
                    <li class="border-top"
                        v-for="(kiasCategory, index) in categories.kias"
                        :key="index"
                        @click="isLoading = !isLoading">
                        <a :href="`/main/kiasdocs/${kiasCategory.id}`"
                           class="d-flex pl-3 pr-3 pt-2 pb-2">{{ kiasCategory.title }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <preloader v-if="isLoading"></preloader>
    </div>
</template>

<script>
    export default {
        name: "sidebar-component",
        data() {
            return {
                isApiOpened: false,
                isKiasOpened: false,
                isLoading: false,
            }
        },
        props: {
            categories: Object,
        }
    }
</script>

<style scoped>

</style>
