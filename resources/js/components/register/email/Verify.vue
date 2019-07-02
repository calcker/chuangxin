<template>
    <div v-if="success" class="email-verify-success alert alert-success" role="alert">
        <h4 class="alert-heading">恭喜您, 验证成功</h4>
        <hr>
        <p>我们一起, 改变世界!</p>
        <hr>
        <router-link to="/login" class="btn btn-primary btn-block">立即登录您的账号</router-link>
    </div>
    <div v-else>
        <alert-box v-if="errors" :errors="errors"></alert-box>
    </div>
</template>

<style type="text/css">
    .email-verify-success {
        max-width: 400px;
        padding: 40px;
        margin: 0 auto;
    }
</style>

<script>
    import AlertBox from '../../AlertBox'
    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    var token = document.head.querySelector('meta[name="csrf-token"]');
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    window.axios = require('axios');
    export default {
    	data: function() {
    		return {
                errors: '',
                success: false
    		}
  		},
        mounted: function() {
            var token = this.$route.params.token;
            axios.get('/register/email/verify/' + token).then(function(response) {
                console.log(response.data.status);
                //if(response.statues)
                //self.success = true;
            }).catch(function (error) {

                console.log(error); 
                console.log('token错误');
                self.errors = '未知错误';
            });
        },
        components: {AlertBox}
    }
</script>