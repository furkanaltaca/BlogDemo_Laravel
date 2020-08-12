<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Category;
use App\Models\News;

class HomepageController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::orderBy('name')->get();
        $data['news']  = News::orderBy('created_at', 'DESC')->get();

        return view('front.homepage', $data);
    }

    public function post($categorySlug, $postSlug)
    {
        $category = Category::where('slug', $categorySlug)->first()
            ?? abort(404, 'Böyle bir kategori bulunamadı.');

        $newsItem = News::where([
            ['slug', '=', $postSlug],
            ['category_id', '=', $category->id]
        ])->first()
            ?? abort(404, 'Böyle bir yazı bulunamadı.');

        $newsItem->increment('hit');

        $data['newsItem'] = $newsItem;
        $data['categories'] = Category::orderBy('name')->get();

        return view('front.post', $data);
    }

    public function category($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->first()
            ?? abort(404, 'Böyle bir kategori bulunamadı.');

        $data['news']  = News::where('category_id', $category->id)->orderBy('created_at', 'DESC')->get();
        $data['category'] = $category;
        $data['categories'] = Category::orderBy('name')->get();

        return view('front.category', $data);
    }
}
