<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Furlong extends Length
{
    public static function getSymbol(): string
    {
        return 'for';
    }

    public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 201.1680), $arithmeticOperations);
    }

    public function toMeterValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 201.1680);
    }
}
