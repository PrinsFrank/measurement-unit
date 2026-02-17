<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Volume;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class CubicMeter extends Volume
{
    protected static string $defaultSymbol = 'm³';

    public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($value, $arithmeticOperations);
    }

    public function toCubicMeterValue(): float
    {
        return $this->value;
    }
}
