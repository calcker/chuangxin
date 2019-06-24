<template>
	<form id="app-login" class="form-auth form-login" @submit.prevent="createPost" method="POST">
	  <h1 class="h3 mb-3 font-weight-normal">登录</h1>
	  <alert-box v-if="errors" :errors="errors"></alert-box>
	  <label for="username" class="sr-only">邮箱</label>
	  <input type="text" id="username" class="form-control" v-model="post.email" placeholder="邮箱" required autofocus>
	  <label for="password" class="sr-only">密码</label>
	  <input type="password" id="password" class="form-control" v-model="post.password" placeholder="密码" required>
	  <div class="checkbox mb-3">
	    <label>
	      <input type="checkbox" value="remember-me"> 记住密码
	    </label>
	  </div>
	  <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
	  <router-link to="/register/person">注册</router-link>
	  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
	</form>
</template>

<script>
    export default {
    	data: function() {
    		return {
	    		post: {
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