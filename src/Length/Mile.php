<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Mile extends Length
{
    public static function getSymbol(): string
    {
        return 'mi';
    }

    public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 1609.344), $arithmeticOperations);
    }

    public function toMeterValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 1609.344);
    }
}
