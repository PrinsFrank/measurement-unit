<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Pressure;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class StandardAtmosphere extends Pressure
{
    public static function getSymbol(): string
    {
        return 'atm';
    }

    public static function fromPascalValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 101325), $arithmeticOperations);
    }

    public function toPascalValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 101325);
    }
}
