<?php

namespace App\Http\Controllers;

use App\Classe;
use App\ClasseEtudiant;
use App\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ClasseEtudiantController extends Controller
{


    public function affecterAClasse(Request $request)
    {
        $classe = Classe::find($request->id_classe);

        $etudiant = EtudiantController::findByEmail($request);

        $estAffecter = $this->estAffecter($classe, $etudiant);
        if($etudiant){
            if ($estAffecter == false) {
                $classeEtudiant = new ClasseEtudiant();
                $classeEtudiant->classe_id = $classe->id;
                $classeEtudiant->etudiant_id = $etudiant->id;
                $classeEtudiant->save();
            }
        }
        return Response::json($etudiant);
    }

    public function estAffecter($classe, $etudiant)
    {
        if ($classe) {
            if ($etudiant) {
                $nbParticipation = ClasseEtudiant::all()->count();
                if ($nbParticipation == 0) {
                    return false;
                } else {
                    return true;
                }
                return null;
            }
            return null;
        }
    }
}
