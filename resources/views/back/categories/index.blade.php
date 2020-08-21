@extends('back.layouts.master')
@section('title','Admin Kategoriler - Blog Demo')
@section('pageHeading','Kategoriler')


@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Yeni Kategori Oluştur
                </h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.kategoriler.create') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Kategori Adı:</label>
                        <input type="text" class="form-control" name="name" id="categoryName" required />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    @yield('pageHeading')
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Adı</th>
                                <th>Makale Sayısı</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->getArticlesCount() }}</td>
                                <td class="align-middle text-center">
                                    <input type="checkbox" data-event="CategoryStatusSwitch" category-id="{{ $category->id }}" data-on="Aktif"
                                        data-off="Pasif" data-onstyle="success" data-offstyle="danger"
                                        @if($category->status==1) checked @endif
                                        data-toggle="toggle">
                                    <span style="display: none">
                                        @if($category->status==1) Aktif @else Pasif @endif
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <div>
                                        <button type="button" class="btn btn-sm btn-primary btn-circle dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu">
                                            <a href="#" data-event="CategoryEdit" category-id="{{ $category->id }}" class="dropdown-item">
                                                <i class="fa fa-pen"></i>
                                                Düzenle
                                            </a>
                                            <a href="#" data-event="ArticleDelete" class="dropdown-item">
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
    </div>
</div>

@endsection


@push('css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush

@push('js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="{{ asset('js/back/categories/index.js') }}" type="text/javascript"></script>
@endpush