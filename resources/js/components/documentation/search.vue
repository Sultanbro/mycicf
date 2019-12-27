<template>
    <div>
        <div class="form-group" :class="positionSearch">
            <br>
            <div class="input-group mb-3">
                <select v-model="searchType">
                    <!--<option value="0">Не выбрано</option>-->
                    <option value="1">По всем документам</option>
                    <option value="2">По названиям документов</option>
                    <option value="3">По данному документу</option>
                </select>
                <input v-model="searchText" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button @click="search" class="btn btn-outline-primary" type="button" >Поиск</button>
                <button v-if="searchType === '3'" @click="prev" class="btn btn-outline-primary" type="button" >Пред.</button>
                <button v-if="searchType === '3'" @click="next" class="btn btn-outline-primary" type="button" >След.</button>
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
        props: {
            positionSearch: {
                type: String,
                required: false
            }
        },
        methods: {
            search: function () {
                if(this.searchType === "3"){
                    this.$parent.searchText(this.searchText)
                }else{
                    this.axios.post('/documentation/search', {searchText : this.searchText, type: this.searchType}).then(response => {
                        this.results = response.data;
                    });
                }
            },
            prev(){
                this.$parent.prev();
            },
            next(){
                this.$parent.next();
            }
        },
    }
</script>
