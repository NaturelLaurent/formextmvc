<?php
namespace App\Entity;


class Typeuser
{
    private string $typeuser;


     /**
     * @return string
     */
    public function getTypeuser(): string
    {
        return $this->typeuser;
    }
    /**
     * @param string $typeuser
     */
    public function setTypeuser(string $typeuser): self
    {
        $this->typeuser = $typeuser;
        return $this;   
    }
}