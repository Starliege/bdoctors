<template>
  <div>
    <section>
      <SearchBarSel/>
      <!-- <Carousel/> -->
      <Jumbo/>
      
        
      
    </section>
    <section>
      <div>
        <Description/> 
      </div>
    </section>
  </div>
</template>
<script>
import Jumbo from '../components/Jumbo.vue';
// import Carousel from '../components/Carousel.vue';
import DoctorList from './DoctorList.vue';
import SearchBarSel from '../components/SearchBarSel.vue';
import Description from '../components/Description.vue';

export default {
  name: 'Home',

  components:{
    Jumbo,
    // Carousel,
    DoctorList,
    SearchBarSel,
    Description
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