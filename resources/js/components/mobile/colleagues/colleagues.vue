<template>
    <main>
        <div class="flex-column">
            <div class="bg-blue-standart mt-1">
                <div class="container-fluid jc-sb vertical-middle">
                    <span class="color-white fs-1_6 mb-1">Коллеги</span>
                    <span data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-sliders-h color-white"></i></span>
                </div>
            </div>
            <div class="friends-settings collapse" id="collapseExample">
                <div class="container-fluid flex-column jc-sb">
                    <div class="colleagues-input-contain flex-row vertical-middle mt-3 width100">
                        <input type="text" class="friends-settings pt-2 pb-2 border0 width100" v-model="searchText" placeholder="Поиск">
                        <span class="pt-2 pb-2 pl-3 pr-3"><i class="fa fa-search color-blue"></i></span>
                    </div>
                    <div class="mt-4">
                        <treeselect class='w-100' :multiple="false" :options="options" v-model="parentId" />
                    </div>
                    <div class="color-white mt-4 mb-4 flex-row vertical-middle button-accept fit pt-1 pb-1 pl-4 pr-4 border-8" @click="searchUser()">
                        <span><i class="fa fa-filter"></i></span>
                        <span class="ml-2">Применить</span>
                    </div>
                </div>
            </div>
            <colleagues-info
                    v-for="(user, index) in usersList"
                    :key="index"
                    :info="user"
            ></colleagues-info>
        </div>
    </main>
</template>

<script>
    export default {
        name: "colleagues",

        data() {
            return {
                options: null,
                searchText: '',
                parentId: 50,
                usersList : [],
            }
        },

        mounted() {
            this.getBranchData();
        },

        methods: {
            searchUser() {
                var vm = this
                this.axios.post('/colleagues/search', {
                    searchText : this.searchText,
                    parentId : this.parentId
                }).then(response => {
                    if(response.data.success){
                        vm.usersList = response.data.list
                    }else{
                        alert(response.data.error)
                    }
                }).catch(error => {
                    alert(error)
                })
            },

            getBranchData() {
                this.axios.post('/getSearchBranch', {}).then(response => {
                    this.options = response.data.result;
                })
            }
        }
    }
</script>

<style scoped>

</style>