<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nom',
    ];

    public function produits(){
        return $this->hasMany(Produit::class);
    }
}
