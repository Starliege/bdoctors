<template>
  <div>

    <div>
      <Nav/>
    </div>
    <div>
      <!-- <SearchBar></SearchBar> -->
      <SearchBarSel/>
      <Jumbo/>
    </div>
    
    <router-view></router-view>
    
    <div>
      <Footer></Footer>
    </div>

  </div>
</template>


<script>
import Jumbo from '../components/Jumbo.vue';
import Footer from '../components/Footer.vue';
import Nav from '../components/Nav.vue';
import Home from '../pages/Home.vue';
import SearchBar from '../components/SearchBar.vue';
import SearchBarSel from '../components/SearchBarSel.vue';


export default {
  components: {
    Footer,
    Nav,
    Home,
    Jumbo,
    SearchBar,
    SearchBarSel
  }



}

</script>


<style lang="scss" scoped>
</style>