/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import VueRouter from 'vue-router'
import { Form, HasError, AlertError } from 'vform'
require('./bootstrap');
window.Vue = require('vue');
window.Form = Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.use(VueRouter)
const routes = [
    { path: '/foo', component: require('./components/ExampleComponent.vue').default },
    { path: '/paket', component: require('./components/PaketTravel.vue').default },
    { path: '/dashboard', component: require('./components/Dashboard.vue').default  },
    { path: '/gallery', component: require('./components/GalleryTravel.vue').default },
    { path: '/transaksi', component: require('./components/TransaksiTravel.vue').default },
]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})
/**
 * Vue Router
 */





/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    router
}).$mount('#app')

