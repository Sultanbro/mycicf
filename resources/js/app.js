require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios'

import VueAxios from 'vue-axios'

import TextareaAutosize from 'vue-textarea-autosize'

import FlashMessage from '@smartweb/vue-flash-message'

import linkify from 'vue-linkify'

import VueGoogleCharts from 'vue-google-charts'

import {EmojiPickerPlugin} from 'vue-emoji-picker'

import VTooltip from 'v-tooltip'

import vmodal from 'vue-js-modal'

import VueTheMask from 'vue-the-mask'

const moment = require('vue-moment');

Vue.use(moment);

Vue.use(vmodal);

Vue.use(FlashMessage);

Vue.use(EmojiPickerPlugin);

Vue.use(FlashMessage);

Vue.use(VueGoogleCharts);

Vue.use(VueAxios, axios);

Vue.use(TextareaAutosize);

Vue.use(VTooltip);

Vue.use(VueTheMask);

Vue.directive('linkified', linkify);

// Vue.component('login', require('./components/registration/login.vue').default);

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

Vue.component('image-viewer', require('./components/common/image-viewer.vue').default);

Vue.component('news-birthday', require('./components/news/news-birthday.vue').default);

Vue.component('simple-birthday', require('./components/news/simpleBirthday.vue').default);

Vue.component('test', require('./components/test.vue').default);
Vue.component('parse-opu', require('./components/parse/parse-opu.vue').default);

Vue.component('parse-info', require('./components/parse/parse-info.vue').default);

Vue.component('parse-indicators', require('./components/parse/parse-indicators.vue').default);

Vue.component('parse-top', require('./components/parse/parse-top.vue').default);


Vue.component('express-calc', require('./components/product/express.vue').default);

Vue.component('full-quotation-calc', require('./components/product/full-quotation.vue').default);

Vue.component('participant', require('./components/product/participants.vue').default);

Vue.component('participant-create', require('./components/product/participantCreate.vue').default);

Vue.component('period', require('./components/product/period.vue').default);

Vue.component('participant-form', require('./components/product/participantForm.vue').default);

Vue.component('agr-attributes', require('./components/product/attributes.vue').default);

Vue.component('agr-clause', require('./components/product/agrclause.vue').default);

Vue.component('agr-object', require('./components/product/agrobjects.vue').default);

Vue.component('agrobjcar', require('./components/product/agrobjcar.vue').default);

Vue.component('new-vehicle', require('./components/product/newVehicle.vue').default);

Vue.component('upload-docs', require('./components/product/uploadDocs.vue').default);

Vue.component('printable-form', require('./components/product/printableForm.vue').default);

Vue.component('quotation-list', require('./components/product/quotation-list.vue').default);

Vue.component('online-inspection', require('./components/product/online-inspection.vue').default);

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
            'd-player': VueDPlayer,
            //'compa' : compa
        }
    });

    var head = new Vue({
        el: '#header',
    });
};
