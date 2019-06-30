<template>
    <div v-if="success" class="email-verify alert alert-success" role="alert">
        <h4 class="alert-heading">恭喜您, 验证成功</h4>
        <hr>
        <p>期待与您一起, 改变世界!</p>
        <hr>
        <router-link to="/login" class="btn btn-primary btn-block">立即登录您的账号</router-link>
    </div>
    <div v-else>
        <alert-box v-if="errors" :errors="errors"></alert-box>
    </div>
</template>

<style type="text/css">
    .email-verify {
        max-width: 400px;
        padding: 40px;
        margin: 0 auto;
    }
</style>

<script>
    import AlertBox from '../../AlertBox'
    window.axios = require('axios');
    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    export default {
    	data: function() {
    		return {
                post: {
                    //token: this.$route.qurey.token
                },
                errors: '',
                success: false
    		}
  		},
        mounted: function() {
            console.log(this.$route.params.token);
        },
    	created: function() {
            var self = this;
            /*
            console.log(this.$route.qurey.token);
		 	axios.post('/register/email/verify', this.post).then(function(response) {
	        	self.success = true;

                //sessionStorage.setItem('email', self.post.email);
	      		//sessionStorage.setItem('name', self.post.name);
	      		//self.afterSubmit();
	        	//self.$router.push({path: '/register/email/success'});
	    	}).catch(function (error) {
	       		self.errors = error.response.data.errors;
	      	});
            */
        },
        components: {AlertBox}
    }
</script>