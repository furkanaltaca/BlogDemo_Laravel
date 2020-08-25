@extends('front.layouts.master')
@section('title', $category->name.' / Blog Demo')
@section('headerTitle', $category->name.' Kategorisi')
@section('subHeaderTitle', $category->articles()->count().' yazı bulundu.')

@section('content')

<div class="col-md-9 mx-auto">
    @include('front.widgets.articlesWidget')
</div>

<div class="col-md-3">
    @include('front.widgets.categoriesWidget')
</div>

@endsection