@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">Update your character NERD...</h1>
    <form class="" action="/character/{{ $id }}" method="POST">
        @csrf
        @method('PATCH')

        @component('partials.field', ['label' => 'Name', 'icon' => 'child'])
        <input class="input" type="text" name="name" value="{{ $name }}" placeholder="Something cool..." required>
        @endcomponent

        @component('partials.field', ['label' => 'Strength', 'icon' => 'hand-rock'])
        <input class="input" type="text" name="str" value="{{ $str }}" placeholder="0-20" required>
        @endcomponent

        @component('partials.field')
        <input class="button is-link" type="submit" value="{{ __('Update!') }}">
        @endcomponent

        @include('partials.error')
    </form>
</div>
@endsection
