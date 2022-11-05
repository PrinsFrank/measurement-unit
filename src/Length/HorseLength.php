<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class HorseLength extends Length
{
    public static function getSymbol(): string
    {
        return 'horse-length';
    }

    public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 2.4), $arithmeticOperations);
    }

    public function toMeterValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 2.4);
    }
}
