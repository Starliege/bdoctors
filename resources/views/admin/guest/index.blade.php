{{-- lista dottori in evidenza
    possibilità di filtrare fra i dottori in evidenza
    possibilità di cliccare per aprire il profilo di un dottore dal punto di vista del guest --}}

@extends('layouts.app')

@section('content')

<div class="jumbotron bg-info">
    <h1 class="display-4 text-center">Bdoctors</h1>
    <h2>Come possiamo aiutarti?</h2>
    <hr class="my-4">
</div>

<div class="container-fluid">
    <div class="row">
      <div class="col-8">
        <h1 class="py-5">Consulta i nostri Specialisti!</h1>
      </div>
    </div>
  </div>
  
  <div class="container-fluid">
    @if (session('message-success'))
   <div class="alert alert-success">
      <h3>Messaggio inviato con successo!</h3>
   </div>
    @endif 
    <div class="row">
      @foreach ($users as $user)
       <div class="col">
        <a href="{{ route('show', $user) }}" style="text-decoration: none;">

          
            <div class="card mb-5 text-center" style="width: 16rem; height: 450px;"> 
              @if ($user->image)
                <img class="card-img-top " style="width: 16rem; height: 170px;" src="{{ asset('Storage/' . $user->image) }}" alt="immagine {{ $user->name }}">                               
              @endif
              @if (!$user->image)
                  <div class="card-img-top" style="width: 16rem; height: 170px;">
                      <img src="https://www.sketchappsources.com/resources/source-image/doctor-illustration-hamamzai.png" style="width: 16rem; height: 170px;" alt="">
                  </div>
              @else
                  
              @endif
              
              <div class="card-body">
                <h2 class="card-title">{{ $user->name }} {{ $user->surname }}</h2>
                @foreach ($user->specializations as $specialization)
                  <p class="card-text">{{ $specialization->specialization }},</p>
                @endforeach             
              </div>              
            </div>
          </a> 
       </div>
      @endforeach
    </div>
  </div>

@endsection

{{-- <a href="{{ route('show', $user) }}">Visualizza Profilo</a> --}}