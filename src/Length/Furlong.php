<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

class Furlong extends Length
{
    public static function getSymbol(): string
    {
        return 'for';
    }

    public static function fromMeterValue(float $value): float
    {
        return $value / 201.1680;
    }

    public static function toMeterValue(float $value): float
    {
        return $value * 201.1680;
    }
}
