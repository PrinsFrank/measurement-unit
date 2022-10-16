<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class NauticalMile extends Length
{
    public static function getSymbol(): string
    {
        return 'nmi';
    }

    public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->divide($value, 1852);
    }

    public static function toMeterValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->multiply($value, 1852);
    }
}
