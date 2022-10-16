<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Meter extends Length
{
    public static function getSymbol(): string
    {
        return 'm';
    }

    public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $value;
    }

    public static function toMeterValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $value;
    }
}
