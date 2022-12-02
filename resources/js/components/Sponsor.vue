<template>
    <div>
          <H2>SPONSORS</H2>
          <ul v-for="doctor in activeSponsors" :key="doctor.id">
            <li>
              {{ doctor.name }} {{ doctor.surname }} {{doctor.id}}
            </li>
          </ul>
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

<style>

</style>