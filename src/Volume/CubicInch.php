<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Volume;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class CubicInch extends Volume
{
    public static function getSymbol(): string
    {
        return 'in3';
    }

    public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->multiply($value, 61023.744095), $arithmeticOperations);
    }

    public function toCubicMeterValue(): float
    {
        return $this->arithmeticOperations->divide($this->value, 61023.744095);
    }
}
