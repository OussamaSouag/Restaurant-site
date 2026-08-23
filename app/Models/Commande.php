<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Commande extends Model
{
    protected $fillable = ['user_id', 'statut', 'total', 'date_commande']; // include date_commande for mass assignment

    protected $dates = ['date_commande']; // cast date_commande as date
     protected $casts = [
    'date_commande' => 'datetime',
];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
   

    public function products()
{
    return $this->belongsToMany(Product::class, 'commande_produits', 'commande_id', 'produit_id')
                ->withPivot('quantite');
}
}
