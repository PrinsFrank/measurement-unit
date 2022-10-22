<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Time;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Hour extends Time
{
    public static function getSymbol(): string
    {
        return 'h';
    }

    public static function toSecondValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->multiply($value, 3600);
    }

    public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $arithmeticOperations->divide($value, 3600);
    }
}
