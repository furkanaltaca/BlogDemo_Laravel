@if(count($articles)>0)

@foreach($articles as $article)
<div class="post-preview">
    <a href="{{ route('post',[ $article->getCategory->slug,$article->slug ]) }}">
        <h2 class="post-title">
            {{ $article->title }}
        </h2>
        <img src="{{ $article->image }}">
        <h3 class="post-subtitle">
            {!! Str::limit($article->content,150) !!}
        </h3>
    </a>
    <p class="post-meta">
        Kategori:
        <a href="{{ route('category',$article->getCategory->slug) }}">
            {{ $article->getCategory->name }}
        </a>
        <span class="float-right">
            {{ $article->created_at->diffForHumans() }}
        </span>
    </p>
</div>
@if(!$loop->last)
<hr>
@endif
@endforeach

<div class="float-right">
    {{ $articles->links() }}
</div>

@else
<div class="alert alert-danger">
    Yazı bulunamadı.
</div>
@endif