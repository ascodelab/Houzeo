
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('people-component', require('./components/PeopleComponent.vue'));
Vue.component('movies-component', require('./components/MoviesComponent.vue'));
Vue.component('list-people-component', require('./components/ListPeopleComponent.vue'));
Vue.component('list-movies-component', require('./components/ListMoviesComponent.vue'));
Vue.component('people-in-movie-component', require('./components/PeopleInMovieComponent.vue'));
Vue.component('movies-of-person-component', require('./components/MoviesOfPersonComponent.vue'));

const app = new Vue({
    el: '#app'
});
