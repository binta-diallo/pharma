@extends('admin.template')


  @section('content')

  <h1 class="text-center">Ajouter la nouvelle catégorie</h1>
    <div class="container my-5">

       <form  method="POST" action="{{route('admin.categories.store')}}">
           @csrf
            <!--csrf pour la sécurité-->
           <div class="form-group">
               <label for="name">Nom de la catégorie:</label>
               <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
               <div class="text-danger">{{ $errors->first("name", ":message") }}</div>

           </div>
           <div class="form-group text-center">
               <input type="submit"  class="btn btn1">
           </div>

        </form>


    </div>
      
  @endsection
    