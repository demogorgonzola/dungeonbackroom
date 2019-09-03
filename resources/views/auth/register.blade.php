@extends('layouts.app')

@section('content')
<div class="container">
    <div class="tabs">
            <ul>
                <li>
                    <a class="title" href="{{ route('login') }}">
                            {{ __('Login') }}
                    </a>
                </li>
                <li class="is-active">
                    @if (Route::has('register'))
                        <a class="title">
                            {{ __('Register') }}
                        </a>
                    @endif
                </li>
            </ul>
        </div>

    <form class="box" action="{{ route('register') }}" method="POST">
        @csrf

        @component('partials.field', ['label' => 'User Name', 'icon' => 'user'])
        <input class="input" type="text" name="name" placeholder="Something cool..." required>
        @endcomponent

        @component('partials.field', ['label' => 'Email', 'icon' => 'envelope'])
        <input class="input" type="email" name="email" placeholder="Something reachable..." required>
        @endcomponent

        @component('partials.field', ['label' => 'Password', 'icon' => 'lock'])
        <input class="input" type="password" name="password" placeholder="Something secret..." required>
        @endcomponent

        @component('partials.field', ['icon' => 'check-double'])
        <input class="input" type="password" name="password_confirmation" placeholder="Something secret...again..." required>
        @endcomponent

        @component('partials.field')
        <button class="button is-link is-medium" type="submit">Create!</button>
        @endcomponent

        @include('partials.error')
    </form>
</div>
@endsection
