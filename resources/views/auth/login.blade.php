@extends('layouts.app')

@section('content')
<div class="container">
    @component('partials.tabs')
        @component('partials.tab', [
            'is_active' => true,
            'class' => 'title',
            'route' => route('login'),
        ])
            {{ __('Login') }}
        @endcomponent
        @if (Route::has('register'))
            @component('partials.tab', [
                'class' => 'title',
                'route' => route('register'),
            ])
                {{ __('Register') }}
            @endcomponent
        @endif
    @endcomponent

    <form class="box" method="POST" action="{{ route('login') }}">
        @csrf

        @component('partials.field' ,[
            'label' => 'Email Address',
            'icon' => 'envelope',
        ])
            <input class="input @error('email') is-danger @enderror"
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

        <div class="level">
            <input class="button is-primary is-medium"
                type="submit"
                value="{{ __('Login') }}">

            @include('partials.reset-widget')
        </div>
    </form>
</div>
@endsection
