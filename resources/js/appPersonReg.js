
require('./bootstrap');

window.Vue = require('vue');

Vue.component('alert-box', require('./components/AlertBox.vue').default);

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
        window.location.href = '/register/pending';
      }).catch(function (error) {
        // form submission failed, pass form errors to errors array
        self.errors = error.response.data.errors;
      });
    }
  }
});
