import Vue from 'vue'
import Vuex from 'vuex'
import auth from './modules/auth'
import reg from './modules/reg'

Vue.use(Vuex)

const store =  new Vuex.Store({
	modules: {
		auth, reg
	}

})

export default store;

