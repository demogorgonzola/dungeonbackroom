@extends('layout')

@section('content')
<div class="container">
    <h1 class="title">So you want to be a nerd...</h1>
    <form class="" action="/user" method="POST">
        @csrf

        @component('partials.field', ['label' => 'User Name', 'icon' => 'user'])
        <input class="input" type="text" name="name" placeholder="Something cool..." required>
        @endcomponent

        @component('partials.field', ['label' => 'Email', 'icon' => 'envelope'])
        <input class="input" type="text" name="email" placeholder="Something reachable..." required>
        @endcomponent

        @component('partials.field', ['label' => 'Password', 'icon' => 'lock'])
        <input class="input" type="text" name="password" placeholder="Something secret..." required>
        @endcomponent

        @component('partials.field', ['icon' => 'check-double'])
        <input class="input" type="text" name="password_confirmation" placeholder="Something secret...again..." required>
        @endcomponent

        @component('partials.field')
        <button class="button is-link" type="submit">Create!</button>
        @endcomponent

        @include('partials.error')
    </form>
</div>
@endsection
