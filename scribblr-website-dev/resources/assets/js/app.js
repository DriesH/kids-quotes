
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

//shared homepage elements
Vue.component('ParentWrap', require('./components/partial/homepage/ParentWrap.vue'));
Vue.component('NavBar', require('./components/partial/homepage/NavBar.vue'));
Vue.component('Banner', require('./components/partial/homepage/Banner.vue'));

//content homepage
Vue.component('ContentHomePage', require('./components/partial/homepagepersonal/ContentHomePage.vue'));
Vue.component('BusinessContentHomePage', require('./components/partial/homepagebusiness/businessContentHomePage.vue'));

//partial personal
Vue.component('DashboardPersonal', require('./components/partial/dashboardpersonal/DashboardPersonal.vue'));
Vue.component('SideBarDashboard', require('./components/partial/dashboardpersonal/partials/SideBarDashboard.vue'));
Vue.component('BodyDashboardPersonal', require('./components/partial/dashboardpersonal/partials/BodyDashboardPersonal.vue'));
Vue.component('AddQuotesDashboard', require('./components/partial/dashboardpersonal/partials/AddQuotesDashboard.vue'));
Vue.component('EditChild', require('./components/partial/dashboardpersonal/partials/EditChild.vue'));

//partial business
Vue.component('DashboardBusiness', require('./components/partial/dashboardbusiness/DashboardBusiness.vue'));
Vue.component('BodyDashboardBusiness', require('./components/partial/dashboardbusiness/partials/BodyDashboardBusiness.vue'));
Vue.component('BrainstormTool', require('./components/partial/dashboardbusiness/partials/BrainstormTool.vue'));
Vue.component('ThemesTool', require('./components/partial/dashboardbusiness/partials/ThemesTool.vue'));

//waterfall
Vue.component('WaterfallSlot', require('./components/waterfall/waterfall-slot.vue'));
Vue.component('Waterfall', require('./components/waterfall/waterfall.vue'));

Vue.transition('slideIn', {
    enterClass: 'slideInLeft',
    leaveClass: 'slideOutLeft'
});


const app = new Vue({
    el: '#app',
});
