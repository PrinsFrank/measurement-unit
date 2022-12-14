<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Kelvin extends Temperature
{
    public static function getSymbol(): string
    {
        return 'K';
    }

    public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($value, $arithmeticOperations);
    }

    public function toKelvinValue(): float
    {
        return $this->value;
    }
}
