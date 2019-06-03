
require('./bootstrap');

window.Vue = require('vue');

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
        self.gotoURL('/register/pending');

      }).catch(function (error) {
        // form submission failed, pass form errors to errors array
        self.showErrors(error.response.data.errors);
      });
    },
    showErrors: function(errors){
      this.errors = '';
    	for(var i in errors){
        this.errors += '▪ ' + errors[i] + '\n';
      }
    },
    gotoURL: function(url){
      window.location.href = url;
    }
  }
});
