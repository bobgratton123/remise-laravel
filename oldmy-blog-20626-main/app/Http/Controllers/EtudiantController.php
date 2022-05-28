<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Models\User;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //comme select * from etudiant
        $etudiants = Etudiant::all();
        return $etudiants;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.ecreate');

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Création et validation des usagers et étudiants


    /*
    public function store(Request $request)
    {
        $newEtudiant = Etudiant::create([

            //'etudiant_id' => 1,
            'etudiant_nom' => 'required|min:2|max:50' => $request->etudiant_nom,
            'adresse' => 'required|min:3|max:100' => $request->adresse,
            'phone' => 'required|min:10|max:10' => $request->phone,
            'email' => 'required|email|unique:users' => $request->email,
            'date_de_naissance' => 'required|date:Y-m-d' => $request->date_de_naissance,
            'ville_id' =>1
        ]);

        return redirect('/list'); 

    }
    */

    
    public function store(Request $request, User $etudiant)
    {
        $request->validate(
            array(
                'etudiant_nom' => 'required|min:2|max:50',
                'date_naissance' => 'required|date:Y-m-d',
                'phone' => 'required|min:10|max:10',
                'adresse' => 'required|min:3|max:100',
                'email' => 'required|email|unique:users',
            )
        );
        $etudiant->update(
            array(
                'etudiant_nom' => $request->etudiant_nom,
                'date_de_naissance' => $request->date_naissance,
                'phone' => $request->phone,
                'adresse' => $request->adresse,
                'ville_id' => $request->villes_idvilles,
            )
        );
        return redirect('/list'); 
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */

     //select * from etudiant where id = id entre
    public function show(Etudiant $etudiant)
    {
        //return $etudiant;
        $data = Etudiant::all();
        return view('list',['etudiants'=>$data]);

        //return  view ('blog.show', ['post'=>$etudiant]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        //
    }

    public function delete($id)
    {
        $data = Etudiant::find($id);
        $data->delete();
        return redirect('list');
    }
    
/*
    public function delete(Etudiant $etudiant)
    {
        $data = Etudiant::find($etudiant);
        $data->delete();
        return redirect('/list');
    }
    */
}
