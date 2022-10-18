<?php
declare(strict_types=1);

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

interface SpeedInterface
{
    public static function getSymbol(): string;

    public static function fromMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): float;

    public static function toMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): float;
}
