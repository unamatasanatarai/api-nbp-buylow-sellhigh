<?php

class DateRange
{

    private $start = 0;

    private $stop = 0;


    public function __construct($start = null, $stop = null)
    {
        $this->setFrom($start);
        $this->setTo($stop);
        if ( $stop = null ) {
            $this->setTo(time());
        }
    }


    public function setFrom($timestamp = 0)
    {
        if ( is_null($timestamp) ) {
            $timestamp = 0;
        }
        if ( ! is_int($timestamp) ) {
            throw new InvalidArgumentException();
        }
        $this->start = $timestamp;

        return $this;
    }


    public function setTo($timestamp = 0)
    {
        if ( is_null($timestamp) ) {
            $timestamp = 0;
        }
        if ( ! is_int($timestamp) ) {
            throw new InvalidArgumentException();
        }
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

