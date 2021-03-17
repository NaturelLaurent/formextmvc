<?php
namespace App\Service;


class MyString
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function trim() : string
    {
        return trim($this->name);
    }

    public function firstLetterUppercase()
    {
        return ucfirst($this->name);
    }
}