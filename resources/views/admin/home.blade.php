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

                <div class="card mt-5 ">
                    <div class="card-header text-center">{{ $doctor->name }} {{ $doctor->surname }}</div>

                    <div class="d-flex flex-row">
                        @if ($doctor->image)
                            <div class="card " style="width: 50%">
                                <img class="card-img-top" src="{{ asset('Storage/' . $doctor->image) }}"
                                    alt="immagine {{ $doctor->name }}">
                            </div>
                        @endif
                        <div class="card-body" @if (!$doctor->image) style="width: 100%" @endif
                            @if ($doctor->image) style="width: 50%" @endif>
                            <p class="card-text"><strong> Email: </strong>{{ $doctor->email }}</p>
                            <p class="card-text"> <strong> Indirizzo: </strong>{{ $doctor->address }}</p>
                            <p> <strong> Specializzazioni :</strong>

                                @foreach ($doctor->specializations as $key => $spec)
                                    <span class="card-text">{{ $spec->specialization }}@if (!$loop->last)
                                            ,
                                        @endif </span>
                                @endforeach
                            </p>

                            @if ($doctor->phone)
                                <p class="card-text"> <strong> Numero di telefono: </strong>{{ $doctor->phone }}</p>
                            @endif

                            @if ($doctor->services)
                                <p class="card-text"> <strong> Prestazioni: </strong>{{ $doctor->services }}</p>
                            @endif


                            @if ($doctor->cv)
                                <a class="btn btn-secondary" href="{{ asset('Storage/' . $doctor->cv) }}"
                                    role="button">&#129047; Scarica
                                    CV &#129047;</a>
                            @endif
                            <div class="mt-3 text-center d-flex justify-content-between">
                                @if (!$doctor->cv || !$doctor->image || !$doctor->services || !$doctor->phone)
                                    <a class="btn btn-primary " href="{{ route('admin.users.create', $doctor) }}"
                                        role="button">Completa il tuo profilo da medico</a>
                                @endif
                                <a class="btn btn-success" href="{{ route('admin.users.edit', $doctor) }}"
                                    role="button">Modifica</a>
                                
                                <form action="{{ route('admin.users.destroy', $doctor) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value=" CANCELLA " class="btn btn-danger">
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
