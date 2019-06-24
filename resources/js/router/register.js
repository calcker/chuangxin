import Vue from 'vue'
import VueRouter from 'vue-router'
import Start from '../components/register/email/Start'
import Wait from '../components/register/email/Wait'

Vue.use(VueRouter)

export default new VueRouter({
	routes: [
		{
			path: '/start',
			name: 'Start',
			component:  Start
		},
		{
			path: '/wait',
			name: 'Wait',
			component:  Wait
		},
		{	path: '*', 
			redirect: '/start'
		}

	]
})