<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Torque;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;

abstract class Torque implements TorqueInterface
{
    public readonly ArithmeticOperations $arithmeticOperations;

    public function __construct(public readonly float $value, ?ArithmeticOperations $arithmeticOperations = null)
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
    public function toUnit(string $fqn): Torque
    {
        /** @var T $unit */
        $unit = $fqn::fromNewtonMeterValue($this->toNewtonMeterValue(), $this->arithmeticOperations);

        return $unit;
    }

    public function __toString(): string
    {
        return $this->value . " " . static::getSymbol();
    }
}
