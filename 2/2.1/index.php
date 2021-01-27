<?php

interface ProductInterface
{
    public function getName(): string;
    public function getFinalCost(): float;
}

abstract class Product implements ProductInterface
{
    private $name;
    protected $cost;

    public function __construct($name, $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
}

require 'PieceProduct.php';
require 'DigitalProduct.php';
require 'WeightProduct.php';

$piecePrice = 100;
$products = [
    new PieceProduct($name='Журнал', $piecePrice),
    new DigitalProduct($name='Справка', $piecePrice),
    new WeightProduct($name='Гречка', 27, 1.2),
];

foreach ($products as $product) {
    echo $product->getName() . ' стоит ' . $product->getFinalCost() . PHP_EOL;
}