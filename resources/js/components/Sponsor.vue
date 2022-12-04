<template>

    <!-- <div class="section title"> -->
    <!-- <div class="scroll">
            <div class="card-wrapper d-flex p-3">
                <div v-for="doctor in activeSponsors" :key="doctor.id">
                    <div class="card" style="width: 16rem; height: 500px;">
                        <div class="img-box py-2 px-2">
                            <img v-if="doctor.image" :src="`/storage/${doctor.image}`" class="card-img-top" alt="foto">
                            <img src="http://mascitelliandpartners.com/map/wp-content/uploads/2015/03/placeholder_user.png"
                                class="card-img-top" v-else>
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
    </div> -->

    <div class="container py-5">
        <div class="title text-center title_section">
            <h1>Medici in Evidenza</h1>
        </div>
        <div class="row-cols-lg-4 row-cols-md-2 row-cols-sm-1  row-cols-1 row py-5">

            <div class="col" v-for="doctor in activeSponsors" :key="doctor.id">
                <div class="card" style="width: 18rem; height: 600px;">
                    <div class="img-box py-2 px-2">
                        <img v-if="doctor.image" :src="`/storage/${doctor.image}`" class="card-img-top" alt="foto">
                        <img src="http://mascitelliandpartners.com/map/wp-content/uploads/2015/03/placeholder_user.png"
                            class="card-img-top" v-else>
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

.container{
    margin-top: 50px;
}
.row {
    row-gap: 20px;

    .col {
        display: flex;
        justify-content: center;
        align-items: center;
        .card{
            box-shadow: 0px 5px 9px 0px #000000a1;
            .card-img-top {
                height: 237px;
                object-fit: cover;
                box-shadow: 0px 3px 8px 0px #000000ba;
                transition: all 200ms;

                &:hover{
                    transform: scale(1.01);
                }
            }
    
            .card-title {
                margin-top: 20px;
                text-transform: uppercase;
                font-weight: 600;
            }
    
            li {
                list-style: none;
            }
    
            .button {
                margin-top: auto;
                margin-bottom: 20px;
            }
    
            .button-details {
                padding: 5px 20px;
                border-radius: 20px;
                background-color: #186f79b5;
                border: none;
                color: white;
                font-size: 18px;
                transition: all 300ms;
    
                &:hover {
                    // transform: scale(1.02);
                    background-color: #186f79d8;
                    // border: 1px solid white;
                }
            }
        }
    }
    
}
.title_section {
    max-width: 400px;
    margin: 0 auto;
    background-color: #4576cd7a;
    padding: 18px;
    box-shadow: 0px 5px 20px 1px #6662627a;
    color: white;
    text-shadow: -4px 2px 5px #0000009c;
    border-radius: 5px;
}

// .scroll {
//     margin: 0 auto;
//     max-width: 1800px;
//     overflow: auto;
//     white-space: nowrap;
// }

// .card-wrapper {
//     gap: 20px;

// }

// .card {
//     box-shadow: 1px 1px 4px black;
// }

// .card-img-top {
//     object-fit: contain;
// }
</style>