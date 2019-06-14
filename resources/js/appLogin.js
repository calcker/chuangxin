
require('./bootstrap');

window.Vue = require('vue');

Vue.component('alert-box', require('./components/AlertBox.vue').default);

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

      if(!url){
        this.errors = {email: ["请输入正确格式email或手机号"]};
        return false;
      }

      axios.post(url, self.post).then(function(response) {
        self.post = {
          username: '',
          password: ''
        };
        self.errors = '';
        self.submitted = true;
        window.location.href = '/home';
      }).catch(function(error){
        self.errors = error.response.data.errors;
      });
    }
  }
});

