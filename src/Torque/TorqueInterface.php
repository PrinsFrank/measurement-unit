<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Torque;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

interface TorqueInterface
{
    public static function getSymbol(): string;

    public static function toNewtonMeterValue(float $value, ArithmeticOperations $arithmeticOperations): float;

    public static function fromNewtonMeterValue(float $value, ArithmeticOperations $arithmeticOperations): float;
}
