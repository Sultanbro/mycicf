require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios'

import VueAxios from 'vue-axios'

import TextareaAutosize from 'vue-textarea-autosize'

import VueGoogleCharts from 'vue-google-charts'


Vue.use(VueAxios, axios);

Vue.use(VueTreeselect);

Vue.component('mobile-info', require('./components/mobile/employee/mobile-info.vue').default);

Vue.component('login', require('./components/mobile/registration/login.vue').default);



Vue.component('treeselect', VueTreeselect.Treeselect);


window.onload = function(){
    var app = new Vue({
        el: '#app',
        data: {
            value: null,
            // define options
            options: null,
            image: {
                encoded: 0,
            },
        },
        mounted: function () {
            // this.getOptions();
        },
        methods: {
            getOptions: function () {
                // this.axios.post('/getBranchData', {}).then((response) => {
                //     this.options = response.data.result;
                //     this.value = response.data.value;
                // })
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
        },
        component: {

        }
    });

    var head = new Vue({
        el: '#header',
    });
};