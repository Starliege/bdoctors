<template>
  <div class="container py-5">
    <div class=" p-5 row_doctors row row-cols-2 row-cols-lg-4 row-cols-sm-1 row-cols-md-3 gy-1" >
      <div v-if="filteredDoctors.length == 0">
        nessun dottore
      </div>
      <div v-for="doc in filteredDoctors" class=" col card card_doctors " style="width: 18rem;">
        <div class="img-box py-2">
          <img v-if="doc.image" :src="`/storage/${doc.image}`" class="card-img-top" alt="...">
          <img src="http://mascitelliandpartners.com/map/wp-content/uploads/2015/03/placeholder_user.png"
            class="card-img-top" v-else>

        </div>

        <div class="card-body">
          <div class="card_title">
            {{ doc.name }} {{ doc.surname }}
          </div>


          <div>
            |<span v-for="spec in doc.specializations" :key="spec.id">
              {{ spec.specialization }} |

            </span>
          </div>

          <p v-if="doc.reviews.length <= 0">nessuna recensione</p>
          <p v-else-if="doc.reviews.length == 1">{{ doc.reviews.length }} recensione</p>
          <p v-else>{{ doc.reviews.length }} recensioni</p>

          <p v-if="doc.stars.length <= 0">nessun voto disponibile</p>
          <p v-else>media voti : {{ doc.avg }}</p>
          <div class="button_div">
            <router-link :to="{ name: 'doctor.details', params: { id: doc.id } }">
              <button class="button-details">
                Dettagli
              </button>
            </router-link>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import state from '../store.js';
export default {
  name: 'AdvancedSearch',
  data() {
    return {
      filterText: '',
      doctorsArray: [],
      filteredbySpec: [],
      specs: [],
      SpecsArray: [],


    }
  },
  computed: {
    doctorsComputed() {
      return state.doctors
    },
    filteredDoctors() {
      return state.filteredDocs
    }
  },
  beforeMount() {
    // this.fetchSpecs()
    this.fetchDoctors()

  },

  methods: {
    fetchDoctors() {
      axios.get('/api/users').then((res) => {
        this.doctorsArray = res.data.result
        console.log(this.doctorsArray)
      })


    },


  },

}
</script>
<style scoped lang="scss">
.row_doctors {
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 40px;

  .button-details{
    padding: 5px 14px;
    border-radius: 20px;
    background-color: #186f79b5;
    border: none;
    color: white;
    font-size: 18px;
    transition: all 300ms;
    &:hover{
      // transform: scale(1.02);
      background-color: #186f79d8;
      // border: 1px solid white;
    }
  }
  .card_doctors{
    box-shadow:0px 4px 6px #0000008a;
    // height: 500px;
    padding: 20px;
    // width: 400px;
    // height: 600px;
  }

  .card-body{
    display: flex;
    gap: 10px;
    flex-direction: column;
    // justify-content: center;
  }
}

.card_title {
  font-weight: 500;
  text-transform: uppercase;
}
</style>