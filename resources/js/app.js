window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    window.bootstrap = require('bootstrap');

} catch (e) { }
window.Vue = require('vue').default;

require('./bootstrap')
window.Errors = require('./validate').default;
import JSONView from 'vue-json-component';
Vue.use(JSONView);

import VueJsonPretty from 'vue-json-pretty';
import 'vue-json-pretty/lib/styles.css';

Vue.component("vue-json-pretty", VueJsonPretty);
import VueMask from 'v-mask'
Vue.use(VueMask);