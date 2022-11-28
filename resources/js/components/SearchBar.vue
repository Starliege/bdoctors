<template>
  <div class="p-5">
    <div>
      <input type="text" v-model="filterText">
      <button @click="filter()">
        Cerca
      </button>
      <router-link :to="{ name: 'search', params: { doctors: this.doctorsArray } }">Advanced Search</router-link>

    </div>
    <div class="row py-5">
      <div v-for="doc in filteredbySpec" class="card mx-3">
        <div class="card-body">
          {{ doc.name }} {{ doc.surname }}
  
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
      specs: []
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
    }
  },

}
</script>

<style lang="scss" scoped>

</style>