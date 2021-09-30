@extends('admin.template')

@section('content')


<div>
    <h1 class="text-center">Listes des Catégories</h1>
</div>

<!--j'ajoute un msg de confirmation -->
@if (session('success'))
        <div class="alert alert-warning text-center alert-dismissible fade show" role="alert" id="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

@if (session('warning'))
        <div class="alert alert-warning text-center alert-dismissible fade show" role="alert" id="alert">
            {!! session('warning') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


<div class="d-flex justify-content-end align-items-center">
    <a href="{{route('admin.categories.create')}}" class="btn btn1">Nouvelle catégorie</a>

</div>
<div class="table-responsive">
    <table class="text-center table table-striped table-hover">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date de création</th>
                <th>Date de modification</th>
                <th>Paramètres</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorie)
                <tr>
                    <td>{{$categorie->name}}</td>
                    <td>{{$categorie->created_at}}</td>
                    <td>{{$categorie->updated_at}}</td>
                    <td>
                        <a href="{{route('admin.categories.edit',$categorie->id)}}" class="btn btn-sm ">Modifier</a>
                        <form action="{{route('admin.categories.delete',$categorie->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <input type="submit" value="suprimer" class="btn btn-sm btn" onclick="return confirm('Confirmer la suppression?')">

                        </form>
                    </td>
                </tr>
            @endforeach
       </tbody>
    </table>

</div>

<div class="d-flex justify-content-end align-items-center">
    <div class="d-flex justify-content-end align-items-center">
       
    </div>
</div>


    
@endsection


