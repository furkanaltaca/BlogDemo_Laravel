@extends('front.layouts.master')
@section('title', 'Anasayfa / Blog Demo')
@section('headerTitle', 'Blog Demo')

@section('content')

<!-- Main Content -->
<div class="col-md-9 mx-auto">
    @include('front.widgets.newsWidget')
</div>

<div class="col-md-3">
    @include('front.widgets.categoryWidget')
</div>

@endsection