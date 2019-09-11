window.Vue = require('vue');

import axios from 'axios'

import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios);

Vue.component('simple-info', require('./components/employee/simple-info.vue').default);

Vue.component('info', require('./components/employee/info.vue').default);

Vue.component('treeselect', VueTreeselect.Treeselect);

window.onload = function(){
    var simple_info = new Vue({
        el: '#simple-info',
        data : {},
    });

    var employee_info = new Vue({
        el: '#employee_info',
        data : {},
    });

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