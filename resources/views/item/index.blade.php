@extends('layout')

@section('title', 'Items')

@section('content')
<div class="">
    <ul>
        @foreach($character_item_stats as $character_item_stat)
        <div class="{{ $character_item_stat['encumbered'] ? 'notification is-warning' : '' }}">
            <p>Name: {{ $character_item_stat['name'] }}</p>
            <p>Str Score: {{$character_item_stat['str'] }}</p>
            <ol>
                @foreach($character_item_stat['items'] as $item)
                <li>{{ $item['name'] }} , {{ $item['weight'] }}</li>
                @endforeach
            </ol>
            <p>Current Carry: {{ $character_item_stat['current_carry'] }}</p>
            <p>Carry Capacity: {{ $character_item_stat['carry_capacity'] }}</p>
            <br>
        </div>
        @endforeach
    </ul>
</div>
@endsection
