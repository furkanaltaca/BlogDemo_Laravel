<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'category_id',
        'title',
        'image',
        'content',
        'slug'
    ];

    public function getCategory()
    {

        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public static function getRules(): array
    {
        $rules = [
            'title'=>'required|min:3',
            'category_id'=>'required',
            'image'=>'required|image|mimes:jpeg,jpg,png|max:200',
            'content'=>'required',
        ];
        return $rules;
    }
}
