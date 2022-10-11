<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

class Foot extends Length
{
    public static function getSymbol(): string
    {
        return 'ft';
    }

    public static function fromMeterValue(float $value): float
    {
        return $value / 0.3048;
    }

    public static function toMeterValue(float $value): float
    {
        return $value * 0.3048;
    }
}
