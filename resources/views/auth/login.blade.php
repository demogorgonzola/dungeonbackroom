@extends('layouts.app')

@section('content')
<div class="container">
    <div class="tabs">
        <ul>
            <li class="is-active">
                <a class="title">
                        {{ __('Login') }}
                </a>
            </li>
            <li>
                @if (Route::has('register'))
                    <a class="title" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                @endif
            </li>
        </ul>
    </div>

    <form class="box" method="POST" action="{{ route('login') }}">
        @csrf

        @component('partials.field' ,[
            'label' => 'Email Address',
            'icon' => 'envelope',
        ])
            <input class="input"
                type="email"
                name="email"
                value="{{ old('email') }}"
                autocomplete="email"
                required
                autofocus>
        @endcomponent

        @component('partials.field', [
            'label' => 'Password',
            'icon' => 'lock',
        ])
            <input class="input"
                type="password"
                name="password"
                autocomplete="current-password"
                required>
        @endcomponent

        @component('partials.field')
            <label class="checkbox">
                <input type="checkbox" name="remember">
                {{ __('Remember Me') }}
            </label>
        @endcomponent

        @component('partials.field')
            <div class="level">
                <input class="button is-primary is-medium"
                    type="submit"
                    value="{{ __('Login') }}">

                @if (Route::has('password.request'))
                    <a class="is-link is-small" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        @endcomponent
    </form>
</div>
@endsection
