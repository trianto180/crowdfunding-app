import Vue from 'vue'
import router from './router.js'
import store from './store.js'
import vuetify from './plugins/vuetify.js'
import './bootstrap.js';

import App from './App.vue'

const app = new Vue({
    el: '#app',
    router,
    store,
    vuetify,
    components: {
        App
    },
});