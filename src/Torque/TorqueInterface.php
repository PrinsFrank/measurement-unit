<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Torque;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

interface TorqueInterface
{
    public static function getSymbol(): string;

    public static function fromNewtonMeterValue(float $value, ArithmeticOperations $arithmeticOperations): static;

    public function toNewtonMeterValue(): float;
}
