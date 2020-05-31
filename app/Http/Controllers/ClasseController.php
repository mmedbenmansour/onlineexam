<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Departement;
use App\Professeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ClasseController extends Controller
{

    public function create(){
        //afficher la page de creation d'une classe
    }

    public function store (Request $request){
        //$professeur=Professeur::with('user')->where('user_id',Auth::user()->id)->firstOrFail();
        $classe=new Classe();
        $classe->nom=$request->nom;
        //$classe->professeur_id=$professeur->id;
        $classe->professeur_id=1;
        $classe->save();
        return Response::json($classe);
    }

    public function findByProf()
    {
        //$professeur=Professeur::with('user')->where('user_id',Auth::user()->id)->firstOrFail();
        $classes = Classe::with('etudiants')->where('professeur_id',1)->get();

        return Response::json($classes);
    }

    public function destroy ($id){
        $classe = Classe::with('etudiants')->where('professeur_id',1)->where('id',$id)->first();
        if($classe){
            $classe->delete();
            $state=true;
            return Response::json(['etat' => $state]);
        }
    }
}
