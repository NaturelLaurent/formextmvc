<?php
namespace App\Service;

use http\Exception;

class CalcTva
{
    public const PROD_ALIMENTATION = 'alimentation';
    public const PROD_AGRICOLE = 'agricole';

    private $name;
    private $type;
    private $price;

    /**
     * CalcTva constructor.
     * @param string $name
     * @param string $type
     * @param float $price
     * @throws Exception
     */
    public function __construct(string $name, string $type, float $price)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;

        if($price < 0) {
            throw new \Exception('Tarif incorrect');
        }
    }

    /**
     * @return float
     */
    public function calc() : float
    {
        $prix = 0.0;

        if (self::PROD_ALIMENTATION == $this->type) {
            $prix = $this->price * 0.055;
        } elseif (self::PROD_AGRICOLE == $this->type) {
            $prix = $this->price * 0.1;
        } else {
            $prix = $this->price * 0.2;
        }

        return $prix;
    }
}