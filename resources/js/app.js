require('./bootstrap');

window.Vue = require('vue');

Vue.component('app', require('./components/App.vue').default);
Vue.component('navbar', require('./components/Nav/Navbar.vue').default);
Vue.component('repositories', require('./components/Repositories.vue').default);

const app = new Vue({
    el: '#app',
});
