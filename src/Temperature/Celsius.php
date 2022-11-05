<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Celsius extends Temperature
{
    public static function getSymbol(): string
    {
        return '°C';
    }

    public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): static
    {
        return new static($arithmeticOperations->subtract($value, 273.15), $arithmeticOperations);
    }

    public function toKelvinValue(): float
    {
        return $this->arithmeticOperations->add($this->value, 273.15);
    }
}
