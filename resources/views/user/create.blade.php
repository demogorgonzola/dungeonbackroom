@extends('layout')

@section('content')
<div class="container">
    <h1 class="title">So you want to be a nerd...</h1>
    <form class="" action="/user" method="POST">
        @csrf
        <div class="field">
            <label class="label">User Name</label>
            <div class="control">
                <input class="input" type="text" name="name" placeholder="Something cool..." required>
            </div>
        </div>
        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" type="text" name="email" placeholder="Something reachable..." required>
            </div>
        </div>
        <div class="field">
            <label class="label">Password</label>
            <div class="control">
                <input class="input" type="text" name="password" placeholder="Something secret..." required>
            </div>
        </div>
        <div class="field">
            <label class="label">Confirm Password</label>
            <div class="control">
                <input class="input" type="text" name="password_confirmation" placeholder="Something secret...again..." required>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button class="button is-link" type="submit">Create!</button>
            </div>
        </div>

        @if($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                </ul>
            </div>
            @endif
    </form>
</div>
@endsection
