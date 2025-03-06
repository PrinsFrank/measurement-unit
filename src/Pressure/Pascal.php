<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Pressure;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Pascal extends Pressure
{
    public static function getSymbol(): string
    {
        return 'Pa';
    }

    public static function fromPascalValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($value, $arithmeticOperations);
    }

    public function toPascalValue(): float
    {
        return $this->value;
    }
}
