@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">{{ __('Reset Password') }}</h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="box" method="POST" action="{{ route('password.email') }}">
        @csrf

        @component('partials.field', [
            'label' => 'Email Address',
            'icon' => 'envelope',
        ])
            <input class="input @error('email') is-invalid @enderror"
                type="email"
                name="email"
                value="{{ old('email') }}"
                autocomplete="email"
                required
                autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        @endcomponent

        @component('partials.field')
            <button type="submit" class="button is-primary">
                {{ __('Send Password Reset Link') }}
            </button>
        @endcomponent
    </form>
</div>
@endsection
