<?php

declare(strict_types=1);

namespace Tests\ItemTypes;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class AgedBrieItemTest extends TestCase
{
    public function testQualityUpdateAgedBrie(): void
    {
        $items = [new Item('Aged Brie', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(11, $items[0]->quality);
    }
}
