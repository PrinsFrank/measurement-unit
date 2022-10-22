<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Torque;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class NewtonMeter extends Torque
{
    public static function getSymbol(): string
    {
        return 'N⋅m';
    }

    public static function toNewtonMeterValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $value;
    }

    public static function fromNewtonMeterValue(float $value, ArithmeticOperations $arithmeticOperations): float
    {
        return $value;
    }
}
