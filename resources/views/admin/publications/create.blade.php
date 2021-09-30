@extends('admin.template')
  
@section('summernote')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

@endsection

    @section('content')
    <div><h1 class="text-center">Nouvelle publication</h1></div>

     <div class="container">
         <form action="{{route('admin.publications.store')}}" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
                 <label for="title">Titre</label>
                 <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                 <div class="text-danger">{{$errors->first('title',":message")}}</div>
                </div>
    
             <div class="form-group">
                <label for="categorie_id">Catégorie</label>
                <select name="categorie_id" id="categorie_id" class="form-control">
                    <option selected disabled>---</option>
                @foreach ($categories as $categorie) 
                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                 @endforeach 
                 </select>
                 <div class="text-danger">{{$errors->first('categorie_id',":message")}}</div>
            </div>
            <div class="form-group">
                <label for="file">Publication</label>
                <input type="file" name="file" class="form-control-file" value="{{old('file')}}"/>
                <div class="text-danger">{{$errors->first('file',":message")}}</div>
            </div>
            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea name="content" id="content" class="form-control" rows="10">{{old('content')}}</textarea>
                <!--pour styliser le contenu-->
                <script>
                    $('#content').summernote({
                      placeholder: 'Veuillez entrer votre article',
                      tabsize: 2,
                      height: 200
                    });
                  </script>
              
                <div class="text-danger">{{$errors->first('content',":message")}}</div>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn1" value="Sauvegarder">
            </div>

        </form>

    </div>
    
@endsection

   
       
   

