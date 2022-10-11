<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

class Yard extends Length
{
    public static function getSymbol(): string
    {
        return 'yd';
    }

    public static function fromMeterValue(float $value): float
    {
        return $value / 0.9144;
    }

    public static function toMeterValue(float $value): float
    {
        return $value * 0.9144;
    }
}
