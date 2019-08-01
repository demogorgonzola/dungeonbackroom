@extends('layouts.app')

@section('title', 'Items')

@section('content')
<div class="container">
    <ul>
        @foreach($character_item_stats as $id => $character_item_stat)
            @include('item.partials.character', compact($character_item_stat))
        @endforeach
    </ul>
</div>
@endsection
