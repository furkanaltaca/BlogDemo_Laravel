<div>
    <button type="button" class="btn btn-sm btn-primary btn-circle dropdown-toggle" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu">
        <a href="{{  route('post',[ $article->category->slug,$article->slug ]) }}" target="_blank"
            class="dropdown-item">
            <i class="fa fa-eye"></i>
            Görüntüle
        </a>
        <a href="{{ route('admin.makaleler.edit', $article->id) }}" class="dropdown-item">
            <i class="fa fa-pen"></i>
            Düzenle
        </a>
        <a href="javascript:void(0);" data-event="DeleteArticle"
            data-article-id="{{ $article->id }}" class="dropdown-item">
            <i class="fa fa-trash"></i>
            Sil
        </a>
    </div>
</div>