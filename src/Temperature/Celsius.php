<?php
declare(strict_types=1);

class Celsius extends Temperature
{
    public function getSymbol(): string
    {
        return '°C';
    }

    public static function toKelvinValue(): float
    {
        // TODO: Implement toKelvinFactor() method.
    }
}
