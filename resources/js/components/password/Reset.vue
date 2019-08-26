<template>
  <div id="app-forget-password">
    <topBarUnLogin></topBarUnLogin>
  	<div class="text-center">
  		<form class="form-auth form-login" @submit.prevent="createPost" method="POST">
  		  	<h1 class="h3 mb-3 font-weight-normal">重设密码</h1>
  		  	<alert-box v-if="errors" :errors="errors"></alert-box>
  		  	<label for="username" class="sr-only">邮箱</label>
  		  	<input type="text" id="username" class="form-control" v-model="post.email" placeholder="请输入您的邮箱" required autofocus>
  		  	<button class="btn btn-lg btn-primary btn-block mt-5" type="submit">下一步</button>
  		  	<button class="btn btn-secondary btn-block" v-on:click="back">返回</button>
  		 	<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
  		</form>
  	</div>
  </div>
</template>

<script>
  import TopBarUnLogin  from '../TopBarUnLogin'
	import AlertBox from '../AlertBox'
    window.axios = require('axios');
	window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    var token = document.head.querySelector('meta[name="csrf-token"]');
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    export default {
    	data: function() {
    		return {
	    		post: {
	     			email: ''
	    		},
    			errors: '',
    			submitted: false
    		}
  		},
  		methods: {
  			createPost: function(){
  				var self = this;
  				this.beforeSubmit();
  				axios.post('/password/reset', self.post).then(function(response) {
		        	sessionStorage.setItem('email', self.post.email);
		      		self.afterSubmit();
		        	self.$router.push({path: '/password/email'});
		    	}).catch(function (error) {
		       		self.errors = error.response.data.errors;
		      	});

  			},
  			beforeSubmit: function(){
		       	this.errors = '';
		        this.submitted = true;
    		},
    		afterSubmit: function(){
    			this.post.email = '';
    			this.submitted = false;
    		},
    		back: function() {
                this.$router.go(-1);
            }
  		},
		components: {TopBarUnLogin, AlertBox}
    }
</script>
