export default {
    namespaced : true,
    state: {
        donate : 0,
    },
    mutations: {
        insert: (state, payload) => {
            state.donate++
        }
    },
    action: {

    },
};
