<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Torque;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;

abstract class Torque implements TorqueInterface
{
    private ArithmeticOperations $arithmeticOperations;

    public function __construct(protected float $value, ?ArithmeticOperations $arithmeticOperations = null)
    {
        $this->arithmeticOperations = $arithmeticOperations ?? new ArithmeticOperationsFloatingPoint();
    }

    public function toNewtonMeter(): NewtonMeter
    {
        return $this->toUnit(NewtonMeter::class);
    }

    /**
     * @template T of Torque
     * @param class-string<T> $fqn
     * @return T
     */
    protected function toUnit(string $fqn): Torque
    {
        return $fqn::fromNewtonMeterValue($this->toNewtonMeterValue(), $this->arithmeticOperations);
    }

    public function __toString(): string
    {
        return $this->value . static::getSymbol();
    }
}
