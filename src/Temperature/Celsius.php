<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Celsius extends Temperature
{
    protected static string $defaultSymbol = '°C';

    public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self(
            $arithmeticOperations->subtract(
                $value,
                273.15
            ),
            $arithmeticOperations
        );
    }

    public function toKelvinValue(): float
    {
        return $this->arithmeticOperations->add($this->value, 273.15);
    }
}
