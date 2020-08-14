@extends('front.layouts.master')
@section('title', 'İletişim / Blog Demo')
@section('headerTitle', 'Bizimle İletişime Geçin')
@section('headerBg', 'https://startbootstrap.github.io/startbootstrap-clean-blog/img/contact-bg.jpg')

@section('content')


<div class="col-md-8 mx-auto">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') ?? '' }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p>İletişime geçmek için formu doldurunuz.</p>

    <form method="post" action="{{ route('contact.post') }}">
        @csrf
        <div class="control-group">
            <div class="form-group">
                <label>Ad Soyad</label>
                <input type="text" class="form-control" placeholder="Ad Soyad" name="name" id="name" required value="{{ old('name') }}">
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="control-group">
            <div class="form-group">
                <label>Email Adresi</label>
                <input type="email" class="form-control" placeholder="Email Adresi" name="email" id="email" required value="{{ old('email') }}">
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="control-group">
            <div class="form-group col-xs-12">
                <label>Konu</label>
                <select class="form-control" name="topic" id="topic">
                    <option @if(old('topic')=='bilgi') selected @endif value="bilgi">Bilgi</option>
                    <option @if(old('topic')=='destek') selected @endif value="destek">Destek</option>
                    <option @if(old('topic')=='genel') selected @endif value="genel">Genel</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <div class="form-group">
                <label>Mesajınız</label>
                <textarea rows="5" class="form-control" placeholder="Message" name="message" id="message"
                    required >{{ old('message') }}</textarea>
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <br>
        <div id="success"></div>
        <button type="submit" class="btn btn-primary" id="sendMessageButton">Gönder</button>
    </form>
</div>

<div class="col-md-4">
    iletişim bilgileri
</div>

@endsection