<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Time;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Second extends Time
{
    public static function getSymbol(): string
    {
        return 's';
    }

    public static function toSecondValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $value;
    }

    public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $value;
    }
}
