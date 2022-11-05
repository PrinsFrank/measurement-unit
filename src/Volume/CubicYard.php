<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Volume;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class CubicYard extends Volume
{
    public static function getSymbol(): string
    {
        return 'yd3';
    }

    public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->multiply($value, 0.764555), $arithmeticOperations);
    }

    public function toCubicMeterValue(): float
    {
        return $this->arithmeticOperations->divide($this->value, 0.764555);
    }
}
