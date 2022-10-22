<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Weight;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;

abstract class Weight implements WeightInterface
{
    private ArithmeticOperationsFloatingPoint|ArithmeticOperations $arithmeticOperations;

    public function __construct(protected float $value, ?ArithmeticOperations $arithmeticOperations = null)
    {
        $this->arithmeticOperations = $arithmeticOperations ?? new ArithmeticOperationsFloatingPoint();
    }

    public function toKilogram(): Kilogram
    {
        return $this->toUnit($this->value, Kilogram::class);
    }

    public function toMetricTon(): MetricTon
    {
        return $this->toUnit($this->value, MetricTon::class);
    }

    public function toPound(): Pound
    {
        return $this->toUnit($this->value, Pound::class);
    }

    /**
     * @template T of Weight
     * @param class-string<T> $fqn
     * @return T
     */
    protected function toUnit(float $value, string $fqn): Weight
    {
        return new $fqn(
            $fqn::fromKilogramValue(
                static::toKilogramValue($value, $this->arithmeticOperations),
                $this->arithmeticOperations
            ),
            $this->arithmeticOperations
        );
    }

    public function __toString(): string
    {
        return $this->value . static::getSymbol();
    }
}
