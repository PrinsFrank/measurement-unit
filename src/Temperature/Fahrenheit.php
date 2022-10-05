<?php
declare(strict_types=1);

class Fahrenheit extends Temperature
{
    public function getSymbol(): string
    {
        return '°F';
    }

    public static function toKelvinValue(): float
    {
        // TODO: Implement toKelvinFactor() method.
    }
}
