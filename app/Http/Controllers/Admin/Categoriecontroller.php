<?php

namespace App\Http\Controllers\admin;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Categoriecontroller extends Controller
{  
    public function __constuct()
    {
        $this->middleware(["auth","admin"]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        // je fais une requête pour recupérer toutes les catégorie enregistrées en base de donnée
        $categories = Categorie::all();
        // et les afficher avec la methode compact().
        return view('admin.categories.index',compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // Valider les données
      $validator= Validator::make($request->all(),[
        "name"=>["required","string","max:255", "unique:categories"],
    ],[
        "name.required"=>"le nom est obligatoire",
        "name.string"=>"Veuillez entrez une chaine de caractères valide",
        "name.max" =>"Veuillez entrez au maximum 255 caractères ",
        "name.unique"=>"Cette catégorie existe déjà. Veuillez choisir une autre.",

    ]);
      if ($validator->fails()) 
      {
        return redirect()->back()->withErrors($validator)->withInput();
      }


    // Et si c'est bon, on rentre les informations dans la base de données
     Categorie::create([
        "name"=>$request->name
    ]);

    // Puis on redirige l'utilisateur vers la page index des catégories
    return redirect()->route("admin.categories.index")->with([
        "success" => "Votre catégorie a été créée avec succès."
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
        
        $categorie= Categorie::where("id",$id)->first();

        
         if (!$categorie) 
       {
            return redirect()->route('admin.categories.index')->whith([
              "warning"=> "Cette catégorie n'existe pas.",
           ]);
        }
           else 
           {
            return view("admin.categories.edit",compact('categorie'));
           }
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
        $categorie = Categorie::find($id);

        $validator = Validator::make($request->all(), [
            "name" => [ "required", "string", "max:255",
             Rule::unique('categories')->ignore($categorie->id) ]
        ], [
            "name.required" => "Le nom est obligatoire.",
            "name.string" => "Veuillez entrer une chaine de caractères valide.",
            "name.max" => "Veuillez entrer au maximum 255 caractères.",
            "name.exists" => "Cette catégorie n'existe pas.",
            "name.unique" => "Cette catégorie existe déjà. Veuillez en choisir une autre.",
        ]);


          if ($validator->fails()) 
          {
            return redirect()->back()->withErrors($validator)->withInput();
            
          }
          $categorie->update([
              "name"=> $request->name

          ]);

          return redirect()->route('admin.categories.index')->with([
              "success"=>"Votre catégorie a été modifiée avec succès."
          ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //je fais d'abord la requête pour récupérer la catégorie à supprimer
        $categorie = Categorie::find($id);

        //Ensuite, je fais la requête qui permet de supprimer la catégorie
        $categorie->delete();

        //Puis,pour ne pas laisser l'administrateur sur une page blanche, on fait la redirection 
        //vers la page index des catégories de l'espace admin.
        return redirect()->route("admin.categories.index")->with([
            "success"=>"Votre catégorie a été suprimée avec succès."
        ]);
    }
}
