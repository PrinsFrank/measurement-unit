<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

class Kelvin extends Temperature
{
    public static function getSymbol(): string
    {
        return 'K';
    }

    public static function toKelvinValue(float $value): float
    {
        return $value;
    }

    public static function fromKelvinValue(float $value): float
    {
        return $value;
    }
}
