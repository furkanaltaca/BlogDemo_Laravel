<div>
    <button type="button" class="btn btn-sm btn-primary btn-circle dropdown-toggle" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu">
        <a href="javascript:void(0);" data-event="RecoverArticle"
        data-article-id="{{ $article->id }}" class="dropdown-item">
            <i class="fa fa-trash-restore"></i>
            Kurtar
        </a>
        <a href="javascript:void(0);" data-event="HardDeleteArticle"
            data-article-id="{{ $article->id }}" class="dropdown-item">
            <i class="fa fa-times"></i>
            Kalıcı olarak sil
        </a>
    </div>
</div>