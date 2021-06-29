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

    public function testQualityUpdateNotGreaterThanFifty(): void
    {
        $items = [new Item('Aged Brie', 20, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(50, $items[0]->quality);
    }
}
