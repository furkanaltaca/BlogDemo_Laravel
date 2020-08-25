<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = Article::query()->with("category");
            $table = DataTables::of($query);

            $table->addColumn('created_at',function($row){
                return $row->created_at->diffforhumans();
            });
            
            $table->addColumn('image', function ($row) {
                $data['image'] = $row->image;
                return view('back.widgets.articles.table.imageTemplate', $data);
            });

            $table->addColumn('status', function ($row) {
                $data['article'] = $row;
                return view('back.widgets.articles.table.statusTemplate', $data);
            });

            $table->addColumn('actions', function ($row) {
                $data['article'] = $row;
                return view('back.widgets.articles.table.actionsTemplate', $data);
            });

            return $table->make(true);
        }

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
        // dd($article);
        // $article = Article::findOrFail($article->id);
        // dd($article);
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
        return response()->json(['message'=>'Durum güncellendi.', 'messageTitle'=>'Başarılı']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        Article::find($id)->delete();
        return response()->json(['message'=>'Makale silindi.', 'messageTitle'=>'Başarılı']);
    }

    public function recover(Request $request)
    {
        Article::onlyTrashed()->find($request->id)->restore();
        return response()->json(['message'=>'Makale kurtarıldı.','messageTitle'=>'Başarılı']);
    }

    public function hardDelete(Request $request)
    {
        $article = Article::onlyTrashed()->find($request->id);
        if (File::exists(public_path($article->image))) {
            File::delete(public_path($article->image));
        }
        $article->forceDelete();
        return response()->json(['message'=>'Makale kalıcı olarak silindi.','messageTitle'=>'Başarılı']);
    }

    public function trashed()
    {
        if (request()->ajax()) {
            $query = Article::query()->onlyTrashed()->orderBy('deleted_at', 'desc')->with("category");
            $table = DataTables::of($query);

            $table->addColumn('created_at',function($row){
                return $row->created_at->diffforhumans();
            });

            $table->addColumn('image', function ($row) {
                $data['image'] = $row->image;
                return view('back.widgets.articles.table.imageTemplate', $data);
            });

            $table->addColumn('status', function ($row) {
                $data['article'] = $row;
                return view('back.widgets.articles.table.statusTemplate', $data);
            });

            $table->addColumn('actions', function ($row) {
                $data['article'] = $row;
                return view('back.widgets.articles.table.actionsForTrashedTemplate', $data);
            });

            return $table->make(true);
        }

        $data['articles'] = Article::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        return view('back.articles.trashed', $data);
    }
}
