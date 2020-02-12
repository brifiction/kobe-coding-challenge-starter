import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        products: [
            {id: 1, name: 'Tabletop Game #1', image: '//placehold.it/200', price: 999},
            {id: 2, name: 'Tabletop Game #2', image: '//placehold.it/200', price: 1499},
            {id: 3, name: 'Tabletop Game #3', image: '//placehold.it/200', price: 499},
            {id: 4, name: 'Tabletop Game #4', image: '//placehold.it/200', price: 2990},
        ],
        inCart: [],
    },
    getters: {
        products: state => state.products,
        inCart: state => state.inCart,
        inCartCount: (state, getters) => {
            return getters.inCart.length
        }
    },
    mutations: {
        ADD_TO_CART(state, id) {
            state.inCart.push(id);
        },
        REMOVE_FROM_CART(state, index) {
            state.inCart.splice(index, 1);
        },
    },
    actions: {
        addToCart(context, id) {
            context.commit('ADD_TO_CART', id);
        },
        removeFromCart(context, index) {
            context.commit('REMOVE_FROM_CART', index);
        },
    }
});
