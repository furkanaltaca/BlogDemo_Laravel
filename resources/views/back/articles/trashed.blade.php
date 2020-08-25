@extends('back.layouts.master')
@section('title','Silinen Makaleler - Blog Demo Admin')
@section('pageHeading','Silinen Makaleler')

@push('url')
<script type="text/javascript">
    var urlGetAllTrashedArticle ='{{ route("admin.makaleler.trashed") }}';
    var urlRecoverArticle='{{ route("admin.makaleler.recover") }}';
    var urlHardDeleteArticle='{{ route("admin.makaleler.hardDelete") }}';
</script>
@endpush

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield('pageHeading')</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="trashedArticleDatatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Başlık</th>
                        <th>Kategori</th>
                        <th>Hit</th>
                        <th>Oluşturulma</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@endsection


@push('css')
@endpush

@push('js')
<script src="{{ asset('js/back/articles/trashed.js') }}" type="text/javascript"></script>
@endpush