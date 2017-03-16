<?php
namespace Tests;

class GoldCalculatorTest extends TestCase
{

    public function testShouldBeAnEasyPass()
    {
        $arr = [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
        ];
        $gc = new \GoldCalculator($arr);
        $this->assertEquals(5, $gc->getSell());
        $this->assertEquals(5, $gc->getSellKey());
        $this->assertEquals(1, $gc->getBuy());
        $this->assertEquals(1, $gc->getBuyKey());
    }


    public function testFindsCorrectPlaces()
    {
        $arr = [
            1 => 1,
            2 => 1,
            3 => 1,
            4 => 8,
            5 => 3,
        ];
        $gc = new \GoldCalculator($arr);
        $this->assertEquals(8, $gc->getSell());
        $this->assertEquals(4, $gc->getSellKey());
        $this->assertEquals(1, $gc->getBuy());
        $this->assertEquals(1, $gc->getBuyKey());
    }


    public function testFindsCorrectPlacesinComplexArray()
    {
        $arr = [
            1  => 2,
            2  => 10,
            3  => 1,
            4  => 10,
            5  => 3,
            8  => 19,
            18 => 1,
            19 => 7,
        ];
        $gc = new \GoldCalculator($arr);
        $this->assertEquals(19, $gc->getSell());
        $this->assertEquals(8, $gc->getSellKey());
        $this->assertEquals(1, $gc->getBuy());
        $this->assertEquals(3, $gc->getBuyKey());
    }

}
