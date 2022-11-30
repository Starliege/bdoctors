<template>
    <div>
        <div class="position">
            <div class="row">
                <div class="col-12 pt-4 pl-5">
                    <h4>Cerca un medico per specializzazione</h4>
                    <select name="" id="" v-model="filterText" class="form-control">
                        <option value="">Scegli la specializzazione</option>
                        <option :value="specialization.specialization" v-for="specialization in SpecsArray"
                            :key="specialization.id">
                            {{ specialization.specialization }}</option>
                    </select>
                    <button @click="filter()">
                        Cerca
                    </button>
                </div>
            </div>
            <div class="row py-5">
                <div v-for="doc in filteredbySpec" class="card mx-3 " style="width: 18rem;" :key="doc.id">
                    <div class="img-box">
                        <img v-if="doc.image" :src="`/storage/${doc.image}`" class="card-img-top" alt="...">
                        <img src="http://mascitelliandpartners.com/map/wp-content/uploads/2015/03/placeholder_user.png"
                            class="card-img-top" v-else>
    
                    </div>
    
                    <div class="card-body">
                        {{ doc.name }} {{ doc.surname }}
    
                        <ul>
                            <li v-for="spec in doc.specializations" :key="spec.id">
                                {{ spec.specialization }}
    
                            </li>
                        </ul>
    
                        <p v-if=" doc.reviews.length <= 0">nessuna recensione</p>
                        <p v-else-if="doc.reviews.length == 1">{{doc.reviews.length}} recensione</p>
                        <p v-else>{{doc.reviews.length}} recensioni</p>
    
                        <p v-if="doc.stars.length <= 0">nessun voto disponibile</p>
                        <p v-else>{{doc.avg}}</p>
                        <router-link :to="{ name: 'doctor.details', params: {id: doc.id }}">show</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SearchBarSel",
    data() {
        return {
            filterText: '',
            doctorsArray: [],
            filteredbySpec: [],
            specs: [],
            SpecsArray: [],


        }
    },
    beforeMount() {
        this.fetchSpecs()

    },
    created(){
        this.fetchDoctors()

    },
    methods: {
        fetchDoctors() {
            axios.get('/api/users').then((res) => {
                this.doctorsArray = res.data.result
                console.log(this.doctorsArray)
            })


        },
        fetchSpecs() {
            axios.get('/api/specializations').then((res) => {
                this.SpecsArray = res.data
                console.log(this.SpecsArray)
            })
        },
        filter() {
            this.filteredbySpec = [],
                this.doctorsArray.forEach(el => {
                    el.visible = false
                    this.specs = el.specializations
                    el.total = 0
                    el.stars.forEach(star => {
                        el.total += star.vote

                        // console.log(star)
                    });
                    el.avg =  Math.floor(el.total/el.stars.length)
                    // el.avg = Math.round(2)
                    console.log(this.filterText)
                    this.specs.forEach(spec => {

                        if (spec.specialization == this.filterText) {
                            el.visible = true
                            this.filteredbySpec.push(el)
                        }
                    });
                });
            console.log(this.filteredbySpec)
        },
        // reset() {
        //     this.filteredbySpec = []
        //     this.filterText = ''
        // },

        // vote(doctor) {
        //     let total = []
        //     // console.log(doc)
        //     doctor.stars.forEach(star => {
        //         total += star.vote
        //     });

        //     console.log(total)

        // }
    },
}
</script>

<style lang="scss" scoped>
.position{
    position: absolute;
    select{
        max-width: 300px;
    }
}
h4{
    color: white;
}
</style>