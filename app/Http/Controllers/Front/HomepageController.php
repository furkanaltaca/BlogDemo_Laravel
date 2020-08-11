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
        $data['categories'] = Category::inRandomOrder()->get();
        $data['news']  = News::orderBy('created_at', 'DESC')->get();

        return view('front.homepage', $data);
    }

    public function post($category, $slug)
    {
        $category = Category::where('slug', $category)->first() ?? abort(404, 'Böyle bir kategori bulunamadı.');
        $data['categories'] = Category::inRandomOrder()->get();

        $newsItem = News::where([
            ['slug', '=', $slug],
            ['category_id', '=', $category->id]
        ])->first() ?? abort(404, 'Böyle bir yazı bulunamadı.');
        $data['newsItem'] = $newsItem;
        $newsItem->increment('hit');

        // dd($newsItem);

        return view('front.post', $data);
    }
}
