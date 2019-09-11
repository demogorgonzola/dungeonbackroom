@extends('layouts.app')

@section('content')
<div class="container">
    @component('partials.tabs')
        @component('partials.tab', [
            'class' => 'title',
            'route' => route('login'),
        ])
            {{ __('Login') }}
        @endcomponent
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

    <form class="box" action="{{ route('register') }}" method="POST">
        @csrf

        @component('partials.field', ['label' => 'User Name', 'icon' => 'user'])
            <input class="input"
                type="text"
                name="name"
                placeholder="Something cool..."
                required>
        @endcomponent

        @component('partials.field', ['label' => 'Email', 'icon' => 'envelope'])
            <input class="input"
                type="email"
                name="email"
                placeholder="Something reachable..."
                required>
        @endcomponent

        @component('partials.field', ['label' => 'Password', 'icon' => 'lock'])
            <input class="input"
                type="password"
                name="password"
                placeholder="Something secret..."
                required>
        @endcomponent

        @component('partials.field', ['icon' => 'check-double'])
            <input class="input"
                type="password"
                name="password_confirmation"
                placeholder="Something secret...again..."
                required>
        @endcomponent

        <input class="button is-primary is-medium"
            type="submit"
            value="Create!">
    </form>
</div>
@endsection
