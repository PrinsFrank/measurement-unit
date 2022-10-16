<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Kelvin extends Temperature
{
    public static function getSymbol(): string
    {
        return 'K';
    }

    public static function toKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $value;
    }

    public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $value;
    }
}
