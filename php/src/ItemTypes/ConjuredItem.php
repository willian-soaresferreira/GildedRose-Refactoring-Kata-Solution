<?php


namespace GildedRose\ItemTypes;

use GildedRose\Item;
use GildedRose\ItemTypes\Abstractions\AbstractItem;

class ConjuredItem extends AbstractItem
{
    public function __construct(Item $item)
    {
        parent::__construct($item);
        $this->defaultQualityToDecrease = 2;
    }
}