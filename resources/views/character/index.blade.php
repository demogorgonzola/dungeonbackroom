@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">Characters</h1>
        <a href="/character/create">Create new character!</a>
        <ul>
            @foreach($characters as $character)
                <li>
                    <a href="/character/{{ $character->id }}">
                        {{ $character->name }}
                    </a>
                </li>
            @endforeach
        </ul>

    </div>
@endsection
