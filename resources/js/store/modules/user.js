export default {
    namespaced: true,
    state: {
        user: null,
    },
    mutations: {
        setAuthUser(state, user) {
            state.user = user;
        }
    },
    getters: {
        authUser: state => {
            return state.user;
        }
    },
    actions: {
        fetchAuthUser({commit}) {
            axios.get('/api/auth-user')
                .then(res => {
                    commit('setAuthUser', res.data);
                })
                .catch(error => {
                    console.log('Unable to fetch auth user');
                });
        }
    }
}
