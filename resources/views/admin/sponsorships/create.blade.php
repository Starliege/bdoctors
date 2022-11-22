@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.sponsorships.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group text-center row flex-column align-items-center">
          <label for="sponsorship">Scegli un piano</label>
          <select name="sponsorship" class="form-control col-md-5 mb-4" id="sponsorship">
            <option value="{{$bronze->type}}">{{$bronze->type}} :  Durata  {{$bronze->hours}}h - Prezzo {{$bronze->price}}€</option>
            <option value="{{$silver->type}}">{{$silver->type}} :  Durata  {{$silver->hours}}h - Prezzo {{$silver->price}}€</option>
            <option value="{{$gold->type}}">{{$gold->type}} :  Durata  {{$gold->hours}}h - Prezzo {{$gold->price}}€</option>
          </select>
          <input type="submit" class="btn btn-success mt-5" role="button" value="Boost">
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endsection
