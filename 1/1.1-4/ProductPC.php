<?php

class ProductComputer extends Product
{
    private $screen;

    public function __construct($name, $screen)
    {
        parent::__construct($name);
        $this->screen = $screen;
    }

    public function about()
    {
        parent::about();
        echo '.. computer screen size is ' . $this->screen . '<br/>';
    }
}

