@extends('layouts.app')

@section('content')
<!-- Account Verify Page -->
<div class="container">
    <!-- Title Header -->
    <h1 class="title">
        {{ __('Verify Your Email Address') }}
    </h1>

    <!-- Verification Text -->
    <div class="box">
        <p>
            {{ __('Before proceeding,') }}
            {{ __('please check your email') }}
            {{ __('for a verification link.') }}
            {{ __('If you did not receive the email, ') }}
            <a href="{{ route('verification.resend') }}">
                {{ __('click here to request another') }}
            </a>
            {{ __('.') }}
        </p>
    </div>
</div>
@endsection
