<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $fillable=['name','slug'];

    public function getNewsCount(){
        return $this->hasMany('App\Models\News','category_id','id')->count();
    }
}
