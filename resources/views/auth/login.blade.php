@extends('layouts.app')

@section('content')
<!-- Account Login Page -->
<div class="container">
    <!-- Login/Register -->
    @component('partials.tabs')
        <!-- Login -->
        @component('partials.tab', [
            'is_active' => true,
            'class' => 'title',
            'route' => route('login'),
        ])
            {{ __('Login') }}
        @endcomponent

        <!-- Register -->
        @if (Route::has('register'))
            @component('partials.tab', [
                'class' => 'title',
                'route' => route('register'),
            ])
                {{ __('Register') }}
            @endcomponent
        @endif
    @endcomponent

    <!-- Login to an exisiting account. -->
    <form class="box" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Field -->
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

        <!-- Password Field -->
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

        <!-- Remember Me Field -->
        @component('partials.field')
            <label class="checkbox">
                <input type="checkbox" name="remember">
                {{ __('Remember Me') }}
            </label>
        @endcomponent

        <!-- Submit/Reset -->
        <div class="level">
            <!-- Submit -->
            <input class="button is-primary is-medium"
                type="submit"
                value="{{ __('Login') }}">

            <!-- Reset -->
            @include('partials.reset-widget')
        </div>
    </form>
</div>
@endsection
