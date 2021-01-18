require('../bootstrap');

import Vue from "vue";
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios);

//API documentation components
Vue.component('create-apidocs', require('./components/apidocs/create-apidocs').default);
Vue.component('apidoc-element', require('./components/apidocs/apidoc-element').default);
Vue.component('apidoc-errors', require('./components/apidocs/apidoc-errors').default);
Vue.component('apidoc-element-param', require('./components/apidocs/apidoc-element-param').default);
Vue.component('apidoc-description', require('./components/apidocs/apidoc-description').default);
Vue.component('apidoc-description-table', require('./components/apidocs/apidoc-description-table').default);
Vue.component('apidoc-param-table', require('./components/apidocs/apidoc-param-table').default);
Vue.component('apidoc-error-table', require('./components/apidocs/apidoc-error-table').default);
//KIAS documentation components
Vue.component('create-kiasdocs', require('./components/kiasdocs/create-kiasdocs').default);
Vue.component('kiasdoc-element', require('./components/kiasdocs/kiasdoc-element').default);
Vue.component('kiasdoc-errors', require('./components/kiasdocs/kiasdoc-errors').default);
Vue.component('kiasdoc-element-param', require('./components/kiasdocs/kiasdoc-element-param').default);
Vue.component('kiasdoc-description', require('./components/kiasdocs/kiasdoc-description').default);
Vue.component('kiasdoc-description-table', require('./components/kiasdocs/kiasdoc-description-table').default);
Vue.component('kiasdoc-param-table', require('./components/kiasdocs/kiasdoc-param-table').default);
Vue.component('kiasdoc-error-table', require('./components/kiasdocs/kiasdoc-error-table').default);
//Common components
Vue.component('header-component', require('./components/common/header-component').default);
Vue.component('footer-component', require('./components/common/footer-component').default);
Vue.component('sidebar-component', require('./components/common/sidebar-component').default);
Vue.component('flash-message', require('./components/common/flash-message').default);
Vue.component('preloader', require('./components/common/preloader').default);
Vue.component('modal', require('./components/common/modal').default);

window.onload = function(){
    var app = new Vue({
        el: '#documentation-app',
    });
};
