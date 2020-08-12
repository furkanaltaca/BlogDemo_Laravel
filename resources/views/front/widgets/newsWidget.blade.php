@if(count($news)>0)

@foreach($news as $newsItem)
<div class="post-preview">
    <a href="{{ route('post',[ $newsItem->getCategory->slug,$newsItem->slug ]) }}">
        <h2 class="post-title">
            {{ $newsItem->title }}
        </h2>
        <img src="{{ $newsItem->image }}">
        <h3 class="post-subtitle">
            {!! Str::limit($newsItem->content,150) !!}
        </h3>
    </a>
    <p class="post-meta">
        Kategori:
        <a href="{{ route('category',$newsItem->getCategory->slug) }}">
            {{ $newsItem->getCategory->name }}
        </a>
        <span class="float-right">
            {{ $newsItem->created_at->diffForHumans() }}
        </span>
    </p>
</div>
@if(!$loop->last)
<hr>
@endif
@endforeach
<div class="float-right">
    {{ $news->links() }}
</div>

@else
<div class="alert alert-danger">
    <h6>Yazı bulunamadı.</h6>
</div>
@endif