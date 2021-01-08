require('../bootstrap');

import Vue from "vue";
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios);

Vue.component('preloader', require('./components/common/preloader.vue').default);
Vue.component('modal', require('./components/common/modal.vue').default);
Vue.component('apidoc-element', require('./components/common/apidoc-element').default);
Vue.component('apidoc-errors', require('./components/common/apidoc-errors').default);
Vue.component('apidoc-element-param', require('./components/common/apidoc-element-param').default);
Vue.component('apidoc-description', require('./components/common/apidoc-description').default);
Vue.component('apidoc-description-table', require('./components/common/apidoc-description-table').default);
Vue.component('apidoc-param-table', require('./components/common/apidoc-param-table').default);
Vue.component('apidoc-error-table', require('./components/common/apidoc-error-table').default);
Vue.component('kiasdoc-element', require('./components/common/kiasdoc-element').default);
Vue.component('kiasdoc-errors', require('./components/common/kiasdoc-errors').default);
Vue.component('kiasdoc-element-param', require('./components/common/kiasdoc-element-param').default);
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
