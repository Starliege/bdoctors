<template>
    <div class="col-4">
        <div class="card" style="width: 18rem;">
            <!-- <img v-if="user.image" :src="user.image" class="card-img-top" alt="..."> -->
            <div class="card-body">
                <h5 class="card-title">{{ user.name }} {{ user.surname }}</h5>

                
              
                <ul>
                    <li>
                        {{user['specializations'][0].specialization}}
                    </li>
                </ul>
            
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</template>

<script>
import SpecDoctor from './SpecDoctor.vue';
export default {
    name: "DoctorCard",
    components:{
        SpecDoctor,
    },

    props: {
       
        user: {
            type: Object,
            required: true,
        }
    },

}
</script>

<style lang="scss" scoped>

</style>