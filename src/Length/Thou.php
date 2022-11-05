<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Thou extends Length
{
    public static function getSymbol(): string
    {
        return 'thou';
    }

    public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 39370.078740157), $arithmeticOperations);
    }

    public function toMeterValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 39370.078740157);
    }
}
