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

    public static function fromNewtonMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($value, $arithmeticOperations);
    }

    public function toNewtonMeterValue(): float
    {
        return $this->value;
    }
}
