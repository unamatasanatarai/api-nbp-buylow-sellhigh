<?php

class GoldCalculator
{

    private $inputArray;


    function __construct($inputArray)
    {
        $this->inputArray = $inputArray;
    }


    public function getMin()
    {
        return min($this->inputArray);
    }


    public function getMax()
    {
        return max($this->inputArray);
    }


    public function getMaxMinDiff()
    {
        return $this->getMax() - $this->getMin();
    }


    public function getMinArray()
    {
        return array_intersect($this->inputArray, [ $this->getMin() ]);
    }


    public function getMaxArray()
    {
        return array_intersect($this->inputArray, [ $this->getMax() ]);
    }
}

