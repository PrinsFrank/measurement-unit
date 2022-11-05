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

    public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($value, $arithmeticOperations);
    }

    public function toSecondValue(): float
    {
        return $this->value;
    }
}
