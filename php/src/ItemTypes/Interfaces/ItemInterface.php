<?php


namespace GildedRose\ItemTypes\Interfaces;


interface ItemInterface
{
    public function updateAttributes(): void;
    public function updateQuality(): void;
    public function updateSellIn(): void;
}