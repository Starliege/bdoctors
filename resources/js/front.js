window.Vue = require('vue');
window.axios = require('axios');
import router from './router';
import moment from 'moment';
import VueMoment from 'vue-moment';

require('moment');

Vue.use(VueMoment,{moment});

Vue.filter('formatDate', function(value){
  if(value){
    return moment(String(value)).format('MM/DD/YYYY')
  }
});

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import App from './views/App.vue';
import Vue from 'vue';



const app = new Vue({
  el: '#app',
  render: h => h(App),
  router: router,
});
