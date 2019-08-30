@extends('layout.header')

@section('head')
<a class="navbar-item is-active" href="/home">
    Home
</a>
<a class="navbar-item" href="/character">
    Characters
</a>
<span class="navbar-item">
    @include('partials.account')
</span>
@endsection

@section('body')
<h1 class="title">Dungeons and Dragons Utility</h1>
<h2 class="subtitle">Tools to help you slay dragons</h2>
@endsection

@section('footer-left')
@endsection

@section('footer-right')
@endsection
