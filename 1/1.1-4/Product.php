<?php

require 'ProductPC.php';
require 'ProductNote.php';

class Product
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function about()
    {
        echo 'Product ' . $this->name . '<br/>';
    }
}

$products = [
    new Product($name='Some product'),
    new ProductComputer($name='HP', $screen=1200),
    new ProductNotebook($name='Lenovo', $size='1200х900х1000'),
];

foreach ($products as $product) {
    $product->about();
}