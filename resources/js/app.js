/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
var Turbolinks = require("turbolinks");
Turbolinks.start();

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

Vue.component('navbar-component', require('./components/NavbarComponent.vue').default);
Vue.component('dropdown-component', require('./components/DropdownComponent').default);
Vue.component('alert-component', require('./components/AlertComponent').default);
Vue.component('modal-component', require('./components/ModalComponent').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
document.addEventListener('turbolinks:load', () => {
    new Vue({
        el: '#app',
        beforeMount() {
            if (this.$el.parentNode) {
                document.addEventListener('turbolinks:visit', () => this.$destroy(), { once: true });

                this.$originalEl = this.$el.outerHTML;
            }
        },
        destroyed() {
            this.$el.outerHTML = this.$originalEl;
        }
    });
});
