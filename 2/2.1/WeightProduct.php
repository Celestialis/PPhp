<?php 

class WeightProduct extends Product
{
    private $weight;

    public function __construct($name, $cost, $weight)
    {
        parent::__construct($name, $cost);
        $this->weight = $weight;
    }

    public function getFinalCost(): float
    {
        return $this->cost * $this->weight;
    }
}