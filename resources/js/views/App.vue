<template>
  <div>
    <div>
      <Nav/>
    </div>
    <router-view></router-view>
    
    <div>
      <Footer></Footer>
    </div>
  </div>
</template>


<script>

import Footer from '../components/Footer.vue';
import Nav from '../components/Nav.vue';
import Home from '../pages/Home.vue';

export default {
  components: {
    Footer,
    Nav,
    Home,
  }



}

</script>


<style lang="scss" scoped>

</style>