<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

class Rankine extends Temperature
{
    public static function getSymbol(): string
    {
        return '°R';
    }

    public static function toKelvinValue(float $value): float
    {
        return $value * 5 / 9;
    }

    public static function fromKelvinValue(float $value): float
    {
        return $value / 5 * 9;
    }
}
