<template>
  <div>
    <section>
      <SearchBarSel/>
      <!-- <Carousel/> -->
      <Jumbo/> 
        <Sponsor/>
      
    </section>
    <section>
      
    </section>
  </div>
</template>
<script>
import Jumbo from '../components/Jumbo.vue';
// import Carousel from '../components/Carousel.vue';
import DoctorList from './DoctorList.vue';
import SearchBarSel from '../components/SearchBarSel.vue';
import Sponsor from '../components/Sponsor.vue'
export default {
  name: 'Home',

  components:{
    Jumbo,
    // Carousel,
    DoctorList,
    SearchBarSel,
    Sponsor
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