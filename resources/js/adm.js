window._ = require('lodash');

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.AdmVue = require('vue');

AdmVue.component('login', require('./components/login.vue').default);

const adm = new AdmVue({
	el: '#adm'
});
