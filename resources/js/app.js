import Vue from 'vue'
import VueRouter from 'vue-router'
import router from './router/index'

Vue.use(VueRouter);

var app = new Vue({
  el: '#app',
  router: router
});