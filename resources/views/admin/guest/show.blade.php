{{-- dettagli singolo dottore visto da guest 
    possibilità di lasciare una recensione
    possibilità di lasciare un voto 
    possibilità di mandare un messaggio --}}

@extends('layouts.app')

<?php
use Carbon\Carbon;
$dates = [];
if(count($user->sponsorships) > 0){
            $docSponsorships = $user->sponsorships()->get();
            foreach ($docSponsorships as $s){
                array_push($dates,$s->pivot->end_adv,);
            }
            sort($dates);
            $lastSponsorship = $dates[count($dates)-1];
            if($lastSponsorship < Carbon::now()){
                
            }

        }
       
?>

@section('content')

{{-- <div class="jumbotron">
    <h1 class="display-4 text-center">BDoctors</h1>
    <hr class="my-4">
</div> --}}





<div class="container-fluid">
  @if (session('review-success'))
  <div class="alert alert-success">
     <h3>Hai inviato con successo la tua recensione!</h3>
  </div>
   @endif 

  <div class="row justify-content-center">
    <div class="card mt-5 overflow-hidden" style="width: 1000px">
      <div class="card-header text-center"> <h3> Dott. {{ $user->name }} {{ $user->surname }} </h3>  @if(count($user->sponsorships) > 0  && $lastSponsorship > Carbon::now())
        <span class="badge badge-warning">ha una sponsorizzazione attiva</span>
        @endif 
      </div>
      <div class="d-flex flex-row">
        @if ($user->image)
            <div class="card " style="width: 50%">
                <img class="card-img-top" src="{{ asset('Storage/' . $user->image) }}"
                    alt="immagine {{ $user->name }}">
            </div>
        @endif
        <div class="card-body" @if (!$user->image) style="width: 100%" @endif
            @if ($user->image) style="width: 50%" @endif>
            <p class="card-text"><strong> Email: </strong>{{ $user->email }}</p>
            <p class="card-text"> <strong> Indirizzo: </strong>{{ $user->address }}</p>
            <p> <strong> Specializzazioni :</strong>

                @foreach ($user->specializations as $key => $spec)
                    <span class="card-text">{{ $spec->specialization }}@if (!$loop->last)
                            ,
                        @endif </span>
                @endforeach
            </p>

            @if ($user->phone)
                <p class="card-text"> <strong> Numero di telefono: </strong>{{ $user->phone }}</p>
            @endif

            @if ($user->services)
                <p class="card-text"> <strong> Prestazioni: </strong>{{ $user->services }}</p>
            @endif
            @if ($avg)
                <p class="card-text"> <strong>Voto Medio: </strong>{{ $avg }}</p>
            @endif


            @if ($user->cv)
                <a class="btn btn-secondary" href="{{ asset('Storage/' . $user->cv) }}"
                    role="button">&#129047; Scarica
                    CV &#129047;</a>
            @endif
        </div>

    </div>
    @if (count($reviews) > 0)
    <h2 class="text-center mt-5">Recensioni Ricevute:</h2>
    <div style="height: 500px; overflow-y:scroll" class=" mt-5">
        @foreach ($reviews as $review)
            <div class="card text-center mb-2 text-wrap">
                <div class="card-header">
                    <h5>Da: {{ $review->name_reviewer }} {{ $review->surname_reviewer }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {{ $review->review }}
                    </p>
                </div>
                <div class="card-footer text-white bg-secondary">
                    il: {{ $review->created_at->format('d-m-Y H:m') }}
                </div>
            </div>
        @endforeach
    </div>
    @endif
                 {{-- FORM RECENSIONI --}}
                 <div class="container-fluid py-5">
                  <div class="row">
                      <div class="col-6">
                          <h3 class="font-weight-bold mb-3 text-center">Lascia una Recensione</h3>
                          <form class="border p-4" style="height: 520px" action="{{ route('reviews.store') }}" method="POST">
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
                      {{-- FORM MESSAGGI PRIVATI --}}
              <div class="col-6">
                <h3 class="font-weight-bold mb-3 text-center">Invia un Messaggio Privato</h3>
                <form class="border p-4" style="height: 520px" action="{{ route('messages.store') }}" method="POST">
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

       {{-- FORM DEI VOTI --}}
    <div class="container-fluid py-5">
      <div class="row d-flex align-items-center justify-content-center">
          <div class="col-6">
            <form class="border p-4" action="{{ route('stars.store') }}" method="POST">
              @csrf
              @method ('POST')
              <h2 class="text-center">Lascia un voto</h2>
              <div class="form-row d-flex justify-content-center">
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
              <span class="col-auto my-1 d-flex justify-content-center">
                <input hidden type="number" name="id" value="{{ $user->id }}">
                <input type="submit" class="btn btn-primary mt-4" value="Invia">
              </span>
            </form>  
          </div>
      </div>
    </div>
  </div>
</div>

@endsection