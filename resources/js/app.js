

require('./bootstrap');

window.Vue = require('vue');

var app = new Vue({
  el: '#app',
  data: {
    post: {
      personName: '',
      email: '',
      password: ''
    },
    errors: [],
    submitted: false
  },
  methods: {
    createPost: function () {
      var self = this;
      axios.post('/register/person', self.post).then(function(response) {
        // form submission successful, reset post data and set submitted to true
        self.post = {
          title: '',
          body: ''
        };

        // clear previous form errors
        self.errors = '';
        self.submitted = true;
      }).catch(function (error) {
        // form submission failed, pass form errors to errors array
        self.errors = error.response.data;
      });
    }
  }
}); 
