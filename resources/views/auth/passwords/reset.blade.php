@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="title">{{ __('Reset Password') }}</h1>

    <form class="box" method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        @component('partials.field', [
            'label' => 'Email Address',
            'icon' => 'envelope',
        ])
            <input class="input @error('email') is-invalid @enderror"
                type="email"
                name="email"
                value="{{ $email ?? old('email') }}"
                autocomplete="email"
                required
                autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        @endcomponent

        @component('partials.field', [
            'label' => 'Password',
            'icon' => 'lock',
        ])
            <input class="input @error('password') is-invalid @enderror"
                type="password"
                name="password"
                autocomplete="new-password"
                required>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        @endcomponent

        @component('partials.field', [
            'icon' => 'check-double'
        ])
            <input class="input @error('password') is-invalid @enderror"
                type="password"
                name="password_confirmation"
                autocomplete="new-password"
                required>
        @endcomponent

        @component('partials.field')
            <input class="button is-primary"
                type="submit"
                value="{{ __('Reset Password') }}">
        @endcomponent
    </form>
</div>
@endsection
