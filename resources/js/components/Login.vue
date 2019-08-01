<template>
	<div class="text-center">
		<form id="app-login" class="form-auth form-login" @submit.prevent="createPost" method="POST">
		  	<h1 class="h3 mb-3 font-weight-normal">登录</h1>
		  	<alert-box v-if="errors" :errors="errors"></alert-box>
		  	<label for="username" class="sr-only">邮箱</label>
		  	<input type="text" id="username" class="form-control" v-model="post.email" placeholder="邮箱" required autofocus>
		  	<label for="password" class="sr-only">密码</label>
		  	<input type="password" id="password" class="form-control" v-model="post.password" placeholder="密码" required>
		  	<div class="row mb-2">
				<div class="col text-left">
		  	   		<div class="checkbox mt-2">
		    			<label>
		      				<input type="checkbox" name="remember" v-model="post.remember" value=""> 记住密码
		    			</label>
		  			</div>
		  		</div>
		  		<div class="col text-right">
		  			<router-link to="/password/reset" class="btn btn-link">忘记密码</router-link>
		  		</div>
		  	</div>
		  	<button class="btn btn-lg btn-primary btn-block" type="submit" :disabled="submitted">登录</button>
		  	<router-link to="/register/email/person" class="btn btn-secondary btn-block">注册</router-link>
		 	<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
		</form>
	</div>
</template>

<script>
	import AlertBox from './AlertBox'

    export default {
    	data: function() {
    		return {
	    		post: {
	     			email: '',
	      			password: '',
	      			remember: ''
	    		},
    			errors: '',
    			submitted: false
    		}
  		},

  		methods: {
			createPost: function(){

		      	this.beforeSubmit();

		      	axios.post('login', this.post).then(response => {

		      		if(response.data.code == 201) {

		      			const data = response.data.data;

		      			this.$store.dispatch('SET_AUTH_DATA', data);
		      			this.$router.push({ path: '/home' });

		      		} else {

		      			this.errors = response.data.msg;
		      			this.afterSubmit();
		      		}


		      	}).catch(error => {

		       		this.errors = error.response.data.errors;

		       		if(!this.errors) this.errors = {unknown: ["未知错误"]};

      				this.$store.dispatch('DEL_AUTH_DATA');

      				this.afterSubmit();

        		});

		      	
				/*
		      	this.$store.dispatch('Login', self.post).then(() => {
		      		//this.$router.push({ path: '/home' });
				}).catch((error) => {
				    console.log(error.response);
		      		this.afterSubmit();
				});

		      	axios.post('/login/email', self.post).then(function(response) {
		      		if(response.data.code == 201){
		      			self.$store.commit('SET_USER', response.data.data);


		      		}else{
		      			self.errors = error.response.data.msg;
		      			self.afterSubmit();
		      		}


		        	//sessionStorage.setItem('email', self.post.email);
		      		//sessionStorage.setItem('name', self.post.name);
		      		//console.log(response);
		      		self.afterSubmit();
		        	//self.$router.push({path: '/home'});
		    	}).catch(function (error) {
		       		self.errors = error.response.data.errors;
		      	});
		      	*/
    		},
    		beforeSubmit: function(){
		       	this.errors = '';
		        this.submitted = true;
    		},
    		afterSubmit: function(){
    			this.submitted = false;
    		}
		},
		components: {AlertBox}
    }
</script>
