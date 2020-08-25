<input type="checkbox" 
    data-event="UpdateArticleStatus" 
    data-article-id="{{ $article->id }}"
    data-on="Aktif"
    data-off="Pasif"
    data-onstyle="success"
    data-offstyle="danger"
    @if($article->status==1) checked @endif
    data-toggle="toggle">

<span style="display: none">
    @if($article->status==1) Aktif @else Pasif @endif
</span>