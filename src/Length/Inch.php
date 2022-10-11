<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

class Inch extends Length
{
    public static function getSymbol(): string
    {
        return '″';
    }

    public static function fromMeterValue(float $value): float
    {
        return $value / 0.0254;
    }

    public static function toMeterValue(float $value): float
    {
        return $value * 0.0254;
    }
}
