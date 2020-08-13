@extends('front.layouts.master')
@section('title', Str::limit($newsItem->title,40).' / Blog Demo')
@section('headerTitle', $newsItem->title)
@section('headerBg', $newsItem->image)

@section('content')

<div class="col-md-9">
    {!!$newsItem->content!!}
    <br>
    <br>
    <span class="text-danger">
        Bu yazı <b>{{ $newsItem->hit }}</b> kez okundu.
    </span>
</div>

<div class="col-md-3">
    @include('front.widgets.categoryWidget')
</div>
<hr>

@endsection