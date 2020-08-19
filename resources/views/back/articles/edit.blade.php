@extends('back.layouts.master')
@section('title','Admin Makale Düzenle - Blog Demo')
@section('pageHeading','Makale Düzenle')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield('pageHeading')</h6>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif
        <form method="POST" action="{{ route('admin.makaleler.update', $article->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Başlık</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Başlık" required
                    value="{{ $article->title }}">
            </div>
            <div class="form-group">
                <label for="category_id">Kategori</label>
                <select class="form-control" name="category_id" id="category_id" required>
                    <option value="">Kategori Seçiniz</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id==$article->category_id) selected
                        @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Fotoğraf:</label> <br>
                <img src="{{ asset($article->image) }}" alt="{{ asset($article->image) }}" class="img-thumbnail rounded" width="200">
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">İçerik:</label>
                <textarea name="content" id="articleContent" rows="7" class="form-control" required
                    >{{ $article->content }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Makaleyi Kaydet</button>
            </div>
        </form>
    </div>
</div>

@endsection


@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#articleContent').summernote({
            'height':300
        });
    });
</script>
@endpush