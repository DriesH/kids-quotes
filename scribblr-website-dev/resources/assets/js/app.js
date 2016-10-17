
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

//live vues
Vue.component('childDashboard', require('./components/ChildDashboard.vue'));
Vue.component('childAddForm', require('./components/ChildAddForm.vue'));
Vue.component('addQuote', require('./components/AddQuote.vue'));
Vue.component('homePage', require('./components/HomePage.vue'));
Vue.component('childModify', require('./components/childModify.vue'));
Vue.component('businessContentHomePage', require('./components/businessContentHomePage.vue'));
Vue.component('parentWrap', require('./components/ParentWrap.vue'));


//development vues
Vue.component('devNavBar', require('./components/development/devNavBar.vue'));
Vue.component('devBanner', require('./components/development/devBanner.vue'));
Vue.component('devContentHomePage', require('./components/development/devContentHomePage.vue'));

Vue.transition('slideIn', {
    enterClass: 'slideInLeft',
    leaveClass: 'slideOutLeft'
});


const app = new Vue({
    el: '#app',
});
