<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Time;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Second extends Time
{
    public static function getSymbol(): string
    {
        return 's';
    }

    public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): static
    {
        return new static($value, $arithmeticOperations);
    }

    public function toSecondValue(): float
    {
        return $this->value;
    }
}
