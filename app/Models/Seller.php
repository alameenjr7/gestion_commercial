<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Seller extends Authenticatable
{
    use HasFactory,Notifiable;
    use SoftDeletes;

    protected $guard='sellers';
    protected $fillable =
    [
        'full_name',
        'username',
        'email',
        'photo',
        'phone',
        'address',
        'date_of_birth',
        'genre',
        'city',
        'country',
        'role',
        'state',
        'email_verified_at',
        'password',
        'status',
        'is_verified',
    ];
}
