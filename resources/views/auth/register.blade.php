@extends('layouts.app')

@section('content')
<!-- Account Register Page -->
<div class="container">
    <!-- Login/Register -->
    @component('partials.tabs')
        <!-- Login -->
        @component('partials.tab', [
            'class' => 'title',
            'route' => route('login'),
        ])
            {{ __('Login') }}
        @endcomponent

        <!-- Register -->
        @if (Route::has('register'))
            @component('partials.tab', [
                'is_active' => true,
                'class' => 'title',
                'route' => route('register'),
            ])
                {{ __('Register') }}
            @endcomponent
        @endif
    @endcomponent

    <!-- Register an account with the given fields. -->
    <form class="box" action="{{ route('register') }}" method="POST">
        @csrf

        <!-- Name Field -->
        @component('partials.field', ['label' => 'User Name', 'icon' => 'user'])
            <input class="input"
                type="text"
                name="name"
                placeholder="Something cool..."
                required>
        @endcomponent

        <!-- Email Field -->
        @component('partials.field', ['label' => 'Email', 'icon' => 'envelope'])
            <input class="input"
                type="email"
                name="email"
                placeholder="Something reachable..."
                required>
        @endcomponent

        <!-- Password Field -->
        @component('partials.field', ['label' => 'Password', 'icon' => 'lock'])
            <input class="input"
                type="password"
                name="password"
                placeholder="Something secret..."
                required>
        @endcomponent

        <!-- Password Confirmation Field -->
        @component('partials.field', ['icon' => 'check-double'])
            <input class="input"
                type="password"
                name="password_confirmation"
                placeholder="Something secret...again..."
                required>
        @endcomponent

        <!-- Submit -->
        <input class="button is-primary is-medium"
            type="submit"
            value="Create!">
    </form>
</div>
@endsection
