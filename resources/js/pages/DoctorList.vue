<template>
    <div class="container">
        <section class="row">
          
                <DoctorCard v-for="user in users" :key="user.id" :user="user"  />
            
           
        </section>
    </div>
</template>

<script>
import DoctorCard from '../components/DoctorCard.vue';
export default {
    components: {
        DoctorCard,
    },

    data() {
        return {
            users: [],
            // specializations:[],
        }
    },

    methods: {
        fetchDoctors() {
            axios.get('/api/users').then((res) => {
                console.log(res.data)
                const {users} = res.data
                // console.log(users);

                this.users = users
            })
        }
    },

    beforeMount() {
        this.fetchDoctors()
    }
}
</script>

<style lang="scss" scoped>

</style>