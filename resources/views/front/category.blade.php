@extends('front.layouts.master')
@section('title', $category->name.' / Blog Demo')
@section('headerTitle', $category->name.' Kategorisi')
@section('subHeaderTitle', count($news).' yazı bulundu.')

@section('content')

<!-- Main Content -->
<div class="col-md-9 mx-auto">

    @if(count($news)>0)

        @foreach($news as $newsItem)
        <div class="post-preview">
            <a href="{{ route('post',[$newsItem->getCategory->slug,$newsItem->slug]) }}">
                <h2 class="post-title">
                    {{$newsItem->title}}
                </h2>
                <img src="{{$newsItem->image}}">
                <h3 class="post-subtitle">
                    {!!Str::limit($newsItem->content,150)!!}
                </h3>
            </a>
            <p class="post-meta">
                Kategori: <a href="{{route('category',$category->slug)}}">{{$category->name}}</a>
                <span class="float-right">{{$newsItem->created_at->diffForHumans()}}</span>
            </p>
        </div>
        
        @if(!$loop->last)
         <hr>
        @endif

        @endforeach

    @else
        <div class="alert alert-danger">
            <h6>Bu kategoride herhangi bir yazı bulunamadı.</h6>
        </div>
    @endif

</div>

<div class="col-md-3">
    @include('front.widgets.categoryWidget')
</div>

@endsection