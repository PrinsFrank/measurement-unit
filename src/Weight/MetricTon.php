<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Weight;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class MetricTon extends Weight
{
    protected static string $defaultSymbol = 't';

    public static function fromKilogramValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 1000), $arithmeticOperations);
    }

    public function toKilogramValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 1000);
    }
}
