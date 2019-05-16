

require('./bootstrap');

window.Vue = require('vue');

var app = new Vue({
  el: '#app',
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
    createPost: function () {
      var self = this;
      axios.post('/register/person', self.post).then(function(response) {
        // form submission successful, reset post data and set submitted to true
        self.post = {
          name: '',
          email: {},
          password: ''
        };
        // clear previous form errors
        self.errors = '';
        self.submitted = true;
      }).catch(function (error) {
        // form submission failed, pass form errors to errors array

        console.log(error.response.data.errors);
        self.errors = self.printErrors(error.response.data.errors);
      });
    },
    printErrors: function(errors){

    	return errors.email[0];

    }
  }
}); 
