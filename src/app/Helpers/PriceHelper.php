<?php

namespace App\Helpers;

class PriceHelper
{
    public static function generatePrice(int $price): string
    {
        return number_format($price / 10, 1);
    }
}
