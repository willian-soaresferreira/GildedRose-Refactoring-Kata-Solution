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
    protected $qualityMinLimit;
    protected $qualityMaxLimit;
    protected $defaultQualityToDecrease;

    public function __construct(Item $item)
    {
        $this->item = $item;
        $this->qualityMinLimit = 0;
        $this->qualityMaxLimit = 50;
        $this->defaultQualityToDecrease = 1;
    }

    public function updateAttributes(): void
    {
        $this->updateSellIn();
        $this->updateQuality();
        $this->verifyQualityMinLimit();
        $this->verifyQualityMaxLimit();
    }

    public function updateQuality(): void
    {
        $qualityToDecrease = $this->defaultQualityToDecrease;

        if ($this->item->sell_in < 0) {
            $qualityToDecrease = $qualityToDecrease * 2;
        }

        $this->item->quality -= $qualityToDecrease;
    }

    public function updateSellIn(): void
    {
        $this->item->sell_in = $this->item->sell_in - 1;
    }

    public function verifyQualityMaxLimit(): void
    {
        if (is_null($this->qualityMaxLimit)) {
            return;
        }

        if ($this->item->quality > $this->qualityMaxLimit) {
            $this->item->quality = $this->qualityMaxLimit;
        }
    }

    public function verifyQualityMinLimit(): void
    {
        if (is_null($this->qualityMinLimit)) {
            return;
        }

        if ($this->item->quality < $this->qualityMinLimit) {
            $this->item->quality = $this->qualityMinLimit;
        }
    }
}