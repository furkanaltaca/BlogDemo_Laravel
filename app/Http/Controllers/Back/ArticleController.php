<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles'] = Article::orderBy('created_at', 'DESC')->get();
        return view('back.articles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('back.articles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isExistArticle = Article::where('slug', Str::slug($request->title))->get();
        if (count($isExistArticle) > 0) {
            $message = 'Bu başlıkta bir makale zaten mevcut. Farklı bir başlık giriniz.';
            return redirect()->route('admin.makaleler.create')->withErrors($message)->withInput();
        }

        $request->validate(Article::getRules());

        $article = Article::set(new Article($request->all()));
        $article->save();

        toastr()->success('Makale eklendi.', 'İşlem Başarılı');
        return redirect()->route('admin.makaleler.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['article'] = Article::findOrFail($id);
        $data['categories'] = Category::all();
        return view('back.articles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'content' => 'required',
        ]);

        $article = Article::findOrFail($id);
        $article->fill($request->all());
        $article = Article::set($article);
        $article->save();

        toastr()->success('Başarılı', 'Makale güncellendi.');
        return redirect()->route('admin.makaleler.index');
    }

    public function updateStatus(Request $request)
    {
        $article = Article::findOrFail($request->id);
        $article->status = $request->status == "true" ? 1 : 0;
        $article->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Article::find($id)->delete();
        toastr()->success('Makale silinen makalelere taşındı.', 'Başarılı');
        return redirect()->route('admin.makaleler.index');
    }

    public function recover($id)
    {
        Article::onlyTrashed()->find($id)->restore();
        toastr()->success('Makale geri alındı.', 'Başarılı');
        return redirect()->route('admin.makaleler.trashed');
    }

    public function hardDelete($id)
    {
        $article = Article::onlyTrashed()->find($id);
        if (File::exists(public_path($article->image))) {
            File::delete(public_path($article->image));
        }
        $article->forceDelete();

        toastr()->success('Makale kalıcı olarak silindi.', 'Başarılı');
        return redirect()->route('admin.makaleler.trashed');
    }

    public function destroy(Article $article)
    {
        //
    }


    public function trashed()
    {
        $data['articles'] = Article::onlyTrashed()->orderBy('deleted_at', 'desc')->get();

        return view('back.articles.trashed', $data);
    }
}
