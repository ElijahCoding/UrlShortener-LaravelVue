import Vue from 'vue';
import Vuex from 'vuex';
import link from './modules/link';
import user from './modules/user';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        link, user
    },
    state: {
        title: 'Welcome',
    },
    mutations: {
        setTitle(state, title) {
            state.title = title;

            document.title = state.title;
        }
    },
    getters: {
        pageTitle: state => {
            return state.title;
        }
    },
    actions: {
        setPageTitle({commit, state}, title) {
            commit('setTitle', title);
        }
    },
});
