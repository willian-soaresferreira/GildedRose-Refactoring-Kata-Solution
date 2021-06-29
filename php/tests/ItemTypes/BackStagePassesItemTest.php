<?php

declare(strict_types=1);

namespace Tests\ItemTypes;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class BackStagePassesItemTest extends TestCase
{
    public function testQualityUpdateBackStagePasses(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 20, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(11, $items[0]->quality);
    }

    public function testQualityUpdateBackStagePassesSellInTen(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(12, $items[0]->quality);
    }

    public function testQualityUpdateBackStagePassesSellInFive(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 5, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(13, $items[0]->quality);
    }

    public function testQualityUpdateBackStagePassesWhenSellInExpired(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(0, $items[0]->quality);
    }
}
