<?php

declare(strict_types=1);

namespace Tests\ItemTypes;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class SulfurasItemTest extends TestCase
{
    public function testNewSulfurasFixedQuality(): void
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 20, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(80, $items[0]->quality);
    }

    public function testQualityUpdateSulfuras(): void
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 20, 80)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(80, $items[0]->quality);
    }
}
