<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

class Fahrenheit extends Temperature
{
    public static function getSymbol(): string
    {
        return '°F';
    }

    public static function toKelvinValue(float $value): float
    {
        return ($value + 459.67) * 5 / 9;
    }

    public static function fromKelvinValue(float $value): float
    {
        return $value / 5 * 9 - 459.67;
    }
}
