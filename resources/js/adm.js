window._ = require('lodash');

try {
	window.Popper = require('popper.js').default;
	window.$ = window.jQuery = require('jquery');
	
	require('bootstrap');
	require('admin-lte');
} catch (e) {}


window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.AdmVue = require('vue');

AdmVue.component('login', require('./components/login.vue').default);

const adm = new AdmVue({
	el: '#adm'
});
