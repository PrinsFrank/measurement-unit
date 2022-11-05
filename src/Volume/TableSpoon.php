<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Volume;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class TableSpoon extends Volume
{
    public static function getSymbol(): string
    {
        return 'tbsp';
    }

    public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->multiply($value, 0.000015), $arithmeticOperations);
    }

    public function toCubicMeterValue(): float
    {
        return $this->arithmeticOperations->divide($this->value, 0.000015);
    }
}
