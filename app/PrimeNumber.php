<?php
namespace App;

class PrimeNumber
{
    public static function checkPrimeNumber($number) : bool
    {
        if ($number == 2) return true;
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0 ) return false;
        }
        return true;
    }

}