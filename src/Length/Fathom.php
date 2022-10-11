<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

class Fathom extends Length
{
    public static function getSymbol(): string
    {
        return 'ftm';
    }

    public static function fromMeterValue(float $value): float
    {
        return $value / 1.8288;
    }

    public static function toMeterValue(float $value): float
    {
        return $value * 1.8288;
    }
}
