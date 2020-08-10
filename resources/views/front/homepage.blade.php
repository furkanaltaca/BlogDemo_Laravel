@extends('front.layouts.master')
@section('title', 'Anasayfa / Blog Demo')

@section('content')

<!-- Main Content -->
<div class="col-md-9 mx-auto">
    @foreach($news as $newsItem)
    <div class="post-preview">
        <a href="post.html">
            <h2 class="post-title">
                {{$newsItem->title}}
            </h2>
            <h3 class="post-subtitle">
                {{Str::limit($newsItem->content,80)}}
            </h3>
        </a>
        <p class="post-meta">
            Kategori: <a href="#">{{$newsItem->getCategory->name}}</a>
            <span class="float-right">{{$newsItem->created_at->diffForHumans()}}</span>
        </p>
    </div>
    @if(!$loop->last)
    <hr>
    @endif
    @endforeach
</div>

<div class="col-md-3">
    @include('front.widgets.categoryWidget')
</div>

@endsection