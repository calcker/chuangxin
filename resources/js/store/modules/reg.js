
const state = {
	email:  sessionStorage.getItem('email') || '',
	name: sessionStorage.getItem('name') || ''
};

const getters = {
	regInfo: state => {
		return {
			email: state.email,
			name: state.name
		}
	}
};

const mutations = {

	set (state, data) {
		state.email = data.email;
		state.name = data.name;
		sessionStorage.setItem('email', data.email);
		sessionStorage.setItem('name', data.name);
	},

	del (state) {
		state.email = '';
		state.name = '';
		sessionStorage.removeItem('email');
		sessionStorage.removeItem('name');
	}
};

const actions = {

	SET_REG_DATA ({commit}, data) {

		commit('set', data);
    },

    DEL_REG_DATA ({commit}, data) {

		commit('del');
    }
	
};

const reg =  {
	state,
	getters,
	mutations,
	actions
}

export default reg;