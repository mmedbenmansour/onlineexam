<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public static function findByEmail(Request $request){
        $etudiant=Etudiant::with('user')->get()->where('user.email',htmlspecialchars($request->email))->first();
        return $etudiant;
        //return Response::json($etudiant);
    }




}
