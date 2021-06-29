<?php


namespace GildedRose\ItemTypes\Interfaces;

use GildedRose\Item;

interface ItemInterface
{
    public function __construct(Item $item);
    public function updateAttributes(): void;
    public function updateQuality(): void;
    public function updateSellIn(): void;
    public function verifyQualityMaxLimit(): void;
    public function verifyQualityMinLimit(): void;
}