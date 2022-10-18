<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Volume;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class FluidDram extends Volume
{
    public static function getSymbol(): string
    {
        return 'dr';
    }

    public static function toCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->divide($value, 0.0000036966912);
    }

    public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->multiply($value, 0.0000036966912);
    }
}
