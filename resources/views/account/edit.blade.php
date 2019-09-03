@extends('layouts.app')

@section('content')
<div class="container">
    <div class="level">
        <span class="level-left">
            <h1 class="title">
                {{ __('Edit Account Information') }}
            </h1>
        </span>
    </div>
    <form class="box" action="/account/update" method="POST">
        @csrf
        @method('PATCH')
        @component('partials.field', [
            'label' => __('Display Name'),
            'icon' => 'user',
        ])
            <input class="input" name="name" value="{{ $name }}">
        @endcomponent
        @component('partials.field', [
            'label' => __('Email'),
            'icon' => 'envelope'
        ])
            <input class="input" name="email" value="{{ $email }}">
        @endcomponent
        @component('partials.field')
            <input class="button is-success"
                type="submit"
                value="{{ __('Update') }}">
            <a class="button is-danger" href="{{ route('account.index') }}">
                {{ __('Back') }}
            </a>
        @endcomponent
    </form>
</div>
@endsection
