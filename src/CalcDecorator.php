<?php

class CalcDecorator
{

    private $calc;

    private $template = "Kupując złoto za %szł w datach: \n%s\ni sprzedając w datach: \n%s\nzarobiłbyś: %szł.\n\n";

    private $amount;


    public function __construct(GoldCalculator $calc, $amount = 0)
    {
        $this->calc = $calc;
        $this->setAmount($amount);
    }


    public function toString()
    {
        return sprintf(
            $this->template,
            number_format($this->amount),
            $this->getPurchaseDates(),
            $this->getSellDates(),
            number_format($this->calc->computeIncomeForPurchase($this->amount))
        );
    }


    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }


    private function getPurchaseDates()
    {
        $str = '';
        foreach ($this->calc->getMinArray() as $date => $price) {
            $str .= sprintf("%s (%szł)\n", $date, $price);
        }

        return $str;
    }


    private function getSellDates()
    {
        $str = '';
        foreach ($this->calc->getMaxArray() as $date => $price) {
            $str .= sprintf("%s (%szł)\n", $date, $price);
        }

        return $str;
    }
}

