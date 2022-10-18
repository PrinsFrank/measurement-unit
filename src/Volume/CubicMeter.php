<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Volume;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class CubicMeter extends Volume
{
    public static function getSymbol(): string
    {
        return 'm3';
    }

    public static function toCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $value;
    }

    public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $value;
    }
}
