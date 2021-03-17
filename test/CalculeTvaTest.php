<?php

use App\Service\CalcTva;
use PHPUnit\Framework\TestCase;

require dirname(__FILE__) . '/../src/Service/CalcTva.php';

class CalculeTvaTest extends TestCase
{
    /**
     * dataProvider sert à utiliser une méthode de cette class pour automatiser des tests
     * ça reprend le nombre de param attendu de la méthode suivante en l'hydratant avec un tableau de la méthode cité dans l'annotation
     *
     * @dataProvider prixTVA
     */
    public function testCalcTvaNourriture(float $price, string $type, float $expectedTva)
    {
//        $this->expectException('Exception');

        $product = new CalcTva('Un produit', $type, $price);
        $this->expectException('LogicException');

//        var_dump($product->calc());
//        die;
        $this->assertSame($expectedTva, $product->calc());
    }

    public function prixTVA()
    {
        return [
            [-10, CalcTva::PROD_ALIMENTATION, 0.0],
            [15.99, CalcTva::PROD_AGRICOLE, 1.599],
            [100, CalcTva::PROD_AGRICOLE, 10],
            [20, CalcTva::PROD_ALIMENTATION, 1.1],
            [100, CalcTva::PROD_ALIMENTATION, 5.5],
            [27, CalcTva::PROD_AGRICOLE, 2.7],
            [27, CalcTva::PROD_AGRICOLE, 2.7],
            [54, CalcTva::PROD_AGRICOLE, 5.4],
        ];
    }
}