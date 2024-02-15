@extends('layouts.admin')

@section('content')
    <!--contenitore-->
   <div class="fm-container bg-card px-5">

    <!--form-->
        <form class="form" action="{{route('admin.project.store')}}" method="POST">
        <h2 class="text-center">Aggiungi un nuovo progetto</h2>    
        @csrf
          <!--titolo-->
         <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Nome progetto:</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="formGroupExampleInput" placeholder="inserisci il nome" name="title" required value="{{old('title')}}">
          
          @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        </div> 
        <!--/titolo-->  

        <!--descrizione-->
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Description:</label>
          <input type="text" class="form-control @error('description') is-invalid @enderror" id="formGroupExampleInput" placeholder="inserisci la descrizione" name="description" required value="{{old('description')}}">
          
          @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        </div>
        <!--/descrizione-->

        <!--last_commit & code-->
        <div class="d-flex">
          <!--last_commit-->
          <div class="mb-3 me-5">
            <label for="formGroupExampleInput2" class="form-label">Ultimo commit:</label>
            <input type="text" class="form-control @error('last_commit') is-invalid @enderror" id="formGroupExampleInput2" placeholder="ultimo commit" name="last_commit" required value="{{old('last_commit')}}">
          
            @error('last_commit')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

          </div>
          <!--/last_commit-->

          <!--code-->
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Codice:</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" id="formGroupExampleInput2" placeholder="inserisci il tipo di codice utilizzato" name="code" required value="{{old('code')}}">
          
            @error('code')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          
          </div>
          <!--/code-->
        </div>
        <!--/last_commit & code-->

        <!--tipologia e tecnologia-->
        <div class="d-flex">
          <!--tipologia-->
          <div class="mb-3 me-5">

            <label for="formGroupExampleInput2" class="form-label">Tipo:</label>
            <select class="form-select" aria-label="Default select example" name="type_id" required>
              <option selected value="{{old('title')}}">seleziona il tipo di progetto</option>
              @foreach ($types as $type)
                <option value="{{$type->id}}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{$type->title}}</option>  
              @endforeach
            </select>
          </div>
          <!--/tipologia-->

          <!--tecnologie-->
          <div class="mb-3">

            <div> <!--label sezione-->
             <label for="content" class="form-label">Tecnologie:</label> 
            </div>
            @foreach ($technologies as $technology)
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="technology-{{$technology->id}}" value="{{$technology->id}}" name="technologies[]">
                <label class="form-check-label" for="technology-{{$technology->id}}">{{$technology->title}}</label>
            </div>
            @endforeach
            
          </div>
          <!--/tecnologie-->
        </div>
        <!--tipologia e tecnologia-->
          
          <input class="mb-2" type="submit">
    </form>
    <!--/form-->

  </div>
   <!--/contenitore-->
@endsection