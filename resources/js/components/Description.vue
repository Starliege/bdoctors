<template>
  <div class="container text-center">
     <section class="howitworks">
       <h1 class="py-5">Come Funziona Bdoctors?</h1>

       <div class="card-group">
   <div class="card steps">
     <img src="https://www.idoctors.it/images/frontend/consultazione-sito.svg?v=2" class="card-img-top w-25" alt="...">
     <div class="card-body">
       <h3 class="card-title">Trova il Medico adatto alle tue esigenze</h3>
       <p class="card-text">Scegli tu il Medico più adatto! cerca per Specializzazione o basandoti sulle recensioni da parte di altri pazienti.</p>
     </div>
   </div>
   <div class="card steps">
     <img src="https://www.idoctors.it/images/frontend/prenotazione-online.svg?v=2" class="card-img-top w-25" alt="...">
     <div class="card-body">
       <h3 class="card-title">Messaggia e Prendi Appuntamento</h3>
       <p class="card-text">Facile, veloce e intuitivo! Potrai messaggiare con lo specialista che hai scelto e chiedere consiglio, o prenotare la tua visita medica privata.</p>
       
     </div>
   </div>
   <div class="card steps">
     <img src="https://www.idoctors.it/images/frontend/medico-e-paziente.svg?v=2" class="card-img-top w-25" alt="...">
     <div class="card-body">
       <h3 class="card-title">Presentati alla visita in studio</h3>
       <p class="card-text">Fatto! è arrivato il gran giorno dell'appuntamento, dopo la visita sentiti libero di lasciare una recensione o votare il tuo Medico.</p>
       
     </div>
   </div>
</div>
     </section>

     <section>
       <div class="card">
         <div class="row no-gutters">
           <div class="col-md-4">
             <img src="https://www.idoctors.it/images/frontend/medico-vertical.svg" alt="...">
           </div>
           <div class="col-md-8">
             <div class="card-body">
               <h1 class="card-title">Sei un Medico?</h1>
               <h3>Iscriviti e raggiungi più pazienti!</h3>
                <h5 class="text-left py-5">Con <strong>Bdoctors:</strong></h5>
               <ul>
                   <li>Registrati e ricevi prenotazioni da <strong>nuovi pazienti</strong> per espandere la tua rete!</li>
                   <li>Ricevi voti e recensioni da più clienti!</li>
                   <li>Migliora la tua <strong>Visibilità</strong> Sponsorizzando il tuo Profilo.</li>
                   <li>Gestisci il tutto anche da <strong>Smartphone.</strong></li>
               </ul>
               <a href="/register" class="btn btn-primary btn-lg my-5" tabindex="-1" role="button" aria-disabled="true">REGISTRATI</a>
             </div>
           </div>
         </div>
       </div>
     </section>

     <section class="aboutus">
       <div class="card">
        <div class="row no-gutters">
          <div class="col-md-8">
            <div class="card-body">
              <h1 class="card-title">Dicono di noi:</h1>
              <span class="card-text">Siamo la migliore piattaforma d'Italia per la ricerca di <strong>Medici Specializzati</strong>, hai un'emergenza? ti basta cercare e chiedere o prenotare, il tutto a portata di <strong>Click!</strong>
                  <p>Sù <strong>Bdoctors</strong> puoi contattare e recensire con il tuo medico <u>senza bisogno di registrazione.</u></p>
              </span>
            </div>
          </div>
          <div class="col-md-4">
            <img src="https://smartlinkegy.com/wp-content/uploads/2020/07/about-us.png" alt="...">
          </div>
        </div>
      </div>
     </section>


</div>
</template>

<script>
export default {
    name: "Description"
};
</script>

<style lang="scss" scoped>

.card{
    border: none;
    background-color: #F8FAFC;
    font-size: 1.25rem;

    ul {
        text-align: left;
    }
}

.steps {
      font-size: 1rem;
    }


img {
    margin: 0 auto;
    width: 100%;
}

.howitworks {
  margin-bottom: 150px;
}

.aboutus {
  margin-bottom: 150px;
  margin-top: 150px;
}


</style>