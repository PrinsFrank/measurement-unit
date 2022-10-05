<?php
declare(strict_types=1);

class Kelvin extends Temperature
{
    public function getSymbol(): string
    {
        return 'K';
    }

    public static function toKelvinValue(): float
    {
        return 1;
    }
}
