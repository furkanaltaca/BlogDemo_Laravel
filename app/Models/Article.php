<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

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

    public static function set(Article $article)
    {
        $article->slug = Str::slug($article->title);

        if ($article->image instanceof UploadedFile) {
            $imageName = $article->slug . '.' . $article->image->getClientOriginalExtension();
            $article->image->move(public_path('uploads/articleImages'), $imageName);
            $article->image = 'uploads/articleImages/' . $imageName;
        }
        return $article;
    }

    public function getCategory()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public static function getRules(): array
    {
        $rules = [
            'title' => 'required|min:3',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'content' => 'required',
        ];
        return $rules;
    }
}
