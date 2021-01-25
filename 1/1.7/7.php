<?php
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo();
/*x= 1*/ 
$b1->foo();
/*x= 1*/ 
$a1->foo(); 
/*x= 2*/
$b1->foo();
/*x= 2*/
/*Сначало вызываем класс А, потом класс Б, поэтому после вызова переменная х увеличиться на 1*\