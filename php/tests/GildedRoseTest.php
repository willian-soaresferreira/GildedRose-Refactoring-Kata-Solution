<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testbuildItemObject(): void
    {
        $items = [new Item('Test Name', 0, 0)];
        $this->assertSame('Test Name', $items[0]->name);
    }

    public function testbuildItemObjectMultipleItems(): void
    {
        $items = [
            new Item('Test Name', 0, 0),
            new Item('Test Name 2', 0, 0)
        ];
        $this->assertSame('Test Name', $items[0]->name);
        $this->assertSame('Test Name 2', $items[1]->name);
    }

    public function testSellInUpdate(): void
    {
        $items = [new Item('Regular Item', 20, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(19, $items[0]->sell_in);
    }

    public function testQualityUpdate(): void
    {
        $items = [new Item('Regular Item', 20, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(9, $items[0]->quality);
    }

    public function testQualityUpdateNotNegative(): void
    {
        $items = [new Item('Regular Item', 20, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(0, $items[0]->quality);
    }

    public function testQualityUpdateWhenSellInExpired(): void
    {
        $items = [new Item('Regular Item', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(8, $items[0]->quality);
    }

    public function testQualityUpdateAgedBrie(): void
    {
        $items = [new Item('Aged Brie', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(11, $items[0]->quality);
    }

    public function testQualityUpdateNotGreaterThanFifty(): void
    {
        $items = [new Item('Aged Brie', 20, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(50, $items[0]->quality);
    }

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
