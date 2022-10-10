<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

class Celsius extends Temperature
{
    public static function getSymbol(): string
    {
        return '°C';
    }

    public static function toKelvinValue(float $value): float
    {
        return $value + 273.15;
    }

    public static function fromKelvinValue(float $value): float
    {
        return $value - 273.15;
    }
}
