<?php

namespace App\Helpers;

class TypeHelper
{
    public static function generateType(int $type): string
    {
        return match ($type) {
            1 => 'GKP',
            2 => 'DEF',
            3 => 'MID',
            default => 'FWD',
        };
    }
}
