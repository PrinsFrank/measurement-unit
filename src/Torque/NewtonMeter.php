<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Torque;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class NewtonMeter extends Torque
{
    protected static string $defaultSymbol = 'N⋅m';

    public static function fromNewtonMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($value, $arithmeticOperations);
    }

    public function toNewtonMeterValue(): float
    {
        return $this->value;
    }
}
