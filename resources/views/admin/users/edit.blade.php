{{-- possibilità di editare/aggiungere ulteriori dettagli
    possibilità di acquistare sponsor 
    tasto che da' possibilità di visualizzare il profilo da guest
--}}

@extends('layouts.app')

@section('content')
<h1 class="text-center"> Modifica il tuo profilo o inserisci nuovo informazioni</h1>
    <form action="{{ route('admin.users.update', $doctor) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" name="address" class="form-control" id="address" value="{{ $doctor['address'] }}"
                placeholder="Modifica l'indirizzo">
        </div>
        
        <div class="form-group">
            <label for="image">Carica una foto di te</label>
            <input type="file" name="image" class="form-control-file" id="image">
        </div>
        <div class="form-group">
            <label for="cv">Carica una foto del tuo CV</label>
            <input type="file" name="cv" class="form-control-file" id="cv">
        </div>
        <div class="mb-3">
            <label for="services" class="form-label">Prestazioni</label>
            <input type="text" name="addr" class="form-control" id="addr" value="{{ $doctor['services'] }}"
                placeholder="Modifica l'indirizzo">
        </div>

        {{-- <div class="form-group mb-3">
            @foreach ($tags as $tag)
            <div class="form-check form-check-inline">
              <input class="form-check-input"  name="tags[]" @if(in_array($tag->id, old('tags',$post->tags->pluck('id')->all())))  checked @endif  type="checkbox" id="tag-{{$tag->id}}" value="{{$tag->id}}">
              <label class="form-check-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>
            </div>
                
            @endforeach
          </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto:</label>
            <textarea class="form-control" id="content" placeholder="Inserisci il contenuto del post" name="content"
                rows="20">{{ $post['content'] }}</textarea>
        </div>
        <div class="d-flex justify-content-around">
            <a class="btn btn-primary" href="{{ route('admin.posts.show', $post) }}" role="button">Torna al post</a>
            <input type="submit" class="btn btn-success" role="button" value="Salva Modifiche">
        </div> --}}

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