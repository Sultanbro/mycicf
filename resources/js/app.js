require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios'

import VueAxios from 'vue-axios'

import TextareaAutosize from 'vue-textarea-autosize'

import FlashMessage from '@smartweb/vue-flash-message'

import linkify from 'vue-linkify'

import VueGoogleCharts from 'vue-google-charts'

import {EmojiPickerPlugin} from 'vue-emoji-picker'

Vue.use(FlashMessage);

Vue.use(EmojiPickerPlugin);

Vue.use(FlashMessage);

Vue.use(VueGoogleCharts);

Vue.use(VueAxios, axios);

Vue.use(TextareaAutosize);

Vue.directive('linkified', linkify);

Vue.component('login', require('./components/registration/login.vue').default);

Vue.component('treeselect', VueTreeselect.Treeselect);

Vue.component('simple-info', require('./components/employee/simple-info.vue').default);

Vue.component('info', require('./components/employee/info.vue').default);

Vue.component('centcoins', require('./components/centcoins/centcoins.vue').default);

Vue.component('operations-history', require('./components/centcoins/operations-history.vue').default);

Vue.component('spend-centcoins', require('./components/centcoins/spend-centcoins.vue').default);

Vue.component('post', require('./components/news/post.vue').default);

Vue.component('news-post', require('./components/news/news-post.vue').default);

Vue.component('news-comment', require('./components/news/news-comment.vue').default);

Vue.component('news-birthday', require('./components/news/news-birthday.vue').default);

Vue.component('user-image', require('./components/employee/userImage.vue').default);

Vue.component('coordination', require('./components/employee/coordination.vue').default);

Vue.component('search', require('./components/documentation/search.vue').default);

Vue.component('coordination-modal', require('./components/coordination/modal.vue').default);

Vue.component('motivation', require('./components/employee/motivation.vue').default);

Vue.component('name', require('./components/name/name.vue').default);

Vue.component('library-doc', require('./components/name/library-doc.vue').default);

Vue.component('library-svg', require('./components/name/library-svg.vue').default);

Vue.component('parse-charts', require('./components/parse/parse-charts.vue').default);

Vue.component('main-data-charts', require('./components/parse/main-data-charts.vue').default);

Vue.component('mobile-info', require('./components/mobile/employee/mobile-info.vue').default);

Vue.component('emoji-component', require('./components/news/emoji-component.vue').default);

Vue.component('report', require('./components/employee/report.vue').default);

Vue.component('rating', require('./components/employee/rating.vue').default);

Vue.component('colleagues', require('./components/colleagues/colleagues.vue').default);

Vue.component('colleagues-info', require('./components/colleagues/colleagues-info.vue').default);

Vue.component('colleague-info', require('./components/employee/colleague-info.vue').default);

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
