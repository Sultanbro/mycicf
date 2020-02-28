require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios'

import VueAxios from 'vue-axios'

Vue.use(require('vue-moment'));

Vue.use(VueAxios, axios);

Vue.component('agreement', require('./components/product/agreement.vue').default);
Vue.component('agr-attributes', require('./components/product/attributes.vue').default);
window.onload = function(){
    var app = new Vue({
        el: '#order',
    });
};
