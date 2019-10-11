@extends ('layouts.app')

@section ('content')
<!-- Reset Password Email Page -->
<div class="container">
    <!-- Title Header -->
    <h1 class="title">
        {{ __('Reset Password') }}
    </h1>

    <!-- Email the address given with a reset link. -->
    <form class="box" method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Field -->
        @component ('partials.field', [
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

        <!-- Submit -->
        <input class="button is-primary is-medium"
            type="submit"
            value="{{ __('Send password reset link') }}">
    </form>
</div>
@endsection
