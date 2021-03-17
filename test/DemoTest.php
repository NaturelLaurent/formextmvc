<?php 

Use Src\Controllers\HomeController;
Use Src\Services\Date;
use PHPUnit\Framework\TestCase;

// require 'src/Controllers/HomeController.php';
require 'src/Services/Date.php';

class DemoTest extends TestCase
{
    // public function testPremier()
    // {

    //     $string = new HomeController();

    //     $this->assertEquals('ok', $string->testing('ok'));

    // }
    public function testDate()
    {

        $string = new Date('01-08-1990');

        $this->assertEquals(true, $string->ifDate());

    }
}