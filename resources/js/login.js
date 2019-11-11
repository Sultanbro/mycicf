require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios'
import VueAxios from 'vue-axios'

import FlashMessage from '@smartweb/vue-flash-message'

Vue.use(FlashMessage);

Vue.use(VueAxios, axios);

Vue.component('login', require('./components/registration/login.vue').default);

window.onload = function(){
    var app = new Vue({
        el: '#login',
        data : {},
    });
};
