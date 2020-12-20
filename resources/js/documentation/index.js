require('../bootstrap');
window.Vue = require('vue');
import Vue from "vue";

window.$ = require('jquery')
window.JQuery = require('jquery')

import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios);


Vue.component('preloader', require('./components/common/preloader.vue').default);
Vue.component('header-component', require('./components/common/header-component.vue').default);
Vue.component('footer-component', require('./components/common/footer-component.vue').default);
Vue.component('sidebar-component', require('./components/common/sidebar-component.vue').default);

window.onload = function(){
    var app = new Vue({
        el: '#documentation-app',
    });
};