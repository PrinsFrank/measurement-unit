<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Speed;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class MilesPerHour extends Speed
{
    public static function getSymbol(): string
    {
        return 'mph';
    }

    public static function fromMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->divide($value, 0.44704);
    }

    public static function toMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->multiply($value, 0.44704);
    }
}
