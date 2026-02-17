<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Speed;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class MilesPerHour extends Speed
{
    protected static string $defaultSymbol = 'mph';

    public static function fromMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 0.44704), $arithmeticOperations);
    }

    public function toMeterPerSecondValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 0.44704);
    }
}
