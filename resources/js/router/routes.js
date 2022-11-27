import Home from '../pages/Home.vue';
import AdvancedSearch from '../pages/AdvancedSearch.vue';

const routes = [
  {
    path: '/home',
    name: 'home',
    component: Home,
  },
  {
    path: '/search',
    name: 'search',
    component: AdvancedSearch,
  }
]

export default routes;