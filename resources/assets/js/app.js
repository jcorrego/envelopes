
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
Vue.component('categories-list', require('./components/Categories/CategoriesList.vue'));
Vue.component('categories-edit', require('./components/Categories/CategoriesEdit.vue'));
Vue.component('envelopes-list', require('./components/Envelopes/EnvelopesList.vue'));
Vue.component('envelopes-edit', require('./components/Envelopes/EnvelopesEdit.vue'));
Vue.component('budgets-list', require('./components/Budgets/BudgetsList.vue'));
Vue.component('budgets-edit', require('./components/Budgets/BudgetsEdit.vue'));
Vue.component('currency-input', require('./components/Inputs/CurrencyInput.vue'));

import ElementUI from 'element-ui'
Vue.use(ElementUI)

const app = new Vue({
    el: '#app'
});
