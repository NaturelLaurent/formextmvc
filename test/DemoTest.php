<?php

use App\Service\Calc;
use App\Service\MyString;
use PHPUnit\Framework\TestCase;

require 'src/Service/MyString.php';
require 'src/Service/Calc.php';

class DemoTest extends TestCase
{
    public function testPremier()
    {
        $string = new MyString('Julien');

        $this->assertEquals('Julien', $string->getName());
    }

    public function testSecond()
    {
        $string = new MyString(' Alex ');

        $this->assertEquals('Alex', $string->trim());
    }

    public function testMaj()
    {
        $string = new MyString('blabla');
        $this->assertEquals('Blabla', $string->firstLetterUppercase());
    }

    public function testCarre()
    {
        $calc = new Calc(2);
        $this->assertEquals(4, $calc->carre(), 'methode carre');

        $calc = new Calc(5);
        $this->assertEquals(25, $calc->carre());

        $nombre = 2;
        $this->assertEquals(4, $nombre*$nombre);
    }
}