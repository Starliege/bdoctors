<template>
  <div>

    <div>
      <Nav/>
    </div>
    <div>
      <SearchBar></SearchBar>
      <Carousel/>
    </div>

    <router-view></router-view>
    <Jumbo/>
    
    <div>
      <Footer></Footer>
    </div>

  </div>
</template>


<script>
import Jumbo from '../components/Jumbo.vue';
import Carousel from '../components/Carousel.vue';
import Footer from '../components/Footer.vue';
import Nav from '../components/Nav.vue';
import Home from '../pages/Home.vue';
import SearchBar from '../components/SearchBar.vue';


export default {
  components: {
    Footer,
    Nav,
    Home,
    Jumbo,
    Carousel,
    SearchBar

  }



}

</script>


<style lang="scss" scoped>

</style>