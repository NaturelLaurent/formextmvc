<?php 

Use Src\Controllers\HomeController;
Use Src\Services\Date;
Use Src\Services\Tva;
use PHPUnit\Framework\TestCase;

// require 'src/Controllers/HomeController.php';
require 'src/Services/Date.php';

class DemoTest extends TestCase
{

     /**
     * @dataProvider dateData
     */
    public function testDate(string $date, bool $bool)
    {

        $string = new Date($date);
        $this->assertEquals($bool, $string->checkDate());

    }

    public function dateData()
    {
        return [
            ['01-08-1990',true],
            ['01081990',false],
            ['sqqsd',false],
            ['70-08-1990',false],
            ['70-98-9999999',false],
            ['1990-08-01',false]
        ];
    }

    // /**
    //  * @dataProvider 
    //  */
    // public function testTva()
    // {
    //     $string = new Date('1990-08-01');
    //     $this->assertEquals(false, $string->checkDate());
    // }
}