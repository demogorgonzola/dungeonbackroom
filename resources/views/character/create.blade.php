@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">Enter your character NERD...</h1>
    <form class="" action="/character" method="POST">
        @csrf

        @component('partials.field', ['label' => 'Name', 'icon' => 'child'])
        <input class="input" type="text" name="name" placeholder="Something cool..." required>
        @endcomponent

        @component('partials.field', ['label' => 'Strength', 'icon' => 'hand-rock'])
        <input class="input" type="text" name="str" placeholder="0-20" required>
        @endcomponent

        @component('partials.field')
        <button class="button is-link" type="submit">Create!</button>
        @endcomponent

        @include('partials.error')
    </form>
</div>
@endsection
