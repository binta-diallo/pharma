@extends('admin.template')
 
  @section('content')

    <div class="card mt-4" style="width:20rem;">
        <div class="card-body">
            <h3 class="text-center text-success font-weight-bold">Modifier la catégorie</h3>  
        </div>
    </div>
   <div class="container my-5">

       <form  method="POST" action="{{route('admin.categories.update',$categorie->id)}}">
           @csrf
           @method('patch')

           <div class="form-group">
               <label for="name">Nom:</label>
               <input type="text" name="name" id="name" class="form-control" value="{{$categorie->name}}">
               <div class="text-danger">{{ $errors->first("name", ":message") }}</div>

           </div>
           <div class="form-group text-center">
               <input type="submit"  class="btn btn1" value="Modifier">
           </div>

        </form>


    </div>
      
  @endsection
    