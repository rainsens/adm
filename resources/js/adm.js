window._ = require('lodash');

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window.AdmVue = require('vue');

import VueProgressBar from 'vue-progressbar';
AdmVue.use(VueProgressBar, {
	color: 'rgb(143, 255, 199)',
	failedColor: 'red',
	height: '2px'
});

AdmVue.component('login', require('./components/login.vue').default);

const adm = new AdmVue({
	el: '#adm'
});
