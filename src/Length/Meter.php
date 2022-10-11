<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

class Meter extends Length
{
    public static function getSymbol(): string
    {
        return 'm';
    }

    public static function fromMeterValue(float $value): float
    {
        return $value;
    }

    public static function toMeterValue(float $value): float
    {
        return $value;
    }
}
