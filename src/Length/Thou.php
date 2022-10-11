<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

class Thou extends Length
{
    public static function getSymbol(): string
    {
        return 'thou';
    }

    public static function fromMeterValue(float $value): float
    {
        return $value / 39370.078740157;
    }

    public static function toMeterValue(float $value): float
    {
        return $value * 39370.078740157;
    }
}
