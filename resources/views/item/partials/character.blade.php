<?php
    $encumbered = $character_item_stat['encumbered'];

    $character_class = 'unencumbered';
    if($encumbered) {
        $character_class = 'encumbered notification is-warning';
    }
?>
<div id='character-{{ $id }}' class='{{ $character_class }} charater-items'>
    <p>Name: {{ $character_item_stat['name'] }}</p>
    <p>Str Score: {{$character_item_stat['str'] }}</p>
    <span class='item-list container'>
        @foreach($character_item_stat['items'] as $item)
        <span class='item-entry columns'>
            @include('item.partials.item-entry', compact($item))
        </span>
        @endforeach
    </span>
    <p>Current Carry: {{ $character_item_stat['current_carry'] }}</p>
    <p>Carry Capacity: {{ $character_item_stat['carry_capacity'] }}</p>
</div>
