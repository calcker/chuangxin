import Vue from 'vue'
import VueRouter from 'vue-router'
//import Start from '../components/register/email/Start'
///import Wait from '../components/register/email/Wait'

Vue.use(VueRouter)

const router =  new VueRouter({
	routes: [
		{
			path: '/login',
			name: '登录',
			components: require('../components/Login')
		},

		{
			path: '/my',
			name: '我的空间',
			components: require('../components/My')
		}

		{
			path: '/register/email/person',
			name: '个人注册',
			components: require('../components/register/email/Person')
		},

		{
			path: '/register/email/success',
			name: '注册成功',
			components: require('../components/register/email/Success')
		},

		{
			path: '/register/email/verify/:token',
			name: '邮箱验证',
			components: require('../components/register/email/Verify')
		},

		{
			path: '/settings/profile/Person',
			name: '设置-个人资料',
			components: require('../components/settings/profile/Person')
		}
		/*
		{
			path: '/wait',
			name: 'Wait',
			components:  Wait
		}*/
		{	
			path: '*', 
			redirect: '/login'
		}

	]
})

router.beforeEach((to, from, next) => {
	window.document.title = '创新之城 - ' + to.name;
	next();
});

export default router;0.

