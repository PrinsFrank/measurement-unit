<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Rankine extends Temperature
{
    public static function getSymbol(): string
    {
        return '°R';
    }

    public static function toKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->divide($arithmeticOperations->multiply($value, 5), 9);
    }

    public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->multiply($arithmeticOperations->divide($value, 5), 9);
    }
}
