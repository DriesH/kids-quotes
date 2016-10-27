
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

//Vue.component('childDashboard', require('./components/ChildDashboard.vue'));
//Vue.component('childAddForm', require('./components/ChildAddForm.vue'));
//Vue.component('addQuote', require('./components/AddQuote.vue'));
//Vue.component('homePage', require('./components/HomePage.vue'));
//Vue.component('childModify', require('./components/childModify.vue'));
Vue.component('BusinessContentHomePage', require('./components/businessContentHomePage.vue'));
Vue.component('ParentWrap', require('./components/ParentWrap.vue'));

//partial vues
Vue.component('NavBar', require('./components/partial/NavBar.vue'));
Vue.component('Banner', require('./components/partial/Banner.vue'));
Vue.component('ContentHomePage', require('./components/partial/ContentHomePage.vue'));
Vue.component('DashboardPersonal', require('./components/partial/DashboardPersonal.vue'));
Vue.component('SideBarDashboard', require('./components/partial/dashboardpersonal/SideBarDashboard.vue'));
Vue.component('BodyDashboardPersonal', require('./components/partial/dashboardpersonal/BodyDashboardPersonal.vue'));
Vue.component('AddQuotesDashboard', require('./components/partial/dashboardpersonal/AddQuotesDashboard.vue'));
Vue.component('EditChild', require('./components/partial/dashboardpersonal/EditChild.vue'));

Vue.transition('slideIn', {
    enterClass: 'slideInLeft',
    leaveClass: 'slideOutLeft'
});


const app = new Vue({
    el: '#app',
});
