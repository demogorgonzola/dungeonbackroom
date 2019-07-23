<?php

namespace App\Logic;

use Illuminate\Support\Collection;

class CharacterWeight {

    /**
     * Minimum possible carry weight: 30(str. score max) * 15 = 450lbs
     * @var int
     */
    public static $MAX_CARRY_MULTIPLIER = 15;

    /**
     * The max carry capacity of a character
     * @param  int      $str_score  characters str. score
     * @return float                characters carry capacity
     */
    public static function carryCapacity(int $str_score)
    {
        return (float) ($str_score * static::$MAX_CARRY_MULTIPLIER);
    }

    /**
     * Sum of all item weights in a collection
     * @param  Collection   $items  a collection of items
     * @return float                total weight of the item collection
     */
    public static function totalWeightOfItems(Collection $items)
    {
        return $items->sum('weight');
    }
}
