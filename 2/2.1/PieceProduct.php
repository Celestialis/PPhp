<?php

class PieceProduct extends Product
{
    public function getFinalCost(): float
    {
        return $this->cost;
    }
}