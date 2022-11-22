{{-- lista dottori in evidenza
    possibilità di filtrare fra i dottori in evidenza
    possibilità di cliccare per aprire il profilo di un dottore dal punto di vista del guest --}}

@extends('layouts.app')

@section('content')

<div class="jumbotron">
    <h1 class="display-4 text-center">Bdoctors</h1>
    <hr class="my-4">
</div>

<div class="container">
    <div class="row">
      <div class="col-8">
        <h1>Elenco di dottori:</h1>
      </div>
    </div>
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
              <th colspan="2"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->surname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->services }}</td>
              
            </tr>
                
            @endforeach
          
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection

