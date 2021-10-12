@extends('admin.template')

@section('content')

<div class="card mt-4" style="width:25rem;">
    <div class="card-body">
        
        <h3 class="text-center text-success font-weight-bold">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg> Bienvenue sur la page d'administration</h3>  
    </div>
</div>
<div class="card mt-2" style="width: 30rem;">
    <img src="{{asset('img/admiiin.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text text-center font-weight-bold">Vous pouvez gérer vos publications selon leurs différentes catégories</p>
    </div>
  </div>



@endsection


