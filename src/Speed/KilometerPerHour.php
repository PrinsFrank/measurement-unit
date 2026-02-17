<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Speed;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class KilometerPerHour extends Speed
{
    protected static string $defaultSymbol = 'km/h';

    public static function fromMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 0.277778), $arithmeticOperations);
    }

    public function toMeterPerSecondValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 0.277778);
    }
}
