<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Celsius extends Temperature
{
    public static function getSymbol(): string
    {
        return '°C';
    }

    public static function toKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->add($value, 273.15);
    }

    public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->subtract($value, 273.15);
    }
}
