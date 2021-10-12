@extends('admin.template')

@section('content')
   
    <div class="card mt-4 mb-4" style="width:20rem;">
        <div class="card-body">
            <h3 class="text-center text-success font-weight-bold">Corbeille</h3>  
        </div>
    </div>


    @if (session('warning'))
        <div class="alert alert-warning text-center alert-dismissible fade show" role="alert" id="alert">
            {{session('warning')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    @if (session('success'))
        <div class="alert alert1  text-center alert-dismissible fade show" role="alert" id="alert">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
        
    @endif


<div class="table-responsive">
        <table class="table table-striped table-hover text-center">
            <thead class="bg-ocean text-white">
                <tr>
                    <th>Publication</th>
                    <th>Titre</th>
                    <th>Catégories</th>
                    <th>Paramètres</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($publications as $publication)
                    <tr>
                        <td>{{$publication->file}}</td>
                        <td>{{$publication->title}}</td>
                        <td>{{$publication->categorie->name}}</td>
                        <td>
                            <a href="{{route('admin.trash.publications.restore',$publication->id)}}" class="btn btn1">Restaurer</a>
                    
                                <form action="{{route('admin.trash.publications.delete',$publication->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Suprimer" class="btn btn1" onclick="return confirm('Cette action suprimera definitivement cet article'confirmez? )"/>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection