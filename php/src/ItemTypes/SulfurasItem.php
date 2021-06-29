<?php


namespace GildedRose\ItemTypes;

use GildedRose\Item;
use GildedRose\ItemTypes\Abstractions\AbstractItem;

class SulfurasItem extends AbstractItem
{
    public function updateQuality(): void
    {
        $this->item->quality = 80;
    }

    public function updateSellIn(): void
    {
        $this->item->sell_in = 0;
    }
}