@extends('back.layouts.master')
@section('title','Admin Tüm Makaleler - Blog Demo')
@section('pageHeading','Tüm Makaleler')


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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                <tbody>
                    @foreach ($articles as $article)
                    <tr>
                        <td>
                            <a href="{{ asset($article->image) }}" target="_blank" data-toggle="popover-hover"
                                data-img="{{ asset($article->image) }}">
                                Fotoğraf
                                {{-- {{ Str::limit(Str::substr($article->image,22),16) }} --}}
                            </a>
                        </td>
                        <td class="align-middle">{{ $article->title }}</td>
                        <td class="align-middle">{{ $article->getCategory->name }}</td>
                        <td class="align-middle text-center">{{ $article->hit }}</td>
                        <td class="align-middle">{{ $article->created_at->diffforhumans() }}</td>
                        <td class="align-middle text-center">
                            <input type="checkbox" data-event="ArticleStatusSwitch" article-id="{{ $article->id }}"
                                data-on="Aktif" data-off="Pasif" data-onstyle="success" data-offstyle="danger"
                                @if($article->status==1)
                            checked @endif data-toggle="toggle">
                            <span style="display: none">
                                @if($article->status==1) Aktif @else Pasif @endif
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <div>
                                <button type="button" class="btn btn-sm btn-primary btn-circle dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu">
                                    <a href="{{  route('post',[ $article->getCategory->slug,$article->slug ]) }}"
                                        target="_blank" class="dropdown-item">
                                        <i class="fa fa-eye"></i>
                                        Görüntüle
                                    </a>
                                    <a href="{{ route('admin.makaleler.edit', $article->id) }}" class="dropdown-item">
                                        <i class="fa fa-pen"></i>
                                        Düzenle
                                    </a>
                                    <a href="{{ route('admin.makaleler.delete',$article->id) }}" data-event="ArticleDelete" article-id="{{ $article->id }}" class="dropdown-item">
                                        <i class="fa fa-trash"></i>
                                        Sil
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@push('css')
<link href="{{ asset('back/') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush

@push('js')
<script src="{{ asset('back/') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('back/') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('back/') }}/js/demo/datatables-demo.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="{{ asset('js/back/articles/index.js') }}" type="text/javascript"></script>
@endpush
