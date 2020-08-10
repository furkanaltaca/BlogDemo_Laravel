<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table='news';
    protected $fillable=[
        'category_id',
        'title',
        'image',
        'content',
        'slug'
    ];

    public function getCategory(){

        return $this->hasOne('App\Models\Category','id','category_id');
    }
}
