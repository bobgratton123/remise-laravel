<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Categorie extends Model
{
    use HasFactory;

    static public function selectCategorie(){
        $lg = "_en";
        if(session()->has('locale') &&  session()->get('locale') == 'fr'){
            $lg = "_fr";
        }

        $query = Categorie::Select('id', DB::raw('(case when categorie'.$lg.' is null then categorie_en else categorie'.$lg.' end) as categorie'))
        ->OrderBy('categorie')
        ->get();
        return $query;
    }
}
