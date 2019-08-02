import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store/index'

Vue.use(VueRouter);


const routes = [
	{
		path: '/login',
		name: '登录',
		components: require('../components/Login')
	},
	
	{
		path: '/policy',
		name: '用户相关协议及隐私政策',
		components: require('../components/Policy')
	},

	{
		path: '/home',
		name: '我的空间',
		components: require('../components/home/Home'),
		meta: {
			requireAuth: true			
		}
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

	{
		path: '/register/email/verify/:token',
		name: '邮箱验证',
		components: require('../components/register/email/Verify')
	},

	{
		path: '/password/reset',
		name: '重设密码',
		components: require('../components/password/Reset')
	},
	
	{
		path: '*',
		redirect: '/login'
	}

];

const router =  new VueRouter({
	routes
})

router.beforeEach((to, from, next) => {

	if(to.meta.requireAuth) {

		if(store.getters.isLoggedIn) {

			next();
		
		} else {

			next({
				path: '/login',
				query: {redirect: to.fullPath}
			});
		}

	} else {

		next();

	}

});


router.afterEach((to, from) => {

	window.document.title = '创新之城 - ' + to.name;

});

export default router;

