<?php

class GoldCalculator
{

    private $inputArray;

    private $buy;

    private $sell;

    private $sellkey;

    private $buykey;


    function __construct($inputArray)
    {
        $this->inputArray = $inputArray;
        $this->getBuySell();
    }


    public function getBuySell()
    {
        $REALLY_BIG_NO = 99999999999;
        $bottom = $REALLY_BIG_NO;
        $currBestBuy = 0;
        $top = 0;
        $currBestSell = 0;
        $profit = 0;

        $bottomkey = 0;
        $topkey = 0;

        foreach ($this->inputArray as $key => $val) {
            if ( $val < $bottom ) {
                $bottom = $val;
                $top = 0;
                $bottomkey = $key;
            } else {
                if ( $val > $top ) {
                    $top = $val;
                    $potentialProfit = ($top - $bottom);
                    if ( $potentialProfit > $profit && $bottom != $REALLY_BIG_NO ) {
                        $profit = $potentialProfit;
                        $currBestSell = $top;
                        $currBestBuy = $bottom;
                        $topkey = $key;
                    }
                }
            }
        }

        $this->buy = $currBestBuy;
        $this->sell = $currBestSell;
        $this->sellkey = $topkey;
        $this->buykey = $bottomkey;

        return [
            'buy'     => $this->buy,
            'sell'    => $this->sell,
            'buykey'  => $this->buykey,
            'sellkey' => $this->sellkey,
        ];
    }


    public function computeIncomeForPurchase($money)
    {
        return ($this->sell - $this->buy) * $money;
    }


    public function getBuy()
    {
        return $this->buy;
    }


    public function getSell()
    {
        return $this->sell;
    }


    public function getBuyKey()
    {
        return $this->buykey;
    }


    public function getSellKey()
    {
        return $this->sellkey;
    }
}

