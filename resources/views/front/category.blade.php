@extends('front.layouts.master')
@section('title', $category->name.' / Blog Demo')
@section('headerTitle', $category->name.' Kategorisi')
@section('subHeaderTitle', $category->getNewsCount().' yazı bulundu.')

@section('content')

<div class="col-md-9 mx-auto">
    @include('front.widgets.newsWidget')
</div>

<div class="col-md-3">
    @include('front.widgets.categoryWidget')
</div>

@endsection