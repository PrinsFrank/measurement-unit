<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

class NauticalMile extends Length
{
    public static function getSymbol(): string
    {
        return 'nmi';
    }

    public static function fromMeterValue(float $value): float
    {
        return $value / 1852;
    }

    public static function toMeterValue(float $value): float
    {
        return $value * 1852;
    }
}
