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
			path: '/register/email/person',
			name: '个人注册',
			components: require('../components/register/email/Person')
		},

		{
			path: '/register/email/success',
			name: '注册成功',
			components: require('../components/register/email/Success')
		},
		
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

