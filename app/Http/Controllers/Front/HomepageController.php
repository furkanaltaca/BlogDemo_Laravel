<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//Models
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;

class HomepageController extends Controller
{
    public function __construct()
    {
        view()->share('pages', Page::orderBy('order', 'ASC')->get());
        view()->share('categories', Category::orderBy('name')->get());
    }
    
    public function index()
    {
        $data['articles'] = Article::orderBy('created_at', 'DESC')->paginate(2);
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
        $data['articles']  = Article::where('category_id', $category->id)->orderBy('created_at', 'DESC')->paginate(1);
        $data['category'] = $category;
        return view('front.category', $data);
    }

    public function post($categorySlug, $postSlug)
    {
        $category = Category::where('slug', $categorySlug)->first() ?? abort(404, 'Böyle bir kategori bulunamadı.');
        $article = Article::where([
            ['slug', '=', $postSlug],
            ['category_id', '=', $category->id]
        ])->first() ?? abort(404, 'Böyle bir yazı bulunamadı.');
        $article->increment('hit');
        $data['article'] = $article;
        return view('front.post', $data);
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contactPost(Request $request)
    {
        $validate= Validator::make(
            $request->post(),
            Contact::getRules()
        );

        if ($validate->fails()) {
            return redirect()->route('contact')->withErrors($validate)->withInput();
        }

        $contact= new Contact($request->all());
        $contact->save();
        // print_r($contact);

        return redirect()->route('contact')->with('success','Teşekkürler '.$contact->name.'. Mesajınız tarafımıza iletilmiştir.');
    }

}
