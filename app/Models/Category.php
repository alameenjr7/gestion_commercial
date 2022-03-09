<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'slug','reference', 'summary', 'photo', 'status', 'is_parent', 'parent_id'];

    public static function shiftChild($cat_id){
        return Category::whereIn('id', $cat_id)->update(['is_parent'=>1]);
    }

    public static function getChildByParentID($id){
        return Category::where('parent_id', $id)->pluck('title', 'id');
    }

    public function products(){
        return $this->hasMany('App\Models\Product', 'cat_id', 'id')->where('status','active');
    }

}
