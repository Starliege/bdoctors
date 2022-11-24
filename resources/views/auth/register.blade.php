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
sort($specializations);
?>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cognome*') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo*') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            {{-- <div class="form-group row">
                                <label for="specialization"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Specializzazione') }}</label>

                                <div class="col-md-6">
                                    <input id="specialization" type="text"
                                        class="form-control @error('specialization') is-invalid @enderror"
                                        name="specialization" value="{{ old('specialization') }}" required
                                        autocomplete="specialization" autofocus>

                                    @error('specialization')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="container">
                                <H5 class="text-center">*Specializzazione/i*</H5>
                                @error('specialization')
                                    {{-- <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> --}}
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div style="height: 200px; overflow-y:scroll"
                                    class="form-group row justify-content-center ml-5">
                                    @foreach ($specializations as $s)
                                        <div class="col-5 ">
                                            <input class="form-check-input "
                                                name="specialization[]" type="checkbox" value="{{ $s }}"
                                                id="specialization">
                                            <label class="form-check-label" for="specialization">
                                                {{ $s }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                            <span><em>campi obbligatori*</em> </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
