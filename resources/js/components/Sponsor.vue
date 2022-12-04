<template>
    <div class="section title">
        <div class="title text-center py-5">
            <h1>Medici in Evidenza</h1>
        </div>
         <div class="scroll">
             <div class="card-wrapper d-flex p-3">
                   <div v-for="doctor in activeSponsors" :key="doctor.id">
                 <div class="card" style="width: 16rem; height: 500px;">
                 <div class="img-box py-2 px-2">
                   <img v-if="doctor.image" :src="`/storage/${doctor.image}`" class="card-img-top" alt="foto"> 
                   <img src="http://mascitelliandpartners.com/map/wp-content/uploads/2015/03/placeholder_user.png" class="card-img-top" v-else>
                 </div>
                     <h5 class="card-title text-center">{{ doctor.name }} {{ doctor.surname }}</h5>
                         <hr>
                         <ul>
                          <li v-for="specialization in doctor.specializations" :key="specialization.id">
                              {{ specialization.specialization }}
                          </li>
                         </ul>
                         <div class="button d-flex justify-content-center ">
                             <router-link :to="{ name: 'doctor.details', params: { id: doctor.id } }">
                               <button class="btn btn-primary">
                                 Dettagli
                               </button>
                             </router-link>
                         </div>
                     </div>  
                 </div>
             </div>
         </div>
    </div>
</template>



<script>
const dayjs = require("dayjs");
dayjs().format();
export default {
    data() {
        return {
            doctorspons: [],
        };
        
    },
    computed: {
        activeSponsors() {
            return this.doctorspons.filter((doc) => {
                return doc.active === true;
            });
        },
    },
    methods: {
        fetchDoctors() {
            axios.get("/api/users").then((res) => {
                this.doctorspons = res.data.result;
                this.doctorspons.forEach((doctor) => {
                    doctor.active = false;
                    doctor.sponsorships.forEach((sponsorship) => {
                        let today = dayjs().format("YYYY-MM-DD HH:mm:ss");
                        if (sponsorship.pivot.end_adv > today) {
                            doctor.active = true;
                        }
                    });
                });
                console.log(this.doctorspons);
            });
        },
    },
    beforeMount() {
        this.fetchDoctors();
    },
};
</script>

<style lang="scss" scoped>

.scroll {
    margin: 0 auto;
    max-width: 1800px;
    overflow: auto;
    white-space: nowrap;
}
.card-wrapper {
    gap: 20px;

}
.card {
    box-shadow: 1px 1px 4px black;
}

.card-img-top {
    object-fit: contain;
}

li {
    list-style: none;
}



</style>