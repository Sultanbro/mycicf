window.Vue = require('vue');

import axios from 'axios'

import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios);
// register the component
Vue.component('treeselect', VueTreeselect.Treeselect)

window.onload = function () {
    var app = new Vue({
        el: '#app',
        data: {
            value: null,
            // define options
            options: null,
        },
        mounted: function () {
            this.getOptions();
        },
        methods: {
            getOptions: function () {
                this.axios.post('/getBranchData', {}).then((response) => {
                    this.options = response.data.result;
                    this.value = response.data.value;
                })
            }
        },
        watch: {
            multiple(newValue) {
                if (newValue) {
                    this.value = this.value ? [this.value] : []
                } else {
                    this.value = this.value[0]
                }
            },
        }
    });
};