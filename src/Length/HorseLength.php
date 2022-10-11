<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

class HorseLength extends Length
{
    public static function getSymbol(): string
    {
        return 'horse-length';
    }

    public static function fromMeterValue(float $value): float
    {
        return $value / 2.4;
    }

    public static function toMeterValue(float $value): float
    {
        return $value * 2.4;
    }
}
