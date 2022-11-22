{{-- possibilità di editare/aggiungere ulteriori dettagli
    possibilità di acquistare sponsor 
    tasto che da' possibilità di visualizzare il profilo da guest
--}}

@extends('layouts.app')
<?php
$specializations = [
    'Urrianologo',
    'Anatomopatologo',
    'Andrologo',
    'Anestesista',
    'Angiologo',
    'Audioprotesista',
    'Cardiochirurgo',
    'Cardiologo',
    'Chiropratico',
    'Chirurgo',
    'Chirurgo Estetico',
    'Chirurgo Generale',
    'Chirurgo Maninfaccia',
    'Chirurgo Pediatrico',
    'Chirurgo Plastico',
    'Chirurgo Toracico',
    'Chirurgo Vascolare',
    'Chirurgo Vertebrale',
    'Medico Della Peste',
    'Dentista',
    'Dermatologo',
    'Diabetologo',
    'Dietista',
    'Dietologo',
    'Ematologo',
    'Endocrinologo',
    'Epatologo',
    'Epidemiologo',
    'Fisiatra',
    'Fisioterapista',
    'Gastroenterologo',
    'Geriatra',
    'Ginecologo',
    'Immunologo',
    'Infettivologo',
    'Internista',
    'Logopedista',
    'Massofisioterapista',
    'Medico Certificatore',
    'Medico Competente',
    'Medico Dello Sport',
    'Medico Di Base',
    'Medico Legale',
    'Medico Nucleare',
    'Nefrologo',
    'Neurochirurgo',
    'Neurologo',
    'Neuropsichiatra Infantile',
    'Nutrizionista',
    'Oculista',
    'Omeopata',
    'Oncologo',
    'Ortodontista',
    'Ortopedico',
    'Osteopata',
    'Ostetrica',
    'Otorino',
    'Pediatra',
    'Pneumologo',
    'Podologo',
    'Posturologo',
    'Proctologo',
    'Professional Counselor',
    'Psichiatra',
    'Psicologo',
    'Psicologo Clinico',
    'Psicoterapeuta',
    'Radiologo',
    'Radiologo Diagnostico',
    'Radioterapista',
    'Reumatologo',
    'Senologo',
    'Sessuologo',
    'Stomatologo',
    'Tecnico Sanitario',
    'Terapeuta',
    'Terapista Del Dolore',
    'Urologo',
];
?>

@section('content')
    <h1 class="text-center  mb-3"> Modifica il tuo profilo da medico</h1>
    <form action="{{ route('admin.users.update',$doctor) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Modifica il tuo nome') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ $doctor->name }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __(' Modifica il tuo cognome') }}</label>

            <div class="col-md-6">
                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                    name="surname" value="{{ $doctor->surname }}" required autocomplete="surname" autofocus>

                @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="address"
                class="col-md-4 col-form-label text-md-right">{{ __('Modifica il tuo indirizzo') }}</label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                    name="address" value="{{ $doctor->address }}" required autocomplete="address" autofocus>

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        @if($doctor->phone)
        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">Modifica il tuo numero di telefono</label>
            <div class="col-md-6">

                <input type="text" class="form-control  @error('phone') is-invalid @enderror" required id="phone" name="phone"
                    value="{{ $doctor->phone }}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        @endif
        @if($doctor->services)
        <div class="form-group row">
            <label for="services" class="col-md-4 col-form-label text-md-right">Modifica le tue prestazioni:</label>
            <div class="col-md-6">
                <textarea class="form-control  @error('services') is-invalid @enderror " required id="services" placeholder="Inserisci le tue prestazioni" name="services" rows="10"
                    rows="20">{{ $doctor->services }}</textarea>
                    @error('services')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        @endif

        @if($doctor->image)
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right" for="image">Cambia la tua foto profilo</label>
            <div class="col-md-6">

                <input type="file" name="image" class="form-control-file" id="image">
            </div>
        </div>
        @endif
        @if($doctor->dv)
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right" for="cv">Cambia il tuo CV</label>
            <div class="col-md-6">

                <input type="file" name="cv" class="form-control-file" id="cv">
            </div>
        </div>
        @endif

        <div>
            <H5 class="text-center mb-5"> Modifica le tue specializzazioni:</H5>
            <div class="form-group row justify-content-center ml-5">
                @foreach ($specializations as $s)
                    <div class="col-2 ">
                        <input class="form-check-input  @error('specialization') is-invalid @enderror"
                            name="specialization[]" @if (in_array($s, $doctor->specializations->pluck('specialization')->all())) checked @endif type="checkbox"
                            value="{{ $s }}" id="specialization">
                        <label class="form-check-label" for="specialization">
                            {{ $s }}
                        </label>
                        @error('specialization')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                @endforeach

            </div>

        </div>
        <div class="text-center mt-5">
            <input type="submit" class="btn btn-success" role="button" value="Salva Modifiche">

        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


@endsection
