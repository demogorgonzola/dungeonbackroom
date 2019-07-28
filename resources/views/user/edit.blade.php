@extends('layout')

@section('content')
<div class="container">
    <h1 class="title">So you want to drop your dead name...</h1>
    <form class="" action="/user/{{ $id }}" method="POST">
        @csrf
        @method('PATCH')

        @component('partials.field', ['label' => 'User Name', 'icon' => 'user'])
        <input class="input" type="text" name="name" value="{{ $name }}" placeholder="Something cool..." required>
        @endcomponent

        @component('partials.field', ['label' => 'Email', 'icon' => 'envelope'])
        <input class="input" type="email" name="email" value="{{ $email }}" placeholder="Something reachable..." required>
        @endcomponent

        @component('partials.field', ['label' => 'New Password', 'icon' => 'lock'])
        <input class="input" type="password" name="password" placeholder="Something secret...">
        @endcomponent

        @component('partials.field', ['icon' => 'check-double'])
        <input class="input" type="password" name="password_confirmation" placeholder="Something secret...again...">
        @endcomponent

        @component('partials.field')
        <button class="button is-link" type="submit">Update!</button>
        @endcomponent

        @include('partials.error')
    </form>
</div>
@endsection
