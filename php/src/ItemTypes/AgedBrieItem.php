<?php

namespace GildedRose\ItemTypes;

use GildedRose\ItemTypes\Abstractions\AbstractItem;

class AgedBrieItem extends AbstractItem
{
    public function updateQuality(): void
    {
        if ($this->item->quality < 50) {
            $this->item->quality = $this->item->quality + 1;
        }
    }
}