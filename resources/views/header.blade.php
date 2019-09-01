@extends('layouts.header')

@section('head')
<a class="navbar-item is-active" href="/home">
    Home
</a>
<a class="navbar-item" href="/character">
    Characters
</a>
<span class="navbar-item">
    @include('partials.account-widget')
</span>
@endsection

@section('body')
<h1 class="title">Dungeons and Dragons Utility</h1>
<h2 class="subtitle">Tools to help you slay dragons</h2>
@endsection

@section('footer-left')
<p class="level-item is-active"><a href="/character">Overview</a></p>
<p class="level-item"><a href="/item">Stuff</a></p>
@endsection

@section('footer-right')
<p class="level-item title is-3"><a>{{ Session::get('character_name') ?? 'None' }}</a></p>
@endsection
