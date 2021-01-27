<?php

class DigitalProduct extends Product
{
    public function getFinalCost(): float
    {
        return $this->cost / 2;
    }
}