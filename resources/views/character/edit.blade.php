@extends('layout')

@section('content')
<div class="container">
    <h1 class="title">Edit your character NERD...</h1>
    <form class="" action="/character" method="POST">
        @csrf

        @component('partials.field', ['label' => 'Name', 'icon' => 'hiking'])
        <input class="input" type="text" name="name" placeholder="Something cool..." required>
        @endcomponent

        @component('partials.field', ['label' => 'Strength', 'icon' => ''])
        <input class="input" type="text" name="email" placeholder="Something reachable..." required>
        @endcomponent

        @component('partials.field')
        <button class="button is-link" type="submit">Update!</button>
        @endcomponent

        @include('partials.error')
    </form>
</div>
@endsection
