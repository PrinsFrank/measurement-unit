<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Speed;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class MeterPerSecond extends Speed
{
    public static function getSymbol(): string
    {
        return 'm/s';
    }

    public static function fromMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): static
    {
        return new static($value, $arithmeticOperations);
    }

    public function toMeterPerSecondValue(): float
    {
        return $this->value;
    }
}
