<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Pressure;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Hectopascal extends Pressure
{
    protected static string $defaultSymbol = 'hPa';

    public static function fromPascalValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 100), $arithmeticOperations);
    }

    public function toPascalValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 100);
    }
}
