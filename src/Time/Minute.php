<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Time;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Minute extends Time
{
    public static function getSymbol(): string
    {
        return 'm';
    }

    public static function toSecondValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->multiply($value, 60);
    }

    public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->divide($value, 60);
    }
}
