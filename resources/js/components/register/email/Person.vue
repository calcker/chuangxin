<template>
	<div class="text-center">
		<form id="app-person-reg" class="form-auth form-reg-person" @submit.prevent="createPost" method="POST">
		  	<h1 class="h3 mb-3 font-weight-normal">个人注册</h1>
		  	<alert-box v-if="errors" :errors="errors"></alert-box>
		  	<label for="name" class="sr-only">姓名</label>
		  	<input type="text" name="name" class="form-control" v-model="post.name" placeholder="您的姓名" value="" required>
		  	<label for="email" class="sr-only">邮箱</label>
		  	<input type="email" name="email" class="form-control" v-model="post.email" placeholder="邮箱" value="" required>
		  	<label for="password" class="sr-only">密码</label>
		  	<input type="password" name="password" class="form-control" v-model="post.password" placeholder="密码" value="" required>
		  	<div class="row mb-2">
				<div class="col text-left">
		  	   		<div class="checkbox mt-2">
		    			<label>
		      				<input type="checkbox" value="remember-me"> 我同意并遵守网站相关协议和隐私政策
		    			</label>
		  			</div>
		  		</div>
		  	</div>
		  	<button class="btn btn-lg btn-primary btn-block" type="submit" :disabled="submitted">注册</button>
		  	<router-link to="/login" class="btn btn-secondary btn-block">已有账号</router-link>
		  	<div class="row mt-2">
		  		<div class="col"><router-link to="/register/email/company" class="btn btn-link">企业注册</router-link></div>
				<div class="col"><router-link to="/register/email/org" class="btn btn-link">非盈利组织</router-link></div>
		  	</div>
		 	<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
		</form>
	</div>
</template>

<script>
	import AlertBox from '../../AlertBox'
	window.axios = require('axios');
	window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    var token = document.head.querySelector('meta[name="csrf-token"]');
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
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
		      	this.beforeSubmit();
		      	axios.post('/register/email', self.post).then(function(response) {
		        	sessionStorage.setItem('email', self.post.email);
		      		sessionStorage.setItem('name', self.post.name);
		      		self.afterSubmit();
		        	self.$router.push({path: '/register/email/success'});
		    	}).catch(function (error) {
		       		self.errors = error.response.data.errors;
		      		self.afterSubmit();
		      	});
    		},
    		beforeSubmit: function(){
		       	this.errors = '';
		        this.submitted = true;
    		},
    		afterSubmit: function(){
    			this.post.email = '';
    			this.post.name = '';
    			this.post.password = '';
    			this.submitted = false;
    		}
		},
		components: {AlertBox}
	}
</script>