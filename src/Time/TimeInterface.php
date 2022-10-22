<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Time;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

interface TimeInterface
{
    public static function getSymbol(): string;

    public static function toSecondValue(float $value, ArithmeticOperations $arithmeticOperations): float;

    public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): float;
}
