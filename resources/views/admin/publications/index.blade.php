
@extends('admin.template')

@section('content')
<div class="text-center"><h1>Liste des publications</h1></div>

<div class="d-flex justify-content-end align-items-center">
    <a href="{{route('admin.publications.create')}}" class="btn btn1" id="btnmargin">Nouvelle Publication</a>
</div>
@if (session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session('warning')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
 
@if (session('success'))
<div class="alert alert1 alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
    
@endif


    <div  class="table-responsive">
        <table id="table" class="table table-striped table-hover text-center">
            <thead class="bg-ocean text-white">
                <tr>
                    <th>Publication</th>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Lire Contenu</th>
                    <th>Publié</th>
                    <th>Paramètres</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($publications as $publication)
                    <tr>
                        <td><img src="{{asset($publication->file)}}" alt=""></td>
                        <td>{{$publication->title}}</td>
                        <td>{{$publication->categorie->name}}</td>
                        <td>
                            <a href="#" class="btn btn1">Lire</a>
                        </td>
                        <td>
                            @if ($publication->published == 1)
                            <div>
                                publié
                            </div>
                            <div>
                                <small>{{$publication->published_at->format("d/m/Y à H:i:s")}}</small>
                            </div>
                       
                            <div>
                                Non publié
                            </div>
                            @endif
                             
                             <form action="#" method="POST">
                                @csrf
                                @method('put')
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" {{$publication->published==1? 'checked':''}} name="published_input" class="custom-control-input" id="Switch-" onchange="this.form.submit()"/>
                                    <label class="custom-control-label" for="Switch-{{$publication->id}}"></label>
                                </div>
                            </form> 
                        </td>
                            
                        <td>
                            <a href="#" class="btn btn1">Modifier</a>
                    
                        <form action="#" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Corbeille" class="btn btn1" onclick="return confirm('Déplacez cet article dans la corbeille ')"/>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    
@endsection