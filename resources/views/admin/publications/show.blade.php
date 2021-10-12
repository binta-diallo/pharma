@extends('admin.template')

 @section('content')
    
 <div class="card mt-4" style="width:20rem;">
   <div class="card-body">
       <h3 class="text-center text-success font-weight-bold">{{$publication->title}}</h3>  
   </div>
</div>

   <h1 class="text-center">{{$publication->title}}</h1> 
    <div class="container">
       <a href="{{route('admin.publications.telecharger',$publication->file)}}">{{$publication->file}}</a> 
    </div>
@endsection

