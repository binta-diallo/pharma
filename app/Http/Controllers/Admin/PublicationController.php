<?php

namespace App\Http\Controllers\admin;

use App\Models\Categorie;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $publications= Publication::latest()->get();
        return view('admin.publications.index',compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view("admin.publications.create",compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[

            "title"=>["required","string","max:255"],
            "category_id"=>["required","integer","exists:categories,id"],
            "file" =>["required","file","dimensions:min_width=100,min_height=100"],
            "content"=>["required","string"]
        ],[
            "title.required"=> "Le titre est obligatoire.",
            "title.string"=>"Veuillez entrez une chaine de caractères.",
            "title.max"=>"Au maximum 255 caractàres.",
  
            "categorie_id.required"=>"La catégorie est obligatoire.",
            "categorie_id.integer" =>"Ceci doit être un entier.",
            "categorie_id.exists" =>"Cette catégorie n'existe pas.",
  
            "file.required"=>"Le file est obligatoire.",
            "file.file"=>"Ceci n'est pas une file.",
            "file.dimensions"=>"Largeur minimale:100px et hauteur minimal:100px",
  
            "content.required"=>"Le contenu est obligatoire.",
            "content.string"=>"Veuillez entrez une chaine de caractères"
        ]);
  
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $file =$request->file;
  
        $file_complete_name=time(). rand(1,99999999). "_". $file->getClientOriginalName();
  
        $file->move("uploads/publications/files/",$file_complete_name);
  
        Publication::create([
            "title"=>$request->title,
            "categorie_id"=>$request->categorie_id,
            "file"=>"uploads/publications/files/". $file_complete_name,
            "content" => $request->content,
            
         ]);
         
         return redirect()->route("admin.publications.index")->with([
             "success"=>"Votre article vient d'être sauvegardé"
         ]);
      
         
    }
  
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
