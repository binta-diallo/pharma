<?php

namespace App\Http\Controllers\Admin;

use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;




class TrashController extends Controller
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
    {
       
        $publications = Publication::onlyTrashed()->get();
        
        return view("admin.trash.index",compact('publications'));
    }

    public function restore($id)
    {
       $publication =Publication ::withTrashed()->where("id",$id)->first();
       $publication ->restore();
       return redirect() ->back() ->with([
           "success"=> "Cet article vient d'être restauré."
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function delete($id)
    {
        $publication = Publication::withTrashed()->where("id",$id)->first();

        $path =parse_url($publication->image);
        File::delete(public_path($path['path']));

        $publication->forceDelete();

        return redirect()->back()->with([
            "success" => "Cet article vient d'être définitivement supprimé."
        ]);
    }
}
