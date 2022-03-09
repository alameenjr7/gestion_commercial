<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=
    [
        'user_id',
        'user_role',
        'order_number',
        'sub_total',
        'total_amount',
        'delivery_charge',
        'coupon',
        'client_id',
        'date',
        'n_piece',
        'statut',
        'reference',
        'dateLive',
        'payment_status',
        'payment_method',
        'condition',
        'payment_details'
    ];

    public function products(){
        return $this->belongsToMany(Product::class, 'product_orders')->withPivot('quantity');
    }


    public function getCreatedAt()
    {
        setlocale(LC_TIME,"fr_FR");
        return strftime("%e %B %Y", strtotime($this->created_at));
    }

    public function getUpdatedAt()
    {
        setlocale(LC_TIME,"fr_FR");
        return strftime("%e %B %Y", strtotime($this->updated_at));
    }

    public function getDateFact()
    {
        setlocale(LC_TIME,"fr_FR");
        return strftime("%e %B %Y", strtotime($this->date));
    }
}
