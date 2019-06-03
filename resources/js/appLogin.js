
require('./bootstrap');

window.Vue = require('vue');

var appLogin = new Vue({
  el: '#app-login',
  data: {
    post: {
      username: '',
      password: ''
    },
    errors: '',
    submitted: false
  },
  methods: {
    createPost: function(){
      var self = this,
          url = '',
          exp_email = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/,
          exp_mobile = /^1[3|5|7|8][0-9]\d{4,8}$/;

      if(exp_email.test(self.post.username)){
        url = '/login/email';
      }else if(exp_mobile.test(self.post.username)){
        url = '/login/mobile';
      }

      console.log(url);

      if(!url){
        this.errors = '▪ 请输入正确格式email或手机号';
        return false;
      }

      axios.post(url, self.post).then(function(response) {
        // form submission successful, reset post data and set submitted to true
        self.post = {
          username: '',
          password: ''
        };
        // clear previous form errors
        self.errors = '';
        self.submitted = true;
        self.gotoURL('/home');

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
