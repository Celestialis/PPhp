<?php

trait Singleton
{
    private static $instance;

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() 
    {  
    
    }

    private function  __clone() 
    {  
    
    }

    private function __wakeup() 
    {
    
    }
}

final class Utility
{
    use Singleton;

    public function echoArray(array $array): void
    {
        print_r($array);
    }
}

final class AnotherUtility
{
    use Singleton;

    public function getRandomInt()
    {
        return random_int(1, 50);
    }
}

$u = Utility::getInstance();
$u->echoArray([1,2,3]);

echo AnotherUtility::getInstance()->getRandomInt();