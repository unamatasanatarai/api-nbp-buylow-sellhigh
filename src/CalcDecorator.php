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
            $this->calc->getBuyKey(),
            $this->calc->getSellKey(),
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
}

