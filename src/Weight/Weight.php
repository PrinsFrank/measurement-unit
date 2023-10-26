<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Weight;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;

abstract class Weight implements WeightInterface
{
    public readonly ArithmeticOperations $arithmeticOperations;

    public function __construct(public readonly float $value, ?ArithmeticOperations $arithmeticOperations = null)
    {
        $this->arithmeticOperations = $arithmeticOperations ?? new ArithmeticOperationsFloatingPoint();
    }

    public function toKilogram(): Kilogram
    {
        return $this->toUnit(Kilogram::class);
    }

    public function toMetricTon(): MetricTon
    {
        return $this->toUnit(MetricTon::class);
    }

    public function toPound(): Pound
    {
        return $this->toUnit(Pound::class);
    }

    /**
     * @template T of Weight
     * @param class-string<T> $fqn
     * @return T
     */
    public function toUnit(string $fqn): Weight
    {
        return $fqn::fromKilogramValue($this->toKilogramValue(), $this->arithmeticOperations);
    }

    public function __toString(): string
    {
        return $this->value . static::getSymbol();
    }
}
