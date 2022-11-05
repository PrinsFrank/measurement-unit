<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Inch extends Length
{
    public static function getSymbol(): string
    {
        return '″';
    }

    public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): static
    {
        return new static($arithmeticOperations->divide($value, 0.0254), $arithmeticOperations);
    }

    public function toMeterValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 0.0254);
    }
}
