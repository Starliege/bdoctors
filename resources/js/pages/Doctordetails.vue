<template>
    <section>

        <!-- dettagli dottore -->
        <div class="container">
            <div class="row p-5">
                <div class="col-12 text-center">
                    <h1>Dott. {{ doc.name }} {{ doc.surname }} </h1>
                </div>
                <div class="row justify-content-center py-3 row_details">
                    <div class="col-4">
                        <div class="d-flex flex-column justify-content-center">
                            <img v-if="doc.image" :src="`/storage/${doc.image}`" class="card-img-top" alt="...">
                            <img src="http://mascitelliandpartners.com/map/wp-content/uploads/2015/03/placeholder_user.png"
                                class="card-img-top" v-else>
                        </div>
                    </div>
                    <div class="col-8 col_docdetails">
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
                        <a v-if="doc.cv" class="btn btn-secondary" :href="`/storage/${doc.cv}`" role="button"
                            target="_blank">&#129047;
                            Scarica
                            CV &#129047;</a>

                        <!-- {{asset(`Storage/'${doc.cv}`)}} -->
                    </div>
                </div>

                <!-- lista recensioni -->

                <div class="col-12">
                    <div class="text-center my-5 reviews_title">
                        <h2 class="">Recensioni Ricevute:</h2>
                    </div>
                    <div class="row justify-content-center" style="height: 800px; overflow-y:scroll">
                        <div class="col-10 p-4 mb-3 col-reviews text-center" v-for="rev in doc.reviews" :key="rev.id">
                            <div class="review_user">
                                <h5>Da: <span class="name_reviewer">{{ rev.name_reviewer }} {{ rev.surname_reviewer
                                }}</span></h5>
                            </div>
                            <div class="review_content">
                                {{ rev.review }}
                            </div>
                            <div class="review_date">
                                il: {{ rev.created_at | formatDate }}
                            </div>
                        </div>
                    </div>

                </div>


                <!-- form per messaggio privato -->
                <div class="row row-forms row-cols-1">

                    <div class="col-12 py-4">
                        <h2>Lascia un messaggio</h2>
                        <form @submit.prevent="sendMes()" class="mex_form">
                            <!-- nome utente per il form  messaggio  -->
                            <div class="username-container input_style">
                                <label for="name_sender"> Inserisci il tuo nome&#42;</label>

                                <input v-model="formMes.name_sender" type="text" placeholder="Nome" minlength="1"
                                    maxlength="100" required />
                            </div>
                            <div class="username-container input_style">
                                <label for="surname_sender"> Inserisci il tuo cognome&#42;</label>

                                <input v-model="formMes.surname_sender" type="text" placeholder="Cognome" minlength="1"
                                    maxlength="100" required />
                            </div>
                            <!-- contenuto per il form messaggio -->
                            <div class="content-container input_style">
                                <label for="message_sender"> Inserisci il tuo messaggio&#42;</label>

                                <textarea v-model="formMes.message_sender" type="text" placeholder="Messaggio"
                                    required></textarea>
                            </div>
                            <!-- email per il form messaggio  -->
                            <div class="email-container input_style">
                                <label for="mail_sender"> Inserisci la tua email&#42;</label>

                                <input type="email" v-model="formMes.mail_sender" placeholder="Email" required>
                            </div>
                            <div class="input_style">
                                <button class="button-details" type="submit">Invia</button>
                                <h4 class="invio-messaggio text-center mt-3" v-if="conferma">Il tuo messaggio è stato
                                    inviato!
                                </h4>

                            </div>
                        </form>
                    </div>

                    <!-- form per lasciare recensione -->

                    <div class="col-12 py-4">
                        <form @submit.prevent="addReviews()" class="rev_form">
                            <h2>Lascia una recensione</h2>
                            <!-- input name  commento-->
                            <div class="name-comment input_style">
                                <label for="name_reviewer">Inserisci il tuo nome&#42;</label>

                                <input v-model="formData.name_reviewer" type="text" minlength="1" maxlength="100"
                                    placeholder="Nome" required />
                            </div>
                            <div class="name-comment input_style">
                                <label for="surname_reviewer">Inserisci il tuo cognome&#42;</label>

                                <input v-model="formData.surname_reviewer" type="text" minlength="1" maxlength="100"
                                    placeholder="Cognome" required />
                            </div>
                            <!-- input comment commento-->
                            <div class="text-comment input_style">

                                <label for="review">Inserisci il tuo commento&#42;</label>

                                <textarea name="review" id="contentEditor" maxlength="255" placeholder="Commento"
                                    v-model="formData.review" required>
                            </textarea>
                            </div>
                            <div class="input_style">

                                <button type="submit" class="button-details">Invia</button>

                            </div>
                        </form>
                    </div>

                    <div class="col-12">
                        <form class="">

                            <h2 class="text-center">Lascia un voto</h2>
                            <div class="form-row d-flex justify-content-center">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2 sr-only" for="vote">Inserisci il voto</label>
                                    <select v-model="formVote.vote" required name="vote" class="custom-select mr-sm-2 font-weight-bold" id="vote">
                                        <option disabled selected value>Scegli</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>

                                    </select>
                                </div>
                            </div>
                            <span class="col-auto my-1 d-flex justify-content-center">

                                <input type="submit" class="btn btn-primary mt-4" value="Invia">
                            </span>
                        </form>
                    </div>

                </div>



            </div>
        </div>

    </section>
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
            formData: {
                name_reviewer: "",
                surname_reviewer: "",
                review: "",
                user_id: "",
            },
            formVote: {
               id: "",
               vote: "",
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
                this.formData.user_id = this.doc.id
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
                this.conferma = true
            });
        },
        addReviews() {
            axios.post("/api/reviews", this.formData).then((response) => {
                console.log(response.data)
                this.formData.name_reviewer = "",
                    this.formData.surname_reviewer = "",
                    this.formData.review = "",
                    this.doc.reviews.push(response.data);
            });
        },
        SendVotes() {
            axios.post("/api/votes", this.formVote).then((response) => {
                // console.log(response.data)
                this.formVote.id = "",
                this.formVote.vote = "",
                this.formVote.user_id = "",
                this.doc.vote.push(response.data);
            });
        },
    },
    mounted() {
        this.fetchDoc()
    }
}
</script>

