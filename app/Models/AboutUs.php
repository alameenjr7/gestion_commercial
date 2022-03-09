<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable=['heading','content','image','exp_years','happy_customer','team_advisor','return_customer','secure_payment_Gat','cashOn_delivery','fast_delivery','free_delivery','customer_support','quality_products'];

}
