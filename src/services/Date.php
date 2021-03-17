<?php
namespace Src\Services;


class Date
{

    public function __construct(string $date) {
        $this->date = $date;
    }

   
    public function ifDate()
    {
        $testDate = explode("-", $this->date);
        return checkdate($testDate[0], $testDate[1], $testDate[2]);
    }
}