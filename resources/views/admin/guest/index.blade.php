{{-- lista dottori in evidenza
    possibilità di filtrare fra i dottori in evidenza
    possibilità di cliccare per aprire il profilo di un dottore dal punto di vista del guest --}}

@extends('layouts.app')

@section('content')

<div class="jumbotron">
    <h1 class="display-4 text-center">Bdoctors</h1>
    <h2>Come possiamo Aiutarti?</h2>
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
    <div class="row">
      @foreach ($users as $user)
      <div class="col">
            <div class="card" style="width: 18rem;">
              @if ($user->image)             
                  <img class="card-img-top" style="aspect-ratio: 16 / 9;" src="{{ asset('Storage/' . $user->image) }}"
                      alt="immagine {{ $user->name }}">
              @endif
              <div class="card-body">
                <h2 class="card-title">{{ $user->name }} {{ $user->surname }}</h2>
                @foreach ($user->specializations as $specialization)
                    <p class="card-text">{{ $specialization->specialization }},</p>
                    @endforeach
                
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $user->email }}</li>
                <li class="list-group-item">{{ $user->address }}</li>
                <li class="list-group-item">{{ $user->services }}</li>
              </ul>
              <div class="card-body">
                <a href="#" class="card-link">{{ $user->phone }}</a>
              </div>
              <a href="{{ route('show', $user) }}" type="button" class="btn btn-success btn-sm border-dark">Visualizza Profilo</a>
            </div>
      </div>
      @endforeach
    </div>
  
  </div>

@endsection

