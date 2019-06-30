<template>
    <div class="email-register-success alert alert-success" role="alert">
        <h4 class="alert-heading">恭喜您, 注册成功</h4>
        <hr>
        <p>亲爱的, <strong>{{ name }}</strong></p>
        <p>感谢您的加入</p>
        <p>请尽快登录<a :href="'http://' + gotoEmail" class="alert-link"> 您的邮箱</a> ( {{ email }} ), 完成邮箱验证</p>
        <hr>
        <a class="btn btn-primary btn-block" :href="'http://' + gotoEmail">
            登录我的邮箱 {{ gotoEmail }}
        </a>
    </div>
</template>

<style type="text/css">
    .email-register-success {
        max-width: 400px;
        padding: 40px;
        margin: 0 auto;
    }
</style>

<script>
    export default {
    	data: function() {
    		return {
    			name: '',
    			email: ''
    		}
  		},
    	created: function() {
    		var name = sessionStorage.getItem('name'),
                email = sessionStorage.getItem('email');
    		if(!email || !name) this.$router.push({path: '/register/email/person'});
    		this.name = name;
    		this.email = email;
        },
        computed: {
        	gotoEmail: function() {
        		var $t = this.email.split('@')[1];
                $t = $t.toLowerCase();
                if ($t == '163.com') {
                    return 'mail.163.com';
                } else if ($t == 'vip.163.com') {
                    return 'vip.163.com';
                } else if ($t == '126.com') {
                    return 'mail.126.com';
                } else if ($t == 'qq.com' || $t == 'vip.qq.com' || $t == 'foxmail.com') {
                    return 'mail.qq.com';
                } else if ($t == 'gmail.com') {
                    return 'mail.google.com';
                } else if ($t == 'sohu.com') {
                    return 'mail.sohu.com';
                } else if ($t == 'tom.com') {
                    return 'mail.tom.com';
                } else if ($t == 'vip.sina.com') {
                    return 'vip.sina.com';
                } else if ($t == 'sina.com.cn' || $t == 'sina.com') {
                    return 'mail.sina.com.cn';
                } else if ($t == 'tom.com') {
                    return 'mail.tom.com';
                } else if ($t == 'yahoo.com.cn' || $t == 'yahoo.cn') {
                    return 'mail.cn.yahoo.com';
                } else if ($t == 'tom.com') {
                    return 'mail.tom.com';
                } else if ($t == 'yeah.net') {
                    return 'www.yeah.net';
                } else if ($t == '21cn.com') {
                    return 'mail.21cn.com';
                } else if ($t == 'hotmail.com') {
                    return 'www.hotmail.com';
                } else if ($t == 'sogou.com') {
                    return 'mail.sogou.com';
                } else if ($t == '188.com') {
                    return 'www.188.com';
                } else if ($t == '139.com') {
                    return 'mail.10086.cn';
                } else if ($t == '189.cn') {
                    return 'webmail15.189.cn/webmail';
                } else if ($t == 'wo.com.cn') {
                    return 'mail.wo.com.cn/smsmail';
                } else if ($t == '139.com') {
                    return 'mail.10086.cn';
                } else {
                    return 'mail.' + $t;
                }
        	}
        }
    }
</script>