<template>
	<div id="app-person-reg">
		<topBarUnLogin></topBarUnLogin>
		<div class="text-center">
			<form class="form-auth form-reg-person" @submit.prevent="createPost" method="POST">
			  	<h1 class="h3 mb-3 font-weight-normal">个人注册</h1>
			  	<alert-box v-if="errors" :errors="errors"></alert-box>
			  	<label for="name" class="sr-only">姓名</label>
			  	<input type="text" name="name" class="form-control" v-model="post.name" placeholder="您的姓名" value="" required>
			  	<label for="email" class="sr-only">邮箱</label>
			  	<input type="email" name="email" class="form-control" v-model="post.email" placeholder="邮箱" value="" required>
			  	<label for="password" class="sr-only">密码</label>
			  	<input type="password" name="password" class="form-control" v-model="post.password" placeholder="设置密码" value="" required>
			  	<div class="row mb-2">
					<div class="col text-left">
			  	   		<div class="checkbox mt-2">
			    			<label>
			      				<input type="checkbox" name="agree" v-model="post.agree" value=""> 我同意并遵守 
			      					<router-link to="/policy">
			      						《创新之城相关协议和隐私政策》
			      					</router-link>
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
	</div>
</template>

<script>
	import TopBarUnLogin  from '../../TopBarUnLogin'
	import AlertBox from '../../AlertBox'

	export default {
		data: function() {
			return {
	    		post: {
	     			name: '',
	     			email: '',
	      			password: '',
	      			agree: '',
	      			identity: 'person'
	    		},
				errors: '',
				submitted: false
			}
		},
		methods: {
			createPost: function(){

		      	this.beforeSubmit();
		      	
		      	axios.post('/register/email', this.post).then(response => {
		      		
		      		if(response.data.code == 201) {
		      			
		      			const data = response.data.data;

		      			this.$store.dispatch('SET_REG_DATA', data);
		        		this.$router.push({path: '/register/email/success'});

		      		} else {

		      			this.errors = response.data.msg;
		      			this.afterSubmit();
		      		
		      		}
		    	}).catch(error => {
		       		
		       		this.errors = error.response.data.errors;
		      		
		      		if(!this.errors) this.errors = {unknown: ["未知错误"]};

		      		this.$store.dispatch('DEL_REG_DATA');
		      		
		      		this.afterSubmit();
		      	
		      	});
    		},
    		beforeSubmit: function(){
		       	this.errors = '';
		        this.submitted = true;
    		},
    		afterSubmit: function(){
    			this.submitted = false;
    		}
		},
		components: {TopBarUnLogin, AlertBox}
	}
</script>