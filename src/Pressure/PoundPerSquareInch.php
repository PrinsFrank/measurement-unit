<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Pressure;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class PoundPerSquareInch extends Pressure
{
    protected static string $defaultSymbol = 'psi';

    public static function fromPascalValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 6894.757293168), $arithmeticOperations);
    }

    public function toPascalValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 6894.757293168);
    }
}
