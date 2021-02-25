const state = {
    client: {}
}
const mutations = {
    update (state, payload) {
        state[payload.item] = payload.value
    },
    addItem (state, payload) {
        console.log('here wer in statue');
        console.log(state);
        console.log(payload);
        state.comics.push(payload.value);
    },
    removeItem (state, payload) {
        state.comics.splice(state.comics.indexOf(payload.value), 1);
    }
}
const actions = {
}
const getters = {

}
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
