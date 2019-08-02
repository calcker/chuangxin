
require('./bootstrap');

window.Vue = require('vue');

//import VuejsDialog from 'vuejs-dialog'
import router from './router/index'
import store from './store/index'

//Vue.use(VuejsDialog)

new Vue({
  el: '#app',
  router,
  store
});