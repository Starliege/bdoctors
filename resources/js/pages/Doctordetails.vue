<template>

    <div class="container">
        <div class="row p-5">
            <div class="col-12 text-center">
                <h1>Dott. {{ doc.name }} {{ doc.surname }} </h1>
            </div>
            <div class="row justify-content-center py-3">
                <div class="col-4">
                    <div class="d-flex flex-column justify-content-center">
                        <img v-if="doc.image" :src="`/storage/${doc.image}`" class="card-img-top" alt="...">
                        <img src="http://mascitelliandpartners.com/map/wp-content/uploads/2015/03/placeholder_user.png"
                            class="card-img-top" v-else>
                    </div>
                </div>
                <div class="col-8">
                    <p class="card-text"><strong> Email: </strong>{{ doc.email }}</p>
                    <p class="card-text"> <strong> Indirizzo: </strong>{{ doc.address }}</p>
                    <p> <strong> Specializzazioni :</strong>
                        <span class="card-text" v-for="spec in doc.specializations" :key="spec.id">{{
                                spec.specialization
                        }}
                        </span>
                    </p>
                    <p class="card-text" v-if="doc.phone"> <strong> Numero di telefono: </strong>{{ doc.phone }}</p>
                    <p class="card-text" v-if="doc.services"> <strong> Prestazioni: </strong>{{ doc.services }}</p>
                    <a v-if="doc.cv" class="btn btn-secondary" href="" role="button">&#129047;
                        Scarica
                        CV &#129047;</a>

                    <!-- {{asset(`Storage/'${doc.cv}`)}} -->
                </div>
            </div>

            <div class="col-12">
                <form @submit.prevent="sendMes()">
                    <!-- nome utente per il form  messaggio  -->
                    <div class="username-container">
                        <label for="name_sender"> Inserisci il tuo nome&#42;</label>
                        <br>
                        <input v-model="formMes.name_sender" type="text" placeholder="Nome" minlength="1"
                            maxlength="100" required />
                    </div>
                    <div class="username-container">
                        <label for="surname_sender"> Inserisci il tuo nome&#42;</label>
                        <br>
                        <input v-model="formMes.surname_sender" type="text" placeholder="Nome" minlength="1"
                            maxlength="100" required />
                    </div>
                    <!-- contenuto per il form messaggio -->
                    <div class="content-container">
                        <label for="message_sender"> Inserisci il tuo messaggio&#42;</label>
                        <br>
                        <textarea v-model="formMes.message_sender" type="text" placeholder="Messaggio" maxlength="255"
                            required></textarea>
                    </div>
                    <!-- email per il form messaggio  -->
                    <div class="email-container">
                        <label for="mail_sender"> Inserisci la tua email&#42;</label>
                        <br>
                        <input type="email" v-model="formMes.mail_sender" placeholder="Email" required>
                    </div>
                    <button type="submit">Invia</button>
                    <h4 class="invio-messaggio text-center mt-3" v-if="conferma">Il tuo messaggio è stato inviato! </h4>
                </form>
            </div>



        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            doc: [],
            formMes: {
                name_sender: "",
                surname_sender: "",
                mail_sender: "",
                message_sender: "",
                user_id: "",
            },
            conferma: false,
        }
    },

    methods: {
        fetchDoc() {
            axios.get(`/api/users/${this.$route.params.id}`).then(res => {
                // console.log(res.data.result)
                this.doc = res.data.result;
                this.formMes.user_id = this.doc.id
                console.log(this.doc)
            })
        },

        sendMes() {
            axios.post("/api/messages", this.formMes).then((response) => {
                console.log(response.data)
                this.formMes.name_sender = "",
                    this.formMes.surname_sender = "",
                    this.formMes.mail_sender = "",
                    this.formMes.message_sender = "",
                    this.doc.messages.push(response.data);
                this.conferma = !this.conferma;
                setTimeout(() => {
                    this.conferma = !this.conferma;
                }, 3000)


            });
        }
    },
    created() {
        this.fetchDoc()
    }
}
</script>

<style lang="scss" scoped>

</style>