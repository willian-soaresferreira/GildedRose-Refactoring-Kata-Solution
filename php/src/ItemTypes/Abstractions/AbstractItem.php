<?php


namespace GildedRose\ItemTypes\Abstractions;

use GildedRose\Item;
use GildedRose\ItemTypes\Interfaces\ItemInterface;

abstract class AbstractItem implements ItemInterface
{
    /**
     * @var Item
     */
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function updateAttributes(): void
    {
        $this->updateSellIn();
        $this->updateQuality();
    }

    public function updateQuality(): void
    {
        $qualityToDecrease = 0;

        if ($this->item->quality > 0) {
            $qualityToDecrease = 1;
        }

        if ($this->item->sell_in < 0) {
            $qualityToDecrease = $qualityToDecrease * 2;
        }

        $this->item->quality -= $qualityToDecrease;
    }

    public function updateSellIn(): void
    {
        $this->item->sell_in = $this->item->sell_in - 1;
    }
}