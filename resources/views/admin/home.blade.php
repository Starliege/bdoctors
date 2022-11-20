@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}



                    </div>


                </div>
                <div class="card mt-5">
                    <div class="card-header"> Pannello Dottore
                        <a class="btn btn-primary ml-3" href="{{route('admin.users.create', $doctor)}}" role="button">Completa il tuo profilo da medico</a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> Nome: {{ $doctor->name }} </h5>
                        <h5 class="card-title"> Cognome: {{ $doctor->surname }}</h5>
                        <p class="card-text">Email: {{ $doctor->email }}</p>
                        <p class="card-text">Indirizzo: {{ $doctor->address }}</p>

                        @foreach ($doctor->specializations as $key => $spec)
                            <p class="card-text">specializzazione n{{ $key + 1 }}: {{ $spec->specialization }} </p>
                        @endforeach

                        @if($doctor->phone)
                        <p class="card-text">Numero di telefono: {{ $doctor->phone }}</p>
                        @endif

                        @if ($doctor->services)
                        <p class="card-text"> Prestazioni :{{ $doctor->services }}</p>
                        @endif
                        
                        @if ($doctor->image)
                            Immagine: {{ $doctor->image }}
                        @endif

                        @if ($doctor->cv)
                            CV: {{ $doctor->cv }}
                        @endif   
                        <a class="btn btn-success" href="{{route('admin.users.edit', $doctor)}}" role="button">Modifica</a>                          
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
