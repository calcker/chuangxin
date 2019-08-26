
const state = {
	id:  sessionStorage.getItem('id') || '',
	key: localStorage.getItem('key') || '',
	name: sessionStorage.getItem('name') || '',
	api_token: sessionStorage.getItem('api_token') || '',
	remember_token: localStorage.getItem('remember_token') || ''
};

const getters = {
	isLoggedIn: state => !!state.id,
	userInfo: state => {
		return {
			id: state.id,
			key: state.key,
			name: state.name
		}
	}
};

const mutations = {

	set (state, data) {
		state.id = data.id;
		state.key = data.key;
		state.name = data.name;
		state.api_token = data.api_token;
		state.remember_token = data.remember_token;

		sessionStorage.setItem('id', data.id);
		localStorage.setItem('key', data.key);
		sessionStorage.setItem('name', data.name);
		sessionStorage.setItem('api_token', data.api_token);
		localStorage.setItem('remember_token', data.remember_token);
	},

	del (state) {
		state.id = '';
		state.key = '';
		state.name = '';
		state.api_token = '';
		state.remember_token = '';

		sessionStorage.removeItem('id');
		localStorage.removeItem('key');
		sessionStorage.removeItem('name');
		sessionStorage.removeItem('api_token');
		localStorage.removeItem('remember_token');
	}
};

const actions = {

	SET_AUTH_DATA ({commit}, data) {

		commit('set', data);
    },

    DEL_AUTH_DATA ({commit}, data) {

		commit('del');
    }
	
};

const auth =  {
	state,
	getters,
	mutations,
	actions
}

export default auth;