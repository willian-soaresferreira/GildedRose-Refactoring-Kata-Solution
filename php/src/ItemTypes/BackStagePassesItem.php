<?php


namespace GildedRose\ItemTypes;

use GildedRose\ItemTypes\Abstractions\AbstractItem;

class BackStagePassesItem extends AbstractItem
{
    public function updateQuality(): void
    {
        if ($this->item->sell_in < 0) {
            $this->item->quality = 0;
            return;
        }

        if ($this->item->quality < 50) {
            $this->item->quality = $this->item->quality + 1;
        }

        if ($this->item->sell_in <= 10) {
            $this->item->quality = $this->item->quality + 1;
        }

        if ($this->item->sell_in <= 5) {
            $this->item->quality = $this->item->quality + 1;
        }
    }
}