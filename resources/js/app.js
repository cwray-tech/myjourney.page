/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue").default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "navbar-component",
    require("./components/NavbarComponent.vue").default
);
Vue.component(
    "dropdown-component",
    require("./components/DropdownComponent.vue").default
);
Vue.component(
    "alert-component",
    require("./components/AlertComponent.vue").default
);
Vue.component(
    "modal-component",
    require("./components/ModalComponent.vue").default
);
Vue.component(
    "publish-journey-component",
    require("./components/PublishJourneyComponent.vue").default
);
Vue.component(
    "make-public-component",
    require("./components/MakePublicJourneyComponent.vue").default
);
Vue.component(
    "journey-intro-component",
    require("./components/JourneyIntroComponent.vue").default
);
Vue.component(
    "journey-step-update-component",
    require("./components/JourneyStepUpdateComponent.vue").default
);
Vue.component("Timeline", require("./components/Timeline.vue").default);
Vue.component(
    "banner-component",
    require("./components/BannerComponent.vue").default
);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
});
