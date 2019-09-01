@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="level">
        <div class='level-left'>
            <div class='level-item'>
                <h1 class="title">
                    {{ __('Account Information') }}
                </h1>
            </div>
        </div>
        <div class='level-right'>
            <div class='level-item'>
                @include('partials.logout');
            </div>
        </div>
    </nav>
    <div class="box">
        <div class="field">
            <label class="label">
                {{ __('Display Name') }}
            </label>
            <p>
                {{ $name }}
            </p>
        </div>

        <div class="field">
            <label class="label">
                {{ __('Email') }}
            </label>
            <p>
                {{ $email }}
            </p>
        </div>
    </div>

</div>
@endsection
