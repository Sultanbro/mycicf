require('../bootstrap');

import Vue from "vue";
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios);

Vue.component('preloader', require('./components/common/preloader.vue').default);
Vue.component('modal', require('./components/common/modal.vue').default);
Vue.component('apidoc-element', require('./components/common/apidoc-element').default);
Vue.component('create-apidocs', require('./components/common/create-apidocs.vue').default);
Vue.component('create-kiasdocs', require('./components/common/create-kiasdocs.vue').default);
Vue.component('header-component', require('./components/common/header-component.vue').default);
Vue.component('footer-component', require('./components/common/footer-component.vue').default);
Vue.component('sidebar-component', require('./components/common/sidebar-component.vue').default);

window.onload = function(){
    var app = new Vue({
        el: '#documentation-app',
    });
};
