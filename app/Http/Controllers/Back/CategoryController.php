<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::all();
        return view('back.categories.index', $data);
    }

    public function create(Request $request)
    {
        $isExistCategory = Category::whereSlug(Str::slug($request->name))->get();
        if (count($isExistCategory) > 0) {
            toastr()->warning('Kategori mevcut. Farklı bir kategori ismi giriniz.','Uyarı');
            return redirect()->route('admin.kategoriler.index');
        }

        $category = new Category($request->all());
        $category->slug = Str::slug($category->name);
        $category->save();

        toastr()->success('Kategori eklendi.','Başarılı');
        return redirect()->route('admin.kategoriler.index');
    }

    public function updateStatus(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->status = $request->status == "true" ? 1 : 0;
        $category->save();
    }
}
