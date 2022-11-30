/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('hero-section', require('./components/HomePage/HeroSection.vue').default);
Vue.component('app-banner', require('./components/HomePage/AppBanner.vue').default);
Vue.component('top-categories', require('./components/HomePage/TopCategories.vue').default);
Vue.component('featured-products', require('./components/HomePage/FeaturedProducts.vue').default);
Vue.component('products-shop', require('./components/ShopPage/ProductsShop.vue').default);
Vue.component('product-details', require('./components/ShopPage/ProductDetails.vue').default);
Vue.component('category-products', require('./components/ShopPage/CategoryProducts.vue').default);
Vue.component('cart-dropdown', require('./components/HomePage/CartDropdown.vue').default);
Vue.component('checkout-page', require('./components/ShopPage/CheckoutPage.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 let cart = window.localStorage.getItem('cart');
 let cartCount = window.localStorage.getItem('cartCount');
 const store = new Vuex.Store({
    state: {
        cart: cart ? JSON.parse(cart) : [],
        cartCount: cartCount ? parseInt(cartCount) : 0,
        products: []
    },

    mutations: {
        setProducts(state, products) {
            state.products = products;
        },

        addProductToCart(state, product) {
      
            let found = state.cart.find(item => item.id === product.id);

            if (found) {
                found.quantity ++;
                found.totalPrice = found.quantity * found.price;
            } else {
                state.cart.push(product);
        
                Vue.set(product, 'quantity', 1);
                Vue.set(product, 'totalPrice', product.price);
            }
        
            state.cartCount++;
            this.commit('saveCart');

        },

        removeProductToCart(state, product) {
            let found = state.cart.find(item => item.id === product.id);
            if (found.quantity > 1) {
                found.quantity --;
                found.totalPrice = found.quantity * found.price;

            }
            else {
                let index = state.cart.indexOf(product);
                if (index > -1) {
                    let item = state.cart[index];
                    state.cartCount -= item.quantity;
            
                    state.cart.splice(index, 1);
                }

                Vue.set(product, 'quantity', 1);
                Vue.set(product, 'totalPrice', product.price);
            }
            this.commit('saveCart');

        },
        saveCart(state) {
            window.localStorage.setItem('cart', JSON.stringify(state.cart));
            window.localStorage.setItem('cartCount', state.cartCount);
        }
    },

    actions: {
        getProducts({ commit }) {
            axios.get('/api/products')
                .then((response) => {
                    commit('setProducts', response.data)
                })
                .catch((error) => console.error(error))
        },
    },

});

 const app = new Vue({
    store,
    el: '#app',
    created() {
    }
});



