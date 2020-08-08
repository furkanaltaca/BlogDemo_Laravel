<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class HomepageController extends Controller
{
    public function index()
    {
        $categories = Category::inRandomOrder()->get();
        return view('front.homepage', compact('categories'));
    }
}
