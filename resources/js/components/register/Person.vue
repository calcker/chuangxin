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
	  	<div class="row mt-2">
	  		<div class="col"><router-link to="/register/company">企业注册</router-link></div>
			<div class="col"><router-link to="/register/org">非盈利组织注册</router-link></div>
			<!--
	    	<div class="col"><a href="/register/company" class="btn btn-sm btn-link">企业注册</a></div>
	    	<div class="col"><a href="/register/org" class="btn btn-sm btn-link">非盈利组织注册</a></div>
	  		-->
	  	</div>
	 	<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
	</form>
</template>

<script>
    export default {
    	data: function() {
    		return {
	    		post: {
	     			name: '',
	     			email: '',
	      			password: ''
	    		},
    			errors: '',
    			submitted: false
    		}
  		},
    	mounted: function() {
            //console.log('Component mounted.');
        },
        props: ['email']
    }
</script>