<style lang="scss" scoped>
section {
    background-color: rgba(56, 174, 252, 0.192);

    .row_details {
        background-color: #00000040;
        color: #40434a;
        border-radius: 10px;
        padding: 20px;

        .col_docdetails {
            background-color: #00fff624;
            padding: 10px;
            border-radius: 3px;
            font-size: 20px;
        }
    }

    .row-forms {
        // max-height: 500px;
        display: flex;
        justify-content: space-between;
        padding: 2rem 0;
        width: 100%;

        .col-12 {
            background-color: #00000040;
            color: #40434a;
            border-radius: 10px;
            margin-top: 30px;
        }

        .mex_form input,
        .rev_form input {
            width: 80%;
        }

        h2 {
            text-align: center;
            font-weight: 600;
            font-size: 22px;
        }

        .input_style {
            display: flex;
            flex-direction: column;
            align-content: center;
            align-items: center;
            padding: 10px 0;

            label {
                font-weight: 600;
            }

            input {
                line-height: 40px;
                padding: 0 10px;
                background-color: #d3ebfc9c;
                border: none;
                color: black;
                border-radius: 4px;
                box-shadow: 1px 1px 4px black;
            }

            textarea {
                width: 80%;
                padding: 20px;
                background-color: #d3ebfc9c;
                border: none;
                color: black;
                border-radius: 4px;
                box-shadow: 1px 1px 4px black;
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

    .reviews_title {
        max-width: 400px;
        margin: 0 auto;
        background-color: #4576cd7a;
        padding: 20px;
        box-shadow: 0px 5px 20px 1px #6662627a;
        color: white;
        text-shadow: -4px 2px 5px #0000009c;
        border-radius: 5px;
    }

    .col-reviews {
        background-color: #3578fcc4;
        color: white;
        border-radius: 20px;
        box-shadow: 0px 6px 10px #000000b0;

        .name_reviewer {
            text-shadow: 2px 1px 2px #143470;
        }

        .review_content {
            background-color: #00000030;
            border-radius: 15px;
            padding: 20px;
            // max-width: 400px;
        }

        .review_user {
            padding: 10px;
        }

        .review_date {
            padding: 20px 0;
            font-size: 14px;
        }
    }
}
</style>