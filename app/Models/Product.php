<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =
    [
        'title',
        'type',
        'slug',
        'description',
        'reference',
        'stock',
        'brand_id',
        'cat_id',
        'child_cat_id',
        'fournisseur_id',
        'photo',
        'buying_price',
        'price',
        'offer_price',
        'discount',
        'size',
        'conditions',
        'user_id',
        'added_by',
        'status',
    ];

    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function fournisseurs(){
        return $this->belongsTo('App\Models\Fournisseur');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'cat_id', 'id');
    }

    public function rel_prods(){
        return $this->hasMany('App\Models\Product','cat_id','cat_id')->where('status','active')->limit(10);

    }

    public static function getProductByCart($id){
        return self::where('id',$id)->get()->toArray();
    }

    public static function showProdById($id){
        return Product::where('id',$id)->get()->toArray();
    }

    public function orders(){
        return $this->belongsToMany(Order::class, 'product_orders')->withPivot('quantity');
    }

    public function depots(){
        return $this->belongsToMany(Order::class, 'product_depots')->withPivot('quantity');
    }

    public function reviews(){
        return $this->hasMany(ProductReview::class);
    }

}
