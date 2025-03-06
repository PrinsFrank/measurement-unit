<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Pressure;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Kilopascal extends Pressure
{
    public static function getSymbol(): string
    {
        return 'kPa';
    }

    public static function fromPascalValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 1000), $arithmeticOperations);
    }

    public function toPascalValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 1000);
    }
}
