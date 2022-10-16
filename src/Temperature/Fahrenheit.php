<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Fahrenheit extends Temperature
{
    public static function getSymbol(): string
    {
        return '°F';
    }

    public static function toKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->divide(
            $arithmeticOperations->multiply(
                $arithmeticOperations->add($value, 459.67),
                5
            ),
            9
        );
    }

    public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->subtract(
            $arithmeticOperations->multiply(
                $arithmeticOperations->divide($value, 5),
                9
            ),
            459.67
        );
    }
}
