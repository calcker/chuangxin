import Vue from 'vue'
import VueRouter from 'vue-router'
import EmailVerify from './components/pages/EmailVerify'

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter);

Vue.component('AlertBox', require('./components/AlertBox.vue').default);
//Vue.component('EmailVerify', require('./components/EmailVerify.vue').default);

const router = new VueRouter({
  routes: [
    {path: '/verify', component: EmailVerify}
  ]
});

var appPersonReg = new Vue({
  el: '#app-person-reg',
  data: {
    post: {
      name: '',
      email: '',
      password: ''
    },
    errors: '',
    submitted: false
  },
  methods: {
    createPost: function(){
      var self = this;
      axios.post('/register/person', self.post).then(function(response) {
        // form submission successful, reset post data and set submitted to true
        self.post = {
          name: '',
          email: '',
          password: ''
        };
        // clear previous form errors
        self.errors = '';
        self.submitted = true;
        //router.push({path: 'verify'});
        //window.location.href = '/register/pending';
      }).catch(function (error) {
        // form submission failed, pass form errors to errors array
        self.errors = error.response.data.errors;
      });
    }
  }
});
