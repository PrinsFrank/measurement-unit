<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Weight;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Pound extends Weight
{
    protected static string $defaultSymbol = 'lb';

    public static function fromKilogramValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 0.453592), $arithmeticOperations);
    }

    public function toKilogramValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 0.453592);
    }
}
