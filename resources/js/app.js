/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


import('./bootstrap');


window.Vue = import('vue').default;

// import Vue from 'vue';

import Vue from 'vue/dist/vue.js'

import { StripeCheckout as VueStripeCheckout} from '@vue-stripe/vue-stripe';

export default {
    components: {
        'stripe-checkout': VueStripeCheckout,
    },
};


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', {

    template: '<div>Hey</div>'

});

Vue.component('checkout-component', {

    template: '<div>' +
        '<stripe-checkout ref="checkoutRef" mode="payment" :pk="publishableKey"></stripe-checkout>'
        + '</div>',

    data() {
        return {
            publishableKey: 'pk_test_51Jzr2fHmTUV1jLZyRMJFfHLtqputaOu5DoviFsb0KETFc2HvmcjTEqtpWiLRbL2aUlX5be8A37gabOUSJU1eiUMP00cMWT6Pvk'
        }

    },

});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
