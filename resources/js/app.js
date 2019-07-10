
require('./bootstrap');

window.Vue = require('vue');

import VuejsDialog from 'vuejs-dialog'
import router from './router/index'
import store from './store/index'

Vue.use(VuejsDialog)

var app = new Vue({
  el: '#app',
  router: router,
  store: store
});