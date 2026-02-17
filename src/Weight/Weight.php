<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Weight;

use PrinsFrank\MeasurementUnit\MeasurementUnit;

abstract class Weight extends MeasurementUnit implements WeightInterface
{
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
        /** @var T $unit */
        $unit = $fqn::fromKilogramValue($this->toKilogramValue(), $this->arithmeticOperations);

        return $unit;
    }
}
