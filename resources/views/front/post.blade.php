@extends('front.layouts.master')
@section('title', Str::limit($article->title,40).' / Blog Demo')
@section('headerTitle', $article->title)
@section('headerBg', asset($article->image))

@section('content')

<div class="col-md-9">
    {!!$article->content!!}
    <br>
    <br>
    <span class="text-danger">
        Bu yazı <b>{{ $article->hit }}</b> kez okundu.
    </span>
</div>

<div class="col-md-3">
    @include('front.widgets.categoriesWidget')
</div>
<hr>

@endsection