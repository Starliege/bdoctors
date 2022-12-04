<template>
    <div class="">

        <div class="row searchbar row-cols-2 row-cols-lg-3 row-cols-sm-2 row-cols-md-2">
            <div class="col col_searchbar ">
                <h4 class="title_searchbar">Cerca un medico per specializzazione</h4>
                <select name="" id="" v-model="filterText" class="form-control">
                    <option value="">Scegli....</option>
                    <option :value="specialization.specialization" v-for="specialization in SpecsArray"
                        :key="specialization.id">
                        {{ specialization.specialization }}</option>
                </select>
                <router-link :to="{ name: 'search' }">
                    <button @click=filter() class="button-details">
                        Cerca
                    </button>
                </router-link>
            </div>
        </div>



        <!-- <div class="row py-5">
            <div v-for="doc in filteredDoctors" class="card mx-3 " style="width: 18rem;">
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
        </div> -->
    </div>
</template>

<script>
import state from '../store.js';
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
    computed: {
        doctorsComputed() {
            console.log(state.doctors, 'dottori computed')
            return state.doctors
        },
        filteredDoctors() {
            console.log(state.filteredDocs, 'dottori filrati computed')
            return state.filteredDocs
        }
    },
    beforeMount() {
        this.fetchSpecs()
        this.fetchDoctors()
    },

    methods: {
        fetchDoctors() {
            axios.get('/api/users').then((res) => {
                state.doctors = res.data.result
                // console.log(this.doctorsArray)
            })
        },
        fetchSpecs() {
            axios.get('/api/specializations').then((res) => {
                this.SpecsArray = res.data
                // console.log(this.SpecsArray)
            })
        },
        filter() {
            state.filteredDocs = [],
                state.doctors.forEach(el => {
                    el.visible = false
                    this.specs = el.specializations
                    el.total = 0
                    el.stars.forEach(star => {
                        el.total += star.vote
                        // console.log(star)
                    });
                    el.avg = Math.floor(el.total / el.stars.length)
                    // el.avg = Math.round(2)
                    console.log(this.filterText)
                    this.specs.forEach(spec => {
                        if (spec.specialization == this.filterText) {
                            el.visible = true
                            state.filteredDocs.push(el)
                        }
                    });
                });
            // console.log(this.filteredbySpec)
        },

    },
}
</script>

<style lang="scss" scoped>
.searchbar {
    position: absolute;
    z-index: 999;
    top: 100px;
    left: 30px;
    right: 0px;

    .col_searchbar {
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 20px;
        background: #00000059;
        border-radius: 5px;
        color: white;
        box-shadow: -3px 3px 9px 1px #000000c7;

        .title_searchbar{
            font-weight: 600;
            padding: 10px;
        }

        .button-details {
            padding: 5px 14px;
            border-radius: 20px;
            background-color: rgb(248 250 252);
            border: none;
            color: #1e273f;
            font-size: 18px;
            transition: all 400ms;

            &:hover {
                // transform: scale(1.02);
                background-color: #186f79d8;
                color:white;
                // border: 1px solid white;
            }
        }
    }
}
</style>