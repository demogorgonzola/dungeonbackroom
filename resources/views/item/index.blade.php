@extends('layout')

@section('title', 'Items')

@section('content')
<div class="">
    <ul>
        @foreach($character_item_stats as $id => $character_item_stat)
        <?php
            $encumbered = $character_item_stat['encumbered'];

            $character_class = 'unencumbered';
            if($encumbered) {
                $character_class = 'encumbered notification is-warning';
            }
        ?>
        <div id='character-{{ $id }}' class='{{ $character_class }}'>
            <p>Name: {{ $character_item_stat['name'] }}</p>
            <p>Str Score: {{$character_item_stat['str'] }}</p>
            <ol>
                @foreach($character_item_stat['items'] as $item)
                <li>{{ $item['name'] }} , {{ $item['weight'] }}</li>
                @endforeach
            </ol>
            <p>Current Carry: {{ $character_item_stat['current_carry'] }}</p>
            <p>Carry Capacity: {{ $character_item_stat['carry_capacity'] }}</p>
        </div>
        <br>
        @endforeach
    </ul>
</div>
@endsection
