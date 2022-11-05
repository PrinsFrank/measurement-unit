<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Meter extends Length
{
    public static function getSymbol(): string
    {
        return 'm';
    }

    public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): static
    {
        return new static($value, $arithmeticOperations);
    }

    public function toMeterValue(): float
    {
        return $this->value;
    }
}
