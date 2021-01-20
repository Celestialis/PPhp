<?php

class ProductNotebook  extends Product
{
    private $size;

    public function __construct($name, $size)
    {
        parent::__construct($name);
        $this->size = $size;
    }

    public function about()
    {
        parent::about();
        echo '.. notebook size is ' . $this->size . '<br/>';
    }
}
