<template>
  <div>
    <section>
      <Carousel/>
      <Jumbo/>
        
      
    </section>
    <section>
      <DoctorList/>
    </section>
  </div>
</template>
<script>
import Jumbo from '../components/Jumbo.vue';
import Carousel from '../components/Carousel.vue';
import DoctorList from './DoctorList.vue';
export default {
  name: 'Home',

  components:{
    Jumbo,
    Carousel,
    DoctorList,
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