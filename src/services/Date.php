<?php
namespace Src\Services;


class Date
{
    public function __construct(string $date) {
        $this->date = $date;
    }
   
    public function checkDate() : bool
    {
        $testDate = explode("-", $this->date);
        (count($testDate) === 3) ? $check = checkdate($testDate[0], $testDate[1], $testDate[2]) : $check = false;
        return $check;
    }
}