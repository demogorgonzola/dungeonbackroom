@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">
        {{ __('Reset Password') }}
    </h1>

    <form class="box" method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        @component('partials.field', [
            'label' => 'Email Address',
            'icon' => 'envelope',
        ])
            <input class="input @error('email') is-danger @enderror"
                type="email"
                name="email"
                value="{{ $email ?? old('email') }}"
                autocomplete="email"
                required
                autofocus>
        @endcomponent

        @component('partials.field', [
            'label' => 'Password',
            'icon' => 'lock',
        ])
            <input class="input @error('password') is-danger @enderror"
                type="password"
                name="password"
                placeholder="Something secret..."
                autocomplete="new-password"
                required>
        @endcomponent

        @component('partials.field', [
            'icon' => 'check-double'
        ])
            <input class="input @error('password') is-danger @enderror"
                type="password"
                name="password_confirmation"
                placeholder="Something secret...again..."
                autocomplete="new-password"
                required>
        @endcomponent

        <input class="button is-primary is-medium"
            type="submit"
            value="{{ __('Reset Password') }}">
    </form>
</div>
@endsection
