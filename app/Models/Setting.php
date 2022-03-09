<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'title',
        'meta_description',
        'meta_keywords',
        'logo',
        'favicon',
        'email',
        'phone',
        'fax',
        'address',
        'footer',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
        'snapchat_url',
        'pinterest_url',
        'playStore_url',
        'appStore_url',
        'youtube_url',
		'map_url',
        'paypal_sandbox'
    ];
}
