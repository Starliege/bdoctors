import Home from '../pages/Home.vue';
import AdvancedSearch from '../pages/AdvancedSearch.vue';
import Doctordetails from '../pages/Doctordetails.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
  },
  {
    path: '/search',
    name: 'search',
    component: AdvancedSearch,
  },
  {
    path: '/doctor/:id',
    name: 'doctor.details',
    component: Doctordetails,
  }
]

export default routes;