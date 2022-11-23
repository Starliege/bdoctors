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

    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold mb-3">Lascia una recensione</h3>
                <form class="border p-4" action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    @method ('POST')

                    <div class="form-group font-weight-bold">
                        <label for="name_reviewer">Inserisci il tuo Nome:</label>                       
                        <input type="text" class="form-control" id="name_reviewer" name="name_reviewer" value="{{ old('name_reviewer') }}">
                    </div>

                      <div class="form-group font-weight-bold">
                        <label for="surname_reviewer">Inserisci il tuo Cognome:</label>
                        <input type="text" class="form-control" id="surname_reviewer" name="surname_reviewer" value="{{ old('surname_reviewer') }}">                       
                      </div>

                    <div class="form-group font-weight-bold">
                        <label for="review">Inserisci un commento:</label>
                        <textarea class="form-control" id="review" name="review">{{ old('review') }}</textarea>
                    </div>

                    <input hidden type="number" name="user_id" value="{{ $user->id }}">
                    <input type="submit" class="btn btn-primary mt-4" value="Invia">
                </form>
            </div>
        </div>
    </div>

    {{-- FORM MESSAGGI PRIVATI --}}

   {{-- <div class="container-fluid">
      <h3 class="text-success">Tutti i messaggi</h3>
      @forelse ($messages as $message)
          
          <h5>{{$message->name_sender }}
          {{ $message->surname_sender }}</h5>
          <p>{{ $message->sender }}</p> 
          <p>{{ $message->created_at }}</p>
       @empty
       <h3>Nessun nuovo Messaggio</h3>
          
      @endforelse
   </div> --}}

      <div class="container-fluid py-5">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold mb-3">Invia un Messaggio</h3>
                <form class="border p-4" action="{{ route('messages.store') }}" method="POST">
                    @csrf
                    @method ('POST')

                    <div class="form-group font-weight-bold">
                        <label for="name_sender">Inserisci il tuo Nome:</label>                       
                        <input type="text" class="form-control" id="name_sender" name="name_sender" value="{{ old('name_sender') }}">
                    </div>

                      <div class="form-group font-weight-bold">
                        <label for="surname_sender">Inserisci il tuo Cognome:</label>
                        <input type="text" class="form-control" id="surname_sender" name="surname_sender" value="{{ old('surname_sender') }}">                       
                      </div>

                      <div class="form-group font-weight-bold">
                        <label for="mail_sender">Inserisci la tua Email:</label>
                        <input type="mail" class="form-control" id="mail_sender" name="mail_sender" value="{{ old('mail_sender') }}">                       
                      </div>

                    <div class="form-group font-weight-bold">
                        <label for="message_sender">Scrivi un Messaggio</label>
                        <textarea class="form-control" id="message_sender" name="message_sender">{{ old('message_sender') }}</textarea>
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