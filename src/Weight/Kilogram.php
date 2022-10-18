<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Weight;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Kilogram extends Weight
{
    public static function getSymbol(): string
    {
        return 'kg';
    }

    public static function toKilogramValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $value;
    }

    public static function fromKilogramValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $value;
    }
}
