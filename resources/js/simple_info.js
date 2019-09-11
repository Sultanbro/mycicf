window.Vue = require('vue');

import axios from 'axios'

import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios);

Vue.component('simple-info', require('./components/employee/simple-info.vue').default);

window.onload = function(){
    var app = new Vue({
        el: '#simple-info',
        data : {},
    });
};