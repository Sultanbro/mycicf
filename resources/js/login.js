require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios);

Vue.component('login', require('./components/registration/login.vue').default);

window.onload = function(){
    var app = new Vue({
        el: '#login',
        data : {},
    });
};
