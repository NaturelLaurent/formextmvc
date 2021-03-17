<?php 

Use Src\Controllers\HomeController;
Use Src\Services\Date;
Use Src\Services\Tva;
use PHPUnit\Framework\TestCase;

// require 'src/Controllers/HomeController.php';
require 'src/Services/Date.php';
require 'src/Services/Tva.php';

class DemoTest extends TestCase
{

     /**
     * @dataProvider dateData
     */
    public function testDate(string $dateIn, bool $bool)
    {

        $date = new Date($dateIn);
        $this->assertEquals($bool, $date->checkDate());

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

     /**
     * @dataProvider tvaData
     */
    public function testTva(float $price, string $type, float $result)
    {
        $tva = new Tva($price, $type);
        $this->assertEquals($result, $tva->calcul());
    }

    public function tvaData()
    {
        return [
            [15.99,'agricole',1.6],
            [10,'alimentaire',0.55],
            [24.10,'autre',4.82],
            [1560,'agricole',156],
        ];
    }

}