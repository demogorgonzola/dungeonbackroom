@extends('layout')

@section('content')
    <div class="container">
        <h1 class="title">{{ $name }}</h1>
        <p> <a href="#"> Strength: {{ $str }} </a> </p>
    </div>

@endsection
