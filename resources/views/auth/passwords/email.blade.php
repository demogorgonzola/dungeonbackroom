@extends ('layouts.app')

@section ('content')
<div class="container">
    <h1 class="title">
        {{ __('Reset Password') }}
    </h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="box" method="POST" action="{{ route('password.email') }}">
        @csrf

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

        <input class="button is-primary is-medium"
            type="submit"
            value="{{ __('Send password reset link') }}">
    </form>
</div>
@endsection
