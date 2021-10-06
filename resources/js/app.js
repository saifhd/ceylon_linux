

require('./bootstrap');

window.Vue = require('vue').default;



Vue.component('territory-component', require('./components/TerritoryComponent.vue').default);
Vue.component('territory-edit-component', require('./components/TerritoryEditComponent.vue').default);



const app = new Vue({
    el: '#app',
});
