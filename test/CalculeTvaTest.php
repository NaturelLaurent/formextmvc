<?php

use PHPUnit\Framework\TestCase;

require 'CalcTva.php';

/**
 * 1 test = 1 method
 * 1 assertion = 1 vérification
 *
 * Pourquoi il est important dans faire ?
 *      no régression / anticipation
 *
 * Autre info
 *      Pour intervenir avant chaque début de méthode de test,
 *      il est possible d'implémenter la méthode setUp.
 *      Pour intervenir après chaque méthode de test d'une classe, il faut implémenter la méthode tearDown.
 */
class CalculeTvaTest extends TestCase {
    /**
     * dataProvider sert à utiliser une méthode de cette class pour automatiser des tests
     * ça reprend le nombre de param attendu de la méthode suivante en l'hydratant avec un tableau de la méthode cité dans l'annotation
     *
     * @dataProvider prixTVA
     */
    public function testCalcTvaNourriture(int $price, string $type, float $expectedTva)
    {
//        $this->expectException('Exception');

        $product = new CalcTva('Un produit', $type, $price);

        $this->assertSame($expectedTva, $product->calc());
    }

    public function prixTVA()
    {
        return [
            [0, CalcTva::PROD_ALIMENTATION, 0.0],
            [20, CalcTva::PROD_ALIMENTATION, 1.1],
            [100, CalcTva::PROD_ALIMENTATION, 5.5],
            [27, CalcTva::PROD_AGRICOLE, 2.7],
            [27, CalcTva::PROD_AGRICOLE, 2.7],
            [54, CalcTva::PROD_AGRICOLE, 5.4],
        ];
    }
}