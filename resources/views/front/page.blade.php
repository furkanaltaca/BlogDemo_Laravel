@extends('front.layouts.master')
@section('title', $page->title.' / Blog Demo')
@section('headerTitle', $page->title)
@section('headerBg', $page->image)

@section('content')

<div class="col-md-10 mx-auto">
    <p>
        {!! $page->content !!}
    </p>
</div>

<hr>

@endsection