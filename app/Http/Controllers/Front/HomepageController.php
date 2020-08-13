<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Category;
use App\Models\News;
use App\Models\Page;

class HomepageController extends Controller
{
    public function __construct()
    {
        view()->share('pages', Page::orderBy('order', 'ASC')->get());
        view()->share('categories', Category::orderBy('name')->get());
    }
    
    public function index()
    {
        $data['news'] = News::orderBy('created_at', 'DESC')->paginate(2);
        return view('front.homepage', $data);
    }

    public function page($pageSlug)
    {
        $page = Page::where('slug', $pageSlug)->first() ?? abort(404, 'Sayfa bulunamadı.');
        $data['page'] = $page;
        return view('front.page', $data);
    }

    public function category($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->first() ?? abort(404, 'Böyle bir kategori bulunamadı.');
        $data['news']  = News::where('category_id', $category->id)->orderBy('created_at', 'DESC')->paginate(1);
        $data['category'] = $category;
        return view('front.category', $data);
    }

    public function post($categorySlug, $postSlug)
    {
        $category = Category::where('slug', $categorySlug)->first() ?? abort(404, 'Böyle bir kategori bulunamadı.');
        $newsItem = News::where([
            ['slug', '=', $postSlug],
            ['category_id', '=', $category->id]
        ])->first() ?? abort(404, 'Böyle bir yazı bulunamadı.');
        $newsItem->increment('hit');
        $data['newsItem'] = $newsItem;
        return view('front.post', $data);
    }

}
