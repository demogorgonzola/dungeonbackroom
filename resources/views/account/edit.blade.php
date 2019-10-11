@extends('layouts.app')

@section('content')
<!-- Account Edit Page -->
<div class="container">
    <!-- Title Header -->
    <div class="level">
        <span class="level-left">
            <h1 class="title">
                {{ __('Edit Account Information') }}
            </h1>
        </span>
    </div>

    <!-- Edit account information. -->
    <form class="box" action="/account/update" method="POST">
        @csrf

        @method('PATCH')

        <!-- Display Name Field -->
        @component('partials.field', [
            'label' => 'Display Name',
            'icon' => 'user',
        ])
            <input class="input" name="name" value="{{ $name }}">
        @endcomponent

        <!-- Email Field -->
        @component('partials.field', [
            'label' => 'Email',
            'icon' => 'envelope'
        ])
            <input class="input" name="email" value="{{ $email }}">
        @endcomponent

        <!-- Submit/Back -->
        <input class="button is-success"
            type="submit"
            value="{{ __('Update') }}">
        <a class="button is-danger" href="{{ route('account.index') }}">
            {{ __('Back') }}
        </a>
    </form>
</div>
@endsection
