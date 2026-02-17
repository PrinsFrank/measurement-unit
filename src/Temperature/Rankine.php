<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Rankine extends Temperature
{
    protected static string $defaultSymbol = '°R';

    public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self(
            $arithmeticOperations->multiply(
                $arithmeticOperations->divide($value, 5),
                9
            ),
            $arithmeticOperations
        );
    }

    public function toKelvinValue(): float
    {
        return $this->arithmeticOperations->divide($this->arithmeticOperations->multiply($this->value, 5), 9);
    }
}
