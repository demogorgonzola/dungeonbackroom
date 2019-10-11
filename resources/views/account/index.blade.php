@extends('layouts.app')

@section('content')
<!-- Account Page -->
<div class="container">
    <!-- Title/Logout -->
    <div class="level">
         <!-- Title Header -->
        <span class="level-left">
            <h1 class="title">
                {{ __('Account Information') }}
            </h1>
        </span>
         <!-- Logout -->
        <span class="level-right">
            @include('partials.logout')
        </span>
    </div>

    <!-- Account Information -->
    <div class="box">
        <!-- Display Name -->
        @component('partials.field', [
            'label' => 'Display Name',
            'icon' => 'user',
        ])
            <input class="input info" name="name" value="{{ $name }}" disabled>
        @endcomponent

        <!-- Email -->
        @component('partials.field', [
            'label' => 'Email',
            'icon' => 'envelope'
        ])
            <input class="input info" name="email" value="{{ $email }}" disabled>
        @endcomponent

        <!-- Edit Button -->
        <a class="button is-link" href="{{ route('account.edit') }}">
            {{ __('Edit') }}
        </a>
    </div>
</div>
@endsection
