@extends('back.layouts.master')
@section('title','Admin Tüm Makaleler - Blog Demo')
@section('pageHeading','Tüm Makaleler')

@push('url')
<script type="text/javascript">
    var urlGetAllArticle ='{{ route("admin.makaleler.index") }}';
    var urlDeleteArticle = '{{ route("admin.makaleler.delete") }}';
    var urlUpdateArticleStatus='{{ route("admin.makaleler.updateStatus") }}';
</script>
@endpush

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Makaleler
            <span class="float-right">
                <strong>{{ $articles->count() }}</strong> makale bulundu.
            </span>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="articleDatatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Başlık</th>
                        <th>Kategori</th>
                        <th>Hit</th>
                        <th>Oluşturulma</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@endsection


@push('css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush

@push('js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="{{ asset('js/back/articles/index.js') }}" type="text/javascript"></script>
@endpush