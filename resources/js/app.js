

require('./bootstrap');

window.Vue = require('vue');

Vue.component('nota-component', require('./components/NotaComponent.vue').default);
Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('mynota-component', require('./components/MyNotaComponent.vue').default);

const app = new Vue({
    el: '#app'
});
