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
    public function __construct()
    {
        $this->middleware(["auth"]);
    
    }
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
            "categorie_id"=>["required","integer","exists:categories,id"],
            "file" =>["required","file"],
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
  
            "content.required"=>"Le contenu est obligatoire.",
            "content.string"=>"Veuillez entrez une chaine de caractères"
        ]);
  
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $file =$request->file;
  
        $file_complete_name=time(). rand(1,99999999). "_". $file->getClientOriginalName();
  
        $file->move("uploads/",$file_complete_name);
  
        Publication::create([
            "title"=>$request->title,
            "categorie_id"=>$request->categorie_id,
            "file"=>"uploads/". $file_complete_name,
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
        $publication = Publication::find($id);
        if ($publication) 
        {
            return view("admin.publications.show", compact('publication'));
        }
        else {
            return redirect()->route('admin.publications.index')->with([
              "warning"=>"Cet article n'existe pas."
            ]);
        }
    }
    //Code à revoir
    public function telecharger(Request $request,$file)
    {

        return response()->download(\public_path('uploads/'.$file));
    }
    
   
    
    public function published(Request $request,$id)
     {
      // dd($request->published_input);

       $publication = Publication::find($id);

       if($request->has('published_input'))
       {
           $publication->update([
               "published"=> true,
               "published_at"=> now(),
           ]);

           return redirect()->back()->with([
            "success"=> "Votre article a été publié."
            ]);
       }
       else {
           $publication->update([
               "published" => false,
               "published_at"=> null,
           ]);
           return redirect()->back()->with([
               "success"=> "Votre article a été retiré de la liste des publications."
           ]);
       }


     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publication =Publication::find($id);
       
        $categories =Categorie::all();

        if (!$publication) 
        {
            return redirect()->route('admin.publications.index')->with([
               "warning"=>"Cette article n'existe pas",
            ]);
        }
        return view("admin.publications.edit",compact("publication","categories"));
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
        $validator = Validator::make($request->all(),[

            "title"=>["required","string","max:255"],
            "categorie_id"=>["required","integer","exists:categories,id"],
            "file" =>["required","file"],
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
  
            "content.required"=>"Le contenu est obligatoire.",
            "content.string"=>"Veuillez entrez une chaine de caractères"
        ]);
  
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $file =$request->file;
  
        $file_complete_name=time(). rand(1,99999999). "_". $file->getClientOriginalName();
  
        $file->move("uploads/",$file_complete_name);
  
        Publication::create([
            "title"=>$request->title,
            "categorie_id"=>$request->categorie_id,
            "file"=>"uploads/". $file_complete_name,
            "content" => $request->content,
            
         ]);
         
         return redirect()->route("admin.publications.index")->with([
             "success"=>"Votre article vient d'être modifié"
         ]);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed($id)
    {
        $publication = Publication::find($id);
        $publication->update([
            "published"=> false,
            "published_at"=> null,

        ]);

       $publication->delete();
       return redirect()->back()->with([
           "success"=>"Votre article vient d'etre déplacé dans la corbeille."

       ]);
    }
}
