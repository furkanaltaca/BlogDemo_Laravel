<div class="form-check">
    <input type="checkbox" class="form-check-input" data-event="UpdateArticleStatus" data-article-id="{{ $article->id }}"
     @if($article->status==1) checked @endif>
    <label class="form-check-label" for="exampleCheck1">
        <span style="display: block">
            @if($article->status==1) Aktif @else Pasif @endif
        </span>
    </label>
</div>