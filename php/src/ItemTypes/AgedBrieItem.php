<?php

namespace GildedRose\ItemTypes;

use GildedRose\ItemTypes\Abstractions\AbstractItem;

class AgedBrieItem extends AbstractItem
{
    public function updateQuality(): void
    {
        $this->item->quality = $this->item->quality + 1;
    }
}