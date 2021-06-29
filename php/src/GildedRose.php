<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $item = $this->createObjectFromItem($item);
            $item->updateAttributes();
        }
    }

    private function createObjectFromItem(Item $item): object
    {
        switch ($item->name) {
            case "Aged Brie":
                $className = "AgedBrieItem";
                break;
            case "Backstage passes to a TAFKAL80ETC concert":
                $className = "BackStagePassesItem";
                break;
            case "Sulfuras, Hand of Ragnaros":
                $className = "SulfurasItem";
                break;
            case "Conjured":
                $className = "ConjuredItem";
                break;
            default:
                $className = "RegularItem";
        }

        $itemClass = "\\GildedRose\\ItemTypes\\$className";
        return new $itemClass($item);
    }
}
