<template>
  <div>
    <section>
      <SearchBar></SearchBar>
      <Carousel/>
      <Jumbo/>
        
      
    </section>
    <section>
      
    </section>
  </div>
</template>
<script>
import Jumbo from '../components/Jumbo.vue';
import Carousel from '../components/Carousel.vue';
import DoctorList from './DoctorList.vue';
import SearchBar from '../components/SearchBar.vue';
export default {
  name: 'Home',

  components:{
    Jumbo,
    Carousel,
    DoctorList,
    SearchBar
},

  data(){
    return{
      title: 'Home Page',
    }
  }
  
  

  
}
</script>
<style scoped lang="scss">
</style>