<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Volume;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Pint extends Volume
{
    public static function getSymbol(): string
    {
        return 'pt';
    }

    public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->multiply($value, 0.000473176), $arithmeticOperations);
    }

    public function toCubicMeterValue(): float
    {
        return $this->arithmeticOperations->divide($this->value, 0.000473176);
    }
}
