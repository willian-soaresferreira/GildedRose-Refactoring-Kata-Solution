<?php

declare(strict_types=1);

namespace Tests\ItemTypes;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class ConjuredItemTest extends TestCase
{
    public function testQualityUpdateConjured(): void
    {
        $items = [new Item('Conjured', 20, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(8, $items[0]->quality);
    }

    public function testQualityUpdateConjuredWhenSellInExpired(): void
    {
        $items = [new Item('Conjured', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(6, $items[0]->quality);
    }
}
