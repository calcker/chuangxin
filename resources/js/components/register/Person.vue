<template>
	<form id="app-person-reg" class="form-auth form-reg-person" @submit.prevent="createPost" method="POST">
	  	<h1 class="h3 mb-3 font-weight-normal">个人注册</h1>
	  	<alert-box v-if="errors" :errors="errors"></alert-box>
	  	<label for="name" class="sr-only">姓名</label>
	  	<input type="text" name="name" class="form-control" v-model="post.name" placeholder="您的姓名" value="" required>
	  	<label for="email" class="sr-only">邮箱</label>
	  	<input type="email" name="email" class="form-control" v-model="post.email" placeholder="邮箱" value="" required>
	  	<label for="password" class="sr-only">密码</label>
	  	<input type="password" name="password" class="form-control" v-model="post.password" placeholder="密码" value="" required>
	  	<button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
	  	<router-link to="/login" class="btn btn-secondary btn-block">已有账号</router-link>
	  	<div class="row mt-2">
	  		<div class="col"><router-link to="/register/company" class="btn btn-link">企业注册</router-link></div>
			<div class="col"><router-link to="/register/org" class="btn btn-link">非盈利组织</router-link></div>
	  	</div>
	 	<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
	</form>
</template>

<script>
	import AlertBox from '../AlertBox'
	window.axios = require('axios');
	window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
	export default {
		data: function() {
			return {
	    		post: {
	     			name: '',
	     			email: '',
	      			password: '',
	      			identity: 'person'
	    		},
				errors: '',
				submitted: false
			}
		},
		methods: {
			createPost: function(){
		      var self = this;
		      axios.post('/register', self.post).then(function(response) {
		        // form submission successful, reset post data and set submitted to true
		        self.post = {
		          name: '',
		          email: '',
		          password: ''
		        };
		        // clear previous form errors
		        self.errors = '';
		        self.submitted = true;
		        sessionStorage.setItem('emailRegister', self.post);
		        router.push({path: '/register/email-registered'});
		        //window.location.href = '/register/pending';
		      }).catch(function (error) {
		        // form submission failed, pass form errors to errors array
		        self.errors = error.response.data.errors;
		      });
    		}
		},
		components: {AlertBox}
	}
</script>