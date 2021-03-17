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
        $this->assertEquals(true, $string->checkDate());

        $string = new Date('01081990');
        $this->assertEquals(false, $string->checkDate());

        $string = new Date('sqqsd');
        $this->assertEquals(false, $string->checkDate());
      
        $string = new Date('70-08-1990');
        $this->assertEquals(false, $string->checkDate());

        $string = new Date('70-98-9999999');
        $this->assertEquals(false, $string->checkDate());

        $string = new Date('1990-08-01');
        $this->assertEquals(false, $string->checkDate());

    }
}