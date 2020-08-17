export default {
    namespaced: true,
    state: {
        links: [],
    },
    mutations: {
        setLinks (state, data) {
            state.links = data
        },
    },
    getters: {
        links (state) {
            return state.links
        }
    },
    actions: {
        async createLink({ commit, dispatch }, payload) {
            await axios.post('/api/links', payload)
            dispatch('getLinks')
        },

        async getLinks({ commit }) {
            let response = await axios.get('/api/links')
            commit('setLinks', response.data.data)
        },
    }
}
