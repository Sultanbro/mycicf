<template>
    <div>
        <div class="form-group">
            <br>
            <div class="input-group mb-3">
                <select v-model="searchType">
                    <!--<option value="0">Не выбрано</option>-->
                    <option value="1">По всем документам</option>
                    <option value="2">По названиям документов</option>
                    <!--<option value="3">По данному документу</option>-->
                </select>
                <input v-model="searchText" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button @click="search" class="btn btn-outline-primary" type="button" >Search</button>
            </div>
        </div>
        <div v-for="(result, index) in results">
            {{index+1}}. <a :href="result.url" class="fa-underline"><strong>{{result.title}}</strong></a>
            <br>
            <p>
                {{result.text}}
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "search",
        data() {
            return {
                searchText: '',
                results: [],
                searchType: 1,
            }
        },
        methods: {
            search: function () {
                this.axios.post('/documentation/search', {searchText : this.searchText, type: this.searchType}).then(response => {
                    this.results = response.data;
                });
            }
        },
    }
</script>
