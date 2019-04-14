import Vue from 'vue';

import Vuex from 'vuex';

Vue.use(Vuex);

//import getters from './getters.js';

//import actions from './actions.js';


export default new Vuex.Store({

    modules: {

    },

    state: {

        projectTitle: null,
        projectTeam: []
    },
    mutations: {
        addProjectTitle(state, payload) {
            state.projectTitle = payload
        },
        addProjectTeam(state, payload) {
            state.projectTeam = payload
        }
    },
    actions: {
        ADD_PROJECT_TITLE: function(context) {
            context.commit('addProjectTitle')

        }
    },

})