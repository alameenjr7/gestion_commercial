<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Depot extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['reference', 'nom', 'stock', 'price', 'statut', 'photo', 'fournisseur_id'];

    public function products(){
        return $this->belongsToMany(Product::class, 'product_depots')->withPivot('quantity');
    }
}
