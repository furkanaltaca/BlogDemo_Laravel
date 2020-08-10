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
        $categories = Category::inRandomOrder()->get();
        $news=News::orderBy('created_at','DESC')->get();

        return view('front.homepage', compact('categories', 'news'));
    }
}
