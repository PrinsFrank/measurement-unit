<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class HorseLength extends Length
{
    public static function getSymbol(): string
    {
        return 'horse-length';
    }

    public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->divide($value, 2.4);
    }

    public static function toMeterValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->multiply($value, 2.4);
    }
}
