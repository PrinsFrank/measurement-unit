<?php
declare(strict_types=1);

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class KilometerPerHour extends Speed
{
    public static function getSymbol(): string
    {
        return 'km/h';
    }

    public static function fromMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->divide($value, 0.277778);
    }

    public static function toMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->multiply($value, 0.277778);
    }
}
