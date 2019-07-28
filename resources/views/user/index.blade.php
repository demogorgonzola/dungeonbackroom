@extends('layout')

@section('content')
<h1>These are some of the made user names...</h1>
<ul>
    @foreach($users as $user)
    <li>{{ $user->name }}</li>
    @endforeach
</ul>
@endsection
