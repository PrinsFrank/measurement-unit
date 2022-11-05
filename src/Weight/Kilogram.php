<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Weight;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Kilogram extends Weight
{
    public static function getSymbol(): string
    {
        return 'kg';
    }

    public static function fromKilogramValue(float $value, ArithmeticOperations $arithmeticOperations): static
    {
        return new static($value, $arithmeticOperations);
    }

    public function toKilogramValue(): float
    {
        return $this->value;
    }
}
