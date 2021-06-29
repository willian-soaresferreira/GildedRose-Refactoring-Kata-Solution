<?php


namespace GildedRose\ItemTypes;

use GildedRose\ItemTypes\Abstractions\AbstractItem;

class ConjuredItem extends AbstractItem
{
    public function updateQuality(): void
    {
        $qualityToDecrease = 0;

        if ($this->item->quality > 0) {
            $qualityToDecrease = 2;
        }

        if ($this->item->sell_in < 0) {
            $qualityToDecrease = $qualityToDecrease * 2;
        }

        $this->item->quality = $this->item->quality - $qualityToDecrease;
    }
}