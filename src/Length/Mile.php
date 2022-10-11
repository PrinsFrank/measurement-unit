<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

class Mile extends Length
{
    public static function getSymbol(): string
    {
        return 'mi';
    }

    public static function fromMeterValue(float $value): float
    {
        return $value / 1609.344;
    }

    public static function toMeterValue(float $value): float
    {
        return $value * 1609.344;
    }
}
