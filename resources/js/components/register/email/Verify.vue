<template>
    <div v-if="success == 'success'" class="email-verify-success alert alert-success" role="alert">
        <h4 class="alert-heading">恭喜您, 验证成功</h4>
        <hr>
        <p>我们一起, 改变世界!</p>
        <hr>
        <router-link to="/login" class="btn btn-primary btn-block">立即登录您的账号</router-link>
    </div>
    <div v-else-if="success == 'failure'" class="email-verify-failure alert alert-danger" role="alert">
        <h4 class="alert-heading">抱歉, 验证失败</h4>
        <hr>
        <p>{{ error }}</p>
        <div class="text-right">
            <a class="btn btn-outline-danger" href="/">返回首页</a>
        </div>
    </div>
</template>

<style type="text/css">
    .email-verify-success, .email-verify-failure {
        max-width: 400px;
        padding: 40px;
        margin: 0 auto;
    }
</style>

<script>
    export default {
    	data: function() {
    		return {
                error: '',
                success: ''
    		}
  		},
        mounted: function() {
            var self = this,
                token = this.$route.params.token;
            axios.get('/register/email/verify/' + token).then(function(response) {
                if(response.data.code = 201){
                    self.success = 'success';
                }else{
                    self.success = 'failure';
                    self.error = 'token错误';
                }
            }).catch(function (error) {
                self.success = 'failure';
                self.error = '未知错误';
            });
        }
    }
</script>