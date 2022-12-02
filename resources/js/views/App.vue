<template>
  <div>

    <!-- <div>
      <Nav/>
    </div> -->
    
    <router-view></router-view>
    <div>
      <!-- <SearchBar></SearchBar> -->
      <!-- <SearchBarSel/> -->
      <!-- <Carousel/> -->
    </div>
    <!-- <Jumbo/> -->
    
    
    <div>
      <Footer></Footer>
    </div>

  </div>
</template>


<script>
// import Jumbo from '../components/Jumbo.vue';
// import Carousel from '../components/Carousel.vue';
import Footer from '../components/Footer.vue';
import Nav from '../components/Nav.vue';
import Home from '../pages/Home.vue';
import SearchBar from '../components/SearchBar.vue';
import SearchBarSel from '../components/SearchBarSel.vue';
// import Description from '../components/Description.vue';


export default {
  components: {
    Footer,
    Nav,
    Home,
    // Jumbo,
    // Carousel,
    SearchBar,
    SearchBarSel,
    // Description,


  }



}

</script>


<style lang="scss" scoped>

</style>