
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

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
Vue.component('navbar', require('./components/navbar.vue').default);
Vue.component('product', require('./components/product.vue').default);
Vue.component('Addmployer', require('./components/addemp.vue').default);
Vue.component('Addproduct', require('./components/adproduct.vue').default);
Vue.component('cart', require('./components/cart.vue').default);
Vue.component('payment', require('./components/payment.vue').default);
Vue.component('Userhistory', require('./components/user_history.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Form from './core/Form';
import Fetch from './core/Fetch';
import axios from 'axios';
import vue from 'vue';
window.axios = axios;
window.Form = Form;
window.Fetch = Fetch;



const app = new Vue({
    el: '#app',

    data()
        {
            return{
                image:'',
              form : new Form({
                'name':'',
                'email':'',
                'password':'',
                'role':''
              }),
            }
        },
        methods:
        {
            onsubmit()
            {
                this.form.submit('post','http://127.0.0.1:8000/api/Admin/create/employer');
                },

            },
});
