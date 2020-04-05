/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import VueRouter from 'vue-router'
import { Form, HasError, AlertError } from 'vform'
import VueProgressBar from 'vue-progressbar'
import Swal from 'sweetalert2'
require('./bootstrap');

// Vform
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// Vue Router
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

// Vue progressbar
const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '3px',
    transition: {
    speed: '0.2s',
    opacity: '0.6s',
    termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
}
Vue.use(VueProgressBar, options)

// Swal
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

// Global Variable
window.Vue = require('vue');
window.Form = Form;
window.Fire = new Vue();
window.Swal = Swal;
window.Toast = Toast;



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

