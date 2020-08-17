@extends('front.layouts.master')
@section('title', 'Anasayfa / Blog Demo')
@section('headerTitle', 'Blog Demo')

@section('content')

<div class="col-md-9 mx-auto">
    @include('front.widgets.articlesWidget')
</div>

<div class="col-md-3">
    @include('front.widgets.categoriesWidget')
</div>

@endsection