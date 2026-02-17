<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Pressure;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class MillimetreOfMercury extends Pressure
{
    protected static string $defaultSymbol = 'mmHg';

    public static function fromPascalValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 133.322387415), $arithmeticOperations);
    }

    public function toPascalValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 133.322387415);
    }
}
