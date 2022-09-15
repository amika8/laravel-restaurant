<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nom','prix','quantite','recette_id','unite_id'
    ];

    public function recette(){
        return $this->belongsTo(Recette::class);
    }

    public function unite(){
        return $this->belongsTo(Unite::class);
    }

}
