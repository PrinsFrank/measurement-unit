<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Fathom extends Length
{
    public static function getSymbol(): string
    {
        return 'ftm';
    }

    public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 1.8288), $arithmeticOperations);
    }

    public function toMeterValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 1.8288);
    }
}
