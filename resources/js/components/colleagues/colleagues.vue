<template>
    <div class="bg-white mt-2 colleagues-section">
        <div class="colleagues-section__header">
            <div class="p-3">
                <h6 class="color-blue m-0">Коллеги</h6>
            </div>
            <div class="d-flex justify-content-between align-items-center pl-3 pr-3">
                <div class="d-flex align-items-center">
                    <div class="d-flex mr-2 colleagues-section__header__nav">
                        <input type="search"
                               class="colleagues-section__search-input pl-2"
                               placeholder="Поиск"
                               v-model="searchText">
                        <span class="fa fa-search"></span>
                    </div>
                    <treeselect class='w-50' :multiple="false" :options="options" v-model="parentId" />
                </div>
                <div>
                    <button @click="searchUser()"
                            class="colleagues-section__btn border-0 bg-color-blue color-white pl-3 pr-3 pt-1 pb-1">Применить</button>
                </div>
            </div>
        </div>

        <div class="p-4">
            <div class="colleagues-section__body">
                <colleagues-info
                    v-for="(user, index) in usersList"
                    :key="index"
                    :info="user"
                ></colleagues-info>
            </div>
        </div>

    </div>
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
