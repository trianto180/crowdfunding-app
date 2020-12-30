import Vue from 'vue'
import Vuex from 'vuex'
import donate from './donate'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        donate,
    },
    store,
    methods: {
        handleClick() {
            this.$store.commit('increment')
        }
    }
});
