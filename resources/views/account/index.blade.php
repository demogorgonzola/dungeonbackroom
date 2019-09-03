@extends('layouts.app')

@section('content')
<div class="container">
    <div class="level">
        <span class="level-left">
            <h1 class="title">
                {{ __('Account Information') }}
            </h1>
        </span>
        <span class="level-right">
            @include('partials.logout')
        </span>
    </div>
    <div class="box">
        @component('partials.field', [
            'label' => __('Display Name'),
            'icon' => 'user',
        ])
            <input class="input info" name="name" value="{{ $name }}" disabled>
        @endcomponent
        @component('partials.field', [
            'label' => __('Email'),
            'icon' => 'envelope'
        ])
            <input class="input info" name="email" value="{{ $email }}" disabled>
        @endcomponent
        <a class="button is-link" href="{{ route('account.edit') }}">
            {{ __('Edit') }}
        </a>
    </div>
</div>
@endsection
