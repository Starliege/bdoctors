<template>
  <div class="p-5">
    <div>
      <input type="text" v-model="filterText">
      <button @click="filter()">
        Cerca
      </button>
      <button @click="reset()">
        reset
      </button>
      <router-link :to="{ name: 'search', params: { doctors: this.doctorsArray } }">Advanced Search</router-link>

    </div>
    <div class="row py-5">
      <div v-for="doc in filteredbySpec" class="card mx-3 " style="width: 18rem;">
        <div class="img-box">
          <img v-if="doc.image" :src="`/storage/${doc.image}`" class="card-img-top" alt="...">
          <img src="http://mascitelliandpartners.com/map/wp-content/uploads/2015/03/placeholder_user.png" class="card-img-top" v-else>

        </div>
        
        <div class="card-body">
          {{ doc.name }} {{ doc.surname }}

          <ul>
            <li v-for="spec in doc.specializations" :key="spec.id">
              {{ spec.specialization }}

            </li>
          </ul>
         
        </div>
      </div>

    </div>

  </div>
</template>

<script>
export default {
  name: "SearchBar",
  data() {
    return {
      filterText: '',
      doctorsArray: [],
      filteredbySpec: [],
      specs: [],

    }
  },
  beforeMount() {
    this.fetchDoctors()
  },
  methods: {
    fetchDoctors() {
      axios.get('/api/users').then((res) => {
        this.doctorsArray = res.data.result
        console.log(this.doctorsArray)
      })
    },
    filter() {
      this.filteredbySpec = [],
        this.doctorsArray.forEach(el => {
          el.visible = false
          this.specs = el.specializations

          this.specs.forEach(spec => {
            if (spec.specialization.toLowerCase() == this.filterText.toLowerCase()) {
              el.visible = true
              this.filteredbySpec.push(el)
            }
          });
        });
      console.log(this.filteredbySpec)
    },
    reset() {
      this.filteredbySpec = []
      this.filterText = ''
    },
  },

}
</script>

<style lang="scss" scoped>
.img-box {

// position: relative;
// bottom:50px;
&:hover img {
    -webkit-transform: scale3d(1.2, 1.2, 1);
    transform: scale3d(1.2, 1.2, 1);
}

img {
    width: 100%;
    object-fit: cover;
    object-position: top;
    border: 1px solid #86a5d9;
    -webkit-transition: all 0.5s linear;
    transition: all 0.5s linear;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
}
}
</style>