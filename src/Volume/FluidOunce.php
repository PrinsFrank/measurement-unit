<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Volume;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class FluidOunce extends Volume
{
    public static function getSymbol(): string
    {
        return 'fl oz';
    }

    public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): static
    {
        return new static($arithmeticOperations->multiply($value, 0.00002957532596), $arithmeticOperations);
    }

    public function toCubicMeterValue(): float
    {
        return $this->arithmeticOperations->divide($this->value, 0.00002957532596);
    }
}
