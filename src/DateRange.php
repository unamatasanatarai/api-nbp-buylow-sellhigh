<?php

class DateRange
{

    private $start = 0;

    private $stop = 0;


    public function __construct($start = null, $stop = null)
    {
        $this->start = $start;
        $this->stop = $stop;
        if ( $stop = null ) {
            $this->setTo(time());
        }
    }


    public function setFrom($timestamp)
    {
        $this->start = $timestamp;

        return $this;
    }


    public function setTo($timestamp)
    {
        $this->stop = $timestamp;

        return $this;
    }


    public function getFrom()
    {
        return $this->start;
    }


    public function getTo()
    {
        return $this->stop;
    }
}

