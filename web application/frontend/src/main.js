// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import {router} from './router'
import iView from 'iview'
import locale from 'iview/dist/locale/en-US';
import 'iview/dist/styles/iview.css'
//import * as lib from './libs'
import {request, tips} from "./api";

import store from './store'

Vue.use(iView,{locale});


Vue.prototype.$request = request;
Vue.prototype.$tips = tips;
/* eslint-disable no-new */
new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});
