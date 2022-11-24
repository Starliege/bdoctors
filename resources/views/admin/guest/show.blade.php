{{-- dettagli singolo dottore visto da guest 
    possibilità di lasciare una recensione
    possibilità di lasciare un voto 
    possibilità di mandare un messaggio --}}

    @extends('layouts.app')

@section('content')

<div class="jumbotron">
    <h1 class="display-4 text-center">Bdoctors</h1>
    <hr class="my-4">
</div>



<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Cognome</th>
              <th scope="col">Email</th>
              <th scope="col">Indirizzo</th>
              <th scope="col">Numero Telefono</th>
              <th scope="col">Prestazioni</th>
              <th scope="col">Media Voto</th>
              <th colspan="2"></th>
            </tr>
          </thead>
           <tbody>
             <tr>
               
                 <th scope="row">{{ $user->id }}</th>
                 <td>{{ $user->name }}</td>
                 <td>{{ $user->surname }}</td>
                 <td>{{ $user->email }}</td>
                 <td>{{ $user->address }}</td>
                 <td>{{ $user->phone }}</td>
                 <td>{{ $user->services }}</td>
                 <td>{{ $avg }}</td>
               
             </tr>

           </tbody>
        </table>
    </div>

    <div class="container-fluid">
        <h3 class="text-success">Tutte le Recensioni</h3>
        @forelse ($reviews as $review)
            
            <h5>{{$review->name_reviewer }}
            {{ $review->surname_reviewer }}</h5>
            <p>{{ $review->review }}</p> 
            <p>{{ $review->created_at }}</p>
         @empty
         <h3>Nessuna Recensione</h3>
            
        @endforelse
    </div>
              {{-- FORM RECENSIONI --}}
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold mb-3">Lascia una Recensione</h3>
                <form class="border p-4" action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    @method ('POST')

                    <div class="form-group font-weight-bold">
                        <label for="name_reviewer">Inserisci il tuo Nome: *</label>                       
                        <input type="text" class="form-control @error('name_reviewer') is-invalid @enderror" id="name_reviewer" name="name_reviewer" value="{{ old('name_reviewer') }}" placeholder="Nome" aria-describedby="helpName_reviewer" >
                        @error('name_reviewer')
                           <div id="name_reviewer" class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>

                      <div class="form-group font-weight-bold">
                        <label for="surname_reviewer">Inserisci il tuo Cognome: *</label>
                        <input type="text" class="form-control @error('surname_reviewer') is-invalid @enderror" id="surname_reviewer" name="surname_reviewer" value="{{ old('surname_reviewer') }}" placeholder="Cognome" aria-describedby="helpSurname_reviewer">  
                        @error('surname_reviewer')
                           <div id="surname_reviewer" class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror                     
                      </div>

                    <div class="form-group font-weight-bold">
                        <label for="review">Inserisci un Commento: *</label>
                        <textarea class="form-control @error('review') is-invalid @enderror" id="review" name="review" aria-describedby="helpReview">{{ old('review') }}</textarea>
                        <p class="text-danger pt-2">Campi Obbligatori *</p>
                        @error('review')
                           <div id="review" class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>

                    <input hidden type="number" name="user_id" value="{{ $user->id }}">
                    <input type="submit" class="btn btn-primary mt-4" value="Invia">
                </form>
            </div>
        </div>
    </div>


       {{-- FORM DEI VOTI --}}
    <div class="container-fluid py-5">
      <div class="row">
          <div class="col-6">
            <form class="border p-4" action="{{ route('stars.store') }}" method="POST">
              @csrf
              @method ('POST')
              <h2>Lascia un voto</h2>
              <div class="form-row align-items-center">
                <div class="col-auto my-1">
                <label class="mr-sm-2 sr-only" for="vote">Inserisci il voto</label>
                <select name="vote" class="custom-select mr-sm-2 font-weight-bold" id="vote">
                    <option disabled selected value>Voto</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                </div>
            </div>
              <span class="col-auto my-1">
                <input hidden type="number" name="id" value="{{ $user->id }}">
                <input type="submit" class="btn btn-primary mt-4" value="Invia">
              </span>
            </form>  
          </div>
      </div>
    </div>


    

    {{-- FORM MESSAGGI PRIVATI --}}
      <div class="container-fluid py-5">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold mb-3">Invia un Messaggio</h3>
                <form class="border p-4" action="{{ route('messages.store') }}" method="POST">
                    @csrf
                    {{-- @method ('POST') --}}

                    <div class="form-group font-weight-bold">
                        <label for="name_sender">Inserisci il tuo Nome: *</label>                       
                        <input type="text" class="form-control @error('name_sender') is-invalid @enderror" id="name_sender" name="name_sender" value="{{ old('name_sender') }}" placeholder="Nome" aria-describedby="helpName_sender">
                        @error('name_sender')
                           <div id="name_sender" class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>

                      <div class="form-group font-weight-bold">
                        <label for="surname_sender">Inserisci il tuo Cognome: *</label>
                        <input type="text" class="form-control @error('surname_sender') is-invalid @enderror" id="surname_sender" name="surname_sender" value="{{ old('surname_sender') }}" placeholder="Cognome" aria-describedby="helpSurname_sender">  
                        @error('surname_sender')
                           <div id="surname_sender" class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror                     
                      </div>

                      <div class="form-group font-weight-bold">
                        <label for="mail_sender">Inserisci la tua Email: *</label>
                        <input type="mail" class="form-control @error('mail_sender') is-invalid @enderror" id="mail_sender" name="mail_sender" value="{{ old('mail_sender') }}" placeholder="La Tua Email" aria-describedby="helpMail_sender">         
                        @error('mail_sender')
                           <div id="mail_sender" class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror              
                      </div>

                    <div class="form-group font-weight-bold">
                        <label for="message_sender">Scrivi un Messaggio *</label>
                        <textarea class="form-control @error('message_sender') is-invalid @enderror" id="message_sender" name="message_sender" aria-describedby="helpMessage_sender">{{ old('message_sender') }}</textarea>
                        <p class="text-danger pt-2">Campi Obbligatori *</p>
                        @error('message_sender')
                           <div id="message_sender" class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>

                    <input hidden type="number" name="user_id" value="{{ $user->id }}">
                    <input type="submit" class="btn btn-primary mt-4" value="Invia">
                </form>
            </div>
        </div>
    </div>




      
  </div>
</div>

@endsection